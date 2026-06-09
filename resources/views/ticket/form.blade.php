<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beli Tiket - IWF 2026</title>
    <meta name="description" content="Daftar dan beli tiket Impact Weekender Fest 2026. Webinar daring untuk pemuda Indonesia.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: #0057d9;
            --primary-grad: linear-gradient(135deg, #0057d9 0%, #003699 100%);
            --accent: #ff6b00;
            --accent-grad: linear-gradient(135deg, #ff6b00 0%, #d45200 100%);
            --dark: #0f172a;
            --muted: #64748b;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #f1f5f9;
            min-height: 100vh;
            display: flex;
            align-items: stretch;
            margin: 0;
        }

        /* ── LEFT PANEL ── */
        .left-panel {
            width: 42%;
            background: linear-gradient(160deg, #0c1a3a 0%, #001a5e 50%, #0f172a 100%);
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
        }

        .left-panel::before {
            content: '';
            position: absolute;
            top: -100px; right: -100px;
            width: 380px; height: 380px;
            background: radial-gradient(circle, rgba(0,87,217,0.2) 0%, transparent 65%);
            border-radius: 50%;
            pointer-events: none;
        }

        .left-panel::after {
            content: '';
            position: absolute;
            bottom: -80px; left: -60px;
            width: 280px; height: 280px;
            background: radial-gradient(circle, rgba(255,107,0,0.12) 0%, transparent 65%);
            border-radius: 50%;
            pointer-events: none;
        }

        .brand-logo {
            display: flex; align-items: center; gap: 10px;
            text-decoration: none; margin-bottom: 50px;
        }
        .brand-logo img {
            height: 38px;
            width: auto;
        }
        .brand-logo span {
            font-size: 16px; font-weight: 800; color: white; letter-spacing: -0.5px;
        }

        .event-badge {
            display: inline-flex; align-items: center; gap: 6px;
            background: rgba(255,107,0,0.15);
            border: 1px solid rgba(255,107,0,0.3);
            color: #ff8c42;
            padding: 5px 14px; border-radius: 30px;
            font-size: 11px; font-weight: 700; letter-spacing: 1px;
            text-transform: uppercase; margin-bottom: 20px;
        }

        .event-badge .dot {
            width: 7px; height: 7px; background: #ff6b00;
            border-radius: 50%; animation: pulse-dot 1.5s ease-in-out infinite;
        }

        .left-title {
            font-size: 34px; font-weight: 800;
            color: white; letter-spacing: -1px;
            line-height: 1.2; margin-bottom: 10px;
        }

        .left-title .grad {
            background: linear-gradient(90deg, #38bdf8, #818cf8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .left-sub {
            color: #94a3b8; font-size: 14px;
            line-height: 1.6; margin-bottom: 36px;
        }

        /* Benefits list */
        .benefit-list { list-style: none; padding: 0; margin-bottom: 36px; }
        .benefit-list li {
            display: flex; align-items: flex-start; gap: 12px;
            color: #cbd5e1; font-size: 14px; font-weight: 500;
            margin-bottom: 14px; line-height: 1.5;
        }
        .benefit-icon {
            flex-shrink: 0; width: 28px; height: 28px;
            background: rgba(56,189,248,0.1);
            border: 1px solid rgba(56,189,248,0.2);
            border-radius: 8px; display: flex;
            align-items: center; justify-content: center;
            margin-top: 1px;
        }

        /* Stats strip */
        .stats-strip {
            display: flex; gap: 12px; margin-bottom: 36px;
        }
        .stat-item {
            flex: 1; background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 14px; padding: 14px 12px; text-align: center;
        }
        .stat-num {
            font-size: 22px; font-weight: 800; color: #38bdf8;
            letter-spacing: -1px; line-height: 1;
        }
        .stat-num.orange { color: #fb923c; }
        .stat-num.green  { color: #4ade80; }
        .stat-label {
            font-size: 10px; color: #64748b; font-weight: 600;
            text-transform: uppercase; letter-spacing: 0.5px; margin-top: 4px;
        }

        /* Testimonial */
        .testimonial {
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.07);
            border-radius: 16px; padding: 20px 22px;
        }
        .testimonial-text {
            font-size: 13px; color: #94a3b8;
            font-style: italic; line-height: 1.6; margin-bottom: 12px;
        }
        .testimonial-author {
            display: flex; align-items: center; gap: 10px;
        }
        .testimonial-avatar {
            width: 32px; height: 32px; border-radius: 50%;
            background: var(--primary-grad);
            display: flex; align-items: center; justify-content: center;
            font-size: 13px; font-weight: 800; color: white;
        }
        .testimonial-name { font-size: 12px; color: #e2e8f0; font-weight: 700; }
        .testimonial-role { font-size: 11px; color: #64748b; }

        /* ── RIGHT PANEL ── */
        .right-panel {
            flex: 1;
            background: white;
            padding: 60px 55px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            overflow-y: auto;
        }

        .form-header { margin-bottom: 36px; }
        .form-header h2 {
            font-size: 28px; font-weight: 800;
            color: var(--dark); letter-spacing: -0.5px; margin-bottom: 6px;
        }
        .form-header p { color: var(--muted); font-size: 14px; margin: 0; }

        /* Price summary card */
        .price-summary {
            background: linear-gradient(135deg, #0057d9, #002d73);
            border-radius: 18px; padding: 22px 24px;
            margin-bottom: 32px; position: relative; overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,87,217,0.2);
        }
        .price-summary::after {
            content: '';
            position: absolute; top:-40px; right:-40px;
            width: 130px; height: 130px;
            background: rgba(255,255,255,0.07);
            border-radius: 50%; pointer-events: none;
        }
        .price-summary-label {
            font-size: 11px; font-weight: 700; letter-spacing: 1.5px;
            text-transform: uppercase; color: rgba(255,255,255,0.6); margin-bottom: 4px;
        }
        .price-summary-main {
            display: flex; align-items: baseline; gap: 8px;
        }
        .price-per-ticket {
            font-size: 13px; color: rgba(255,255,255,0.5); font-weight: 500;
        }
        .price-total {
            font-size: 34px; font-weight: 800; color: #fb923c;
            letter-spacing: -1.5px; transition: all 0.3s ease;
        }
        .price-breakdown {
            font-size: 12px; color: rgba(255,255,255,0.5);
            margin-top: 6px; font-weight: 500;
        }

        /* Form fields */
        .field-group { margin-bottom: 20px; }
        .field-label {
            font-size: 13px; font-weight: 700; color: var(--dark);
            margin-bottom: 8px; display: flex; align-items: center; gap: 6px;
        }
        .field-label .required { color: #ef4444; font-size: 15px; }

        .field-input {
            width: 100%;
            border: 1.5px solid #e2e8f0;
            border-radius: 14px;
            padding: 13px 18px;
            font-size: 14px;
            font-weight: 500;
            font-family: 'Plus Jakarta Sans', sans-serif;
            transition: all 0.2s ease;
            outline: none;
            background: #f8fafc;
            color: var(--dark);
        }
        .field-input:focus {
            border-color: var(--primary);
            background: white;
            box-shadow: 0 0 0 4px rgba(0,87,217,0.1);
        }
        .field-input.is-error { border-color: #ef4444; background: #fff5f5; }

        .qty-wrapper {
            display: flex; align-items: center; gap: 0;
            border: 1.5px solid #e2e8f0; border-radius: 14px;
            overflow: hidden; background: #f8fafc;
            transition: all 0.2s ease;
        }
        .qty-wrapper:focus-within {
            border-color: var(--primary);
            background: white;
            box-shadow: 0 0 0 4px rgba(0,87,217,0.1);
        }
        .qty-btn {
            width: 46px; height: 48px;
            background: none; border: none;
            font-size: 20px; font-weight: 700;
            color: var(--primary); cursor: pointer;
            transition: background 0.15s;
            flex-shrink: 0;
        }
        .qty-btn:hover { background: rgba(0,87,217,0.06); }
        .qty-input {
            flex: 1; border: none; background: transparent;
            text-align: center; font-size: 16px;
            font-weight: 800; color: var(--dark);
            font-family: 'Plus Jakarta Sans', sans-serif;
            outline: none; padding: 0;
        }

        .submit-btn {
            width: 100%; padding: 16px;
            background: var(--accent-grad);
            border: none; border-radius: 16px;
            color: white; font-size: 15px;
            font-weight: 800; letter-spacing: 0.3px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            cursor: pointer;
            box-shadow: 0 8px 25px rgba(255,107,0,0.3);
            transition: all 0.2s ease;
            display: flex; align-items: center;
            justify-content: center; gap: 10px;
            margin-top: 8px;
        }
        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(255,107,0,0.4);
        }
        .submit-btn:active { transform: translateY(1px); }

        .form-footer {
            margin-top: 20px; text-align: center;
        }
        .back-link {
            color: var(--muted); font-size: 13px;
            font-weight: 600; text-decoration: none;
            display: inline-flex; align-items: center; gap: 5px;
            transition: color 0.2s;
        }
        .back-link:hover { color: var(--primary); }

        .alert-box {
            background: #fef2f2; border: 1px solid #fecaca;
            border-radius: 14px; padding: 16px 18px;
            margin-bottom: 24px; color: #991b1b;
            font-size: 13px;
        }
        .alert-box ul { padding-left: 18px; margin-bottom: 0; }

        .trust-badges {
            display: flex; align-items: center; justify-content: center;
            gap: 20px; margin-top: 18px; flex-wrap: wrap;
        }
        .trust-badge {
            display: flex; align-items: center; gap: 5px;
            font-size: 11px; color: #94a3b8; font-weight: 600;
        }

        @keyframes pulse-dot {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(1.4); }
        }

        @media (max-width: 991px) {
            body { flex-direction: column; }
            .left-panel { width: 100%; padding: 40px 30px; }
            .right-panel { padding: 40px 30px; }
            .stats-strip { gap: 8px; }
        }
    </style>
</head>
<body>

{{-- LEFT INFO PANEL --}}
<div class="left-panel">
    <div>
        {{-- Brand --}}
        <a href="{{ route('landing') }}" class="brand-logo">
            <img src="{{ asset('images/logo.png') }}" alt="IWF 2026 Logo">
            <span>IWF 2026</span>
        </a>

        {{-- Live badge --}}
        <div class="event-badge">
            <span class="dot"></span>
            Pendaftaran Dibuka
        </div>

        <h2 class="left-title">
            Satu Langkah Menuju<br>
            <span class="grad">Impact Weekender Fest</span>
        </h2>

        <p class="left-sub">
            Webinar daring eksklusif untuk pemuda Indonesia yang ingin bertumbuh, berkarya, dan memberi dampak nyata bagi sesama.
        </p>

        {{-- Stats --}}
        <div class="stats-strip">
            <div class="stat-item">
                <div class="stat-num">3</div>
                <div class="stat-label">Pilar Utama</div>
            </div>
            <div class="stat-item">
                <div class="stat-num orange">350</div>
                <div class="stat-label">Kuota Peserta</div>
            </div>
            <div class="stat-item">
                <div class="stat-num green">Rp35k</div>
                <div class="stat-label">Harga Tiket</div>
            </div>
        </div>

        {{-- Benefits --}}
        <ul class="benefit-list">
            <li>
                <div class="benefit-icon">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#38bdf8" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.79 19.79 0 0 1 2.07 4.18 2 2 0 0 1 4 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                </div>
                Akses penuh ke semua sesi webinar via Zoom
            </li>
            <li>
                <div class="benefit-icon">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#38bdf8" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>
                </div>
                Slide materi eksklusif dari narasumber ahli
            </li>
            <li>
                <div class="benefit-icon">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#38bdf8" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="6"></circle><path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11"></path></svg>
                </div>
                E-Sertifikat resmi peserta IWF 2026
            </li>
            <li>
                <div class="benefit-icon">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#38bdf8" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                </div>
                Grup networking komunitas pemuda nasional
            </li>
            <li>
                <div class="benefit-icon">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#38bdf8" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                </div>
                <span>Rahasia dapur eksklusif <span style="color:#f472b6;font-weight:700;">hanya untuk peserta 🤫</span></span>
            </li>
        </ul>

        {{-- Testimonial --}}
        <div class="testimonial">
            <p class="testimonial-text">"IWF benar-benar mengubah cara saya memandang diri sendiri dan masa depan. Worth every rupiah!"</p>
            <div class="testimonial-author">
                <div class="testimonial-avatar">R</div>
                <div>
                    <div class="testimonial-name">Rizky Maulana</div>
                    <div class="testimonial-role">Peserta IWF 2025 · Bandung</div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- RIGHT FORM PANEL --}}
<div class="right-panel">
    <div style="max-width: 440px; width: 100%; margin: 0 auto;">

        <div class="form-header">
            <h2>Beli Tiket Sekarang</h2>
            <p>Lengkapi data di bawah untuk memproses pembelian tiket Anda.</p>
        </div>

        {{-- Live price summary --}}
        <div class="price-summary">
            <div class="price-summary-label">Total Pembayaran</div>
            <div class="price-summary-main">
                <div class="price-total" id="priceDisplay">Rp35.000</div>
            </div>
            <div class="price-breakdown" id="priceBreakdown">1 tiket × Rp35.000</div>
        </div>

        {{-- Errors --}}
        @if ($errors->any())
            <div class="alert-box">
                <strong style="display:block;margin-bottom:8px;">Terjadi kesalahan:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('ticket.store') }}" method="POST">
            @csrf

            <div class="field-group">
                <label class="field-label">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    Nama Lengkap <span class="required">*</span>
                </label>
                <input type="text" name="name" id="name" class="field-input {{ $errors->has('name') ? 'is-error' : '' }}"
                       value="{{ old('name') }}" placeholder="Masukkan nama lengkap Anda" required>
            </div>

            <div class="field-group">
                <label class="field-label">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                    Email Aktif <span class="required">*</span>
                </label>
                <input type="email" name="email" id="email" class="field-input {{ $errors->has('email') ? 'is-error' : '' }}"
                       value="{{ old('email') }}" placeholder="contoh@email.com" required>
            </div>

            <div class="field-group">
                <label class="field-label">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.92 12 19.79 19.79 0 0 1 1.88 3.4 2 2 0 0 1 3.86 1.22h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                    Nomor WhatsApp <span class="required">*</span>
                </label>
                <input type="text" name="phone" id="phone" class="field-input {{ $errors->has('phone') ? 'is-error' : '' }}"
                       value="{{ old('phone') }}" placeholder="08xxxxxxxxxx" required>
            </div>

            <div class="field-group">
                <label class="field-label">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 20h.01M7 20v-4"></path><path d="M12 20v-8"></path><path d="M17 20V8"></path><path d="M22 4v16"></path></svg>
                    Jumlah Tiket <span class="required">*</span>
                </label>
                <div class="qty-wrapper">
                    <button type="button" class="qty-btn" onclick="changeQty(-1)">−</button>
                    <input type="number" name="quantity" id="quantity" class="qty-input"
                           value="{{ old('quantity', 1) }}" min="1" max="10" readonly>
                    <button type="button" class="qty-btn" onclick="changeQty(1)">+</button>
                </div>
            </div>

            <button type="submit" class="submit-btn" id="submitBtn">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                Daftar &amp; Bayar Sekarang
            </button>
        </form>

        <div class="trust-badges">
            <div class="trust-badge">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#4ade80" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                Pembayaran Aman
            </div>
            <div class="trust-badge">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#38bdf8" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                Midtrans Verified
            </div>
            <div class="trust-badge">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#fb923c" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path></svg>
                E-Ticket via Email
            </div>
        </div>

        <div class="form-footer">
            <a href="{{ route('landing') }}" class="back-link">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                Kembali ke Beranda
            </a>
        </div>
    </div>
</div>

<script>
    const PRICE_PER_TICKET = 35000;

    function formatRupiah(amount) {
        return 'Rp' + amount.toLocaleString('id-ID');
    }

    function changeQty(delta) {
        const input = document.getElementById('quantity');
        let val = parseInt(input.value) + delta;
        if (val < 1) val = 1;
        if (val > 10) val = 10;
        input.value = val;
        updatePrice(val);
    }

    function updatePrice(qty) {
        const total = qty * PRICE_PER_TICKET;
        document.getElementById('priceDisplay').textContent = formatRupiah(total);
        document.getElementById('priceBreakdown').textContent =
            qty + ' tiket × ' + formatRupiah(PRICE_PER_TICKET);
    }

    document.getElementById('quantity').addEventListener('change', function() {
        let val = parseInt(this.value);
        if (isNaN(val) || val < 1) val = 1;
        if (val > 10) val = 10;
        this.value = val;
        updatePrice(val);
    });

    // Animate price on load
    updatePrice(parseInt(document.getElementById('quantity').value) || 1);
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>