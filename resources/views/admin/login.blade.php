<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - IWF 2026</title>

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
            --bg-gradient: linear-gradient(135deg, #0f172a 0%, #002d73 100%);
        }

        body {
            background: var(--bg-gradient);
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text-dark);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 15px;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-radius: 28px;
            max-width: 450px;
            width: 100%;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .login-header {
            background: var(--primary-gradient);
            color: white;
            padding: 40px 30px;
            text-align: center;
            position: relative;
        }

        .login-header h2 {
            font-weight: 800;
            margin: 0;
            font-size: 24px;
            letter-spacing: -0.5px;
        }

        .login-header p {
            margin: 8px 0 0 0;
            opacity: 0.8;
            font-size: 13px;
            font-weight: 500;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .login-body {
            padding: 40px 35px;
        }

        .form-label {
            font-weight: 600;
            font-size: 13px;
            color: #475569;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-control {
            border-radius: 14px;
            border: 1.5px solid #cbd5e1;
            padding: 12px 18px;
            font-size: 14px;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(0, 87, 217, 0.12);
        }

        .form-check-label {
            font-size: 13px;
            font-weight: 500;
            color: #64748b;
        }

        .btn-submit {
            background: var(--primary-gradient);
            color: white;
            border: none;
            border-radius: 14px;
            padding: 14px 20px;
            font-weight: 700;
            font-size: 15px;
            transition: all 0.2s ease;
            box-shadow: 0 8px 25px rgba(0, 87, 217, 0.25);
            width: 100%;
        }

        .btn-submit:hover {
            transform: translateY(-1px);
            box-shadow: 0 12px 30px rgba(0, 87, 217, 0.35);
            color: white;
        }

        .btn-submit:active {
            transform: translateY(1px);
        }

        .btn-back-home {
            color: #64748b;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s ease;
        }

        .btn-back-home:hover {
            color: var(--primary-color);
        }
    </style>
</head>
<body>

<div class="login-card">
    <div class="login-header">
        <h2>Administrator</h2>
        <p>Impact Weekender Fest 2026</p>
    </div>

    <div class="login-body">
        @if (session('success'))
            <div class="alert alert-success border-0 rounded-4 p-3 mb-4" style="font-size: 13px;">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger border-0 rounded-4 p-3 mb-4" style="font-size: 13px;">
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="email" class="form-label">Alamat Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="admin@iwf.com" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="mb-4">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="••••••••" required>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label" for="remember">
                        Ingat Saya
                    </label>
                </div>
            </div>

            <div class="mb-4">
                <button type="submit" class="btn-submit">
                    Masuk ke Sistem
                </button>
            </div>

            <div class="text-center">
                <a href="{{ route('landing') }}" class="btn-back-home">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="19" y1="12" x2="5" y2="12"></line>
                        <polyline points="12 19 5 12 12 5"></polyline>
                    </svg>
                    Kembali ke Beranda
                </a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
