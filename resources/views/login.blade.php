<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login — TechHub</title>
    <link
    rel="icon"
    type="image/png"
    href="{{ asset('css/techhub_TH_favicon.png') }}"
>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --bg: #ffffff;
            --panel: #ffffff;
            --panel-2: #f7f9fc;
            --line: rgba(15,23,42,.10);
            --text: #111827;
            --muted: #667085;
            --cyan: #2563eb;
            --blue: #4f46e5;
            --purple: #7c3aed;
            --green: #16a34a;
            --danger: #dc2626;
            --display: 'Space Grotesk', sans-serif;
            --body: 'Inter', sans-serif;
            --mono: 'JetBrains Mono', monospace;
        }

        * { box-sizing: border-box; }

        html { scroll-behavior: smooth; }

        body {
            margin: 0;
            min-height: 100vh;
            background:
                radial-gradient(circle at 12% 15%, rgba(39,229,255,.08), transparent 28%),
                radial-gradient(circle at 88% 80%, rgba(124,58,237,.07), transparent 30%),
                #ffffff;
            color: var(--text);
            font-family: var(--body);
        }

        h1,h2,h3,h4,h5,h6 {
            font-family: var(--display);
            font-weight: 700;
        }

        a { color: inherit; }

        .top-line {
            height: 3px;
            background: linear-gradient(90deg, var(--cyan), var(--blue), var(--purple), var(--cyan));
            background-size: 200% 100%;
            animation: flow 6s linear infinite;
        }

        @keyframes flow {
            to { background-position: 200% 0; }
        }

        /* NAVBAR — same as Home/About/Contact */
        .navbar {
            position: sticky;
            top: 0;
            z-index: 1000;
            padding: 14px 0;
            background: rgba(255,255,255,.90);
            border-bottom: 1px solid var(--line);
            backdrop-filter: blur(18px);
        }

        .brand-mark {
            display: inline-flex;
            align-items: center;
            gap: 11px;
            text-decoration: none;
        }

        .brand-monogram {
            width: 40px;
            height: 40px;
            border-radius: 11px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--cyan), var(--blue));
            color: #ffffff;
            font: 700 14px var(--display);
            letter-spacing: 1px;
            box-shadow: 0 8px 24px rgba(37,99,235,.14);
        }

        .brand-word {
            font: 700 21px var(--display);
            letter-spacing: -.4px;
        }

        .brand-word span { color: var(--cyan); }

        .home-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: 1px solid var(--line);
            background: #ffffff;
            color: #475467;
            border-radius: 10px;
            padding: 9px 16px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            transition: .2s ease;
        }

        .home-btn:hover {
            color: var(--cyan);
            border-color: rgba(37,99,235,.35);
            transform: translateY(-1px);
        }

        /* LOGIN AREA */
        .login-wrap {
            position: relative;
            min-height: calc(100vh - 73px);
            display: flex;
            align-items: center;
            overflow: hidden;
            padding: 65px 20px;
            background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
        }

        .login-grid {
            position: absolute;
            inset: 0;
            opacity: .30;
            background-image:
                linear-gradient(rgba(15,23,42,.055) 1px, transparent 1px),
                linear-gradient(90deg, rgba(15,23,42,.055) 1px, transparent 1px);
            background-size: 58px 58px;
            mask-image: linear-gradient(to bottom, black, transparent);
        }

        .login-orb {
            position: absolute;
            width: 520px;
            height: 520px;
            right: -180px;
            top: -170px;
            border-radius: 50%;
            background: radial-gradient(
                circle,
                rgba(39,229,255,.14),
                rgba(124,58,237,.07) 43%,
                transparent 68%
            );
            filter: blur(8px);
        }

        .login-orb-left {
            position: absolute;
            width: 360px;
            height: 360px;
            left: -190px;
            bottom: -180px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(79,70,229,.08), transparent 68%);
        }

        .login-shell {
            position: relative;
            z-index: 2;
            max-width: 1030px;
            width: 100%;
            margin: 0 auto;
            display: grid;
            grid-template-columns: .95fr 1.05fr;
            background: #ffffff;
            border: 1px solid var(--line);
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 25px 70px rgba(15,23,42,.10);
        }

        /* BRAND PANEL */
        .brand-panel {
            position: relative;
            min-height: 590px;
            padding: 48px;
            overflow: hidden;
            color: #ffffff;
            background:
                radial-gradient(circle at 15% 10%, rgba(39,229,255,.18), transparent 35%),
                radial-gradient(circle at 88% 88%, rgba(124,58,237,.55), transparent 55%),
                linear-gradient(145deg, #101c46 0%, #243fa8 55%, #4f46e5 100%);
        }

        .brand-panel::before {
            content: "";
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(255,255,255,.055) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,.055) 1px, transparent 1px);
            background-size: 55px 55px;
            mask-image: linear-gradient(to bottom, transparent, black, transparent);
        }

        .brand-panel > * {
            position: relative;
            z-index: 1;
        }

        .brand-panel .brand-monogram {
            background: rgba(255,255,255,.14);
            border: 1px solid rgba(255,255,255,.20);
            box-shadow: none;
        }

        .brand-panel .brand-word {
            color: #ffffff;
        }

        .member-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin: 70px 0 20px;
            padding: 7px 13px;
            border-radius: 999px;
            border: 1px solid rgba(255,255,255,.22);
            background: rgba(255,255,255,.10);
            color: #ffffff;
            font: 600 9px var(--mono);
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .brand-panel h1 {
            max-width: 400px;
            color: #ffffff;
            font-size: clamp(2.2rem, 4vw, 3.2rem);
            line-height: 1.08;
            letter-spacing: -1.5px;
            margin-bottom: 16px;
        }

        .brand-panel p {
            max-width: 390px;
            color: rgba(255,255,255,.75);
            font-size: 14px;
            line-height: 1.8;
        }

        .brand-features {
            list-style: none;
            padding: 0;
            margin: 30px 0 0;
            display: flex;
            flex-direction: column;
            gap: 13px;
        }

        .brand-features li {
            display: flex;
            align-items: center;
            gap: 11px;
            color: rgba(255,255,255,.88);
            font-size: 13px;
        }

        .feature-check {
            width: 23px;
            height: 23px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            background: rgba(255,255,255,.12);
            border: 1px solid rgba(255,255,255,.22);
            color: #ffffff;
            font-size: 11px;
        }

        .brand-bottom {
            position: absolute !important;
            left: 48px;
            right: 48px;
            bottom: 38px;
            padding-top: 18px;
            border-top: 1px solid rgba(255,255,255,.14);
            color: rgba(255,255,255,.62);
            font: 10px var(--mono);
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .brand-bottom strong {
            color: rgba(255,255,255,.92);
        }

        /* FORM PANEL */
        .form-panel {
            padding: 55px 58px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-icon {
            width: 58px;
            height: 58px;
            margin-bottom: 22px;
            border-radius: 17px;
            display: grid;
            place-items: center;
            color: #ffffff;
            font-size: 24px;
            background: linear-gradient(135deg, var(--cyan), var(--purple));
            box-shadow: 0 10px 25px rgba(37,99,235,.18);
        }

        .form-panel h2 {
            font-size: 30px;
            letter-spacing: -.8px;
            margin-bottom: 7px;
        }

        .form-intro {
            color: var(--muted);
            font-size: 14px;
            margin-bottom: 28px;
        }

        .form-label {
            font-size: 10px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--muted);
            font-weight: 700;
            margin-bottom: 8px;
        }

        .input-shell {
            position: relative;
        }

        .input-shell i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #98a2b3;
            pointer-events: none;
        }

        .login-input {
            height: 49px;
            background: #f8fafc;
            border: 1px solid var(--line);
            color: var(--text);
            border-radius: 11px;
            padding: 12px 14px 12px 43px;
        }

        .login-input::placeholder {
            color: #98a2b3;
        }

        .login-input:focus {
            background: #ffffff;
            color: var(--text);
            border-color: var(--cyan);
            box-shadow: 0 0 0 4px rgba(37,99,235,.08);
        }

        .login-btn {
            width: 100%;
            border: 0;
            border-radius: 11px;
            padding: 14px;
            background: linear-gradient(135deg, var(--cyan), var(--blue), var(--purple));
            color: #ffffff;
            font-weight: 800;
            font-size: 13px;
            letter-spacing: .4px;
            box-shadow: 0 10px 28px rgba(37,99,235,.16);
            transition: .2s ease;
        }

        .login-btn:hover {
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 15px 32px rgba(37,99,235,.22);
        }

        .signup-line {
            text-align: center;
            color: var(--muted);
            font-size: 13px;
            margin: 22px 0 0;
        }

        .signup-line a {
            color: var(--cyan);
            font-weight: 700;
            text-decoration: none;
        }

        .signup-line a:hover {
            color: var(--blue);
        }

        .trust-line {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            margin-top: 18px;
            color: #98a2b3;
            font: 500 9px var(--mono);
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .trust-line i {
            color: var(--green);
        }

        /* ALERTS — preserve Laravel session/error mechanisms */
        .alert-tech-success {
            border: 1px solid rgba(37,99,235,.18);
            background: rgba(37,99,235,.06);
            color: #1d4ed8;
            border-radius: 11px;
            padding: 12px 15px;
            font-size: 13px;
        }

        .alert-tech-danger {
            border: 1px solid rgba(220,38,38,.18);
            background: rgba(220,38,38,.05);
            color: #b91c1c;
            border-radius: 11px;
            padding: 12px 15px;
            font-size: 13px;
        }

        @media (max-width: 900px) {
            .login-shell {
                max-width: 500px;
                grid-template-columns: 1fr;
            }

            .brand-panel {
                display: none;
            }

            .form-panel {
                padding: 50px 40px;
            }
        }

        @media (max-width: 576px) {
            .login-wrap {
                padding: 38px 15px;
            }

            .form-panel {
                padding: 38px 24px;
            }

            .form-panel h2 {
                font-size: 27px;
            }

            .home-btn {
                padding: 8px 12px;
            }
        }
    </style>
</head>

<body>

<div class="top-line"></div>

<!-- NAVBAR — matched with Home/About/Contact -->
<nav class="navbar">
    <div class="container d-flex justify-content-between align-items-center">

        <a class="brand-mark" href="/">
            <span class="brand-monogram">TH</span>
            <span class="brand-word">Tech<span>Hub</span></span>
        </a>

        <a href="/" class="home-btn">
            <i class="bi bi-arrow-left"></i>
            Home
        </a>

    </div>
</nav>

<!-- LOGIN -->
<section class="login-wrap">

    <div class="login-grid"></div>
    <div class="login-orb"></div>
    <div class="login-orb-left"></div>

    <div class="login-shell">

        <!-- BRAND PANEL -->
        <div class="brand-panel">

            <div>

                <a href="/" class="brand-mark">
                    <span class="brand-monogram">TH</span>
                    <span class="brand-word">Tech<span>Hub</span></span>
                </a>

                <div class="member-badge">
                    <i class="bi bi-stars"></i>
                    Member Access
                </div>

                <h1>
                    Welcome back to
                    Tech<span style="color:#a5b4fc;">Hub.</span>
                </h1>

                <p>
                    Sign in to manage your account, track orders and make
                    your TechHub shopping experience even easier.
                </p>

                <ul class="brand-features">
                    <li>
                        <span class="feature-check">
                            <i class="bi bi-check-lg"></i>
                        </span>
                        Track your orders and history
                    </li>

                    <li>
                        <span class="feature-check">
                            <i class="bi bi-check-lg"></i>
                        </span>
                        Shop your favourite technology faster
                    </li>

                    <li>
                        <span class="feature-check">
                            <i class="bi bi-check-lg"></i>
                        </span>
                        Keep your account details in one place
                    </li>
                </ul>

            </div>

            <div class="brand-bottom">
                <strong>TECHHUB / ACCOUNT</strong>
                &nbsp;•&nbsp; Secure member access
            </div>

        </div>

        <!-- FORM PANEL -->
        <div class="form-panel">

            <div class="login-icon">
                <i class="bi bi-person-check"></i>
            </div>

            <h2>Welcome Back</h2>

            <p class="form-intro">
                Login to your TechHub account
            </p>

            @if(session('success'))
                <div class="alert-tech-success mb-3">
                    <i class="bi bi-check-circle me-2"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert-tech-danger mb-3">
                    <i class="bi bi-exclamation-circle me-2"></i>
                    {{ $errors->first() }}
                </div>
            @endif

            <!-- ORIGINAL LOGIN MECHANISM PRESERVED -->
            <form action="/login" method="POST">

                @csrf

                <div class="mb-3">

                    <label class="form-label">
                        Email
                    </label>

                    <div class="input-shell">

                        <i class="bi bi-envelope"></i>

                        <input
                            type="email"
                            name="email"
                            class="form-control login-input"
                            placeholder="Enter your email"
                            value="{{ old('email') }}"
                            required
                        >

                    </div>

                </div>

                <div class="mb-4">

                    <label class="form-label">
                        Password
                    </label>

                    <div class="input-shell">

                        <i class="bi bi-lock"></i>

                        <input
                            type="password"
                            name="password"
                            class="form-control login-input"
                            placeholder="Enter your password"
                            required
                        >

                    </div>

                </div>

                <button type="submit" class="login-btn">
                    <i class="bi bi-box-arrow-in-right me-2"></i>
                    Login
                </button>

            </form>

            <p class="signup-line">
                Don't have an account?
                <a href="/signup">Sign Up</a>
            </p>

            <div class="trust-line">
                <i class="bi bi-shield-check"></i>
                Secure TechHub account access
            </div>

        </div>

    </div>

</section>

</body>
</html>