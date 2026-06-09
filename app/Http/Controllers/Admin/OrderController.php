<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Cell\DataType;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function exportExcel()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();
        
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Pendaftar IWF 2026');
        
        // Headers
        $headers = [
            'ID',
            'Kode Pesanan',
            'Kode Tiket',
            'Nama Lengkap',
            'Email',
            'No. WhatsApp',
            'Jumlah Tiket',
            'Total Bayar',
            'Status Pembayaran',
            'Status Check-in',
            'Tanggal Pemesanan'
        ];
        
        // Write headers
        foreach ($headers as $colIdx => $header) {
            $cellCoordinate = chr(65 + $colIdx) . '1'; // A1, B1, etc.
            $sheet->setCellValue($cellCoordinate, $header);
        }
        
        // Header styling
        $headerRange = 'A1:K1';
        $sheet->getStyle($headerRange)->getFont()->setBold(true)->setColor(new \PhpOffice\PhpSpreadsheet\Style\Color(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE));
        $sheet->getStyle($headerRange)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('0057D9');
        $sheet->getStyle($headerRange)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        
        // Write data
        $row = 2;
        foreach ($orders as $order) {
            $checkinStatus = $order->checked_in_at 
                ? 'Sudah Check-in (' . $order->checked_in_at->format('d M Y H:i') . ')'
                : 'Belum Check-in';
                
            $sheet->setCellValueExplicit('A' . $row, $order->id, DataType::TYPE_NUMERIC);
            $sheet->setCellValueExplicit('B' . $row, $order->order_code, DataType::TYPE_STRING);
            $sheet->setCellValueExplicit('C' . $row, $order->ticket_code ?? '-', DataType::TYPE_STRING);
            $sheet->setCellValue('D' . $row, $order->name);
            $sheet->setCellValue('E' . $row, $order->email);
            // No. WhatsApp should be formatted as text (DataType::TYPE_STRING) to prevent Excel from dropping leading zeros or scientific notation.
            $sheet->setCellValueExplicit('F' . $row, $order->phone, DataType::TYPE_STRING);
            $sheet->setCellValueExplicit('G' . $row, $order->quantity, DataType::TYPE_NUMERIC);
            $sheet->setCellValueExplicit('H' . $row, $order->total_amount, DataType::TYPE_NUMERIC);
            $sheet->setCellValue('I' . $row, strtoupper($order->payment_status));
            $sheet->setCellValue('J' . $row, $checkinStatus);
            $sheet->setCellValue('K' . $row, $order->created_at->format('d M Y H:i'));
            
            $row++;
        }
        
        // Auto-fit column widths
        foreach (range('A', 'K') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }
        
        $fileName = 'daftar-pendaftar-iwf-2026.xlsx';
        
        return response()->streamDownload(function() use ($spreadsheet) {
            $writer = new Xlsx($spreadsheet);
            $writer->save('php://output');
        }, $fileName, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Cache-Control' => 'max-age=0',
        ]);
    }


    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'payment_status' => 'required|in:pending,paid,failed,expired',
        ]);

        $order = Order::findOrFail($id);

        $order->payment_status = $request->payment_status;

        if ($request->payment_status === 'paid' && !$order->ticket_code) {
            $order->ticket_code = 'TICKET-IWF-' . strtoupper(Str::random(8));
            
            // Send ticket mail
            try {
                \Mail::to($order->email)->send(new \App\Mail\TicketMail($order));
            } catch (\Exception $e) {
                \Log::error('Failed to send manual ticket email: ' . $e->getMessage());
            }
        }

        $order->save();

        return redirect()->route('admin.orders.index')
            ->with('success', 'Status pembayaran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $name  = $order->name;
        $order->delete();

        return redirect()->route('admin.orders.index')
            ->with('success', "Data peserta \"$name\" berhasil dihapus.");
    }
}