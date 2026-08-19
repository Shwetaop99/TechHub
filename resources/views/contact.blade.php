<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contact — TechHub</title>
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

        /* NAVBAR — same visual language as Home/About */
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
            border: 1px solid rgba(37,99,235,.28);
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

        /* SIDEBAR */
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

        /* HERO */
        .contact-hero {
            position: relative;
            min-height: 520px;
            display: flex;
            align-items: center;
            overflow: hidden;
            border-bottom: 1px solid var(--line);
            background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
        }

        .hero-grid {
            position: absolute;
            inset: 0;
            opacity: .32;
            background-image:
                linear-gradient(rgba(15,23,42,.055) 1px, transparent 1px),
                linear-gradient(90deg, rgba(15,23,42,.055) 1px, transparent 1px);
            background-size: 58px 58px;
            mask-image: linear-gradient(to bottom, black, transparent);
        }

        .hero-orb {
            position: absolute;
            width: 500px;
            height: 500px;
            right: -140px;
            top: -130px;
            border-radius: 50%;
            background: radial-gradient(
                circle,
                rgba(39,229,255,.15),
                rgba(124,58,237,.08) 42%,
                transparent 68%
            );
            filter: blur(8px);
        }

        .hero-orb-left {
            position: absolute;
            width: 330px;
            height: 330px;
            left: -180px;
            bottom: -180px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(79,70,229,.08), transparent 68%);
        }

        .contact-hero .container {
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

        .contact-hero h1 {
            margin: 20px 0 18px;
            font-size: clamp(3rem, 7vw, 6rem);
            line-height: .95;
            letter-spacing: -4px;
        }

        .contact-hero h1 .gradient {
            background: linear-gradient(90deg, var(--cyan), #7691ff 45%, var(--purple));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .hero-copy {
            max-width: 620px;
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

        /* HERO INFO */
        .contact-status-card {
            padding: 22px;
            border: 1px solid rgba(37,99,235,.16);
            border-radius: 24px;
            background: rgba(255,255,255,.86);
            box-shadow: 0 25px 70px rgba(15,23,42,.10);
            backdrop-filter: blur(12px);
        }

        .status-top {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 22px;
        }

        .status-label {
            color: var(--cyan);
            font: 600 10px var(--mono);
            letter-spacing: 1.8px;
        }

        .status-live {
            color: var(--green);
            font: 600 10px var(--mono);
            letter-spacing: 1px;
        }

        .status-icon {
            width: 100px;
            height: 100px;
            margin: 10px auto 22px;
            border-radius: 26px;
            display: grid;
            place-items: center;
            background: linear-gradient(135deg, rgba(37,99,235,.10), rgba(124,58,237,.09));
            color: var(--cyan);
            font-size: 46px;
        }

        .contact-status-card h3 {
            text-align: center;
            margin-bottom: 8px;
        }

        .contact-status-card p {
            color: var(--muted);
            text-align: center;
            font-size: 13px;
            line-height: 1.7;
            margin: 0;
        }

        /* CONTACT SECTION */
        .section {
            padding: 95px 0;
        }

        .contact-section {
            background: #ffffff;
        }

        .section-kicker {
            color: var(--cyan);
            font: 600 10px var(--mono);
            letter-spacing: 2.2px;
            text-transform: uppercase;
        }

        .section-title {
            font-size: clamp(2rem, 4vw, 3.2rem);
            letter-spacing: -1.5px;
        }

        .section-subtitle {
            color: var(--muted);
            max-width: 650px;
            line-height: 1.75;
        }

        .contact-card {
            background: #ffffff;
            border: 1px solid var(--line);
            border-radius: 20px;
            padding: 38px;
            box-shadow: 0 12px 35px rgba(15,23,42,.045);
            height: 100%;
        }

        .contact-card:hover {
            border-color: rgba(37,99,235,.22);
            box-shadow: 0 18px 45px rgba(15,23,42,.08);
        }

        .contact-card h3 {
            font-size: 26px;
            letter-spacing: -.6px;
        }

        .form-label {
            font-size: 10px;
            letter-spacing: 1.4px;
            text-transform: uppercase;
            color: var(--muted);
            font-weight: 700;
            margin-bottom: 8px;
        }

        .form-control {
            background: #f8fafc;
            border: 1px solid var(--line);
            color: var(--text);
            border-radius: 11px;
            padding: 12px 14px;
        }

        .form-control::placeholder {
            color: #98a2b3;
        }

        .form-control:focus {
            background: #ffffff;
            color: var(--text);
            border-color: var(--cyan);
            box-shadow: 0 0 0 4px rgba(37,99,235,.08);
        }

        .btn-send {
            width: 100%;
            border: 0;
            border-radius: 11px;
            padding: 13px;
            background: linear-gradient(135deg, var(--cyan), var(--blue));
            color: #ffffff;
            font-weight: 800;
            font-size: 13px;
            letter-spacing: .3px;
            box-shadow: 0 10px 28px rgba(37,99,235,.13);
        }

        .btn-send:hover {
            color: #ffffff;
            transform: translateY(-2px);
        }

        /* INFO CARDS */
        .info-card {
            background: #ffffff;
            border: 1px solid var(--line);
            border-radius: 18px;
            padding: 24px;
            display: flex;
            align-items: center;
            gap: 18px;
            transition: .25s ease;
        }

        .info-card:hover {
            transform: translateY(-4px);
            border-color: rgba(37,99,235,.24);
            box-shadow: 0 16px 38px rgba(15,23,42,.08);
        }

        .contact-icon {
            width: 58px;
            height: 58px;
            flex-shrink: 0;
            border-radius: 16px;
            background: rgba(37,99,235,.08);
            display: grid;
            place-items: center;
            font-size: 23px;
            color: var(--cyan);
        }

        .info-card:hover .contact-icon {
            background: var(--cyan);
            color: #ffffff;
        }

        .info-card h5 {
            font-size: 16px;
            margin-bottom: 4px;
        }

        .info-card p {
            font-size: 13px;
            color: var(--muted);
        }

        .availability {
            padding: 22px;
            border-radius: 18px;
            border: 1px solid rgba(22,163,74,.16);
            background: rgba(22,163,74,.035);
        }

        .availability-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--green);
            box-shadow: 0 0 12px rgba(22,163,74,.35);
        }

        .availability small {
            color: var(--green);
            font: 600 9px var(--mono);
            letter-spacing: 1.2px;
        }

        .availability p {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.65;
        }

        /* FOOTER */
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

        @media (max-width: 991px) {
            .contact-hero {
                min-height: auto;
                padding: 90px 0 80px;
            }

            .contact-hero h1 {
                letter-spacing: -2.5px;
            }
        }

        @media (max-width: 576px) {
            .contact-hero {
                padding: 75px 0 65px;
            }

            .contact-hero h1 {
                font-size: 3.2rem;
                letter-spacing: -2px;
            }

            .section {
                padding: 70px 0;
            }

            .contact-card {
                padding: 28px 22px;
            }
        }
    </style>
</head>

<body>

<div class="top-line"></div>

<!-- NAVBAR — matched with Home/About -->
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
            <a class="nav-link d-none d-lg-inline" href="/about">About</a>
            <a class="nav-link d-none d-lg-inline active" href="/contact">Contact</a>
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

<!-- SIDEBAR — matched with Home/About -->
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

        <div class="category"><a href="{{ url('/category/Laptops') }}"><i class="bi bi-laptop"></i>Laptops</a></div>
        <div class="category"><a href="{{ url('/category/Phones') }}"><i class="bi bi-phone"></i>Phones</a></div>
        <div class="category"><a href="{{ url('/category/Headphones') }}"><i class="bi bi-headphones"></i>Headphones</a></div>
        <div class="category"><a href="{{ url('/category/Earbuds') }}"><i class="bi bi-earbuds"></i>Earbuds</a></div>
        <div class="category"><a href="{{ url('/category/Smart-Watches') }}"><i class="bi bi-smartwatch"></i>Smart Watches</a></div>
        <div class="category"><a href="{{ url('/category/Monitors') }}"><i class="bi bi-display"></i>Monitors</a></div>
        <div class="category"><a href="{{ url('/category/Keyboards') }}"><i class="bi bi-keyboard"></i>Keyboards</a></div>
        <div class="category"><a href="{{ url('/category/Mouse') }}"><i class="bi bi-mouse2"></i>Mouse</a></div>
        <div class="category"><a href="{{ url('/category/Gaming') }}"><i class="bi bi-controller"></i>Gaming</a></div>
        <div class="category"><a href="{{ url('/category/Cameras') }}"><i class="bi bi-camera"></i>Cameras</a></div>

    </div>
</div>

<!-- HERO -->
<section class="contact-hero">

    <div class="hero-grid"></div>
    <div class="hero-orb"></div>
    <div class="hero-orb-left"></div>

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-7">

                <div class="eyebrow">
                    <span class="dot"></span>
                    SUPPORT / TECHHUB
                </div>

                <h1>
                Let's
                    <span class="gradient">talk</span>
                </h1>

                <p class="hero-copy">
                    Have a question about a product, your order, or TechHub?
                    Send us a message and our team will get back to you.
                </p>

                <div class="hero-actions">

                    <a href="#contactForm" class="btn btn-main">
                        Send a Message
                        <i class="bi bi-arrow-down ms-2"></i>
                    </a>

                    <a href="mailto:support@techhub.com" class="btn btn-outline-tech">
                        Email Support
                    </a>

                </div>

            </div>

            <div class="col-lg-5">

                <div class="contact-status-card">

                    <div class="status-top">
                        <span class="status-label">TH / SUPPORT</span>
                    </div>

                    <div class="status-icon">
                        <i class="bi bi-chat-dots"></i>
                    </div>

                    <h3>We're here to help.</h3>

                    <p>
                        Questions, feedback or product help — reach out and
                        we'll point you in the right direction.
                    </p>

                </div>

            </div>

        </div>

    </div>
</section>

<!-- CONTACT -->
<section class="section contact-section" id="contactForm">

    <div class="container">

        <div class="text-center mb-5">

            <div class="section-kicker">Get In Touch</div>

            <h2 class="section-title mt-2">How can we help?</h2>

            <p class="section-subtitle mx-auto">
                Fill out the form and send us your question. We kept the
                original form fields and POST mechanism intact.
            </p>

        </div>

        <div class="row g-4 align-items-stretch">

            <!-- CONTACT FORM -->
            <div class="col-lg-7">

                <div class="contact-card">

                    <div class="section-kicker">Send A Message</div>

                    <h3 class="mt-2 mb-4">
                        We'll get back to you shortly.
                    </h3>

                    <form action="#" method="POST">

                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                placeholder="Enter your name"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                placeholder="Enter your email"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Subject</label>
                            <input
                                type="text"
                                name="subject"
                                class="form-control"
                                placeholder="What is your message about?"
                                required
                            >
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Message</label>
                            <textarea
                                name="message"
                                class="form-control"
                                rows="5"
                                placeholder="Write your message..."
                                required
                            ></textarea>
                        </div>

                        <button type="submit" class="btn-send">
                            <i class="bi bi-send me-2"></i>
                            Send Message
                        </button>

                    </form>

                </div>

            </div>

            <!-- CONTACT INFORMATION -->
            <div class="col-lg-5">

                <div class="d-flex flex-column gap-3 h-100">

                    <div class="info-card">
                        <div class="contact-icon">
                            <i class="bi bi-envelope"></i>
                        </div>

                        <div>
                            <h5>Email</h5>
                            <p class="mb-0">support@techhub.com</p>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="contact-icon">
                            <i class="bi bi-telephone"></i>
                        </div>

                        <div>
                            <h5>Phone</h5>
                            <p class="mb-0">+91 1234567890</p>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="contact-icon">
                            <i class="bi bi-geo-alt"></i>
                        </div>

                        <div>
                            <h5>Location</h5>
                            <p class="mb-0">India</p>
                        </div>
                    </div>

                    <div class="availability mt-auto">

                        <div class="d-flex align-items-center gap-2 mb-2">
                            <span class="availability-dot"></span>
                            <small>SUPPORT STATUS / AVAILABLE</small>
                        </div>

                        <p class="mb-0">
                            We're ready to help with product questions,
                            shopping assistance and general TechHub enquiries.
                        </p>

                    </div>

                </div>

            </div>

        </div>
    </div>
</section>

<!-- FOOTER -->
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