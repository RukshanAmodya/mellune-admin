<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Mellune - Sign In</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('asset/img/Mellune-Logo.png') }}" />

    <!-- Google Fonts: Inter / Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('asset/cdncss/iziToast.css') }}" rel="stylesheet" /> 

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body, html {
            height: 100%;
            width: 100%;
            overflow: hidden;
            background: #eef2f6;
        }

        /* Full Background with Sky Image */
        .login-wrapper {
            position: relative;
            width: 100vw;
            height: 100vh;
            background: url("{{ asset('asset/img/Sky_backgroun.jpg') }}") no-repeat center center;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Top Left Branding */
        .brand-header {
            position: absolute;
            top: 28px;
            left: 36px;
            display: flex;
            align-items: center;
            gap: 12px;
            z-index: 10;
            text-decoration: none;
        }

        .brand-header img {
            width: 36px;
            height: 36px;
            object-fit: contain;
            border-radius: 8px;
        }

        .brand-text h2 {
            font-size: 19px;
            font-weight: 800;
            color: #0f172a;
            line-height: 1.1;
            letter-spacing: -0.3px;
        }

        .brand-text span {
            font-size: 11px;
            font-weight: 500;
            color: #64748b;
            letter-spacing: 0.2px;
        }

        /* Outer Orbit / Glow Ring Effect matching Omnia UI */
        .orbit-container {
            position: absolute;
            width: 580px;
            height: 580px;
            border-radius: 50%;
            border: 1px dashed rgba(255, 255, 255, 0.45);
            display: flex;
            align-items: center;
            justify-content: center;
            pointer-events: none;
        }

        .orbit-container::before {
            content: '';
            position: absolute;
            width: 760px;
            height: 760px;
            border-radius: 50%;
            border: 1px dashed rgba(255, 255, 255, 0.2);
        }

        /* Central Login Card */
        .login-card {
            position: relative;
            width: 100%;
            max-width: 420px;
            padding: 38px 34px;
            background: #ffffff;
            border-radius: 28px;
            box-shadow: 0 25px 60px -15px rgba(15, 23, 42, 0.15), 0 0 0 1px rgba(255, 255, 255, 0.8);
            z-index: 20;
            text-align: center;
        }

        /* Central Icon Box */
        .icon-badge {
            width: 48px;
            height: 48px;
            margin: 0 auto 16px;
            background: #ffffff;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.06);
            border: 1px solid #f1f5f9;
        }

        .icon-badge i {
            font-size: 20px;
            color: #0f172a;
        }

        /* Live Demo / Status Pill */
        .status-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 14px;
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 100px;
            color: #16a34a;
            font-size: 11.5px;
            font-weight: 600;
            margin-bottom: 14px;
        }

        .status-pill .dot {
            width: 6px;
            height: 6px;
            background: #22c55e;
            border-radius: 50%;
        }

        .card-title {
            font-size: 22px;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -0.4px;
            margin-bottom: 6px;
        }

        .card-subtitle {
            font-size: 12.5px;
            color: #64748b;
            font-weight: 500;
            margin-bottom: 24px;
            line-height: 1.4;
        }

        /* Input Fields */
        .input-group-custom {
            position: relative;
            margin-bottom: 14px;
            text-align: left;
        }

        .input-group-custom .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 14px;
            pointer-events: none;
        }

        .input-group-custom input {
            width: 100%;
            height: 48px;
            padding: 0 16px 0 44px;
            background: #f8fafc;
            border: 1.5px solid #e2e8f0;
            border-radius: 14px;
            font-size: 14px;
            font-weight: 500;
            color: #0f172a;
            outline: none;
            transition: all 0.2s ease;
        }

        .input-group-custom input:focus {
            background: #ffffff;
            border-color: #2563eb;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.08);
        }

        .input-group-custom input::placeholder {
            color: #94a3b8;
            font-weight: 400;
        }

        .toggle-password {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            cursor: pointer;
            font-size: 14px;
            transition: color 0.2s;
        }

        .toggle-password:hover {
            color: #475569;
        }

        /* Primary Action Button */
        .btn-submit {
            width: 100%;
            height: 48px;
            margin-top: 10px;
            background: #2563eb;
            color: #ffffff;
            border: none;
            border-radius: 14px;
            font-size: 14.5px;
            font-weight: 700;
            letter-spacing: -0.2px;
            cursor: pointer;
            box-shadow: 0 4px 14px rgba(37, 99, 235, 0.35);
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-submit:hover {
            background: #1d4ed8;
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.45);
            transform: translateY(-1px);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        /* Toast Message */
        .session-message {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
        }
    </style>
</head>

<body>
    @if (Session::has('message'))
    <div class="session-message">
        <div class="iziToast-body" style="padding-left: 33px; background: #fee2e2; border-radius: 12px; padding: 12px 20px;">
            <div class="iziToast-texts">
                <strong style="color: #ef4444; margin-right: 8px;">{{ __('Error') }}:</strong>
                <span style="color: #b91c1c;">{!! Session::get('message') !!}</span>
            </div>
        </div>
    </div>
    @endif

    <div class="login-wrapper">
        <!-- Top Left Brand -->
        <a href="#" class="brand-header">
            <img src="{{ asset('asset/img/Mellune-Logo.png') }}" alt="Mellune Logo">
            <div class="brand-text">
                <h2>Mellune.</h2>
                <span>Live Wallpaper Admin</span>
            </div>
        </a>

        <!-- Dashed Orbit Ring -->
        <div class="orbit-container"></div>

        <!-- Login Card -->
        <div class="login-card">
            <div class="icon-badge">
                <i class="fa-solid fa-arrow-right-to-bracket"></i>
            </div>

            <div class="status-pill">
                <span class="dot"></span>
                <span>Admin Portal</span>
            </div>

            <h1 class="card-title">Sign in to Mellune</h1>
            <p class="card-subtitle">Enter your credentials to manage your wallpaper app</p>

            <form method="POST" action="login">
                @csrf
                <div class="input-group-custom">
                    <i class="fa-regular fa-user input-icon"></i>
                    <input name="user_name" type="text" placeholder="Username" required autofocus id="user_name">
                </div>

                <div class="input-group-custom">
                    <i class="fa-solid fa-lock input-icon"></i>
                    <input name="user_password" type="password" placeholder="Password" required id="user_password">
                    <i class="fa-regular fa-eye toggle-password" onclick="togglePasswordVisibility()"></i>
                </div>

                <button type="submit" class="btn-submit">
                    <span>Sign In to Dashboard</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </form>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passInput = document.getElementById('user_password');
            const icon = document.querySelector('.toggle-password');
            if (passInput.type === 'password') {
                passInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>
