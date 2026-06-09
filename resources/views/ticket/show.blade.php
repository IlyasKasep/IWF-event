<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Ticket IWF 2026</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #0057d9;
            --primary-gradient: linear-gradient(135deg, #0057d9 0%, #003699 100%);
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

        .ticket-container {
            max-width: 550px;
            margin: 0 auto;
        }

        /* E-Ticket visual card with notches */
        .e-ticket {
            background: #ffffff;
            border-radius: 28px;
            box-shadow: 0 20px 40px rgba(0, 87, 217, 0.08);
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(0, 87, 217, 0.05);
        }

        /* Ticket Top Branding Portion */
        .ticket-header {
            background: var(--primary-gradient);
            color: white;
            padding: 40px 30px;
            text-align: center;
            position: relative;
        }

        .ticket-header h1 {
            font-weight: 800;
            font-size: 24px;
            margin-bottom: 5px;
            letter-spacing: -0.5px;
        }

        .ticket-header p {
            font-size: 14px;
            opacity: 0.8;
            margin-bottom: 0;
            font-weight: 500;
        }

        /* QR Code & Code portion */
        .ticket-mid {
            padding: 35px 30px;
            text-align: center;
            background-color: #ffffff;
            position: relative;
        }

        .qr-wrapper {
            background: white;
            padding: 16px;
            border-radius: 24px;
            display: inline-block;
            box-shadow: 0 10px 30px rgba(0, 87, 217, 0.06);
            border: 1.5px solid #f1f5f9;
            margin-bottom: 20px;
        }

        .qr-wrapper svg {
            display: block;
        }

        .ticket-code {
            font-size: 20px;
            font-weight: 800;
            color: var(--primary-color);
            letter-spacing: 1px;
            margin-bottom: 0;
        }

        /* Notches / Cutouts */
        .ticket-divider-container {
            position: relative;
            height: 20px;
            background-color: #ffffff;
        }

        .ticket-divider {
            border-top: 2px dashed #e2e8f0;
            margin: 0 25px;
            height: 1px;
        }

        .notch-left, .notch-right {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 24px;
            height: 24px;
            background: #cbd5e1; /* Blends with body background gradient */
            border-radius: 50%;
            z-index: 2;
        }

        .notch-left {
            left: -12px;
            box-shadow: inset -5px 0 8px rgba(0, 87, 217, 0.03);
        }

        .notch-right {
            right: -12px;
            box-shadow: inset 5px 0 8px rgba(0, 87, 217, 0.03);
        }

        /* Ticket details portion */
        .ticket-details {
            padding: 35px 40px;
            background-color: #ffffff;
        }

        .detail-item {
            margin-bottom: 18px;
        }

        .detail-item:last-child {
            margin-bottom: 0;
        }

        .detail-label {
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            color: var(--text-muted);
            letter-spacing: 0.8px;
            margin-bottom: 4px;
        }

        .detail-val {
            font-size: 15px;
            font-weight: 700;
            color: var(--text-dark);
        }

        .badge-status {
            padding: 5px 12px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 700;
            display: inline-block;
        }

        .badge-active {
            background-color: #f0fdf4;
            color: #16a34a;
            border: 1px solid #bbf7d0;
        }

        .badge-used {
            background-color: #f1f5f9;
            color: #475569;
            border: 1px solid #cbd5e1;
        }

        .ticket-footer {
            background-color: #f8fafc;
            padding: 25px 30px;
            text-align: center;
            border-top: 1px solid #f1f5f9;
        }

        .btn-landing {
            border: 1.5px solid #cbd5e1;
            background: white;
            color: var(--text-dark);
            border-radius: 14px;
            padding: 10px 24px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-landing:hover {
            background-color: #f1f5f9;
            color: var(--text-dark);
            border-color: #94a3b8;
        }

        .btn-download-image {
            background: var(--accent-gradient);
            color: white;
            border: none;
            border-radius: 14px;
            padding: 12px 24px;
            font-weight: 700;
            font-size: 14px;
            transition: all 0.2s ease;
            box-shadow: 0 4px 15px rgba(255, 107, 0, 0.2);
            width: 100%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .btn-download-image:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 18px rgba(255, 107, 0, 0.3);
            color: white;
        }

        .btn-print-pdf {
            background: var(--primary-gradient);
            color: white;
            border: none;
            border-radius: 14px;
            padding: 10px 24px;
            font-weight: 700;
            font-size: 14px;
            transition: all 0.2s ease;
            box-shadow: 0 4px 15px rgba(0, 87, 217, 0.2);
            display: inline-block;
            cursor: pointer;
        }

        .btn-print-pdf:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 18px rgba(0, 87, 217, 0.3);
            color: white;
        }

        @media print {
            body {
                background: none !important;
                padding: 0 !important;
                margin: 0 !important;
            }
            .ticket-container {
                max-width: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
                box-shadow: none !important;
            }
            .e-ticket {
                box-shadow: none !important;
                border: none !important;
                border-radius: 0 !important;
            }
            .ticket-footer {
                display: none !important;
            }
            .notch-left, .notch-right {
                background: #ffffff !important;
                border: none !important;
            }
        }
    </style>
</head>
<body>

<div class="ticket-container">
    <div class="e-ticket">
        <!-- Header -->
        <div class="ticket-header">
            <h1>Impact Weekender Fest 2026</h1>
            <p>E-TICKET RESMI PESERTA</p>
        </div>

        <!-- Mid QR -->
        <div class="ticket-mid">
            <div class="qr-wrapper">
                {!! QrCode::size(200)->generate(route('ticket.verify', $order->ticket_code)) !!}
            </div>
            <h5 class="ticket-code">{{ $order->ticket_code }}</h5>
        </div>

        <!-- Divider with Notches -->
        <div class="ticket-divider-container">
            <div class="notch-left"></div>
            <div class="ticket-divider"></div>
            <div class="notch-right"></div>
        </div>

        <!-- Details -->
        <div class="ticket-details">
            <div class="row">
                <div class="col-6 detail-item">
                    <div class="detail-label">Nama Peserta</div>
                    <div class="detail-val">{{ $order->name }}</div>
                </div>
                <div class="col-6 detail-item">
                    <div class="detail-label">WhatsApp</div>
                    <div class="detail-val">{{ $order->phone }}</div>
                </div>
                <div class="col-12 detail-item">
                    <div class="detail-label">Email</div>
                    <div class="detail-val">{{ $order->email }}</div>
                </div>
                <div class="col-6 detail-item">
                    <div class="detail-label">Jumlah Tiket</div>
                    <div class="detail-val">{{ $order->quantity }} Tiket</div>
                </div>
                <div class="col-6 detail-item">
                    <div class="detail-label">Total Bayar</div>
                    <div class="detail-val">Rp{{ number_format($order->total_amount, 0, ',', '.') }}</div>
                </div>
                <div class="col-6 detail-item">
                    <div class="detail-label">Status Tiket</div>
                    <div>
                        <span class="badge-status badge-active">AKTIF</span>
                    </div>
                </div>
                <div class="col-6 detail-item">
                    <div class="detail-label">Status Check-in</div>
                    <div>
                        @if ($order->checked_in_at)
                            <span class="badge-status badge-used">
                                Check-in pada {{ $order->checked_in_at->format('d M Y H:i') }}
                            </span>
                        @else
                            <span class="badge-status badge-active" style="background-color: #eff6ff; color: #1d4ed8; border-color: #bfdbfe;">
                                Belum Digunakan
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="ticket-footer">
            <p class="text-muted small mb-3">
                Tunjukkan QR Code ini kepada panitia di pintu masuk untuk proses check-in.
            </p>
            <div class="d-flex flex-column gap-2">
                <button onclick="downloadTicketPDF()" class="btn-download-image">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right: 6px;">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="16" y1="13" x2="8" y2="13"></line>
                        <line x1="16" y1="17" x2="8" y2="17"></line>
                        <polyline points="10 9 9 9 8 9"></polyline>
                    </svg>
                    Unduh E-Ticket (PDF)
                </button>
                <div class="d-flex gap-2">
                    <button onclick="window.print()" class="btn-print-pdf flex-fill">
                        Cetak / PDF
                    </button>
                    <a href="{{ route('landing') }}" class="btn-landing flex-fill">
                        Landing Page
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script>
    window.jsPDF = window.jspdf.jsPDF;

    function downloadTicketPDF() {
        const ticketElement = document.querySelector('.e-ticket');
        const footer = document.querySelector('.ticket-footer');
        
        // Hide footer temporary during canvas render so buttons aren't in the PDF
        if (footer) footer.style.display = 'none';
        
        html2canvas(ticketElement, {
            scale: 2.5, // High quality render
            useCORS: true,
            backgroundColor: '#ffffff'
        }).then(canvas => {
            if (footer) footer.style.display = 'block'; // Restore footer
            
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
            pdf.save('E-Ticket-IWF-{{ $order->ticket_code }}.pdf');
        }).catch(err => {
            if (footer) footer.style.display = 'block'; // Restore footer
            console.error('Error generating PDF:', err);
            alert('Gagal mengunduh PDF tiket. Silakan gunakan opsi Cetak/PDF.');
        });
    }
</script>
</body>
</html>