<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TicketController extends Controller
{
    private function initMidtrans()
    {
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        \Midtrans\Config::$isSanitized = config('midtrans.is_sanitized');
        \Midtrans\Config::$is3ds = config('midtrans.is_3ds');
    }

    public function form()
    {
        return view('ticket.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'quantity' => 'required|integer|min:1',
        ]);

        $ticketPrice = 35000;
        $quantity = $request->quantity;
        $totalAmount = $ticketPrice * $quantity;
        $orderCode = 'IWF-' . now()->format('Ymd') . '-' . strtoupper(Str::random(6));

        // Attempt to generate Midtrans Snap Token
        $snapToken = null;
        try {
            $this->initMidtrans();

            // Only call Midtrans if keys are set (helpful for local setup fallback)
            if (config('midtrans.server_key')) {
                $transactionDetails = [
                    'order_id' => $orderCode,
                    'gross_amount' => $totalAmount,
                ];

                $itemDetails = [
                    [
                        'id' => 'TICKET-IWF',
                        'price' => $ticketPrice,
                        'quantity' => $quantity,
                        'name' => 'Tiket Impact Weekender Fest 2026',
                    ]
                ];

                $customerDetails = [
                    'first_name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                ];

                $transactionPayload = [
                    'transaction_details' => $transactionDetails,
                    'item_details' => $itemDetails,
                    'customer_details' => $customerDetails,
                ];

                $snapToken = \Midtrans\Snap::getSnapToken($transactionPayload);
            }
        } catch (\Exception $e) {
            \Log::error('Midtrans getSnapToken failed: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->withErrors(['midtrans' => 'Gagal menghubungi Payment Gateway Midtrans. Pastikan Server Key di .env sudah benar. ' . $e->getMessage()]);
        }

        $order = Order::create([
            'order_code' => $orderCode,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'quantity' => $quantity,
            'ticket_price' => $ticketPrice,
            'total_amount' => $totalAmount,
            'payment_status' => 'pending',
            'snap_token' => $snapToken,
        ]);

        return redirect()->route('ticket.success', $order->order_code);
    }

    public function success($orderCode)
    {
        $order = Order::where('order_code', $orderCode)->firstOrFail();

        // If payment is pending, query Midtrans API directly to check if user has paid (fallback for local webhook block)
        if ($order->payment_status === 'pending' && config('midtrans.server_key')) {
            try {
                $this->initMidtrans();
                $status = \Midtrans\Transaction::status($order->order_code);
                
                $isPaid = false;
                if ($status->transaction_status === 'settlement') {
                    $isPaid = true;
                } elseif ($status->transaction_status === 'capture' && $status->fraud_status !== 'challenge') {
                    $isPaid = true;
                }

                if ($isPaid) {
                    $order->payment_status = 'paid';
                    if (!$order->ticket_code) {
                        $order->ticket_code = 'TICKET-IWF-' . strtoupper(Str::random(8));
                    }
                    $order->save();

                    // Send ticket notification email automatically
                    try {
                        \Mail::to($order->email)->send(new \App\Mail\TicketMail($order));
                    } catch (\Exception $e) {
                        \Log::error('Failed to send Ticket Mail on success page sync: ' . $e->getMessage());
                    }
                } elseif (in_array($status->transaction_status, ['cancel', 'deny', 'expire'])) {
                    $order->payment_status = 'failed';
                    $order->save();
                }
            } catch (\Exception $e) {
                // If transaction not found in Midtrans database yet, ignore and keep current status
                \Log::warning('Midtrans status check fallback skipped: ' . $e->getMessage());
            }
        }

        return view('ticket.success', compact('order'));
    }

    public function callback(Request $request)
    {
        $this->initMidtrans();

        try {
            $notification = new \Midtrans\Notification();
        } catch (\Exception $e) {
            \Log::error('Midtrans callback parse failed: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid callback data: ' . $e->getMessage()
            ], 400);
        }

        // Verify webhook signature key
        $serverKey = config('midtrans.server_key');
        $orderId = $notification->order_id;
        $statusCode = $notification->status_code;
        $grossAmount = $notification->gross_amount;
        $signatureKey = $notification->signature_key;

        $input = $orderId . $statusCode . $grossAmount . $serverKey;
        $calculatedSignature = hash('sha512', $input);

        if ($signatureKey !== $calculatedSignature) {
            \Log::warning('Midtrans callback invalid signature: Calculated ' . $calculatedSignature . ' but received ' . $signatureKey);
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid signature key'
            ], 403);
        }

        $transactionStatus = $notification->transaction_status;
        $fraudStatus = $notification->fraud_status;

        $order = Order::where('order_code', $orderId)->first();

        if (!$order) {
            return response()->json([
                'status' => 'error',
                'message' => 'Order not found'
            ], 404);
        }

        // Determine status based on Midtrans response
        if ($transactionStatus == 'capture') {
            if ($fraudStatus == 'challenge') {
                $order->payment_status = 'pending';
            } else if ($fraudStatus == 'accept') {
                $order->payment_status = 'paid';
            }
        } else if ($transactionStatus == 'settlement') {
            $order->payment_status = 'paid';
        } else if ($transactionStatus == 'cancel' || $transactionStatus == 'deny' || $transactionStatus == 'expire') {
            $order->payment_status = 'failed';
        } else if ($transactionStatus == 'pending') {
            $order->payment_status = 'pending';
        }

        // Generate ticket code and trigger email if paid
        if ($order->payment_status === 'paid') {
            if (!$order->ticket_code) {
                $order->ticket_code = 'TICKET-IWF-' . strtoupper(Str::random(8));
            }
            $order->save();

            // Send ticket notification email
            try {
                \Mail::to($order->email)->send(new \App\Mail\TicketMail($order));
            } catch (\Exception $e) {
                \Log::error('Failed to send Ticket Mail: ' . $e->getMessage());
            }
        } else {
            $order->save();
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Callback processed successfully'
        ]);
    }

    public function showTicket($ticketCode)
    {
        $order = Order::where('ticket_code', $ticketCode)->firstOrFail();

        if ($order->payment_status !== 'paid') {
            abort(403, 'Tiket belum aktif karena pembayaran belum dikonfirmasi.');
        }

        return view('ticket.show', compact('order'));
    }

    public function checkStatus($orderCode)
    {
        $order = Order::where('order_code', $orderCode)->first();
        if (!$order) {
            return response()->json([
                'success' => false,
                'message' => 'Pesanan tidak ditemukan'
            ], 404);
        }

        // Perform status check with Midtrans
        if ($order->payment_status === 'pending' && config('midtrans.server_key')) {
            try {
                $this->initMidtrans();
                $status = \Midtrans\Transaction::status($order->order_code);
                
                $isPaid = false;
                if ($status->transaction_status === 'settlement') {
                    $isPaid = true;
                } elseif ($status->transaction_status === 'capture' && $status->fraud_status !== 'challenge') {
                    $isPaid = true;
                }

                if ($isPaid) {
                    $order->payment_status = 'paid';
                    if (!$order->ticket_code) {
                        $order->ticket_code = 'TICKET-IWF-' . strtoupper(Str::random(8));
                    }
                    $order->save();

                    // Send ticket notification email automatically
                    try {
                        \Mail::to($order->email)->send(new \App\Mail\TicketMail($order));
                    } catch (\Exception $e) {
                        \Log::error('Failed to send Ticket Mail on AJAX check: ' . $e->getMessage());
                    }
                } elseif (in_array($status->transaction_status, ['cancel', 'deny', 'expire'])) {
                    $order->payment_status = 'failed';
                    $order->save();
                }
            } catch (\Exception $e) {
                \Log::warning('Midtrans AJAX status check skipped: ' . $e->getMessage());
            }
        }

        return response()->json([
            'success' => true,
            'payment_status' => $order->payment_status,
            'ticket_code' => $order->ticket_code,
            'ticket_url' => $order->ticket_code ? route('ticket.show', $order->ticket_code) : null,
            'qr_code_html' => $order->ticket_code ? (string) \QrCode::size(150)->generate(route('ticket.verify', $order->ticket_code)) : null,
            'name' => $order->name,
            'phone' => $order->phone,
            'email' => $order->email,
            'quantity' => $order->quantity,
            'total_amount_formatted' => 'Rp' . number_format($order->total_amount, 0, ',', '.')
        ]);
    }

    public function verify($ticketCode)
    {
        $order = Order::where('ticket_code', $ticketCode)->first();

        return view('ticket.verify', compact('order'));
    }

    public function checkIn($ticketCode)
    {
        $order = Order::where('ticket_code', $ticketCode)->firstOrFail();

        if ($order->payment_status !== 'paid') {
            return redirect()->route('ticket.verify', $ticketCode)
                ->with('error', 'Tiket belum dibayar, tidak bisa check-in.');
        }

        if ($order->checked_in_at) {
            return redirect()->route('ticket.verify', $ticketCode)
                ->with('error', 'Tiket ini sudah pernah digunakan.');
        }

        $order->checked_in_at = now();
        $order->save();

        return redirect()->route('ticket.verify', $ticketCode)
            ->with('success', 'Check-in berhasil. Tiket valid.');
    }
}