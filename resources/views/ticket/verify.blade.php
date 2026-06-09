<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Tiket - IWF 2026</title>

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

        .verify-card {
            background: #ffffff;
            border-radius: 28px;
            max-width: 600px;
            margin: 0 auto;
            box-shadow: 0 20px 40px rgba(0, 87, 217, 0.08);
            overflow: hidden;
            border: 1px solid rgba(0, 87, 217, 0.05);
        }

        .verify-header {
            background: var(--primary-gradient);
            color: white;
            padding: 35px 30px;
            text-align: center;
        }

        .verify-header h2 {
            font-weight: 800;
            margin: 0 0 5px 0;
            font-size: 24px;
            letter-spacing: -0.5px;
        }

        .verify-body {
            padding: 40px;
        }

        .status-box {
            padding: 24px;
            border-radius: 20px;
            margin-bottom: 30px;
            font-weight: 700;
            text-align: center;
        }

        .status-box-valid {
            background-color: #f0fdf4;
            color: #15803d;
            border: 1.5px solid #bbf7d0;
        }

        .status-box-invalid {
            background-color: #fef2f2;
            color: #b91c1c;
            border: 1.5px solid #fecaca;
        }

        .status-box-unpaid {
            background-color: #fffbeb;
            color: #b45309;
            border: 1.5px solid #fde68a;
        }

        .status-box-checkedin {
            background-color: #f8fafc;
            color: #475569;
            border: 1.5px solid #e2e8f0;
        }

        .info-grid {
            background-color: #f8fafc;
            border-radius: 20px;
            padding: 24px;
            border: 1px solid #e2e8f0;
            margin-bottom: 30px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            font-size: 14px;
            border-bottom: 1px solid #f1f5f9;
            padding-bottom: 12px;
        }

        .info-row:last-child {
            margin-bottom: 0;
            border-bottom: none;
            padding-bottom: 0;
        }

        .info-label {
            color: var(--text-muted);
            font-weight: 600;
        }

        .info-val {
            font-weight: 700;
            color: var(--text-dark);
            text-align: right;
        }

        .btn-checkin {
            background: linear-gradient(135deg, #16a34a 0%, #15803d 100%);
            color: white;
            border: none;
            border-radius: 16px;
            padding: 15px 30px;
            font-weight: 700;
            font-size: 16px;
            transition: all 0.2s ease;
            box-shadow: 0 6px 20px rgba(22, 163, 74, 0.25);
        }

        .btn-checkin:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 24px rgba(22, 163, 74, 0.35);
            color: white;
        }

        .btn-checkin:active {
            transform: translateY(1px);
        }

        .btn-admin {
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

        .btn-admin:hover {
            background-color: #f1f5f9;
            color: var(--text-dark);
            border-color: #94a3b8;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="verify-card">
        <div class="verify-header">
            <h2>Verifikasi Tiket</h2>
            <p class="mb-0 text-white-50">Impact Weekender Fest 2026</p>
        </div>

        <div class="verify-body">
            @if (session('success'))
                <div class="alert alert-success border-0 rounded-4 p-3 mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger border-0 rounded-4 p-3 mb-4">
                    {{ session('error') }}
                </div>
            @endif

            @if (!$order)
                <div class="status-box status-box-invalid">
                    <h4 class="mb-0">TIKET TIDAK VALID</h4>
                    <small class="fw-normal">Kode tiket tidak ditemukan dalam sistem database.</small>
                </div>
            @else
                @if ($order->payment_status !== 'paid')
                    <div class="status-box status-box-unpaid">
                        <h4 class="mb-0">PEMBAYARAN BELUM LUNAS</h4>
                        <small class="fw-normal">Status pembayaran order ini masih: {{ strtoupper($order->payment_status) }}</small>
                    </div>
                @elseif ($order->checked_in_at)
                    <div class="status-box status-box-checkedin">
                        <h4 class="mb-0">TIKET SUDAH DIGUNAKAN</h4>
                        <small class="fw-normal">Peserta telah melakukan check-in sebelumnya.</small>
                    </div>
                @else
                    <div class="status-box status-box-valid">
                        <h4 class="mb-0">TIKET VALID & AKTIF</h4>
                        <small class="fw-normal">Silakan izinkan peserta masuk setelah check-in.</small>
                    </div>
                @endif

                <div class="info-grid text-start">
                    <div class="info-row">
                        <span class="info-label">Kode Tiket</span>
                        <span class="info-val text-primary">{{ $order->ticket_code }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Nama Peserta</span>
                        <span class="info-val">{{ $order->name }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Email</span>
                        <span class="info-val">{{ $order->email }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">No. WhatsApp</span>
                        <span class="info-val">{{ $order->phone }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Jumlah Tiket</span>
                        <span class="info-val">{{ $order->quantity }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Status Bayar</span>
                        <span class="info-val">{{ strtoupper($order->payment_status) }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Waktu Check-in</span>
                        <span class="info-val">
                            @if ($order->checked_in_at)
                                {{ $order->checked_in_at->format('d M Y H:i') }}
                            @else
                                <span class="text-danger">Belum Digunakan</span>
                            @endif
                        </span>
                    </div>
                </div>

                @if ($order->payment_status === 'paid' && !$order->checked_in_at)
                    <form action="{{ route('ticket.checkIn', $order->ticket_code) }}" method="POST" class="d-grid mb-4">
                        @csrf
                        <button type="submit" class="btn btn-checkin">
                            Check-in Peserta Sekarang
                        </button>
                    </form>
                @endif
            @endif

            <div class="text-center">
                <a href="{{ route('admin.orders.index') }}" class="btn btn-admin">
                    Kembali ke Dashboard Admin
                </a>
            </div>
        </div>
    </div>
</div>

</body>
</html>