<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - IWF 2026</title>

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
            display: flex;
            flex-direction: column;
        }

        /* Admin Dashboard Layout */
        .admin-wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 280px;
            background: #0f172a;
            color: white;
            padding: 30px 20px;
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
            box-shadow: 10px 0 30px rgba(0, 0, 0, 0.05);
        }

        .sidebar-brand {
            font-size: 20px;
            font-weight: 800;
            color: white;
            text-decoration: none;
            margin-bottom: 40px;
            letter-spacing: -0.5px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar-brand span {
            background: linear-gradient(135deg, #38bdf8 0%, #0057d9 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .sidebar-menu {
            list-style: none;
            padding-left: 0;
            margin-bottom: auto;
        }

        .sidebar-item {
            margin-bottom: 8px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #94a3b8;
            text-decoration: none;
            padding: 12px 18px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.2s ease;
        }

        .sidebar-link:hover {
            color: white;
            background-color: rgba(255, 255, 255, 0.05);
        }

        .sidebar-link.active {
            color: white;
            background: var(--primary-gradient);
            box-shadow: 0 4px 15px rgba(0, 87, 217, 0.25);
        }

        .sidebar-link.logout-btn {
            color: #f87171;
        }

        .sidebar-link.logout-btn:hover {
            color: #f87171;
            background-color: rgba(248, 113, 113, 0.1);
        }

        /* Main Content Panel */
        .main-panel {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        .admin-navbar {
            background-color: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid #e2e8f0;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .content-body {
            padding: 40px;
            flex-grow: 1;
        }

        .card-panel {
            background: #ffffff;
            border-radius: 24px;
            border: 1px solid rgba(0, 87, 217, 0.05);
            box-shadow: 0 10px 30px rgba(0, 87, 217, 0.04);
            padding: 35px;
        }

        .page-title {
            font-size: 26px;
            font-weight: 800;
            color: var(--primary-color);
            letter-spacing: -0.5px;
            margin-bottom: 5px;
        }

        .btn-custom-primary {
            background: var(--primary-gradient);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 10px 20px;
            font-weight: 700;
            font-size: 14px;
            transition: all 0.2s ease;
            box-shadow: 0 4px 15px rgba(0, 87, 217, 0.2);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-custom-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 18px rgba(0, 87, 217, 0.3);
            color: white;
        }

        .btn-custom-secondary {
            border: 1.5px solid #cbd5e1;
            background: white;
            color: var(--text-dark);
            border-radius: 12px;
            padding: 10px 20px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-custom-secondary:hover {
            background-color: #f1f5f9;
            color: var(--text-dark);
        }

        /* Tables & Forms */
        .table th {
            background-color: #f8fafc;
            color: var(--text-muted);
            font-weight: 700;
            text-transform: uppercase;
            font-size: 11px;
            letter-spacing: 0.8px;
            padding: 15px;
            border-bottom: 1.5px solid #e2e8f0;
        }

        .table td {
            padding: 15px;
            font-size: 14px;
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
        }

        .form-label {
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .form-control, .form-select {
            border-radius: 12px;
            border: 1.5px solid #e2e8f0;
            padding: 10px 16px;
            font-size: 14px;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(0, 87, 217, 0.12);
        }

        .avatar-circle {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background-color: #bae6fd;
            color: var(--primary-color);
            font-weight: 800;
            display: flex;
            align-items: center;
            justify-content: center;
            object-fit: cover;
            border: 2px solid white;
            box-shadow: 0 4px 10px rgba(0, 87, 217, 0.05);
        }
    </style>
</head>
<body>

<div class="admin-wrapper">
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
            Admin <span>IWF 2026</span>
        </a>

        <ul class="sidebar-menu">
            <li class="sidebar-item">
                <a href="{{ route('admin.orders.index') }}" class="sidebar-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="4" width="20" height="18" rx="2" ry="2"></rect>
                        <line x1="6" y1="8" x2="18" y2="8"></line>
                        <line x1="6" y1="12" x2="18" y2="12"></line>
                        <line x1="6" y1="16" x2="18" y2="16"></line>
                    </svg>
                    Daftar Pembayaran
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.speakers.index') }}" class="sidebar-link {{ request()->routeIs('admin.speakers.*') ? 'active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    Kelola Pemateri
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.sponsors.index') }}" class="sidebar-link {{ request()->routeIs('admin.sponsors.*') ? 'active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="12" y1="1" x2="12" y2="23"></line>
                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                    </svg>
                    Kelola Sponsor
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.media-partners.index') }}" class="sidebar-link {{ request()->routeIs('admin.media-partners.*') ? 'active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polygon points="5 3 19 12 5 21 5 3"></polygon>
                    </svg>
                    Kelola Media Partner
                </a>
            </li>
            <li class="sidebar-item mt-4">
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="sidebar-link logout-btn">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                        <polyline points="16 17 21 12 16 7"></polyline>
                        <line x1="21" y1="12" x2="9" y2="12"></line>
                    </svg>
                    Keluar
                </a>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>

        <div style="font-size: 11px; opacity: 0.4; text-align: center;">
            IWF 2026 Admin Dashboard
        </div>
    </div>

    <!-- Main Panel -->
    <div class="main-panel">
        <!-- Top Navbar -->
        <div class="admin-navbar">
            <h5 class="mb-0 fw-bold">Dashboard Sistem</h5>
            <div>
                <a href="{{ route('landing') }}" class="btn btn-custom-secondary" target="_blank">
                    Lihat Landing Page
                </a>
            </div>
        </div>

        <!-- Content Body -->
        <div class="content-body">
            @yield('content')
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
