<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>About — TechHub</title>
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
            --card: #ffffff;
            --line: rgba(15,23,42,.10);
            --text: #111827;
            --muted: #667085;
            --cyan: #2563eb;
            --blue: #4f46e5;
            --purple: #7c3aed;
            --green: #16a34a;
            --display: 'Space Grotesk', sans-serif;
            --body: 'Inter', sans-serif;
            --mono: 'JetBrains Mono', monospace;
        }

        * { box-sizing: border-box; }

        html { scroll-behavior: smooth; }

        body {
            margin: 0;
            background:
                radial-gradient(circle at 15% 10%, rgba(39,229,255,.08), transparent 28%),
                radial-gradient(circle at 85% 25%, rgba(155,92,255,.08), transparent 30%),
                var(--bg);
            color: var(--text);
            font-family: var(--body);
            overflow-x: hidden;
        }

        a { color: inherit; }

        h1,h2,h3,h4,h5,h6 {
            font-family: var(--display);
            font-weight: 700;
        }

        .top-line {
            height: 3px;
            background: linear-gradient(90deg, var(--cyan), var(--blue), var(--purple), var(--cyan));
            background-size: 200% 100%;
            animation: flow 6s linear infinite;
        }

        @keyframes flow {
            to { background-position: 200% 0; }
        }

        /* NAVBAR — same as Home */
        .navbar {
            position: sticky;
            top: 0;
            z-index: 1000;
            padding: 14px 0;
            background: rgba(255,255,255,.88);
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

        .nav-link {
            color: #667085 !important;
            font-size: 13px;
            font-weight: 500;
            margin-left: 20px;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--cyan) !important;
        }

        .nav-icon {
            border: 1px solid var(--line);
            width: 38px;
            height: 38px;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #475467;
            background: #ffffff;
        }

        .nav-icon:hover {
            color: var(--cyan);
            border-color: rgba(37,99,235,.35);
        }

        .btn-signup {
            border: 1px solid rgba(39,229,255,.45);
            background: rgba(37,99,235,.07);
            color: var(--cyan);
            border-radius: 10px;
            padding: 9px 16px;
            font-size: 13px;
            font-weight: 600;
        }

        .btn-signup:hover {
            background: var(--cyan);
            color: #ffffff;
        }

        .menu-btn {
            border: 1px solid var(--line);
            background: #ffffff;
            color: #344054;
            border-radius: 10px;
        }

        .menu-btn:hover {
            color: var(--cyan);
            border-color: rgba(37,99,235,.35);
        }

        /* SEARCH */
        .search-box {
            display: none;
            padding: 14px 0;
            background: rgba(255,255,255,.97);
            border-bottom: 1px solid var(--line);
        }

        .search-box.active { display: block; }

        .search-box input {
            height: 48px;
            background: #f8fafc;
            color: var(--text);
            border: 1px solid var(--line);
            border-right: 0;
        }

        .search-box input:focus {
            background: #f8fafc;
            color: var(--text);
            border-color: rgba(37,99,235,.35);
            box-shadow: none;
        }

        .search-box input::placeholder { color: #667085; }

        .search-box button {
            background: linear-gradient(135deg, var(--cyan), var(--blue));
            border: 0;
            color: #ffffff;
            font-weight: 700;
            padding: 0 24px;
        }

        /* SIDEBAR — same as Home */
        .offcanvas {
            width: 310px !important;
            background: #ffffff;
            color: var(--text);
            border-right: 1px solid var(--line);
        }

        .offcanvas-header {
            border-bottom: 1px solid var(--line);
            padding: 22px;
        }

        .offcanvas-header h4 {
            margin: 0;
            font-size: 19px;
        }

        .offcanvas-header small {
            color: var(--cyan);
            font: 10px var(--mono);
            letter-spacing: 1.5px;
        }

        .category {
            margin-bottom: 7px;
            border: 1px solid transparent;
            border-radius: 12px;
            transition: .2s;
        }

        .category a {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 13px 14px;
            text-decoration: none;
            color: #475467;
            font-size: 14px;
        }

        .category a i { color: #98a2b3; }

        .category:hover {
            background: rgba(37,99,235,.06);
            border-color: rgba(37,99,235,.16);
        }

        .category:hover a { color: var(--text); }
        .category:hover a i { color: var(--cyan); }

        /* ABOUT HERO */
        .about-hero {
            position: relative;
            min-height: 500px;
            display: flex;
            align-items: center;
            overflow: hidden;
            border-bottom: 1px solid var(--line);
            background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
        }

        .about-grid {
            position: absolute;
            inset: 0;
            opacity: .32;
            background-image:
                linear-gradient(rgba(15,23,42,.055) 1px, transparent 1px),
                linear-gradient(90deg, rgba(15,23,42,.055) 1px, transparent 1px);
            background-size: 58px 58px;
            mask-image: linear-gradient(to bottom, black, transparent);
        }

        .about-orb {
            position: absolute;
            width: 520px;
            height: 520px;
            right: -140px;
            top: -150px;
            border-radius: 50%;
            background: radial-gradient(
                circle,
                rgba(39,229,255,.16),
                rgba(124,58,237,.08) 40%,
                transparent 68%
            );
            filter: blur(8px);
        }

        .about-orb-left {
            position: absolute;
            width: 330px;
            height: 330px;
            left: -180px;
            bottom: -170px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(79,70,229,.09), transparent 68%);
            filter: blur(8px);
        }

        .about-hero .container {
            position: relative;
            z-index: 2;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--cyan);
            font: 600 10px var(--mono);
            letter-spacing: 2.2px;
            text-transform: uppercase;
        }

        .eyebrow .dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--cyan);
            box-shadow: 0 0 14px rgba(37,99,235,.45);
        }

        .about-hero h1 {
            margin: 20px 0 18px;
            font-size: clamp(3rem, 7vw, 6rem);
            line-height: .95;
            letter-spacing: -4px;
            max-width: 800px;
        }

        .about-hero h1 .gradient {
            background: linear-gradient(90deg, var(--cyan), #7691ff 45%, var(--purple));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .hero-copy {
            max-width: 650px;
            color: var(--muted);
            font-size: 16px;
            line-height: 1.8;
        }

        .hero-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 28px;
        }

        .btn-main {
            border: 0;
            border-radius: 11px;
            padding: 13px 22px;
            background: linear-gradient(135deg, var(--cyan), var(--blue));
            color: #ffffff;
            font-weight: 800;
            font-size: 13px;
            box-shadow: 0 10px 28px rgba(37,99,235,.16);
        }

        .btn-main:hover {
            transform: translateY(-2px);
            color: #ffffff;
        }

        .btn-outline-tech {
            border: 1px solid var(--line);
            border-radius: 11px;
            padding: 13px 22px;
            background: #ffffff;
            color: #344054;
            font-weight: 600;
            font-size: 13px;
        }

        .btn-outline-tech:hover {
            color: var(--cyan);
            border-color: rgba(37,99,235,.35);
        }

        /* HERO INFO PANEL */
        .about-panel {
            padding: 22px;
            border: 1px solid rgba(37,99,235,.16);
            border-radius: 24px;
            background: rgba(255,255,255,.86);
            box-shadow: 0 25px 70px rgba(15,23,42,.10);
            backdrop-filter: blur(12px);
        }

        .about-panel-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 22px;
        }

        .about-panel-label {
            color: var(--cyan);
            font: 600 10px var(--mono);
            letter-spacing: 1.8px;
        }

        .status {
            color: var(--green);
            font: 600 10px var(--mono);
            letter-spacing: 1px;
        }

        .about-panel-icon {
            width: 92px;
            height: 92px;
            margin: 5px auto 20px;
            border-radius: 24px;
            display: grid;
            place-items: center;
            background: linear-gradient(135deg, rgba(37,99,235,.10), rgba(124,58,237,.09));
            color: var(--cyan);
            font-size: 43px;
        }

        .about-panel h3 {
            text-align: center;
            margin-bottom: 8px;
        }

        .about-panel p {
            text-align: center;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.7;
            margin-bottom: 0;
        }

        /* MAIN ABOUT CONTENT */
        .section {
            padding: 95px 0;
        }

        .section-kicker {
            color: var(--cyan);
            font: 600 10px var(--mono);
            letter-spacing: 2.2px;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        .section-title {
            font-size: clamp(2rem, 4vw, 3.3rem);
            letter-spacing: -1.5px;
            margin-bottom: 14px;
        }

        .section-subtitle {
            color: var(--muted);
            max-width: 650px;
            margin: 0 auto;
            line-height: 1.75;
        }

        .about-content {
            background: #ffffff;
        }

        .story-card {
            padding: 38px;
            border: 1px solid var(--line);
            border-radius: 20px;
            background: #ffffff;
            box-shadow: 0 12px 35px rgba(15,23,42,.045);
            height: 100%;
        }

        .story-card:hover {
            border-color: rgba(37,99,235,.24);
            box-shadow: 0 18px 45px rgba(15,23,42,.08);
        }

        .story-icon {
            width: 58px;
            height: 58px;
            border-radius: 16px;
            display: grid;
            place-items: center;
            background: rgba(37,99,235,.08);
            color: var(--cyan);
            font-size: 25px;
            margin-bottom: 22px;
        }

        .story-card h2 {
            font-size: 28px;
            letter-spacing: -1px;
            margin-bottom: 18px;
        }

        .story-card p {
            color: var(--muted);
            line-height: 1.85;
            font-size: 15px;
        }

        .story-card p:last-child { margin-bottom: 0; }

        .mini-stat {
            padding: 18px;
            border: 1px solid var(--line);
            border-radius: 15px;
            background: var(--panel-2);
            height: 100%;
        }

        .mini-stat strong {
            display: block;
            font: 700 22px var(--display);
            margin-bottom: 4px;
        }

        .mini-stat span {
            color: var(--muted);
            font: 9px var(--mono);
            letter-spacing: 1.2px;
            text-transform: uppercase;
        }

        /* FEATURES */
        .features-section {
            background: var(--panel-2);
            border-top: 1px solid var(--line);
            border-bottom: 1px solid var(--line);
        }

        .feature-card {
            background: #ffffff;
            border: 1px solid var(--line);
            border-radius: 18px;
            padding: 34px 26px;
            height: 100%;
            transition: .25s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            border-color: rgba(37,99,235,.25);
            box-shadow: 0 18px 45px rgba(15,23,42,.09);
        }

        .feature-icon {
            width: 62px;
            height: 62px;
            margin-bottom: 20px;
            border-radius: 17px;
            display: grid;
            place-items: center;
            background: rgba(37,99,235,.08);
            color: var(--cyan);
            font-size: 27px;
        }

        .feature-card h3 {
            font-size: 19px;
            margin-bottom: 10px;
        }

        .feature-card p {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.75;
            margin: 0;
        }

        /* CTA */
        .cta-section {
            padding: 90px 0;
        }

        .cta-box {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(37,99,235,.18);
            border-radius: 24px;
            padding: 58px 35px;
            text-align: center;
            background:
                radial-gradient(circle at 20% 20%, rgba(39,229,255,.09), transparent 28%),
                radial-gradient(circle at 80% 80%, rgba(124,58,237,.08), transparent 30%),
                #ffffff;
            box-shadow: 0 20px 60px rgba(15,23,42,.07);
        }

        .cta-box h2 {
            font-size: clamp(2rem, 4vw, 3.3rem);
            letter-spacing: -1.5px;
            margin-bottom: 14px;
        }

        .cta-box p {
            color: var(--muted);
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.75;
        }

        /* FOOTER — same as Home */
        footer {
            background: #ffffff;
            border-top: 1px solid var(--line);
            padding: 56px 0 28px;
        }

        footer p {
            color: var(--muted);
            font-size: 13px;
        }

        footer small {
            color: #98a2b3;
            font: 500 9px var(--mono);
            letter-spacing: 1.2px;
        }

        /* MOBILE */
        @media (max-width: 991px) {
            .about-hero {
                min-height: auto;
                padding: 90px 0 80px;
            }

            .about-hero h1 {
                letter-spacing: -2.5px;
            }
        }

        @media (max-width: 576px) {
            .about-hero {
                padding: 75px 0 65px;
            }

            .about-hero h1 {
                font-size: 3.2rem;
                letter-spacing: -2px;
            }

            .section {
                padding: 70px 0;
            }

            .story-card {
                padding: 28px 22px;
            }

            .cta-box {
                padding: 45px 22px;
            }
        }
    </style>
    
</head>

<body>

<!-- TOP LINE -->
<div class="top-line"></div>

<!-- NAVBAR — matched with Home -->
<nav class="navbar navbar-expand-lg">
    <div class="container">

        <button class="btn menu-btn" type="button"
                data-bs-toggle="offcanvas" data-bs-target="#menu">
            <i class="bi bi-grid-3x3-gap fs-5"></i>
        </button>

        <a class="brand-mark ms-3" href="/">
            <span class="brand-monogram">TH</span>
            <span class="brand-word">Tech<span>Hub</span></span>
        </a>

        <div class="ms-auto d-flex align-items-center gap-2">

            <a class="nav-link d-none d-lg-inline" href="/">Home</a>
            <a class="nav-link d-none d-lg-inline active" href="/about">About</a>
            <a class="nav-link d-none d-lg-inline" href="/contact">Contact</a>
            <a class="nav-link d-none d-lg-inline" href="/login">Login</a>

            <a href="/signup" class="btn btn-signup ms-lg-2 d-none d-sm-inline-block">
                Sign Up
            </a>

            <button type="button"
                    class="btn nav-icon ms-1"
                    id="searchToggle"
                    aria-label="Search">
                <i class="bi bi-search"></i>
            </button>

            <a href="/cart" class="text-decoration-none nav-icon" aria-label="Cart">
                <i class="bi bi-bag"></i>
            </a>

        </div>
    </div>
</nav>

<!-- SEARCH -->
<div class="search-box" id="searchBox">
    <div class="container">
        <form action="/" method="GET" class="d-flex">
            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Search products..."
                autocomplete="off"
            >
            <button type="submit" class="btn">Search</button>
        </form>
    </div>
</div>

<!-- SIDEBAR — matched with Home -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="menu">

    <div class="offcanvas-header">
        <div>
            <small>TECHHUB / EXPLORE</small>
            <h4 class="mt-1">Categories</h4>
        </div>

        <button type="button"
                class="btn-close"
                data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
    </div>

    <div class="offcanvas-body pt-3">

        <div class="category">
            <a href="{{ url('/category/Laptops') }}"><i class="bi bi-laptop"></i>Laptops</a>
        </div>

        <div class="category">
            <a href="{{ url('/category/Phones') }}"><i class="bi bi-phone"></i>Phones</a>
        </div>

        <div class="category">
            <a href="{{ url('/category/Headphones') }}"><i class="bi bi-headphones"></i>Headphones</a>
        </div>

        <div class="category">
            <a href="{{ url('/category/Earbuds') }}"><i class="bi bi-earbuds"></i>Earbuds</a>
        </div>

        <div class="category">
            <a href="{{ url('/category/Smart-Watches') }}"><i class="bi bi-smartwatch"></i>Smart Watches</a>
        </div>

        <div class="category">
            <a href="{{ url('/category/Monitors') }}"><i class="bi bi-display"></i>Monitors</a>
        </div>

        <div class="category">
            <a href="{{ url('/category/Keyboards') }}"><i class="bi bi-keyboard"></i>Keyboards</a>
        </div>

        <div class="category">
            <a href="{{ url('/category/Mouse') }}"><i class="bi bi-mouse2"></i>Mouse</a>
        </div>

        <div class="category">
            <a href="{{ url('/category/Gaming') }}"><i class="bi bi-controller"></i>Gaming</a>
        </div>

        <div class="category">
            <a href="{{ url('/category/Cameras') }}"><i class="bi bi-camera"></i>Cameras</a>
        </div>

    </div>
</div>

<!-- ABOUT HERO -->
<section class="about-hero">

    <div class="about-grid"></div>
    <div class="about-orb"></div>
    <div class="about-orb-left"></div>

    <div class="container">
        <div class="row align-items-center g-5">

            <div class="col-lg-7">

                <div class="eyebrow">
                    <span class="dot"></span>
                    OUR STORY / TECHHUB
                </div>

                <h1>
                    Technology
                    <span class="gradient">made Life simpler.</span>
                </h1>

                <p class="hero-copy">
                    TechHub is your destination for modern technology and smart
                    gadgets — curated for performance, discovery and everyday use.
                </p>

                <div class="hero-actions">

                    <a href="/product" class="btn btn-main"
                       onclick="event.preventDefault(); window.location.href='/#products';">
                        Explore Products
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>

                    <a href="/contact" class="btn btn-outline-tech">
                        Get in Touch
                    </a>

                </div>

            </div>

            <div class="col-lg-5 mt-4 mt-lg-0">

                <div class="about-panel">

                    <div class="about-panel-top">
                        <span class="about-panel-label">TH / ABOUT</span>
                        <span class="status">● ACTIVE</span>
                    </div>

                    <div class="about-panel-icon">
                        <i class="bi bi-cpu"></i>
                    </div>

                    <h3>Built around technology.</h3>

                    <p>
                        Powerful devices, useful accessories and a clean shopping
                        experience — all in one place.
                    </p>

                </div>

            </div>

        </div>
    </div>
</section>

<!-- STORY -->
<section class="section about-content">

    <div class="container">

        <div class="text-center mb-5">
            <div class="section-kicker">What Is TechHub?</div>
            <h2 class="section-title">A modern shopping platform.</h2>
            <p class="section-subtitle">
                Designed to make technology discovery simple, organised and enjoyable.
            </p>
        </div>

        <div class="row g-4 align-items-stretch">

            <div class="col-lg-7">

                <div class="story-card">

                    <div class="story-icon">
                        <i class="bi bi-laptop"></i>
                    </div>

                    <h2>Technology, without the overwhelm.</h2>

                    <p>
                        TechHub brings the latest gadgets together in one place,
                        designed to make discovery simple and enjoyable.
                    </p>

                    <p>
                        From powerful laptops and smartphones to headphones,
                        gaming accessories, smart watches and cameras, every
                        category lives under one roof — organised, not overwhelming.
                    </p>

                    <p>
                        Our goal is a shopping experience that feels as considered
                        as the products themselves: clean, fast and easy to use.
                    </p>

                </div>

            </div>

            <div class="col-lg-5">

                <div class="row g-3 h-100">

                    <div class="col-6">
                        <div class="mini-stat">
                            <strong>10+</strong>
                            <span>Categories</span>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mini-stat">
                            <strong>Smart</strong>
                            <span>Discovery</span>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mini-stat">
                            <strong>Clean</strong>
                            <span>Experience</span>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mini-stat">
                            <strong>Fast</strong>
                            <span>Shopping</span>
                        </div>
                    </div>

                    <div class="col-12 mt-1">
                        <div class="story-card d-flex align-items-center justify-content-center text-center"
                             style="min-height: 190px;">

                            <div>
                                <div class="story-icon mx-auto">
                                    <i class="bi bi-phone"></i>
                                </div>

                                <h4 class="mb-2">Technology, Made Life Simple</h4>

                                <p class="mb-0">
                                    Find the gear you need without unnecessary complexity.
                                </p>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</section>

<!-- FEATURES -->
<section class="section features-section" id="features">

    <div class="container">

        <div class="text-center mb-5">

            <div class="section-kicker">The Difference</div>

            <h2 class="section-title">Why Choose TechHub?</h2>

            <p class="section-subtitle">
                A focused experience built around the things that matter when
                choosing technology.
            </p>

        </div>

        <div class="row g-4">

            <div class="col-md-4">

                <div class="feature-card">

                    <div class="feature-icon">
                        <i class="bi bi-bag-heart"></i>
                    </div>

                    <h3>Wide Selection</h3>

                    <p>
                        Explore laptops, phones, headphones, gaming products
                        and other modern gadgets.
                    </p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="feature-card">

                    <div class="feature-icon">
                        <i class="bi bi-lightning-charge"></i>
                    </div>

                    <h3>Easy Shopping</h3>

                    <p>
                        Find your favorite technology products through simple
                        categories and an easy-to-use interface.
                    </p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="feature-card">

                    <div class="feature-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>

                    <h3>Reliable Experience</h3>

                    <p>
                        Built with a clean and responsive design to provide a
                        smooth experience across every device.
                    </p>

                </div>

            </div>

        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-section">

    <div class="container">

        <div class="cta-box">

            <div class="section-kicker">Ready to explore?</div>

            <h2>Find your next upgrade.</h2>

            <p>
                Browse the TechHub collection and discover technology that
                fits the way you live, work and play.
            </p>

            <div class="hero-actions justify-content-center">

                <a href="/#products" class="btn btn-main">
                    Explore Products
                    <i class="bi bi-arrow-right ms-2"></i>
                </a>

                <a href="/contact" class="btn btn-outline-tech">
                    Contact TechHub
                </a>

            </div>

        </div>

    </div>

</section>

<!-- FOOTER — matched with Home -->
<footer>

    <div class="container text-center">

        <div class="brand-mark justify-content-center mb-3">
            <span class="brand-monogram">TH</span>
            <span class="brand-word">Tech<span>Hub</span></span>
        </div>

        <p class="mb-3">
            Technology that fits the way you live, work and play.
        </p>

        <small>
            © {{ date('Y') }} TECHHUB — BUILT FOR THE NEXT MOVE
        </small>

    </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const searchToggle = document.getElementById('searchToggle');

    if (searchToggle) {
        searchToggle.addEventListener('click', function () {

            const searchBox = document.getElementById('searchBox');

            if (!searchBox) return;

            searchBox.classList.toggle('active');

            if (searchBox.classList.contains('active')) {
                const input = searchBox.querySelector('input');

                if (input) {
                    input.focus();
                }
            }
        });
    }
</script>

</body>
</html>