<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impact Weekender Fest 2026</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Font (Plus Jakarta Sans) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #0057d9;
            --primary-gradient: linear-gradient(135deg, #0057d9 0%, #003699 100%);
            --accent-color: #ff6b00;
            --accent-gradient: linear-gradient(135deg, #ff6b00 0%, #d45200 100%);
            --text-dark: #0f172a;
            --text-muted: #64748b;
            --bg-light: #f8fafc;
            --card-shadow: 0 20px 40px rgba(0, 87, 217, 0.04), 0 1px 3px rgba(0, 0, 0, 0.02);
            --card-shadow-hover: 0 30px 60px rgba(0, 87, 217, 0.08), 0 1px 5px rgba(0, 0, 0, 0.03);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
            overflow-x: hidden;
        }

        /* Glassmorphism Navbar */
        .navbar {
            background-color: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.4);
            transition: all 0.3s ease;
            padding: 12px 0;
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 20px;
            color: var(--primary-color) !important;
            letter-spacing: -0.5px;
        }

        .navbar-brand img {
            max-height: 38px;
            width: auto;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover img {
            transform: scale(1.05);
        }

        .nav-link {
            font-weight: 600;
            font-size: 14px;
            color: var(--text-dark) !important;
            padding: 8px 16px !important;
            border-radius: 10px;
            transition: all 0.2s ease;
        }

        .nav-link:hover {
            color: var(--primary-color) !important;
            background-color: rgba(0, 87, 217, 0.05);
        }

        /* Hero Section with Mesh Background */
        .hero {
            min-height: 100vh;
            background: radial-gradient(circle at 80% 20%, rgba(0, 87, 217, 0.1) 0%, transparent 40%),
                        radial-gradient(circle at 10% 80%, rgba(255, 107, 0, 0.08) 0%, transparent 40%),
                        linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
            display: flex;
            align-items: center;
            padding: 140px 0 80px;
            position: relative;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            background-color: rgba(255, 107, 0, 0.1);
            color: #d45200;
            padding: 8px 20px;
            border-radius: 30px;
            font-weight: 700;
            font-size: 13px;
            letter-spacing: 0.5px;
            margin-bottom: 25px;
            border: 1px solid rgba(255, 107, 0, 0.15);
        }

        .hero h1 {
            font-size: 56px;
            font-weight: 800;
            line-height: 1.1;
            letter-spacing: -2px;
            color: var(--text-dark);
            margin-bottom: 20px;
        }

        .hero h1 span {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero h1 span.orange {
            background: var(--accent-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero p {
            font-size: 18px;
            color: var(--text-muted);
            line-height: 1.6;
            margin-bottom: 35px;
            max-width: 580px;
        }

        .btn-primary-custom {
            background: var(--primary-gradient);
            color: white !important;
            border-radius: 16px;
            padding: 14px 30px;
            font-weight: 700;
            font-size: 15px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 8px 25px rgba(0, 87, 217, 0.25);
            transition: all 0.2s ease;
            border: none;
        }

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(0, 87, 217, 0.35);
        }

        .btn-orange-custom {
            background: var(--accent-gradient);
            color: white !important;
            border-radius: 16px;
            padding: 14px 30px;
            font-weight: 700;
            font-size: 15px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 8px 25px rgba(255, 107, 0, 0.25);
            transition: all 0.2s ease;
            border: none;
        }

        .btn-orange-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(255, 107, 0, 0.35);
        }

        /* Card Styling */
        .card-custom {
            background: white;
            border-radius: 24px;
            padding: 35px;
            height: 100%;
            border: 1px solid rgba(0, 87, 217, 0.03);
            box-shadow: var(--card-shadow);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-custom:hover {
            transform: translateY(-5px);
            box-shadow: var(--card-shadow-hover);
        }

        .card-custom h4 {
            font-weight: 800;
            color: var(--primary-color);
            margin-bottom: 18px;
            font-size: 20px;
            letter-spacing: -0.5px;
        }

        .card-custom p {
            color: var(--text-muted);
            line-height: 1.6;
            font-size: 14px;
        }

        /* Section Spacing */
        section {
            padding: 100px 0;
            position: relative;
        }

        .section-title {
            font-size: 38px;
            font-weight: 800;
            letter-spacing: -1px;
            color: var(--text-dark);
            margin-bottom: 15px;
        }

        .section-subtitle {
            color: var(--text-muted);
            font-size: 16px;
            max-width: 650px;
            margin: 0 auto 60px;
            line-height: 1.6;
        }

        /* Speaker Card Styling */
        .speaker-card {
            text-align: center;
            padding: 40px 30px;
        }

        .speaker-avatar {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            background: linear-gradient(135deg, #e0f2fe 0%, #bae6fd 100%);
            margin: 0 auto 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 38px;
            font-weight: 800;
            color: var(--primary-color);
            box-shadow: 0 10px 20px rgba(0, 87, 217, 0.05);
            border: 4px solid white;
        }

        .speaker-card h4 {
            color: var(--text-dark);
            font-size: 18px;
            font-weight: 800;
            margin-bottom: 6px;
        }

        .speaker-card p {
            color: var(--primary-color);
            font-weight: 600;
            font-size: 13px;
            margin-bottom: 0;
        }

        /* Ticket Section */
        .ticket-box {
            background: linear-gradient(135deg, #0b1528 0%, #002d73 100%);
            color: white;
            border-radius: 32px;
            padding: 55px;
            box-shadow: 0 30px 60px rgba(0, 87, 217, 0.15);
            position: relative;
            overflow: hidden;
        }

        .ticket-box::after {
            content: '';
            position: absolute;
            bottom: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            background: rgba(0, 87, 217, 0.1);
            border-radius: 50%;
        }

        .ticket-box h2 {
            font-weight: 800;
            font-size: 36px;
            letter-spacing: -1px;
            margin-bottom: 20px;
        }

        .ticket-box ul {
            list-style: none;
            padding-left: 0;
            margin-bottom: 0;
        }

        .ticket-box ul li {
            position: relative;
            padding-left: 30px;
            margin-bottom: 12px;
            font-size: 15px;
            font-weight: 500;
            opacity: 0.9;
        }

        .ticket-box ul li::before {
            content: "✓";
            position: absolute;
            left: 0;
            color: #38bdf8;
            font-weight: 900;
            font-size: 16px;
        }

        .ticket-price-container {
            text-align: right;
        }

        .ticket-price-container p {
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            opacity: 0.7;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .ticket-price-container .price {
            font-size: 56px;
            font-weight: 800;
            letter-spacing: -2px;
            line-height: 1;
            margin-bottom: 20px;
            background: var(--accent-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Sponsorship Cards (Pricing style) */
        .sponsor-card {
            background: white;
            border-radius: 24px;
            padding: 40px;
            text-align: center;
            border: 1px solid rgba(0, 0, 0, 0.03);
            box-shadow: var(--card-shadow);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            height: 100%;
        }

        .sponsor-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--card-shadow-hover);
        }

        .sponsor-card h4 {
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 10px;
            text-transform: uppercase;
            font-size: 16px;
            letter-spacing: 1px;
        }

        .sponsor-price {
            font-size: 28px;
            font-weight: 800;
            color: var(--primary-color);
            margin-bottom: 20px;
            letter-spacing: -0.5px;
        }

        .sponsor-card p {
            color: var(--text-muted);
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 0;
        }

        /* Footer */
        footer {
            background-color: #090d16;
            color: #94a3b8;
            padding: 80px 0 40px;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        footer h4 {
            color: white;
            font-weight: 800;
            letter-spacing: -0.5px;
            margin-bottom: 15px;
        }

        footer p {
            font-size: 14px;
            line-height: 1.6;
        }

        /* Responsive adjustments */
        @media (max-width: 991px) {
            .hero {
                padding-top: 120px;
                text-align: center;
            }
            .hero h1 {
                font-size: 42px;
            }
            .hero p {
                margin-left: auto;
                margin-right: auto;
            }
            .ticket-price-container {
                text-align: center;
                margin-top: 35px;
            }
            .ticket-box {
                padding: 40px;
            }
        }

        /* Logo Marquee Scrollers */
        .logo-scroller-section {
            background-color: #ffffff;
            padding: 80px 0;
            border-top: 1px solid #f1f5f9;
            border-bottom: 1px solid #f1f5f9;
        }

        .logo-scroller-wrapper {
            overflow: hidden;
            width: 100%;
            position: relative;
            padding: 10px 0;
            display: flex;
        }

        .logo-scroller-wrapper::before,
        .logo-scroller-wrapper::after {
            content: '';
            position: absolute;
            top: 0;
            width: 150px;
            height: 100%;
            z-index: 2;
            pointer-events: none;
        }

        .logo-scroller-wrapper::before {
            left: 0;
            background: linear-gradient(to right, #ffffff 0%, transparent 100%);
        }

        .logo-scroller-wrapper::after {
            right: 0;
            background: linear-gradient(to left, #ffffff 0%, transparent 100%);
        }

        .logo-scroller-track {
            display: flex;
            width: max-content;
            gap: 40px;
            align-items: center;
        }

        .logo-item {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 15px 35px;
            height: 70px;
            min-width: 180px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 10px rgba(0, 87, 217, 0.02);
            transition: all 0.3s ease;
        }

        .logo-item:hover {
            transform: translateY(-2px);
            border-color: var(--primary-color);
            box-shadow: 0 8px 20px rgba(0, 87, 217, 0.06);
        }

        .logo-item img {
            max-height: 40px;
            max-width: 120px;
            object-fit: contain;
        }

        .logo-item-text {
            font-size: 14px;
            font-weight: 700;
            color: var(--text-dark);
            text-align: center;
            letter-spacing: -0.5px;
        }

        @keyframes scroll-right-to-left {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(calc(-50% - 20px));
            }
        }

        @keyframes scroll-left-to-right {
            0% {
                transform: translateX(calc(-50% - 20px));
            }
            100% {
                transform: translateX(0);
            }
        }

        .track-right-to-left {
            animation: scroll-right-to-left 25s linear infinite;
        }

        .track-left-to-right {
            animation: scroll-left-to-right 25s linear infinite;
        }

        .logo-scroller-wrapper:hover .logo-scroller-track {
            animation-play-state: paused;
        }

        /* FAQ Accordion Styling */
        .accordion-button:not(.collapsed) {
            color: var(--primary-color) !important;
            background-color: rgba(0, 87, 217, 0.03) !important;
            box-shadow: none !important;
        }
        .accordion-button:focus {
            box-shadow: none !important;
            border-color: rgba(0, 87, 217, 0.1) !important;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top navbar-light">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="#home">
            <img src="{{ asset('images/logo.png') }}" alt="IWF 2026 Logo">
            <span class="d-none d-sm-inline" style="line-height: 1.1;">
                    <span style="
                        display: block;
                        font-size: 14px;
                        font-weight: 800;
                        letter-spacing: -0.3px;
                        background: linear-gradient(90deg, #0057d9 0%, #ff6b00 60%, #d45200 100%);
                        -webkit-background-clip: text;
                        -webkit-text-fill-color: transparent;
                        background-clip: text;
                    ">Impact Weekender Fest 2026</span>
                    <span style="
                        display: block;
                        font-size: 10px;
                        font-weight: 700;
                        letter-spacing: 2px;
                        text-transform: uppercase;
                        color: #94a3b8;
                        margin-top: 1px;
                    ">IWF 2026</span>
                </span>
        </a>
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav gap-2">
                <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
                <li class="nav-item"><a class="nav-link" href="#isu">Isu</a></li>
                <li class="nav-item"><a class="nav-link" href="#narasumber">Narasumber</a></li>
                <li class="nav-item"><a class="nav-link" href="#tiket">Tiket</a></li>
                <li class="nav-item"><a class="nav-link" href="#sponsor">Sponsor</a></li>
                <li class="nav-item"><a class="nav-link" href="#faq">FAQ</a></li>
                <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero" id="home">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-7 text-start">
                <div class="hero-badge">⚡ Ruang Berbagi, Berbagi Cerita</div>
                <h1>Impact Weekender <br><span>Fest 2026</span></h1>
                <p>
                    Festival daring untuk pemuda Indonesia yang ingin bertumbuh dari dalam,
                    menyalakan kreativitas, membangun masa depan, dan memberi dampak sosial bagi sesama.
                </p>

                <div class="d-flex gap-3 flex-wrap justify-content-start">
                    <a href="{{ route('ticket.form') }}" class="btn-primary-custom">
                        Daftar Sekarang
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                    <a href="#sponsor" class="btn-orange-custom">Jadi Sponsor</a>
                </div>
            </div>

            <div class="col-lg-5">
                <div style="
                    background: linear-gradient(145deg, #0f172a 0%, #002057 60%, #0f172a 100%);
                    border-radius: 28px;
                    padding: 40px 35px;
                    position: relative;
                    overflow: hidden;
                    box-shadow: 0 30px 70px rgba(0, 32, 87, 0.3), 0 0 0 1px rgba(255,255,255,0.05);
                ">
                    {{-- Decorative glow blobs --}}
                    <div style="position:absolute;top:-40px;right:-40px;width:180px;height:180px;background:radial-gradient(circle, rgba(0,87,217,0.25) 0%,transparent 70%);border-radius:50%;pointer-events:none;"></div>
                    <div style="position:absolute;bottom:-30px;left:-30px;width:140px;height:140px;background:radial-gradient(circle, rgba(255,107,0,0.15) 0%,transparent 70%);border-radius:50%;pointer-events:none;"></div>

                    {{-- Live badge --}}
                    <div class="d-flex align-items-center gap-2 mb-4">
                        <span style="display:inline-flex;align-items:center;gap:6px;background:rgba(255,107,0,0.15);border:1px solid rgba(255,107,0,0.3);color:#ff8c42;padding:5px 14px;border-radius:30px;font-size:11px;font-weight:700;letter-spacing:1px;text-transform:uppercase;">
                            <span style="width:7px;height:7px;background:#ff6b00;border-radius:50%;display:inline-block;animation:pulse-dot 1.5s ease-in-out infinite;"></span>
                            Pendaftaran Dibuka
                        </span>
                    </div>

                    {{-- Event title --}}
                    <h3 style="color:white;font-size:22px;font-weight:800;letter-spacing:-0.5px;margin-bottom:6px;line-height:1.3;">
                        Impact Weekender<br>
                        <span style="background:linear-gradient(90deg,#38bdf8,#0057d9);-webkit-background-clip:text;-webkit-text-fill-color:transparent;">Fest 2026</span>
                    </h3>

                    {{-- Stats grid --}}
                    <div class="row g-3 mb-4">
                        <div class="col-6">
                            <div style="background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.08);border-radius:16px;padding:16px 14px;text-align:center;">
                                <div style="font-size:26px;font-weight:800;color:#38bdf8;letter-spacing:-1px;line-height:1;">3</div>
                                <div style="font-size:11px;color:#94a3b8;font-weight:600;margin-top:4px;text-transform:uppercase;letter-spacing:0.5px;">Pilar Utama</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div style="background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.08);border-radius:16px;padding:16px 14px;text-align:center;">
                                <div style="font-size:26px;font-weight:800;color:#fb923c;letter-spacing:-1px;line-height:1;">350</div>
                                <div style="font-size:11px;color:#94a3b8;font-weight:600;margin-top:4px;text-transform:uppercase;letter-spacing:0.5px;">Kursi Tersedia</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div style="background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.08);border-radius:16px;padding:16px 14px;text-align:center;">
                                <div style="font-size:26px;font-weight:800;color:#4ade80;letter-spacing:-1px;line-height:1;">Rp35k</div>
                                <div style="font-size:11px;color:#94a3b8;font-weight:600;margin-top:4px;text-transform:uppercase;letter-spacing:0.5px;">Harga Tiket</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div style="background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.08);border-radius:16px;padding:16px 14px;text-align:center;">
                                <div style="font-size:26px;font-weight:800;color:#f472b6;letter-spacing:-1px;line-height:1;">{{ $remainingQuota }}</div>
                                <div style="font-size:11px;color:#94a3b8;font-weight:600;margin-top:4px;text-transform:uppercase;letter-spacing:0.5px;">Sisa Kursi</div>
                            </div>
                        </div>
                    </div>

                    {{-- Teaser line --}}
                    <div style="border-top:1px solid rgba(255,255,255,0.08);padding-top:18px;display:flex;align-items:center;gap:10px;">
                        <span style="font-size:20px;">🤫</span>
                        <p style="color:#64748b;font-size:12px;font-style:italic;margin:0;line-height:1.5;">
                            Rahasia dapur eksklusif hanya untuk<br>
                            <strong style="color:#94a3b8;">peserta terdaftar.</strong>
                        </p>
                    </div>
                </div>

                <style>
                    @keyframes pulse-dot {
                        0%, 100% { opacity: 1; transform: scale(1); }
                        50% { opacity: 0.5; transform: scale(1.4); }
                    }
                </style>
            </div>
        </div>
    </div>
</section>

<!-- Tentang -->
<section id="tentang" style="background-color: #ffffff;">
    <div class="container">
        <div class="text-center">
            <h2 class="section-title">Tentang IWF</h2>
            <p class="section-subtitle">
                Impact Weekender Fest 2026 adalah ruang belajar, berbagi, dan bertumbuh bagi generasi muda Indonesia.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card-custom">
                    <h4>Latar Belakang</h4>
                    <p class="mb-3">
                        Di tengah perkembangan teknologi dan informasi yang sangat cepat, generasi muda memiliki
                        akses luas untuk belajar dan berkembang. Namun, di balik kemudahan tersebut, muncul tantangan
                        berupa krisis identitas, tekanan mental, dan menurunnya empati sosial.
                    </p>
                    <p class="mb-0">
                        Karena itu, IWF hadir untuk membantu pemuda tidak hanya cerdas secara digital,
                        tetapi juga kuat secara mental, kreatif, dan peduli terhadap sesama.
                    </p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card-custom">
                    <h4>Legalitas Resmi</h4>
                    <p class="mb-3">
                        Impact Weekender Fest 2026 diselenggarakan secara resmi oleh Yayasan SAMASAYA Lentera Bangsa
                        melalui SAMASAYA IDEAS.
                    </p>
                    <p class="mb-0">
                        Yayasan ini memiliki legalitas hukum lengkap, termasuk akta kenotariatan,
                        pengesahan badan hukum dari Kemenkumham, serta dokumen perpajakan yayasan.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Isu -->
<section id="isu">
    <div class="container">
        <div class="text-center">
            <h2 class="section-title">Isu yang Diangkat</h2>
            <p class="section-subtitle">
                IWF hadir sebagai respon nyata atas tantangan krusial yang dihadapi pemuda di era disrupsi digital.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card-custom">
                    <div class="text-primary mb-3">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </div>
                    <h4>Krisis Identitas</h4>
                    <p class="mb-0">
                        Membantu pemuda yang mengalami disorientasi diri, kebingungan dalam memahami potensi diri, arah masa depan, dan mendefinisikan nilai diri yang otentik.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-custom">
                    <div class="text-primary mb-3">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 2a10 10 0 0 0-10 10c0 5.523 4.477 10 10 10s10-4.477 10-10A10 10 0 0 0 12 2z"></path>
                            <path d="M12 6v6l4 2"></path>
                        </svg>
                    </div>
                    <h4>Disrupsi Mental</h4>
                    <p class="mb-0">
                        Menyiapkan ketahanan mental (mental resilience) dan kelincahan beradaptasi (agility) di tengah tekanan persaingan global yang sangat masif.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-custom">
                    <div class="text-primary mb-3">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                    </div>
                    <h4>Erosi Empati Sosial</h4>
                    <p class="mb-0">
                        Mengajak pemuda Indonesia untuk kembali peduli, mengasah jiwa kepedulian sosial, dan berkontribusi langsung bagi masyarakat sekitar.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pilar Utama -->
<section id="program" style="background-color: #ffffff;">
    <div class="container">
        <div class="text-center">
            <h2 class="section-title">Tiga Pilar Utama IWF</h2>
            <p class="section-subtitle">
                Tiga fokus utama materi webinar yang dirancang secara khusus untuk membentuk kepribadian yang tangguh.
            </p>
        </div>

        <div class="row g-4">

            <!-- Pillar 1 -->
            <div class="col-lg-4">
                <div class="card-custom h-100 d-flex flex-column" style="padding: 30px 28px;">
                    <div class="d-flex align-items-center justify-content-center rounded-3 mb-4 mx-auto"
                         style="width: 64px; height: 64px; background: linear-gradient(135deg, #e0f2fe 0%, #bae6fd 100%);">
                        <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#0057d9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                        </svg>
                    </div>
                    <span class="badge bg-primary mb-2 align-self-start" style="font-size: 10px; letter-spacing: 0.5px;">PILLAR 1</span>
                    <h4 style="font-size: 18px;">Inner Impact</h4>
                    <p class="text-muted flex-grow-1" style="font-size: 14px; line-height: 1.6;">Menguatkan fondasi kesehatan mental, kontrol emosional, dan kedamaian pikiran menghadapi kecemasan hidup.</p>
                    <div class="mt-auto pt-3 border-top" style="border-color: #f1f5f9 !important;">
                        <p class="fw-bold text-dark mb-1" style="font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Narasumber</p>
                        <p class="text-primary fw-bold mb-0" style="font-size: 14px;">
                            {{ $speakers->where('pillar', 'Inner Impact')->first()?->name ?? 'Drs. Budi Lukita' }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Pillar 2 -->
            <div class="col-lg-4">
                <div class="card-custom h-100 d-flex flex-column" style="padding: 30px 28px;">
                    <div class="d-flex align-items-center justify-content-center rounded-3 mb-4 mx-auto"
                         style="width: 64px; height: 64px; background: linear-gradient(135deg, #fef9c3 0%, #fde68a 100%);">
                        <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                        </svg>
                    </div>
                    <span class="badge bg-primary mb-2 align-self-start" style="font-size: 10px; letter-spacing: 0.5px;">PILLAR 2</span>
                    <h4 style="font-size: 18px;">Creative Impact</h4>
                    <p class="text-muted flex-grow-1" style="font-size: 14px; line-height: 1.6;">Memicu kreativitas dan inovasi tanpa batas di tengah gelombang pemanfaatan kecerdasan buatan.</p>
                    <div class="mt-auto pt-3 border-top" style="border-color: #f1f5f9 !important;">
                        <p class="fw-bold text-dark mb-1" style="font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Narasumber</p>
                        <p class="text-primary fw-bold mb-0" style="font-size: 14px;">
                            {{ $speakers->where('pillar', 'Creative Impact')->first()?->name ?? 'Linda Handayani S., M.Hum.' }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Pillar 3 -->
            <div class="col-lg-4">
                <div class="card-custom h-100 d-flex flex-column" style="padding: 30px 28px;">
                    <div class="d-flex align-items-center justify-content-center rounded-3 mb-4 mx-auto"
                         style="width: 64px; height: 64px; background: linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%);">
                        <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#16a34a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                    </div>
                    <span class="badge bg-primary mb-2 align-self-start" style="font-size: 10px; letter-spacing: 0.5px;">PILLAR 3</span>
                    <h4 style="font-size: 18px;">Future Impact</h4>
                    <p class="text-muted flex-grow-1" style="font-size: 14px; line-height: 1.6;">Membangun nilai diri (personal value) yang kokoh, integritas kerja, dan kepemimpinan visioner masa depan.</p>
                    <div class="mt-auto pt-3 border-top" style="border-color: #f1f5f9 !important;">
                        <p class="fw-bold text-dark mb-1" style="font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Narasumber</p>
                        <p class="text-primary fw-bold mb-0" style="font-size: 14px;">
                            {{ $speakers->where('pillar', 'Future Impact')->first()?->name ?? 'H. Iman Sulaeman' }}
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Narasumber -->
<section id="narasumber">
    <div class="container">
        <div class="text-center">
            <h2 class="section-title">Narasumber Terbaik</h2>
            <p class="section-subtitle">
                Belajar langsung dari para praktisi ahli, pendidik senior, dan profesional industri terkemuka.
            </p>
        </div>

        <div class="row g-4 justify-content-center">
            @forelse ($speakers as $speaker)
                <div class="col-md-6 col-lg-4">
                    <div class="card-custom speaker-card">
                        @if ($speaker->avatar)
                            <img src="{{ asset($speaker->avatar) }}" alt="{{ $speaker->name }}" class="speaker-avatar" style="object-fit: cover;">
                        @else
                            <div class="speaker-avatar" style="background: linear-gradient(135deg, #e0f2fe 0%, #bae6fd 100%); color: var(--primary-color);">
                                {{ substr($speaker->name, 0, 1) }}
                            </div>
                        @endif
                        <h4>{{ $speaker->name }}</h4>
                        <p>{{ $speaker->title }}</p>
                    </div>
                </div>
            @empty
                <div class="text-center text-muted">Belum ada pemateri terdaftar.</div>
            @endforelse
        </div>
    </div>
</section>

<!-- Tiket Section -->
<section id="tiket">
    <div class="container">
        <div class="ticket-box">
            <div class="row align-items-center g-4">
                <div class="col-lg-7">
                    <h2>Daftar Impact Weekender Fest 2026 Sekarang</h2>
                    <p class="mb-4" style="opacity: 0.8;">
                        Investasikan waktu Anda untuk bertumbuh dan memberi dampak bagi sesama. Seluruh benefit berikut bisa Anda dapatkan:
                    </p>

                    <ul>
                        <li>Akses penuh ke semua sesi webinar via Zoom</li>
                        <li>Slide materi presentasi eksklusif dari narasumber</li>
                        <li>E-Sertifikat resmi peserta</li>
                        <li>Grup networking bersama pemuda se-Indonesia</li>
                        <li>Ikut serta donasi 5% untuk gerakan pejuang lansia</li>
                    </ul>
                </div>

                <div class="col-lg-5 ticket-price-container">
                    <p>Harga Tiket</p>
                    <div class="price">Rp35.000</div>
                    <a href="{{ route('ticket.form') }}" class="btn-orange-custom py-3 px-5 fw-bold">
                        Beli Tiket
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Dampak Sosial -->
<section id="dampak" style="background-color: #ffffff;">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <h2 class="section-title">Dampak Sosial Nyata</h2>
                <p class="mb-3" style="line-height: 1.6; color: var(--text-muted);">
                    IWF bukan sekadar ruang edukasi pengembangan diri semata. Melalui program ini, kami berkomitmen mendonasikan sebesar **5% dari setiap tiket yang Anda beli** untuk membantu menyokong kehidupan para lansia dhuafa pejuang jalanan.
                </p>
                <p class="mb-0" style="line-height: 1.6; color: var(--text-muted);">
                    Langkah kecil Anda bergabung bersama festival ini memberikan kontribusi yang sangat berharga bagi kesejahteraan mereka yang membutuhkan perhatian di hari senjanya.
                </p>
            </div>

            <div class="col-lg-6">
                <div class="card-custom text-white" style="background: var(--accent-gradient); border: none;">
                    <h4 class="text-white fw-bold mb-3">Belajar, Bertumbuh, & Berbagi</h4>
                    <p class="text-white-50 mb-0" style="font-size: 15px; line-height: 1.7;">
                        "Pertumbuhan diri yang sejati adalah ketika keberadaan kita mampu memberikan manfaat, kenyamanan, dan cahaya kebaikan bagi kehidupan orang lain."
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sponsor -->
<section id="sponsor">
    <div class="container">
        <div class="text-center">
            <h2 class="section-title">Program Sponsorship</h2>
            <p class="section-subtitle">
                Bergabunglah sebagai mitra strategis untuk bersama-sama mendukung pertumbuhan generasi muda Indonesia.
            </p>
        </div>

        <div class="row g-4">
            @forelse ($sponsors as $sponsor)
                <div class="col-lg-4">
                    <div class="sponsor-card" style="{{ $sponsor->tier === 'gold' ? 'border: 2px solid var(--primary-color);' : '' }}">
                        @if($sponsor->tier === 'gold')
                            <div class="badge bg-primary mb-2" style="font-size: 10px;">RECOMMENDED</div>
                        @endif
                        <h4>{{ $sponsor->name }}</h4>
                        <div class="sponsor-price">Rp{{ number_format($sponsor->price, 0, ',', '.') }}</div>
                        <p>{{ $sponsor->description }}</p>
                    </div>
                </div>
            @empty
                <div class="text-center text-muted">Belum ada paket sponsor terdaftar.</div>
            @endforelse
        </div>
    </div>
</section>

<!-- Media Partner -->
<section id="media-partner" style="background-color: #ffffff;">
    <div class="container">
        <div class="text-center">
            <h2 class="section-title">Media Partner</h2>
            <p class="section-subtitle">
                Kami membuka pintu kolaborasi bagi berbagai media komunitas, organisasi mahasiswa, dan platform publikasi digital.
            </p>
        </div>

        <div class="card-custom text-center py-5" style="max-width: 800px; margin: 0 auto;">
            <p class="fs-6 text-muted mb-4 px-md-5">
                Kolaborasi media partner meliputi pencantuman logo pada seluruh poster acara, mention publikasi di platform resmi Instagram **@samasaya.ideas**, penyebutan oleh moderator acara, serta pemberian piagam kerja sama.
            </p>
            <a href="#kontak" class="btn-primary-custom px-4 py-3">Hubungi Kami Sekarang</a>
        </div>
    </div>
</section>

<!-- Animated Partner & Sponsor Logo Marquees -->
<section class="logo-scroller-section py-5" style="background-color: #ffffff; overflow: hidden;">
    <div class="container text-center mb-4">
        <h4 class="fw-bold mb-1" style="color: var(--text-dark); font-size: 20px;">Didukung Oleh Partner & Sponsor Resmi</h4>
        <p class="text-muted small">Logo akan bergeser otomatis (Sponsor: Kiri ke Kanan, Media Partner: Kanan ke Kiri)</p>
    </div>

    <!-- Row 1: Sponsors (Left to Right) -->
    <div class="logo-scroller-wrapper mb-4">
        <div class="logo-scroller-track track-left-to-right">
            @if ($sponsors->count() > 0)
                @foreach ($sponsors->concat($sponsors)->concat($sponsors) as $sponsor)
                    <div class="logo-item">
                        @if ($sponsor->logo)
                            <img src="{{ asset($sponsor->logo) }}" alt="{{ $sponsor->name }}">
                        @else
                            <div class="logo-item-text font-monospace">{{ $sponsor->name }}</div>
                        @endif
                    </div>
                @endforeach
            @else
                <div class="logo-item"><div class="logo-item-text">Sponsor IWF</div></div>
                <div class="logo-item"><div class="logo-item-text">Sponsor IWF</div></div>
                <div class="logo-item"><div class="logo-item-text">Sponsor IWF</div></div>
            @endif
        </div>
    </div>

    <!-- Row 2: Media Partners (Right to Left) -->
    <div class="logo-scroller-wrapper">
        <div class="logo-scroller-track track-right-to-left">
            @if ($mediaPartners->count() > 0)
                @foreach ($mediaPartners->concat($mediaPartners)->concat($mediaPartners) as $partner)
                    <div class="logo-item">
                        @if ($partner->logo)
                            <img src="{{ asset($partner->logo) }}" alt="{{ $partner->name }}">
                        @else
                            <div class="logo-item-text font-monospace">{{ $partner->name }}</div>
                        @endif
                    </div>
                @endforeach
            @else
                <div class="logo-item"><div class="logo-item-text">Media Partner</div></div>
                <div class="logo-item"><div class="logo-item-text">Media Partner</div></div>
                <div class="logo-item"><div class="logo-item-text">Media Partner</div></div>
            @endif
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section id="faq" style="background-color: #ffffff;">
    <div class="container">
        <div class="text-center">
            <h2 class="section-title">Pertanyaan Umum (FAQ)</h2>
            <p class="section-subtitle">
                Berikut adalah beberapa jawaban atas pertanyaan yang paling sering diajukan mengenai Impact Weekender Fest 2026.
            </p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion accordion-flush" id="faqAccordion" style="border-radius: 20px; overflow: hidden; box-shadow: var(--card-shadow); border: 1px solid rgba(0, 87, 217, 0.03);">
                    
                    <div class="accordion-item" style="border-bottom: 1px solid #f1f5f9;">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed fw-bold text-dark py-4 px-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" style="font-size: 16px; background: white;">
                                Kapan Impact Weekender Fest 2026 dilaksanakan?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted px-4 pb-4" style="font-size: 14px; line-height: 1.6;">
                                Acara diselenggarakan setiap akhir pekan secara daring (online) melalui Zoom Meeting dari pukul 09.00 hingga 12.00 WIB.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item" style="border-bottom: 1px solid #f1f5f9;">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed fw-bold text-dark py-4 px-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="font-size: 16px; background: white;">
                                Apa saja benefit yang didapatkan oleh peserta?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted px-4 pb-4" style="font-size: 14px; line-height: 1.6;">
                                Peserta mendapatkan akses penuh ke seluruh sesi webinar Zoom, slide materi presentasi eksklusif dari narasumber ahli, e-sertifikat keikutsertaan resmi, dan akses ke grup jejaring (networking) komunitas pemuda nasional.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item" style="border-bottom: 1px solid #f1f5f9;">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed fw-bold text-dark py-4 px-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="font-size: 16px; background: white;">
                                Bagaimana cara membeli tiket dan melakukan pembayaran?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted px-4 pb-4" style="font-size: 14px; line-height: 1.6;">
                                Pendaftaran dapat dilakukan secara mandiri melalui tombol <strong>"Daftar Sekarang"</strong> atau <strong>"Beli Tiket"</strong> di website ini. Pembayaran diproses dengan aman menggunakan berbagai opsi pembayaran instan (seperti bank transfer Virtual Account, GoPay, QRIS, dll.) melalui Payment Gateway Midtrans.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item" style="border-bottom: 1px solid #f1f5f9;">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed fw-bold text-dark py-4 px-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" style="font-size: 16px; background: white;">
                                Apakah saya akan menerima tiket fisik?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted px-4 pb-4" style="font-size: 14px; line-height: 1.6;">
                                Tidak, Anda akan mendapatkan e-ticket berformat PDF yang secara otomatis dikirimkan ke alamat email (Gmail) Anda setelah pembayaran berhasil terkonfirmasi. Anda juga dapat langsung mengunduh tiket PDF Anda langsung dari halaman sukses transaksi.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed fw-bold text-dark py-4 px-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive" style="font-size: 16px; background: white;">
                                Ke mana sisa hasil penjualan tiket dialokasikan?
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted px-4 pb-4" style="font-size: 14px; line-height: 1.6;">
                                Sebagian besar alokasi dana digunakan untuk membiayai operasional acara dan pengembangan kapasitas pemuda. Selain itu, sebesar 5% dari setiap penjualan tiket disalurkan langsung untuk menyokong gerakan kepedulian sosial "Semangati Pejuang Lansia".
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Kontak -->
<section id="kontak">
    <div class="container">
        <div class="text-center">
            <h2 class="section-title">Hubungi Kontak Kami</h2>
            <p class="section-subtitle">
                Silakan hubungi kami untuk pendaftaran grup, info sponsorship, atau proposal media partner.
            </p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card-custom text-center py-5">
                    <h4 class="text-dark fw-bold mb-4">SAMASAYA IDEAS</h4>
                    <div class="row g-4 text-start justify-content-center">
                        <div class="col-md-5 offset-md-1">
                            <p class="mb-2"><strong>Instagram:</strong> <a href="https://instagram.com/samasaya.ideas" target="_blank" class="text-primary text-decoration-none">@samasaya.ideas</a></p>
                            <p class="mb-2"><strong>WhatsApp:</strong> <span class="text-dark font-monospace">+62 822-9598-0054</span></p>
                            <p class="mb-2"><strong>Narahubung:</strong> <span class="text-dark">Kak Rofi</span></p>
                        </div>
                        <div class="col-md-5">
                            <p class="mb-0"><strong>Alamat Kantor:</strong></p>
                            <p class="text-muted mb-0" style="font-size: 13px;">
                                Ruko Puri Dago / LPKBYE Building, Jalan Terusan Jakarta No. 404, Sukamiskin, Arcamanik, Kota Bandung.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer>
    <div class="container text-center">
        <h4 class="text-white">Impact Weekender Fest 2026</h4>
        <p class="text-white-50">Ruang Berbagi, Berbagi Cerita</p>
        <hr class="my-4" style="opacity: 0.1; background-color: white;">
        <p class="mb-0 text-white-50" style="font-size: 13px;">
            © 2026 Yayasan SAMASAYA Lentera Bangsa. All Rights Reserved.
        </p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>