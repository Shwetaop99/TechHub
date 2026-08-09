<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contact — TechHub</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Space Grotesk + Inter + JetBrains Mono -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        /* =========================================================
           TOKENS — identical to home/about for a consistent brand
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
            margin: 14px 0 22px;
        }

        .rule-ice.center { margin: 14px auto 22px; }

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

        .nav-link {
            color: var(--ivory) !important;
            font-size: 14px;
            letter-spacing: .3px;
            margin-left: 22px;
            position: relative;
            padding-bottom: 3px !important;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            left: 0; bottom: 0;
            width: 0; height: 1px;
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
           CONTACT HERO
        ========================================================= */
        .contact-hero {
            position: relative;
            background: var(--bg);
            padding: 100px 0 90px;
            border-bottom: 1px solid var(--hairline);
            text-align: center;
            overflow: hidden;
        }

        .contact-hero::before {
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

        .contact-hero .container {
            position: relative;
        }

        .contact-hero h1 {
            font-size: clamp(2.4rem, 4.2vw, 3.6rem);
            letter-spacing: -.5px;
        }

        .contact-hero h1 span.hl {
            color: var(--ice);
            text-shadow: 0 0 24px var(--ice-glow);
        }

        .contact-hero .lead {
            color: var(--muted);
            font-size: 17px;
            max-width: 480px;
            margin-left: auto;
            margin-right: auto;
        }

        /* =========================================================
           CONTACT FORM
        ========================================================= */
        .contact-card {
            background: var(--surface);
            border: 1px solid var(--hairline);
            border-radius: 4px;
            padding: 44px;
        }

        .contact-card h3 {
            font-size: 24px;
            margin-bottom: 6px;
        }

        .form-label {
            font-size: 12px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--muted);
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-control {
            background: var(--surface-2);
            border: 1px solid var(--hairline);
            color: var(--ivory);
            border-radius: 4px;
            padding: 12px 14px;
        }

        .form-control::placeholder { color: var(--muted); }

        .form-control:focus {
            background: var(--surface-2);
            color: var(--ivory);
            border-color: var(--ice);
            box-shadow: 0 0 0 3px var(--ice-glow);
        }

        .btn-send {
            width: 100%;
            background: var(--ice);
            border: 1px solid var(--ice);
            color: #0A0A0C;
            font-weight: 600;
            font-size: 14px;
            letter-spacing: .5px;
            padding: 13px;
            border-radius: 4px;
            transition: .25s;
        }

        .btn-send:hover {
            background: var(--ice-light);
            border-color: var(--ice-light);
            transform: translateY(-2px);
        }

        /* =========================================================
           CONTACT INFO
        ========================================================= */
        .info-card {
            background: var(--surface);
            border: 1px solid var(--hairline);
            border-radius: 4px;
            padding: 28px;
            display: flex;
            align-items: center;
            gap: 20px;
            transition: transform .3s ease, border-color .3s ease, box-shadow .3s ease;
        }

        .info-card:hover {
            transform: translateY(-6px);
            border-color: var(--ice-dim);
            box-shadow: 0 20px 40px rgba(0,0,0,0.35);
        }

        .contact-icon {
            width: 56px;
            height: 56px;
            flex-shrink: 0;
            border: 1px solid var(--ice-dim);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            color: var(--ice);
            transition: .3s;
        }

        .info-card:hover .contact-icon {
            background: var(--ice);
            color: #0A0A0C;
            transform: rotate(8deg) scale(1.05);
        }

        .info-card h5 {
            font-size: 15.5px;
            margin-bottom: 2px;
        }

        .info-card p {
            font-size: 13.5px;
            color: var(--muted);
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

        footer .brand-word { font-size: 20px; }
        footer p { font-size: 13.5px; }
        footer small { font-size: 12px; letter-spacing: .3px; color: #5c574d; }

        /* =========================================================
           MOBILE
        ========================================================= */
        @media (max-width: 576px) {
            .contact-hero { padding: 80px 0 60px; }
            .contact-card { padding: 30px 22px; }
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
            <a class="nav-link d-none d-lg-inline" href="/about">About</a>
            <a class="nav-link d-none d-lg-inline active" href="/contact">Contact</a>

            <a href="/cart" class="text-decoration-none">
                <i class="bi bi-bag ms-4 fs-5 navbar-icon"></i>
            </a>

        </div>

    </div>

</nav>


<!-- ================= HERO ================= -->

<section class="contact-hero">

    <div class="container">

        <div class="eyebrow anim-in anim-1"><span class="dot"></span>Get In Touch</div>
        <div class="rule-ice center anim-in anim-1"></div>

        <h1 class="anim-in anim-2">Contact <span class="hl">TechHub</span></h1>

        <p class="lead mt-4 anim-in anim-3">
            Have a question? We'd love to hear from you.
        </p>

    </div>

</section>


<!-- ================= CONTACT ================= -->

<section class="container py-5 my-4">

    <div class="row g-4">

        <!-- CONTACT FORM -->

        <div class="col-lg-7 reveal">

            <div class="contact-card">

                <div class="eyebrow">Send A Message</div>
                <div class="rule-ice"></div>

                <h3 class="fw-bold mb-4">We'll get back to you shortly</h3>

                <form action="#" method="POST">

                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Subject</label>
                        <input type="text" name="subject" class="form-control" placeholder="What is your message about?" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Message</label>
                        <textarea name="message" class="form-control" rows="5" placeholder="Write your message..." required></textarea>
                    </div>

                    <button type="submit" class="btn-send">
                        <i class="bi bi-send me-2"></i>Send Message
                    </button>

                </form>

            </div>

        </div>


        <!-- CONTACT INFORMATION -->

        <div class="col-lg-5">

            <div class="row g-4 stagger">

                <div class="col-12">
                    <div class="info-card reveal">
                        <div class="contact-icon"><i class="bi bi-envelope"></i></div>
                        <div>
                            <h5 class="fw-bold">Email</h5>
                            <p class="mb-0">support@techhub.com</p>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="info-card reveal">
                        <div class="contact-icon"><i class="bi bi-telephone"></i></div>
                        <div>
                            <h5 class="fw-bold">Phone</h5>
                            <p class="mb-0">+91 1234567890</p>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="info-card reveal">
                        <div class="contact-icon"><i class="bi bi-geo-alt"></i></div>
                        <div>
                            <h5 class="fw-bold">Location</h5>
                            <p class="mb-0">India</p>
                        </div>
                    </div>
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

        <small>© {{ date('Y') }} TechHub — ALL RIGHTS RESERVED</small>

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