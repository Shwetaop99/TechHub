<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login — TechHub</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Space Grotesk + Inter + JetBrains Mono -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        /* =========================================================
           TOKENS — identical to home/about/contact
        ========================================================= */
        :root {
            --bg:            #0A0C10;
            --surface:       #12151B;
            --surface-2:     #1A1E26;
            --ice:           #5FD3F3;
            --ice-light:     #A9E9FA;
            --ice-dim:       rgba(95, 211, 243, 0.28);
            --ice-glow:      rgba(95, 211, 243, 0.13);
            --titanium:      #C7CDD6;
            --ivory:         #E9ECF0;
            --muted:         #838B96;
            --hairline:      rgba(233, 236, 240, 0.08);
            --font-display:  'Space Grotesk', sans-serif;
            --font-body:     'Inter', sans-serif;
            --font-mono:     'JetBrains Mono', monospace;
        }

        * { box-sizing: border-box; }

        body {
            background: var(--bg);
            color: var(--ivory);
            font-family: var(--font-body);
            font-weight: 400;
            min-height: 100vh;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: var(--font-display);
            font-weight: 600;
            color: var(--ivory);
        }

        a { color: inherit; }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            font-family: var(--font-mono);
            font-size: 12px;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: var(--ice);
            font-weight: 500;
        }

        .eyebrow .dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--ice);
            box-shadow: 0 0 8px var(--ice);
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%,100% { opacity: 1; }
            50% { opacity: .35; }
        }

        .rule-ice {
            width: 56px;
            height: 1px;
            background: var(--ice);
            margin: 14px auto 22px;
        }

        @media (prefers-reduced-motion: reduce) {
            .login-card, .login-title, .login-eyebrow { animation: none !important; opacity: 1 !important; transform: none !important; }
        }

        /* =========================================================
           NAVBAR
        ========================================================= */
        .navbar {
            background: rgba(10, 10, 12, 0.92);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--hairline);
            padding: 16px 0;
        }

        .brand-mark {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .brand-monogram {
            width: 40px;
            height: 40px;
            border: 1px solid var(--ice);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: var(--font-display);
            font-size: 16px;
            font-weight: 600;
            color: var(--ice);
            letter-spacing: 1px;
            transition: transform .3s ease, background .3s ease;
        }

        .brand-mark:hover .brand-monogram {
            background: var(--ice);
            color: #0A0A0C;
        }

        .brand-word {
            font-family: var(--font-display);
            font-size: 22px;
            font-weight: 600;
            color: var(--ivory);
            letter-spacing: .5px;
        }

        .btn-ghost-light {
            background: transparent;
            border: 1px solid var(--hairline);
            color: var(--ivory);
            font-size: 14px;
            letter-spacing: .4px;
            padding: 10px 22px;
            border-radius: 4px;
            transition: .25s;
        }

        .btn-ghost-light:hover { border-color: var(--ice); color: var(--ice); }

        /* =========================================================
           LOGIN
        ========================================================= */
        .login-wrap {
            position: relative;
            min-height: calc(100vh - 73px);
            display: flex;
            align-items: center;
            background: var(--bg);
            padding: 70px 0;
            overflow: hidden;
        }

        .login-wrap::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse at 85% 20%, var(--ice-glow) 0%, transparent 45%),
                repeating-linear-gradient(0deg, var(--hairline) 0 1px, transparent 1px 64px),
                repeating-linear-gradient(90deg, var(--hairline) 0 1px, transparent 1px 64px);
            opacity: .5;
            pointer-events: none;
        }

        .login-wrap .container {
            position: relative;
        }

        .login-eyebrow {
            text-align: center;
            opacity: 0;
            animation: titleAppear .8s ease-out .05s forwards;
        }

        .login-title {
            text-align: center;
            opacity: 0;
            animation: titleAppear .8s ease-out .15s forwards;
        }

        .login-icon {
            width: 62px;
            height: 62px;
            margin: 0 auto 22px;
            border: 1px solid var(--ice-dim);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--ice);
            font-size: 26px;
            box-shadow: 0 0 24px var(--ice-glow);
            animation: iconFloat 3s ease-in-out 0.8s infinite;
        }

        @keyframes iconFloat {
            0%,100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }

        .login-card {
            max-width: 460px;
            margin: 0 auto;
            background: var(--surface);
            border: 1px solid var(--hairline);
            border-radius: 4px;
            padding: 44px;
            opacity: 0;
            animation: cardAppear .8s ease-out .25s forwards;
        }

        @keyframes cardAppear {
            from { opacity: 0; transform: translateY(30px) scale(0.98); }
            to   { opacity: 1; transform: translateY(0) scale(1); }
        }

        @keyframes titleAppear {
            from { opacity: 0; transform: translateY(-14px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .login-card h2 {
            font-size: 26px;
            margin-bottom: 6px;
        }

        .login-card .text-muted {
            color: var(--muted) !important;
            font-size: 14.5px;
        }

        .form-label {
            font-size: 12px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--muted);
            font-weight: 600;
            margin-bottom: 8px;
        }

        .login-input {
            background: var(--surface-2);
            border: 1px solid var(--hairline);
            color: var(--ivory);
            border-radius: 4px;
            padding: 12px 14px;
            transition: all .25s ease;
        }

        .login-input::placeholder { color: var(--muted); }

        .login-input:focus {
            background: var(--surface-2);
            color: var(--ivory);
            border-color: var(--ice);
            box-shadow: 0 0 0 3px var(--ice-glow);
            transform: translateY(-2px);
        }

        .login-btn {
            width: 100%;
            background: var(--ice);
            border: 1px solid var(--ice);
            color: #0A0A0C;
            font-weight: 600;
            font-size: 14px;
            letter-spacing: .5px;
            padding: 13px;
            border-radius: 4px;
            transition: all .25s ease;
        }

        .login-btn:hover {
            background: var(--ice-light);
            border-color: var(--ice-light);
            transform: translateY(-3px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.35);
        }

        .login-btn:active { transform: translateY(0); }

        .signup-line {
            text-align: center;
            margin-top: 26px;
            font-size: 14.5px;
            color: var(--muted);
        }

        .signup-line a {
            color: var(--ice);
            text-decoration: none;
            font-weight: 600;
            border-bottom: 1px solid transparent;
            transition: .2s;
        }

        .signup-line a:hover { border-bottom-color: var(--ice); color: var(--ice-light); }

        .alert-ice-success {
            background: var(--ice-glow);
            border: 1px solid var(--ice-dim);
            color: var(--ice-light);
            border-radius: 4px;
            font-size: 14px;
            padding: 12px 16px;
        }

        .alert-ice-danger {
            background: rgba(200, 90, 90, 0.1);
            border: 1px solid rgba(200, 90, 90, 0.35);
            color: #E4A3A3;
            border-radius: 4px;
            font-size: 14px;
            padding: 12px 16px;
        }

        @media (max-width: 576px) {
            .login-wrap { padding: 50px 0; }
            .login-card { padding: 32px 24px; }
            .brand-word { font-size: 19px; }
        }

    </style>

</head>

<body>

<!-- ================= NAVBAR ================= -->

<nav class="navbar">

    <div class="container d-flex justify-content-between align-items-center">

        <a class="brand-mark" href="/">
            <span class="brand-monogram">TH</span>
            <span class="brand-word">TechHub</span>
        </a>

        <a href="/" class="btn btn-ghost-light">
            <i class="bi bi-arrow-left me-2"></i>Home
        </a>

    </div>

</nav>


<!-- ================= LOGIN ================= -->

<section class="login-wrap">

    <div class="container">

        <div class="login-eyebrow eyebrow mb-2"><span class="dot"></span>Member Access</div>
        <div class="rule-ice login-title"></div>

        <div class="login-card">

            <div class="login-icon">
                <i class="bi bi-person-check"></i>
            </div>

            <h2 class="text-center">Welcome Back</h2>
            <p class="text-center mb-4">Login to your TechHub account</p>

            @if(session('success'))
                <div class="alert-ice-success mb-3">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert-ice-danger mb-3">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="/login" method="POST">

                @csrf

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input
                        type="email"
                        name="email"
                        class="form-control login-input"
                        placeholder="Enter your email"
                        required
                    >
                </div>

                <div class="mb-4">
                    <label class="form-label">Password</label>
                    <input
                        type="password"
                        name="password"
                        class="form-control login-input"
                        placeholder="Enter your password"
                        required
                    >
                </div>

                <button type="submit" class="login-btn">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Login
                </button>

            </form>

            <p class="signup-line">
                Don't have an account?
                <a href="/signup">Sign Up</a>
            </p>

        </div>

    </div>

</section>

</body>

</html>