<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Berhasil - IWF 2026</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Midtrans Snap JS SDK -->
    @if(config('midtrans.is_production'))
        <script type="text/javascript" src="https://app.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
    @else
        <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
    @endif

    <style>
        :root {
            --primary-color: #0057d9;
            --primary-gradient: linear-gradient(135deg, #0057d9 0%, #003699 100%);
            --accent-color: #ff6b00;
            --accent-gradient: linear-gradient(135deg, #ff6b00 0%, #d45200 100%);
            --text-dark: #0f172a;
            --text-muted: #64748b;
            --bg-gradient: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        }

        body {
            background: var(--bg-gradient);
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text-dark);
            min-height: 100vh;
            padding: 50px 15px;
        }

        .receipt-card {
            background: #ffffff;
            border-radius: 28px;
            max-width: 600px;
            margin: 0 auto;
            box-shadow: 0 20px 40px rgba(0, 87, 217, 0.06);
            overflow: hidden;
            border: 1px solid rgba(0, 87, 217, 0.05);
            position: relative;
        }

        /* Top Bar Styling */
        .receipt-header {
            background: var(--primary-gradient);
            color: white;
            padding: 35px 30px;
            text-align: center;
        }

        .receipt-header h2 {
            font-weight: 800;
            margin: 0 0 5px 0;
            font-size: 24px;
            letter-spacing: -0.5px;
        }

        .receipt-body {
            padding: 40px;
        }

        .status-badge {
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 0.5px;
            display: inline-block;
            text-transform: uppercase;
        }

        .status-pending {
            background-color: #fffbeb;
            color: #d97706;
            border: 1px solid #fde68a;
        }

        .status-paid {
            background-color: #f0fdf4;
            color: #16a34a;
            border: 1px solid #bbf7d0;
        }

        .status-failed {
            background-color: #fef2f2;
            color: #dc2626;
            border: 1px solid #fecaca;
        }

        .receipt-details {
            background-color: #f8fafc;
            border-radius: 20px;
            padding: 24px;
            border: 1px dashed #cbd5e1;
            margin: 25px 0;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            font-size: 14px;
        }

        .detail-row:last-child {
            margin-bottom: 0;
            padding-top: 12px;
            border-top: 1px dashed #cbd5e1;
            font-size: 16px;
            font-weight: 700;
        }

        .detail-label {
            color: var(--text-muted);
            font-weight: 500;
        }

        .detail-val {
            color: var(--text-dark);
            font-weight: 700;
            text-align: right;
        }

        .btn-pay {
            background: var(--accent-gradient);
            color: white;
            border: none;
            border-radius: 16px;
            padding: 15px 30px;
            font-weight: 700;
            font-size: 16px;
            transition: all 0.2s ease;
            box-shadow: 0 6px 20px rgba(255, 107, 0, 0.3);
        }

        .btn-pay:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 24px rgba(255, 107, 0, 0.4);
            background: linear-gradient(135deg, #ff7b1a 0%, #e05700 100%);
            color: white;
        }

        .btn-pay:active {
            transform: translateY(1px);
        }

        .btn-ticket {
            background: var(--primary-gradient);
            color: white;
            border: none;
            border-radius: 16px;
            padding: 15px 30px;
            font-weight: 700;
            font-size: 16px;
            transition: all 0.2s ease;
            box-shadow: 0 6px 20px rgba(0, 87, 217, 0.25);
            text-decoration: none;
            display: block;
            text-align: center;
        }

        .btn-ticket:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 24px rgba(0, 87, 217, 0.35);
            color: white;
        }

        .btn-secondary-custom {
            border: 1.5px solid #cbd5e1;
            background: white;
            color: var(--text-dark);
            border-radius: 16px;
            padding: 12px 24px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-secondary-custom:hover {
            background-color: #f1f5f9;
            color: var(--text-dark);
            border-color: #94a3b8;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="receipt-card">
        <div class="receipt-header">
            <h2>Pesanan Tiket Berhasil Dibuat</h2>
            <p class="mb-0 text-white-50">Selesaikan pembayaran Anda untuk mengaktifkan tiket</p>
        </div>

        <!-- Receipt Content (for pending or failed status) -->
        <div id="payment-receipt-body" class="receipt-body text-center" style="{{ $order->payment_status === 'paid' ? 'display: none;' : '' }}">
            <div class="mb-3">
                @if ($order->payment_status == 'paid')
                    <span class="status-badge status-paid">Terbayar (Paid)</span>
                @elseif ($order->payment_status == 'pending')
                    <span id="receipt-status-badge" class="status-badge status-pending">Menunggu Pembayaran</span>
                @else
                    <span id="receipt-status-badge" class="status-badge status-failed">{{ $order->payment_status }}</span>
                @endif
            </div>

            <p id="receipt-instructions" class="text-muted small px-3">
                @if ($order->payment_status === 'pending')
                    Silakan lakukan pembayaran menggunakan tombol di bawah. Tiket elektronik akan aktif secara otomatis setelah pembayaran sukses.
                @else
                    Pesanan Anda tidak dapat diproses (gagal/kedaluwarsa). Silakan lakukan pemesanan kembali.
                @endif
            </p>

            <div class="receipt-details text-start">
                <div class="detail-row">
                    <span class="detail-label">Kode Pesanan</span>
                    <span class="detail-val">{{ $order->order_code }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Nama Pembeli</span>
                    <span class="detail-val">{{ $order->name }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Email</span>
                    <span class="detail-val">{{ $order->email }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">No. WhatsApp</span>
                    <span class="detail-val">{{ $order->phone }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Jumlah Tiket</span>
                    <span class="detail-val">{{ $order->quantity }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Total Bayar</span>
                    <span class="detail-val">Rp{{ number_format($order->total_amount, 0, ',', '.') }}</span>
                </div>
            </div>

            <!-- Action Area -->
            <div class="d-grid gap-3 mb-4">
                @if ($order->payment_status === 'pending')
                    @if ($order->snap_token)
                        <button id="pay-button" class="btn btn-pay w-100">
                            Bayar Sekarang
                        </button>
                    @else
                        <div class="alert alert-danger py-2 small">
                            Snap Token tidak ditemukan. Hubungi admin untuk memproses manual.
                        </div>
                    @endif
                @endif
            </div>

            @if ($order->payment_status === 'pending')
                <div id="receipt-warning" class="alert alert-warning py-3 text-start small mb-4">
                    <strong>Catatan:</strong> Halaman ini akan otomatis terupdate setelah Anda menyelesaikan pembayaran pada pop-up Midtrans.
                </div>
            @endif

            <div class="d-flex justify-content-center gap-3">
                <a href="{{ route('landing') }}" class="btn-secondary-custom">
                    Kembali ke Landing Page
                </a>
            </div>
        </div>

        <!-- NEW Dynamic E-Ticket Container (Shown on Success) -->
        <div id="e-ticket-body" class="receipt-body text-center" style="{{ $order->payment_status === 'paid' ? 'display: block;' : 'display: none;' }}">
            <div class="mb-3">
                <span class="status-badge status-paid">Terbayar (Paid)</span>
            </div>
            
            <p class="text-success fw-bold px-3">
                Terima kasih! Pembayaran telah diterima. Tiket elektronik Anda telah aktif dan link tiket juga sudah dikirimkan ke email Anda.
            </p>

            <!-- Card Ticket Visual inside the page -->
            <div class="ticket-card-visual" style="border: 1.5px solid #cbd5e1; border-radius: 20px; text-align: center; margin: 25px 0; overflow: hidden; background: white; box-shadow: 0 4px 15px rgba(0,87,217,0.02);">
                <div style="background: var(--primary-gradient); color: white; padding: 20px;">
                    <h5 class="mb-0 fw-bold" style="font-size: 16px;">E-TICKET RESMI PESERTA</h5>
                </div>
                <div style="padding: 25px 20px;">
                    <div id="ticket-qr-wrapper" class="mb-3" style="background: white; padding: 12px; border-radius: 16px; display: inline-block; border: 1px solid #e2e8f0; box-shadow: 0 4px 15px rgba(0, 87, 217, 0.03);">
                        @if ($order->payment_status === 'paid' && $order->ticket_code)
                            {!! QrCode::size(150)->generate(route('ticket.verify', $order->ticket_code)) !!}
                        @endif
                    </div>
                    <h4 id="ticket-code-text" style="font-size: 18px; font-weight: 800; color: var(--primary-color); letter-spacing: 1.5px; margin: 0;">
                        {{ $order->ticket_code ?? '' }}
                    </h4>
                </div>
                
                <div style="border-top: 1.5px dashed #cbd5e1; height: 1px; margin: 0 20px;"></div>
                
                <div style="padding: 20px; text-align: left; background: #f8fafc;">
                    <div class="detail-row">
                        <span class="detail-label">Nama Peserta</span>
                        <span id="ticket-name" class="detail-val">{{ $order->name }}</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">WhatsApp</span>
                        <span id="ticket-phone" class="detail-val">{{ $order->phone }}</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Email</span>
                        <span id="ticket-email" class="detail-val">{{ $order->email }}</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Jumlah Tiket</span>
                        <span id="ticket-qty" class="detail-val">{{ $order->quantity }} Tiket</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Total Pembayaran</span>
                        <span id="ticket-total" class="detail-val">Rp{{ number_format($order->total_amount, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>

            <div class="d-grid gap-2 mb-4">
                <button onclick="downloadTicketPDFSuccess()" class="btn-pay w-100" style="background: var(--accent-gradient); box-shadow: 0 4px 15px rgba(255, 107, 0, 0.2);">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right: 6px;">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="16" y1="13" x2="8" y2="13"></line>
                        <line x1="16" y1="17" x2="8" y2="17"></line>
                        <polyline points="10 9 9 9 8 9"></polyline>
                    </svg>
                    Unduh E-Ticket (PDF)
                </button>
                <a id="ticket-link" href="{{ $order->ticket_code ? route('ticket.show', $order->ticket_code) : '#' }}" class="btn-ticket w-100" target="_blank">
                    Lihat / Cetak E-Ticket
                </a>
            </div>
            
            <div class="d-flex justify-content-center gap-3">
                <a href="{{ route('landing') }}" class="btn-secondary-custom">
                    Kembali ke Landing Page
                </a>
            </div>
        </div>
    </div>
</div>

@if ($order->payment_status === 'pending' && $order->snap_token)
    <script type="text/javascript">
        let pollInterval;

        function checkPaymentStatusAjax() {
            fetch('{{ route('ticket.checkStatus', $order->order_code) }}')
                .then(response => response.json())
                .then(data => {
                    if (data.success && data.payment_status === 'paid') {
                        // Populate E-Ticket details dynamically
                        document.getElementById('ticket-qr-wrapper').innerHTML = data.qr_code_html;
                        document.getElementById('ticket-code-text').innerText = data.ticket_code;
                        document.getElementById('ticket-name').innerText = data.name;
                        document.getElementById('ticket-phone').innerText = data.phone;
                        document.getElementById('ticket-email').innerText = data.email;
                        document.getElementById('ticket-qty').innerText = data.quantity + ' Tiket';
                        document.getElementById('ticket-total').innerText = data.total_amount_formatted;
                        document.getElementById('ticket-link').href = data.ticket_url;

                        // Toggle visibility with simple transition
                        document.getElementById('payment-receipt-body').style.display = 'none';
                        document.getElementById('e-ticket-body').style.display = 'block';

                        // Stop polling interval
                        if (pollInterval) {
                            clearInterval(pollInterval);
                        }
                    } else if (data.success && (data.payment_status === 'failed' || data.payment_status === 'expired')) {
                        // Update status badge to failed
                        const statusBadge = document.getElementById('receipt-status-badge');
                        if (statusBadge) {
                            statusBadge.className = 'status-badge status-failed';
                            statusBadge.innerText = data.payment_status === 'expired' ? 'Kedaluwarsa' : 'Gagal';
                        }
                        const instructions = document.getElementById('receipt-instructions');
                        if (instructions) {
                            instructions.innerText = 'Pemesanan Anda telah gagal atau kedaluwarsa. Silakan lakukan pemesanan kembali.';
                        }
                        const payButton = document.getElementById('pay-button');
                        if (payButton) {
                            payButton.style.display = 'none';
                        }
                        const warning = document.getElementById('receipt-warning');
                        if (warning) {
                            warning.style.display = 'none';
                        }

                        // Stop polling interval
                        if (pollInterval) {
                            clearInterval(pollInterval);
                        }
                    }
                })
                .catch(err => console.error('Error checking payment status:', err));
        }

        // Trigger polling status check every 4 seconds
        pollInterval = setInterval(checkPaymentStatusAjax, 4000);

        const payButton = document.getElementById('pay-button');
        if (payButton) {
            payButton.onclick = function () {
                // Trigger snap payment popup
                snap.pay('{{ $order->snap_token }}', {
                    onSuccess: function(result) {
                        /* Payment Success callback - update view immediately via AJAX */
                        checkPaymentStatusAjax();
                    },
                    onPending: function(result) {
                        /* Payment Pending callback - check status via AJAX */
                        checkPaymentStatusAjax();
                    },
                    onError: function(result) {
                        /* Payment Error callback */
                        checkPaymentStatusAjax();
                    },
                    onClose: function() {
                        /* Popup closed - run check just in case they paid before closing */
                        checkPaymentStatusAjax();
                    }
                });
            };
        }
    </script>
@endif

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script type="text/javascript">
    window.jsPDF = window.jspdf.jsPDF;

    function downloadTicketPDFSuccess() {
        const ticketElement = document.querySelector('.ticket-card-visual');
        const ticketCodeText = document.getElementById('ticket-code-text').innerText.trim();
        const ticketCode = ticketCodeText || '{{ $order->ticket_code ?? "" }}';
        
        if (!ticketCode) {
            alert('Kode tiket belum terbit atau belum aktif.');
            return;
        }

        html2canvas(ticketElement, {
            scale: 2.5, // High quality render
            useCORS: true,
            backgroundColor: '#ffffff'
        }).then(canvas => {
            const imgData = canvas.toDataURL('image/jpeg', 1.0);
            
            // Calculate dimensions
            const imgWidth = 210; // A4 width in mm
            const imgHeight = (canvas.height * imgWidth) / canvas.width;
            
            // Initialize jsPDF with custom page size matching the ticket proportion
            const pdf = new jsPDF({
                orientation: 'portrait',
                unit: 'mm',
                format: [imgWidth, imgHeight]
            });
            
            pdf.addImage(imgData, 'JPEG', 0, 0, imgWidth, imgHeight);
            pdf.save('E-Ticket-IWF-' + ticketCode + '.pdf');
        }).catch(err => {
            console.error('Error generating PDF:', err);
            alert('Gagal mengunduh PDF tiket. Silakan gunakan opsi Lihat / Cetak E-Ticket.');
        });
    }
</script>
</body>
</html>