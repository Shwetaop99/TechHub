<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>About — TechHub</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Space Grotesk (display) + Inter (body) + JetBrains Mono (data/specs) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        /* =========================================================
           TOKENS — identical to home page for a consistent brand
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

        .reveal {
            opacity: 0;
            transform: translateY(28px);
            transition: opacity .7s ease, transform .7s ease;
            transition-delay: calc(var(--i, 0) * 90ms);
        }

        .reveal.in-view {
            opacity: 1;
            transform: translateY(0);
        }

        @media (prefers-reduced-motion: reduce) {
            .anim-in, .reveal { animation: none !important; transition: none !important; opacity: 1 !important; transform: none !important; }
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

        .nav-link.active { color: var(--ice-light) !important; }
        .nav-link.active::after { width: 100%; }
        .nav-link:hover { color: var(--ice-light) !important; }
        .nav-link:hover::after { width: 100%; }

        .navbar-icon {
            color: var(--ivory);
            transition: all .25s ease;
        }

        .navbar-icon:hover {
            color: var(--ice) !important;
            transform: translateY(-2px);
        }

        /* =========================================================
           ABOUT HERO
        ========================================================= */
        .about-hero {
            position: relative;
            background: var(--bg);
            padding: 100px 0 90px;
            border-bottom: 1px solid var(--hairline);
            text-align: center;
            overflow: hidden;
        }

        .about-hero::before {
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

        .about-hero .container { position: relative; }

        .about-hero h1 {
            font-size: clamp(2.4rem, 4.2vw, 3.6rem);
            letter-spacing: -.6px;
        }

        .about-hero h1 span.hl {
            color: var(--ice);
            text-shadow: 0 0 24px var(--ice-glow);
        }

        .about-hero .lead {
            color: var(--muted);
            font-size: 17px;
            max-width: 520px;
            margin-left: auto;
            margin-right: auto;
        }

        /* =========================================================
           CONTENT
        ========================================================= */
        .content-icons {
            display: flex;
            justify-content: center;
            gap: 22px;
        }

        .content-icon-circle {
            width: 84px;
            height: 84px;
            border: 1px solid var(--ice-dim);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            color: var(--ice);
            transition: .3s;
        }

        .content-icon-circle:hover {
            background: var(--ice);
            color: #0A0C10;
            box-shadow: 0 0 20px var(--ice-glow);
            transform: translateY(-6px);
        }

        .content-icon-circle:nth-child(2) { margin-top: 18px; }

        section.content p.lead {
            color: var(--ivory);
            font-size: 18px;
            font-weight: 400;
        }

        section.content p.text-muted {
            color: var(--muted) !important;
            font-size: 15px;
        }

        /* =========================================================
           FEATURES
        ========================================================= */
        .section-heading {
            text-align: center;
            margin-bottom: 52px;
        }

        #features { background: var(--surface-2); border-top: 1px solid var(--hairline); border-bottom: 1px solid var(--hairline); }

        .about-card {
            background: var(--surface);
            border: 1px solid var(--hairline);
            border-radius: 4px;
            padding: 40px 26px;
            text-align: center;
            height: 100%;
            transition: transform .3s ease, border-color .3s ease, box-shadow .3s ease;
        }

        .about-card:hover {
            transform: translateY(-8px);
            border-color: var(--ice-dim);
            box-shadow: 0 20px 40px rgba(0,0,0,0.4);
        }

        .icon-box {
            width: 64px;
            height: 64px;
            margin: 0 auto 20px;
            border: 1px solid var(--ice-dim);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            color: var(--ice);
            transition: .3s;
        }

        .about-card:hover .icon-box {
            background: var(--ice);
            color: #0A0C10;
            box-shadow: 0 0 20px var(--ice-glow);
        }

        .about-card h4 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .about-card p {
            color: var(--muted);
            font-size: 14.5px;
            margin: 0;
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
            .about-hero { padding: 80px 0 60px; }
            .content-icons { gap: 14px; }
            .content-icon-circle { width: 64px; height: 64px; font-size: 24px; }
        }

    </style>

</head>

<body>

<!-- ================= NAVBAR ================= -->

<nav class="navbar navbar-expand-lg">

    <div class="container">

        <a class="brand-mark" href="/">
            <span class="brand-monogram">TH</span>
            <span class="brand-word">TechHub</span>
        </a>

        <div class="ms-auto d-flex align-items-center">

            <a class="nav-link d-none d-lg-inline" href="/">Home</a>
            <a class="nav-link d-none d-lg-inline active" href="/about">About</a>
            <a class="nav-link d-none d-lg-inline" href="/contact">Contact</a>

            <a href="/cart" class="text-decoration-none">
                <i class="bi bi-bag ms-4 fs-5 navbar-icon"></i>
            </a>

        </div>

    </div>

</nav>


<!-- ================= ABOUT HERO ================= -->

<section class="about-hero">

    <div class="container">

        <div class="eyebrow anim-in anim-1"><span class="dot"></span>Our Story</div>
        <div class="rule-ice center anim-in anim-1"></div>

        <h1 class="anim-in anim-2">About <span class="hl">TechHub</span></h1>

        <p class="lead mt-4 anim-in anim-3">
            Your destination for modern technology and smart gadgets —
            curated for performance, not just catalogued.
        </p>

    </div>

</section>


<!-- ================= ABOUT CONTENT ================= -->

<section class="container py-5 my-4 content">

    <div class="row align-items-center g-5">

        <div class="col-lg-6 reveal">

            <div class="eyebrow"><span class="dot"></span>What Is TechHub?</div>
            <div class="rule-ice"></div>

            <h2 class="mb-4">A modern shopping platform, engineered properly</h2>

            <p class="lead">
                TechHub brings the latest gadgets together in one place,
                designed to make discovery simple and enjoyable.
            </p>

            <p class="text-muted">
                From powerful laptops and smartphones to headphones,
                gaming accessories, smart watches and cameras, every
                category lives under one roof — organised, not overwhelming.
            </p>

            <p class="text-muted">
                Our goal is a shopping experience that feels as considered
                as the products themselves: clean, fast and easy to use.
            </p>

        </div>

        <div class="col-lg-6 text-center reveal">

            <div class="content-icons">
                <div class="content-icon-circle"><i class="bi bi-laptop"></i></div>
                <div class="content-icon-circle"><i class="bi bi-phone"></i></div>
                <div class="content-icon-circle"><i class="bi bi-headphones"></i></div>
            </div>

            <h4 class="mt-4">Technology, Made life Simple</h4>

        </div>

    </div>

</section>


<!-- ================= FEATURES ================= -->

<section class="py-5" id="features">

    <div class="container py-4">

        <div class="section-heading reveal">
            <div class="eyebrow" style="display:inline-flex"><span class="dot"></span>The Difference</div>
            <div class="rule-ice center"></div>
            <h2>Why Choose TechHub?</h2>
        </div>

        <div class="row g-4 stagger">

            <div class="col-md-4">
                <div class="about-card reveal">
                    <div class="icon-box"><i class="bi bi-bag-heart"></i></div>
                    <h4>Wide Selection</h4>
                    <p>Explore laptops, phones, headphones, gaming products and other modern gadgets.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="about-card reveal">
                    <div class="icon-box"><i class="bi bi-lightning-charge"></i></div>
                    <h4>Easy Shopping</h4>
                    <p>Find your favorite technology products through simple categories and an easy-to-use interface.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="about-card reveal">
                    <div class="icon-box"><i class="bi bi-shield-check"></i></div>
                    <h4>Reliable Experience</h4>
                    <p>Built with a clean and responsive design to provide a smooth experience across every device.</p>
                </div>
            </div>

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

        <p class="mb-3">Your destination for modern technology.</p>

        <small>© 2026 TECHHUB — ALL RIGHTS RESERVED</small>

    </div>

</footer>


<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

<script>

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