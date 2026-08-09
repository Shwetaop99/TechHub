<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TechHub — Curated Technology</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Space Grotesk (display) + Inter (body) + JetBrains Mono (data/specs) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        /* =========================================================
           TOKENS — titanium / graphite / ice-blue
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

        html { scroll-behavior: smooth; }

        body {
            background: var(--bg);
            color: var(--ivory);
            font-family: var(--font-body);
            font-weight: 400;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: var(--font-display);
            font-weight: 600;
            color: var(--ivory);
            letter-spacing: -.2px;
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
            0%, 100% { opacity: 1; }
            50% { opacity: .35; }
        }

        .rule-ice {
            width: 56px;
            height: 2px;
            background: var(--ice);
            margin: 16px 0 22px;
        }

        .rule-ice.center { margin: 16px auto 22px; }

        /* =========================================================
           MOTION
        ========================================================= */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(22px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .anim-in {
            opacity: 0;
            animation: fadeUp .8s cubic-bezier(.19,1,.22,1) forwards;
        }

        .anim-1 { animation-delay: .05s; }
        .anim-2 { animation-delay: .18s; }
        .anim-3 { animation-delay: .32s; }
        .anim-4 { animation-delay: .46s; }
        .anim-5 { animation-delay: .60s; }

        .reveal {
            opacity: 0;
            transform: translateY(28px);
            transition: opacity .7s ease, transform .7s ease;
            transition-delay: calc(var(--i, 0) * 70ms);
        }

        .reveal.in-view {
            opacity: 1;
            transform: translateY(0);
        }

        @media (prefers-reduced-motion: reduce) {
            .anim-in, .reveal { animation: none !important; transition: none !important; opacity: 1 !important; transform: none !important; }
        }

        /* =========================================================
           WELCOME TOAST
        ========================================================= */
        .welcome-toast {
            position: relative;
            width: fit-content;
            max-width: 90%;
            margin: 22px auto 0;
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 14px 24px;
            background: var(--surface);
            color: var(--ivory);
            border: 1px solid var(--ice-dim);
            border-radius: 4px;
            box-shadow: 0 20px 45px rgba(0,0,0,0.5), 0 0 30px var(--ice-glow);
            animation: welcomeSlide .7s cubic-bezier(.17,.67,.35,1.3),
                       welcomeDisappear .6s ease-in 5s forwards;
        }

        .welcome-icon {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--ice-dim);
            color: var(--ice);
            font-size: 18px;
            flex-shrink: 0;
        }

        .welcome-small {
            font-family: var(--font-mono);
            font-size: 10px;
            letter-spacing: 2.5px;
            color: var(--ice);
            font-weight: 600;
            margin-bottom: 2px;
        }

        .welcome-name {
            font-family: var(--font-display);
            font-size: 18px;
            font-weight: 600;
        }

        .welcome-close {
            border: none;
            background: transparent;
            color: var(--muted);
            font-size: 20px;
            cursor: pointer;
            margin-left: 6px;
            transition: .2s;
        }

        .welcome-close:hover { color: var(--ice); transform: rotate(90deg); }

        @keyframes welcomeSlide {
            from { opacity: 0; transform: translateY(-20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        @keyframes welcomeDisappear {
            to { opacity: 0; transform: translateY(-10px); pointer-events: none; }
        }

        /* =========================================================
           NAVBAR
        ========================================================= */
        .navbar {
            background: rgba(10, 12, 16, 0.92);
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
            font-size: 15px;
            font-weight: 700;
            color: var(--ice);
            letter-spacing: 1px;
            transition: transform .3s ease, background .3s ease;
        }

        .brand-mark:hover .brand-monogram {
            background: var(--ice);
            color: #0A0C10;
        }

        .brand-word {
            font-family: var(--font-display);
            font-size: 21px;
            font-weight: 700;
            color: var(--ivory);
            letter-spacing: .2px;
        }

        .btn-menu {
            border: 1px solid var(--hairline);
            background: transparent;
            color: var(--ivory);
            border-radius: 4px;
            transition: .25s;
        }

        .btn-menu:hover { border-color: var(--ice-dim); color: var(--ice); }

        .nav-link {
            color: var(--ivory) !important;
            font-size: 14px;
            letter-spacing: .2px;
            margin-left: 22px;
            position: relative;
            padding-bottom: 3px !important;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            left: 0; bottom: 0;
            width: 0; height: 2px;
            background: var(--ice);
            transition: width .25s ease;
        }

        .nav-link:hover { color: var(--ice-light) !important; }
        .nav-link:hover::after { width: 100%; }

        .btn-ice-outline {
            border: 1px solid var(--ice);
            color: var(--ice);
            background: transparent;
            border-radius: 4px;
            font-size: 13px;
            font-weight: 500;
            letter-spacing: .3px;
            padding: 8px 20px;
            transition: all .25s ease;
        }

        .btn-ice-outline:hover {
            background: var(--ice);
            color: #0A0C10;
            box-shadow: 0 0 20px var(--ice-glow);
        }

        .navbar-icon {
            color: var(--ivory);
            transition: all .25s ease;
        }

        .navbar-icon:hover {
            color: var(--ice) !important;
            transform: translateY(-2px);
        }

        /* Search reveal */
        .search-box {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 20px;
            max-height: 0;
            opacity: 0;
            overflow: hidden;
            transition: max-height .4s ease, opacity .3s ease, padding .4s ease;
        }

        .search-box.active {
            max-height: 100px;
            opacity: 1;
            padding-top: 16px;
            padding-bottom: 16px;
        }

        .search-box input {
            height: 48px;
            background: var(--surface);
            border: 1px solid var(--hairline);
            color: var(--ivory);
            border-radius: 4px 0 0 4px;
        }

        .search-box input::placeholder { color: var(--muted); }
        .search-box input:focus {
            background: var(--surface);
            color: var(--ivory);
            border-color: var(--ice);
            box-shadow: none;
        }

        .search-box button {
            border-radius: 0 4px 4px 0;
            background: var(--ice);
            border: 1px solid var(--ice);
            color: #0A0C10;
            font-weight: 600;
        }

        /* =========================================================
           SIDEBAR
        ========================================================= */
        .offcanvas {
            width: 300px !important;
            background: var(--bg);
            color: var(--ivory);
            border-right: 1px solid var(--hairline);
        }

        .offcanvas-header { border-bottom: 1px solid var(--hairline); }

        .offcanvas-header h4 {
            font-family: var(--font-display);
            letter-spacing: .2px;
        }

        .btn-close { filter: invert(1) grayscale(1) brightness(1.6); }

        .category {
            padding: 15px 4px;
            cursor: pointer;
            transition: .25s;
            font-size: 15px;
            border-bottom: 1px solid var(--hairline);
        }

        .category:hover { padding-left: 12px; background: var(--surface); }

        .category a {
            color: var(--ivory);
            text-decoration: none;
            display: block;
        }

        .category:hover a { color: var(--ice-light); }

        /* =========================================================
           HERO
        ========================================================= */
        .hero {
            position: relative;
            background: var(--bg);
            padding: 110px 0 90px;
            border-bottom: 1px solid var(--hairline);
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse at 12% 15%, var(--ice-glow) 0%, transparent 45%),
                repeating-linear-gradient(0deg, var(--hairline) 0 1px, transparent 1px 64px),
                repeating-linear-gradient(90deg, var(--hairline) 0 1px, transparent 1px 64px);
            opacity: .5;
            pointer-events: none;
        }

        .hero .container { position: relative; }

        .hero h1 {
            font-size: clamp(2.6rem, 4.5vw, 4rem);
            line-height: 1.06;
            letter-spacing: -1px;
        }

        .hero h1 span.hl {
            color: var(--ice);
            text-shadow: 0 0 24px var(--ice-glow);
        }

        .hero p.lead {
            font-family: var(--font-body);
            color: var(--muted);
            font-size: 17px;
            max-width: 480px;
            font-weight: 400;
        }

        .btn-primary-ice {
            background: var(--ice);
            border: 1px solid var(--ice);
            color: #0A0C10;
            font-weight: 600;
            font-size: 14px;
            letter-spacing: .3px;
            padding: 13px 30px;
            border-radius: 4px;
            transition: .25s;
        }

        .btn-primary-ice:hover {
            background: var(--ice-light);
            border-color: var(--ice-light);
            color: #0A0C10;
            transform: translateY(-2px);
            box-shadow: 0 12px 28px var(--ice-glow);
        }

        .btn-ghost-light {
            background: transparent;
            border: 1px solid var(--hairline);
            color: var(--ivory);
            font-size: 14px;
            letter-spacing: .3px;
            padding: 13px 26px;
            border-radius: 4px;
            transition: .25s;
        }

        .btn-ghost-light:hover { border-color: var(--ice); color: var(--ice); }

        /* Signature: HUD corner brackets */
        .frame {
            position: relative;
            padding: 16px;
        }

        .frame::before, .frame::after {
            content: '';
            position: absolute;
            width: 28px;
            height: 28px;
            border: 2px solid var(--ice);
            opacity: 0;
            animation: bracketIn .6s ease forwards;
        }

        .frame::before { top: 0; left: 0; border-right: none; border-bottom: none; animation-delay: .7s; }
        .frame::after   { bottom: 0; right: 0; border-left: none; border-top: none; animation-delay: .85s; }

        @keyframes bracketIn {
            from { opacity: 0; transform: scale(.8); }
            to   { opacity: 1; transform: scale(1); }
        }

        .frame-tag {
            position: absolute;
            top: -14px;
            right: 16px;
            font-family: var(--font-mono);
            font-size: 10px;
            letter-spacing: 1.5px;
            color: var(--ice);
            background: var(--bg);
            padding: 2px 8px;
            border: 1px solid var(--ice-dim);
            opacity: 0;
            animation: fadeUp .6s ease 1s forwards;
        }

        .frame img {
            width: 100%;
            border-radius: 2px;
            filter: saturate(0.92) contrast(1.04);
        }

        /* =========================================================
           CATEGORIES
        ========================================================= */
        .section-heading {
            text-align: center;
            margin-bottom: 52px;
        }

        .category-card {
            background: var(--surface);
            border: 1px solid var(--hairline);
            border-radius: 4px;
            padding: 34px 16px;
            text-align: center;
            transition: transform .3s ease, border-color .3s ease, box-shadow .3s ease;
        }

        .category-card:hover {
            border-color: var(--ice-dim);
            transform: translateY(-6px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.4);
        }

        .category-icon {
            width: 56px;
            height: 56px;
            margin: 0 auto 16px;
            border: 1px solid var(--ice-dim);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: var(--ice);
            transition: .3s;
        }

        .category-card:hover .category-icon {
            background: var(--ice);
            color: #0A0C10;
            box-shadow: 0 0 20px var(--ice-glow);
        }

        .category-card h5 {
            font-size: 15.5px;
            margin-bottom: 4px;
            letter-spacing: .1px;
        }

        .category-card p {
            color: var(--muted);
            font-size: 12.5px;
            margin: 0;
            font-family: var(--font-mono);
        }

        .category-link { text-decoration: none; }

        /* =========================================================
           PRODUCTS
        ========================================================= */
        #products { background: var(--surface-2); border-top: 1px solid var(--hairline); border-bottom: 1px solid var(--hairline); }

        .product-card {
            position: relative;
            background: var(--surface);
            border: 1px solid var(--hairline);
            border-radius: 4px;
            overflow: hidden;
            height: 100%;
            transition: transform .35s ease, border-color .35s ease;
        }

        .product-card:hover {
            transform: translateY(-8px);
            border-color: var(--ice-dim);
        }

        .product-card::before, .product-card::after {
            content: '';
            position: absolute;
            width: 18px;
            height: 18px;
            border: 2px solid var(--ice);
            opacity: 0;
            transition: opacity .35s ease;
            z-index: 2;
        }

        .product-card::before { top: 10px; left: 10px; border-right: none; border-bottom: none; }
        .product-card::after  { bottom: 10px; right: 10px; border-left: none; border-top: none; }

        .product-card:hover::before, .product-card:hover::after { opacity: 1; }

        .product-card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            filter: saturate(.88);
            transition: transform .5s ease;
        }

        .product-card:hover img { transform: scale(1.045); }

        .product-card .card-body { padding: 22px 20px 20px; }

        .badge-cat {
            display: inline-block;
            border: 1px solid var(--ice-dim);
            color: var(--ice);
            background: transparent;
            font-family: var(--font-mono);
            font-size: 10px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            font-weight: 500;
            padding: 4px 10px;
            border-radius: 3px;
            margin-bottom: 12px;
        }

        .product-card h5 {
            font-size: 17px;
            margin-bottom: 10px;
            line-height: 1.3;
        }

        .product-price {
            font-family: var(--font-mono);
            color: var(--ice-light);
            font-size: 20px;
            font-weight: 600;
            margin: 0 0 4px;
        }

        .product-sold {
            font-family: var(--font-mono);
            font-size: 11px;
            letter-spacing: .3px;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 16px;
        }

        .btn-add-cart {
            width: 100%;
            background: transparent;
            border: 1px solid var(--ice);
            color: var(--ice);
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .3px;
            padding: 10px;
            border-radius: 4px;
            transition: .25s;
        }

        .btn-add-cart:hover {
            background: var(--ice);
            color: #0A0C10;
            box-shadow: 0 0 20px var(--ice-glow);
        }

        /* =========================================================
           FOOTER
        ========================================================= */
        footer {
            background: var(--bg);
            color: var(--muted);
            border-top: 1px solid var(--hairline);
            padding: 56px 0 28px;
        }

        footer .brand-word { font-size: 19px; }

        footer p { font-size: 13.5px; }

        footer small { font-family: var(--font-mono); font-size: 11.5px; letter-spacing: .3px; color: #565c65; }

        /* =========================================================
           MOBILE
        ========================================================= */
        @media (max-width: 576px) {
            .welcome-toast { width: calc(100% - 30px); padding: 12px 16px; gap: 12px; }
            .hero { padding: 80px 0 60px; text-align: center; }
            .hero p.lead { margin-left: auto; margin-right: auto; }
        }

    </style>

</head>

<body>

@if(session('welcome'))

<div class="welcome-toast" id="welcomeToast">

    <div class="welcome-icon">
        <i class="bi bi-lightning-charge-fill"></i>
    </div>

    <div class="welcome-content">
        <div class="welcome-small">WELCOME TO TECHHUB</div>
        <div class="welcome-name">{{ session('welcome') }}</div>
    </div>

    <button class="welcome-close" onclick="closeWelcome()">×</button>

</div>

@endif


<!-- ================= SEARCH ================= -->

<div id="searchBox" class="search-box">

    <form action="/" method="GET" class="container">
        <div class="input-group">
            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Search for laptops, phones, headphones..."
                value="{{ request('search') }}"
            >
            <button type="submit" class="btn">
                <i class="bi bi-search"></i> Search
            </button>
        </div>
    </form>

</div>


<!-- ================= NAVBAR ================= -->

<nav class="navbar navbar-expand-lg">

    <div class="container">

        <button class="btn btn-menu" type="button" data-bs-toggle="offcanvas" data-bs-target="#menu">
            <i class="bi bi-list fs-4"></i>
        </button>

        <a class="brand-mark ms-3" href="/">
            <span class="brand-monogram">TH</span>
            <span class="brand-word">TechHub</span>
        </a>

        <div class="ms-auto d-flex align-items-center">

            <a class="nav-link d-none d-lg-inline" href="/">Home</a>
            <a class="nav-link d-none d-lg-inline" href="/about">About</a>
            <a class="nav-link d-none d-lg-inline" href="/contact">Contact</a>
            <a class="nav-link d-none d-lg-inline" href="/login">Login</a>

            <a href="/signup" class="btn btn-ice-outline ms-lg-3 d-none d-sm-inline-block">Sign Up</a>

            <button type="button" class="btn btn-link p-0 text-decoration-none" id="searchToggle">
                <i class="bi bi-search ms-4 fs-5 navbar-icon"></i>
            </button>

            <a href="/cart" class="text-decoration-none">
                <i class="bi bi-bag ms-3 fs-5 navbar-icon"></i>
            </a>

        </div>

    </div>

</nav>


<!-- ================= SIDEBAR ================= -->

<div class="offcanvas offcanvas-start" tabindex="-1" id="menu">

    <div class="offcanvas-header">
        <h4>Categories</h4>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>

    <div class="offcanvas-body">

        <div class="category"><a href="{{ url('/category/Laptops') }}"><i class="bi bi-laptop me-2"></i>Laptops</a></div>
        <div class="category"><a href="{{ url('/category/Phones') }}"><i class="bi bi-phone me-2"></i>Phones</a></div>
        <div class="category"><a href="{{ url('/category/Headphones') }}"><i class="bi bi-headphones me-2"></i>Headphones</a></div>
        <div class="category"><a href="{{ url('/category/Earbuds') }}"><i class="bi bi-earbuds me-2"></i>Earbuds</a></div>
        <div class="category"><a href="{{ url('/category/Smart-Watches') }}"><i class="bi bi-smartwatch me-2"></i>Smart Watches</a></div>
        <div class="category"><a href="{{ url('/category/Monitors') }}"><i class="bi bi-display me-2"></i>Monitors</a></div>
        <div class="category"><a href="{{ url('/category/Keyboards') }}"><i class="bi bi-keyboard me-2"></i>Keyboards</a></div>
        <div class="category"><a href="{{ url('/category/Mouse') }}"><i class="bi bi-mouse2 me-2"></i>Mouse</a></div>
        <div class="category"><a href="{{ url('/category/Gaming') }}"><i class="bi bi-controller me-2"></i>Gaming</a></div>
        <div class="category"><a href="{{ url('/category/Cameras') }}"><i class="bi bi-camera me-2"></i>Cameras</a></div>

    </div>

</div>


<!-- ================= HERO ================= -->

<section class="hero">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6">

                <div class="eyebrow anim-in anim-1"><span class="dot"></span>Curated · Premium · Technology</div>
                <div class="rule-ice anim-in anim-2"></div>

                <h1 class="anim-in anim-2">Your Next Tech Starts Here.</h1>

                <p class="lead mt-4 anim-in anim-3">
                    A hand-picked selection of laptops, smartphones, gaming
                    accessories and audio — chosen for performance,
                    not just specs.
                </p>

                <div class="mt-4 anim-in anim-4">
                    <a href="#products" class="btn btn-primary-ice me-3">Shop the Collection</a>
                    <a href="/about" class="btn btn-ghost-light">Our Story</a>
                </div>

            </div>

            <div class="col-lg-6 text-center mt-5 mt-lg-0">

                <div class="frame anim-in anim-3">
                    <span class="frame-tag">TH // FEATURED</span>
                    <img
                        src="{{ asset('https://imgs.search.brave.com/yBhc7SpvTAn33WE_NtF9MoZAMvGaazNNAPekN5AUFL8/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9jZHNh/c3NldHMuYXBwbGUu/Y29tL2xpdmUvN1dV/QVMzNTAvaW1hZ2Vz/L3RlY2gtc3BlY3Mv/aXBob25lLTE3LWhl/cm8ucG5n') }}"
                        alt="Technology"
                    >
                </div>

            </div>

        </div>

    </div>

</section>


<!-- ================= CATEGORIES ================= -->

<section class="container py-5 my-4">

    <div class="section-heading reveal">
        <div class="eyebrow" style="display:inline-flex"><span class="dot"></span>Explore</div>
        <div class="rule-ice center"></div>
        <h2>Shop by Category</h2>
    </div>

    <div class="row g-4 stagger" id="categoryGrid">

        <div class="col-md-6 col-lg-3">
            <a href="{{ url('/category/Laptops') }}" class="category-link">
                <div class="category-card reveal">
                    <div class="category-icon"><i class="bi bi-laptop"></i></div>
                    <h5>Laptops</h5>
                    <p>POWERFUL LAPTOPS</p>
                </div>
            </a>
        </div>

        <div class="col-md-6 col-lg-3">
            <a href="{{ url('/category/Phones') }}" class="category-link">
                <div class="category-card reveal">
                    <div class="category-icon"><i class="bi bi-phone"></i></div>
                    <h5>Phones</h5>
                    <p>LATEST SMARTPHONES</p>
                </div>
            </a>
        </div>

        <div class="col-md-6 col-lg-3">
            <a href="{{ url('/category/Headphones') }}" class="category-link">
                <div class="category-card reveal">
                    <div class="category-icon"><i class="bi bi-headphones"></i></div>
                    <h5>Headphones</h5>
                    <p>PREMIUM AUDIO</p>
                </div>
            </a>
        </div>

        <div class="col-md-6 col-lg-3">
            <a href="{{ url('/category/Earbuds') }}" class="category-link">
                <div class="category-card reveal">
                    <div class="category-icon"><i class="bi bi-earbuds"></i></div>
                    <h5>Earbuds</h5>
                    <p>WIRELESS EARBUDS</p>
                </div>
            </a>
        </div>

        <div class="col-md-6 col-lg-3">
            <a href="{{ url('/category/Smart-Watches') }}" class="category-link">
                <div class="category-card reveal">
                    <div class="category-icon"><i class="bi bi-smartwatch"></i></div>
                    <h5>Smart Watches</h5>
                    <p>SMART WEARABLE TECH</p>
                </div>
            </a>
        </div>

        <div class="col-md-6 col-lg-3">
            <a href="{{ url('/category/Monitors') }}" class="category-link">
                <div class="category-card reveal">
                    <div class="category-icon"><i class="bi bi-display"></i></div>
                    <h5>Monitors</h5>
                    <p>HIGH QUALITY DISPLAYS</p>
                </div>
            </a>
        </div>

        <div class="col-md-6 col-lg-3">
            <a href="{{ url('/category/Keyboards') }}" class="category-link">
                <div class="category-card reveal">
                    <div class="category-icon"><i class="bi bi-keyboard"></i></div>
                    <h5>Keyboards</h5>
                    <p>MECHANICAL KEYBOARDS</p>
                </div>
            </a>
        </div>

        <div class="col-md-6 col-lg-3">
            <a href="{{ url('/category/Mouse') }}" class="category-link">
                <div class="category-card reveal">
                    <div class="category-icon"><i class="bi bi-mouse2"></i></div>
                    <h5>Mouse</h5>
                    <p>WIRELESS &amp; GAMING</p>
                </div>
            </a>
        </div>

        <div class="col-md-6 col-lg-3">
            <a href="{{ url('/category/Gaming') }}" class="category-link">
                <div class="category-card reveal">
                    <div class="category-icon"><i class="bi bi-controller"></i></div>
                    <h5>Gaming</h5>
                    <p>GAMING TECHNOLOGY</p>
                </div>
            </a>
        </div>

        <div class="col-md-6 col-lg-3">
            <a href="{{ url('/category/Cameras') }}" class="category-link">
                <div class="category-card reveal">
                    <div class="category-icon"><i class="bi bi-camera"></i></div>
                    <h5>Cameras</h5>
                    <p>CAPTURE EVERY MOMENT</p>
                </div>
            </a>
        </div>

    </div>

</section>


<!-- ================= PRODUCTS ================= -->

<section class="py-5" id="products">

    <div class="container py-4">

        <div class="section-heading reveal">
            <div class="eyebrow" style="display:inline-flex"><span class="dot"></span>The Collection</div>
            <div class="rule-ice center"></div>
            <h2>Featured Products</h2>
        </div>

        <div class="row g-4 stagger" id="productGrid">

            @foreach($products as $product)

                <div class="col-md-6 col-lg-3">

                    <div class="product-card reveal">

                        <img
                            src="{{ $product->image }}"
                            alt="{{ $product->name }}"
                            referrerpolicy="no-referrer"
                        >

                        <div class="card-body">

                            <span class="badge-cat">{{ $product->category }}</span>

                            <h5>{{ $product->name }}</h5>

                            <p class="product-price">₹{{ number_format($product->price) }}</p>

                            <p class="product-sold">{{ $product->sold_count }} sold</p>

                            <form action="{{ url('/cart/add/' . $product->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn-add-cart">
                                    <i class="bi bi-bag-plus me-2"></i>Add to Cart
                                </button>
                            </form>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>


<!-- ================= FOOTER ================= -->

<footer>

    <div class="container text-center">

        <div class="brand-mark justify-content-center mb-3">
            <span class="brand-monogram">TH</span>
            <span class="brand-word">TechHub</span>
        </div>

        <p class="mb-3">Curated technology, engineered with care.</p>

        <small>© {{ date('Y') }} TECHHUB — ALL RIGHTS RESERVED</small>

    </div>

</footer>


<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

<script>

    function closeWelcome() {
        const welcome = document.getElementById('welcomeToast');
        if (welcome) {
            welcome.style.animation = 'welcomeDisappear 0.5s ease forwards';
        }
    }

    document.getElementById('searchToggle').addEventListener('click', function () {
        const searchBox = document.getElementById('searchBox');
        searchBox.classList.toggle('active');

        if (searchBox.classList.contains('active')) {
            searchBox.querySelector('input').focus();
        }
    });

    // Stagger index for scroll-reveal groups
    document.querySelectorAll('.stagger').forEach(function (group) {
        Array.from(group.children).forEach(function (child, i) {
            const el = child.querySelector('.reveal') || child;
            el.style.setProperty('--i', i);
        });
    });

    // Scroll-reveal
    const revealObserver = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('in-view');
                revealObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15 });

    document.querySelectorAll('.reveal').forEach(function (el) {
        revealObserver.observe(el);
    });

</script>

</body>

</html>