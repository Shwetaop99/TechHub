<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TechHub — Future of Technology</title>
    <link
    rel="icon"
    type="image/png"
    href="{{ asset('css/techhub_TH_favicon.png') }}"
>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        .low-stock-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;

    background: #fee2e2;
    color: #dc2626;

    border: 1px solid #fecaca;

    padding: 6px 10px;

    border-radius: 999px;

    font-size: 11px;
    font-weight: 700;

    margin-bottom: 10px;

    animation: lowStockPulse 1.8s ease-in-out infinite;
}

.low-stock-badge i {
    font-size: 11px;
}

@keyframes lowStockPulse {
    0%, 100% {
        opacity: 1;
    }

    50% {
        opacity: .65;
    }
}


.out-stock-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;

    background: #f3f4f6;
    color: #6b7280;

    border: 1px solid #d1d5db;

    padding: 6px 10px;

    border-radius: 999px;

    font-size: 11px;
    font-weight: 700;

    margin-bottom: 10px;
}



        .admin-btn {
    display: inline-flex;
    align-items: center;
    gap: 7px;

    padding: 9px 16px;

    border: 1px solid #dbe3f0;
    border-radius: 10px;

    background: #ffffff;
    color: #222;

    text-decoration: none;
    font-weight: 600;

    transition: all 0.2s ease;
}

.admin-btn:hover {
    background: #2563eb;
    border-color: #2563eb;
    color: white;
    transform: translateY(-1px);
}


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
            --danger: #dc2626;
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

        /* NAVBAR */
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

        .nav-link:hover { color: var(--cyan) !important; }

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
            background: var(--panel);
            color: #344054;
            border-radius: 10px;
        }

        .menu-btn:hover { color: var(--cyan); border-color: rgba(37,99,235,.35); }

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
            border-color: rgba(39,229,255,.45);
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

        /* WELCOME */
        .welcome-toast {
            position: fixed;
            right: 22px;
            top: 82px;
            z-index: 2000;
            min-width: 290px;
            max-width: calc(100% - 30px);
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 14px;
            border: 1px solid rgba(39,229,255,.22);
            border-radius: 15px;
            background: rgba(255,255,255,.96);
            backdrop-filter: blur(16px);
            box-shadow: 0 16px 40px rgba(15,23,42,.12);
        }

        .welcome-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            color: var(--cyan);
            background: rgba(39,229,255,.1);
        }

        .welcome-small {
            color: var(--cyan);
            font: 600 9px var(--mono);
            letter-spacing: 1.8px;
        }

        .welcome-name { font: 600 15px var(--display); margin-top: 2px; }

        .welcome-close {
            margin-left: auto;
            border: 0;
            background: transparent;
            color: #667085;
            font-size: 20px;
        }

        .welcome-close:hover { color: var(--text); }

        /* SIDEBAR */
        .offcanvas {
            width: 310px !important;
            background:
                radial-gradient(circle at top left, rgba(39,229,255,.08), transparent 35%),
                #080b12;
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
        .hero {
            position: relative;
            min-height: 650px;
            display: flex;
            align-items: center;
            overflow: hidden;
            border-bottom: 1px solid var(--line);
        }

        .hero-grid {
            position: absolute;
            inset: 0;
            opacity: .24;
            background-image:
                linear-gradient(rgba(15,23,42,.055) 1px, transparent 1px),
                linear-gradient(90deg, rgba(15,23,42,.055) 1px, transparent 1px);
            background-size: 58px 58px;
            mask-image: linear-gradient(to bottom, black, transparent);
        }

        .orb {
            position: absolute;
            width: 520px;
            height: 520px;
            right: -130px;
            top: -130px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(39,229,255,.17), rgba(77,107,255,.08) 38%, transparent 68%);
            filter: blur(10px);
        }

        .hero .container { position: relative; z-index: 2; }

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
            box-shadow: 0 0 14px var(--cyan);
        }

        .hero h1 {
            max-width: 720px;
            margin: 20px 0 18px;
            font-size: clamp(3rem, 7vw, 6.4rem);
            line-height: .92;
            letter-spacing: -4px;
        }

        .hero h1 .gradient {
            background: linear-gradient(90deg, var(--cyan), #7691ff 45%, var(--purple));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .hero-copy {
            max-width: 560px;
            color: var(--muted);
            font-size: 16px;
            line-height: 1.75;
        }

        .hero-actions { display: flex; gap: 12px; flex-wrap: wrap; margin-top: 30px; }

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

        .btn-main:hover { transform: translateY(-2px); color: #ffffff; }

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

        .hero-stats {
            display: flex;
            gap: 28px;
            margin-top: 42px;
            flex-wrap: wrap;
        }

        .hero-stat strong {
            display: block;
            font: 700 20px var(--display);
        }

        .hero-stat span {
            color: #667085;
            font: 9px var(--mono);
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .hero-product {
            position: relative;
            padding: 14px;
            border: 1px solid rgba(39,229,255,.2);
            border-radius: 24px;
            background: linear-gradient(145deg, #ffffff, #f7f9fc);
            box-shadow: 0 25px 70px rgba(15,23,42,.12);
        }

        .hero-product::before {
            content: "FEATURED // 01";
            position: absolute;
            top: -10px;
            right: 22px;
            padding: 5px 9px;
            border: 1px solid rgba(39,229,255,.25);
            border-radius: 7px;
            background: var(--bg);
            color: var(--cyan);
            font: 9px var(--mono);
            letter-spacing: 1.2px;
        }

        .hero-product img {
            width: 100%;
            max-height: 430px;
            object-fit: cover;
            border-radius: 15px;
        }

        .hero-product-label {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            padding: 14px 4px 2px;
            color: #475467;
            font: 10px var(--mono);
            letter-spacing: 1px;
        }

        .hero-product-label span:last-child { color: var(--green); }

        /* SECTION */
        .section {
            padding: 90px 0;
            border-bottom: 1px solid var(--line);
        }

        .section-kicker {
            color: var(--cyan);
            font: 600 10px var(--mono);
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .section-title {
            margin-top: 8px;
            font-size: clamp(2rem, 4vw, 3rem);
            letter-spacing: -1.5px;
        }

        .section-subtitle {
            color: var(--muted);
            max-width: 520px;
            margin: 10px auto 0;
            font-size: 14px;
            line-height: 1.7;
        }

        /* CATEGORY CARDS */
        .category-card {
            height: 100%;
            padding: 26px;
            border: 1px solid var(--line);
            border-radius: 18px;
            background: linear-gradient(145deg, rgba(255,255,255,.045), rgba(255,255,255,.015));
            transition: .25s ease;
            position: relative;
            overflow: hidden;
        }

        .category-card::after {
            content: "";
            position: absolute;
            width: 100px;
            height: 100px;
            right: -50px;
            bottom: -50px;
            border-radius: 50%;
            background: rgba(37,99,235,.07);
        }

        .category-card:hover {
            transform: translateY(-6px);
            border-color: rgba(37,99,235,.30);
            box-shadow: 0 18px 45px rgba(15,23,42,.09);
        }

        .category-icon {
            width: 52px;
            height: 52px;
            border-radius: 15px;
            display: grid;
            place-items: center;
            color: var(--cyan);
            background: rgba(37,99,235,.07);
            border: 1px solid rgba(39,229,255,.13);
            font-size: 22px;
            margin-bottom: 25px;
        }

        .category-card h5 { font-size: 16px; margin-bottom: 5px; }
        .category-card p {
            margin: 0;
            color: #667085;
            font: 9px var(--mono);
            letter-spacing: 1.1px;
        }

        .category-link { text-decoration: none; }

        /* PRODUCTS */
        #products {
            background:
                radial-gradient(circle at 10% 20%, rgba(39,229,255,.035), transparent 25%),
                radial-gradient(circle at 90% 70%, rgba(155,92,255,.04), transparent 25%);
        }

        .product-card {
            position: relative;
            height: 100%;
            overflow: hidden;
            border: 1px solid var(--line);
            border-radius: 18px;
            background: linear-gradient(145deg, #ffffff, #f8fafc);
            transition: .25s ease;
        }

        .product-card:hover {
            transform: translateY(-6px);
            border-color: rgba(37,99,235,.28);
            box-shadow: 0 18px 45px rgba(15,23,42,.10);
        }

        .product-image-wrap {
            position: relative;
            height: 240px;
            overflow: hidden;
            background: #f8fafc;
        }

        .product-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .4s ease;
        }

        .product-card:hover img { transform: scale(1.05); }

        .product-image-wrap::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(7,9,15,.45), transparent 45%);
            pointer-events: none;
        }

        .badge-cat {
            display: inline-flex;
            align-items: center;
            padding: 6px 9px;
            border-radius: 8px;
            background: rgba(37,99,235,.07);
            border: 1px solid rgba(39,229,255,.17);
            color: var(--cyan);
            font: 9px var(--mono);
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .product-card .card-body { padding: 18px; }

        .product-card h5 {
            font-size: 17px;
            line-height: 1.25;
            margin: 12px 0 16px;
        }

        .product-details-link {
            display: block;
            text-decoration: none;
        }

        .product-details-link:hover h5 { color: var(--cyan); }

        .product-meta {
            display: flex;
            justify-content: space-between;
            align-items: end;
            gap: 10px;
            margin-bottom: 17px;
        }

        .product-price {
            margin: 0;
            font: 700 20px var(--display);
        }

        .product-sold {
            margin: 0;
            color: #667085;
            font: 9px var(--mono);
            letter-spacing: .7px;
            text-transform: uppercase;
        }

        .btn-add-cart {
            width: 100%;
            padding: 11px;
            border: 1px solid rgba(39,229,255,.28);
            border-radius: 10px;
            background: rgba(37,99,235,.06);
            color: var(--cyan);
            font-size: 12px;
            font-weight: 700;
        }

        .btn-add-cart:hover {
            background: var(--cyan);
            color: #ffffff;
        }

        /* FOOTER */
        footer {
            padding: 55px 0 28px;
            background: #f8fafc;
            border-top: 1px solid var(--line);
        }

        footer .brand-word { font-size: 19px; }
        footer p { color: #667085; font-size: 13px; }
        footer small { color: #98a2b3; font: 9px var(--mono); letter-spacing: 1px; }

        /* RESPONSIVE */
        @media (max-width: 991px) {
            .hero { padding: 80px 0; }
            .hero h1 { letter-spacing: -2.5px; }
        }

        @media (max-width: 576px) {
            .navbar { padding: 11px 0; }
            .brand-word { font-size: 19px; }
            .brand-monogram { width: 38px; height: 38px; }
            .hero { min-height: auto; padding: 75px 0 65px; }
            .hero h1 { font-size: 3.3rem; }
            .hero-stats { gap: 18px; }
            .section { padding: 65px 0; }
            .product-image-wrap { height: 210px; }
            .welcome-toast { right: 15px; top: 70px; }
        }

        /* WHITE THEME POLISH */
        .hero {
            background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
        }

        .hero-product {
            background: #ffffff;
            border-color: rgba(15,23,42,.10);
        }

        .product-card,
        .category-card {
            box-shadow: 0 8px 28px rgba(15,23,42,.045);
        }

        .product-card:hover,
        .category-card:hover {
            box-shadow: 0 18px 45px rgba(15,23,42,.10);
        }

        .btn-main {
            color: #ffffff;
        }

        .btn-main:hover {
            color: #ffffff;
        }

        .hero-product-label span:last-child {
            color: #16a34a;
        }

        .top-line {
            background: linear-gradient(90deg, #2563eb, #4f46e5, #7c3aed, #2563eb);
        }


        /* THEME TOGGLE — ONLY ADDITION */
        .theme-toggle {
            border: 1px solid var(--line);
            width: 38px;
            height: 38px;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #475467;
            background: #ffffff;
            margin-left: 2px;
            cursor: pointer;
            transition: .2s ease;
        }

        .theme-toggle:hover {
            color: var(--cyan);
            border-color: rgba(37,99,235,.35);
        }

        .theme-toggle .sun-icon {
            display: none;
        }

        /* THEME TOGGLE — ONLY ADDITION */
        .theme-toggle {
            border: 1px solid var(--line);
            width: 38px;
            height: 38px;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #475467;
            background: #ffffff;
            margin-left: 2px;
            cursor: pointer;
            transition: .2s ease;
        }

        .theme-toggle:hover {
            color: var(--cyan);
            border-color: rgba(37,99,235,.35);
        }

        /* DARK MODE — applies to the whole Home page */
        body.dark-mode {
            --bg: #080b12;
            --panel: #10151f;
            --panel-2: #151b26;
            --card: #10151f;
            --line: rgba(255,255,255,.10);
            --text: #f5f7fb;
            --muted: #a4adbd;
        }

        body.dark-mode .navbar {
            background: rgba(8,11,18,.92);
            border-color: var(--line);
        }

        body.dark-mode .nav-link {
            color: #c7ceda !important;
        }

        body.dark-mode .nav-link:hover {
            color: var(--cyan) !important;
        }

        body.dark-mode .menu-btn,
        body.dark-mode .nav-icon,
        body.dark-mode .theme-toggle {
            background: #10151f;
            color: #e9edf5;
            border-color: var(--line);
        }

        body.dark-mode .btn-signup {
            background: rgba(37,99,235,.12);
            color: #6fa0ff;
            border-color: rgba(37,99,235,.35);
        }

        body.dark-mode .search-box {
            background: rgba(8,11,18,.97);
            border-color: var(--line);
        }

        body.dark-mode .search-box input {
            background: #151b26;
            color: #f5f7fb;
            border-color: var(--line);
        }

        body.dark-mode .search-box input::placeholder {
            color: #8d97a8;
        }

        body.dark-mode .welcome-toast {
            background: rgba(16,21,31,.97);
            color: #f5f7fb;
            border-color: rgba(39,229,255,.22);
        }

        body.dark-mode .welcome-name,
        body.dark-mode .welcome-close {
            color: #f5f7fb;
        }

        body.dark-mode .offcanvas {
            background:
                radial-gradient(circle at top left, rgba(39,229,255,.08), transparent 35%),
                #080b12;
            color: #f5f7fb;
        }

        body.dark-mode .offcanvas-header {
            border-color: var(--line);
        }

        body.dark-mode .category a {
            color: #c7ceda;
        }

        body.dark-mode .category:hover a {
            color: #ffffff;
        }

        body.dark-mode .hero {
            background:
                radial-gradient(circle at 15% 10%, rgba(39,229,255,.07), transparent 28%),
                radial-gradient(circle at 85% 25%, rgba(155,92,255,.08), transparent 30%),
                linear-gradient(180deg, #080b12 0%, #10151f 100%);
            border-color: var(--line);
        }

        body.dark-mode .hero-grid {
            background-image:
                linear-gradient(rgba(255,255,255,.045) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,.045) 1px, transparent 1px);
        }

        body.dark-mode .hero-copy,
        body.dark-mode .hero-stat span {
            color: #a4adbd;
        }

        body.dark-mode .hero-product {
            background: linear-gradient(145deg, #151b26, #0f141d);
            border-color: rgba(39,229,255,.20);
            box-shadow: 0 25px 70px rgba(0,0,0,.35);
        }

        body.dark-mode .hero-product::before {
            background: #10151f;
        }

        body.dark-mode .hero-product-label {
            color: #c7ceda;
        }

        body.dark-mode .section {
            border-color: var(--line);
        }

        body.dark-mode .section-subtitle,
        body.dark-mode .category-card p,
        body.dark-mode .product-sold,
        body.dark-mode footer p {
            color: #a4adbd;
        }

        body.dark-mode .category-card {
            background: linear-gradient(145deg, #151b26, #10151f);
            border-color: var(--line);
            box-shadow: 0 8px 28px rgba(0,0,0,.20);
        }

        body.dark-mode .category-card:hover {
            border-color: rgba(37,99,235,.40);
            box-shadow: 0 18px 45px rgba(0,0,0,.30);
        }

        body.dark-mode .category-card h5 {
            color: #f5f7fb;
        }

        body.dark-mode #products {
            background:
                radial-gradient(circle at 10% 20%, rgba(39,229,255,.035), transparent 25%),
                radial-gradient(circle at 90% 70%, rgba(155,92,255,.05), transparent 25%),
                #0d121a;
        }

        body.dark-mode .product-card {
            background: linear-gradient(145deg, #151b26, #10151f);
            border-color: var(--line);
            box-shadow: 0 8px 28px rgba(0,0,0,.20);
        }

        body.dark-mode .product-card:hover {
            border-color: rgba(37,99,235,.38);
            box-shadow: 0 18px 45px rgba(0,0,0,.30);
        }

        body.dark-mode .product-image-wrap {
            background: #0d121a;
        }

        body.dark-mode .product-card h5,
        body.dark-mode .product-price {
            color: #f5f7fb;
        }

        body.dark-mode .btn-outline-tech {
            background: #10151f;
            color: #e9edf5;
            border-color: var(--line);
        }

        body.dark-mode .btn-outline-tech:hover {
            color: var(--cyan);
            border-color: rgba(37,99,235,.40);
        }

        body.dark-mode .btn-add-cart {
            background: rgba(37,99,235,.12);
            color: #6fa0ff;
            border-color: rgba(37,99,235,.30);
        }

        body.dark-mode .btn-add-cart:hover {
            background: var(--cyan);
            color: #ffffff;
        }

        body.dark-mode footer {
            background: #0d121a;
            border-color: var(--line);
        }

        body.dark-mode footer small {
            color: #7f8999;
        }

        /* Theme icon */
        .theme-toggle .sun-icon {
            display: none;
        }

        body.dark-mode .theme-toggle .moon-icon {
            display: none;
        }

        body.dark-mode .theme-toggle .sun-icon {
            display: inline;
        }

        /* =========================================================
   ORDER NOTIFICATION
========================================================= */

.order-notification-container {
    position: fixed;

    top: 82px;
    right: 22px;

    width: 360px;
    max-width: calc(100% - 30px);

    z-index: 9999;

    display: flex;
    flex-direction: column;

    gap: 12px;

    pointer-events: none;
}


.order-notification {
    pointer-events: auto;

    display: flex;
    align-items: flex-start;

    gap: 13px;

    padding: 16px;

    border-radius: 16px;

    background: rgba(255,255,255,.97);

    border: 1px solid rgba(37,99,235,.18);

    box-shadow:
        0 20px 50px rgba(15,23,42,.18);

    backdrop-filter: blur(18px);

    animation:
        notificationSlideIn .4s ease forwards;
}


.order-notification-icon {
    width: 44px;
    height: 44px;

    flex: 0 0 44px;

    display: grid;
    place-items: center;

    border-radius: 13px;

    background:
        linear-gradient(
            135deg,
            #2563eb,
            #4f46e5
        );

    color: white;

    font-size: 20px;
}


.order-notification-content {
    flex: 1;
}


.order-notification-label {
    color: #2563eb;

    font: 700 9px var(--mono);

    letter-spacing: 1.5px;

    text-transform: uppercase;

    margin-bottom: 3px;
}


.order-notification-title {
    font: 700 15px var(--display);

    color: #111827;

    margin-bottom: 4px;
}


.order-notification-message {
    color: #667085;

    font-size: 12px;

    line-height: 1.5;
}


.order-notification-close {
    border: 0;

    background: transparent;

    color: #98a2b3;

    font-size: 19px;

    cursor: pointer;

    line-height: 1;
}


.order-notification-close:hover {
    color: #111827;
}


@keyframes notificationSlideIn {

    from {
        opacity: 0;

        transform:
            translateX(40px)
            scale(.96);
    }

    to {
        opacity: 1;

        transform:
            translateX(0)
            scale(1);
    }

}


@keyframes notificationSlideOut {

    from {
        opacity: 1;

        transform: translateX(0);
    }

    to {
        opacity: 0;

        transform: translateX(40px);
    }

}


/* DARK MODE */

body.dark-mode .order-notification {

    background:
        rgba(16,21,31,.97);

    border-color:
        rgba(37,99,235,.30);
}


body.dark-mode .order-notification-title {

    color: #f5f7fb;
}


body.dark-mode .order-notification-message {

    color: #a4adbd;
}


body.dark-mode .order-notification-close {

    color: #8d97a8;
}


@media (max-width: 576px) {

    .order-notification-container {

        top: 70px;

        right: 15px;

        width: calc(100% - 30px);
    }

}

    </style>
</head>

<body>

<div class="top-line"></div>
<!-- ORDER NOTIFICATION POPUP -->

<div
    id="orderNotificationContainer"
    class="order-notification-container"
></div>

@if(session('welcome'))
    <div class="welcome-toast" id="welcomeToast">
        <div class="welcome-icon">
            <i class="bi bi-stars"></i>
        </div>
        <div>
            <div class="welcome-small">WELCOME TO TECHHUB</div>
            <div class="welcome-name">{{ session('welcome') }}</div>
        </div>
        <button class="welcome-close" onclick="closeWelcome()">×</button>
    </div>
@endif

<!-- SEARCH -->


<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg">
    <div class="container">

        <button
            class="btn menu-btn"
            type="button"
            data-bs-toggle="offcanvas"
            data-bs-target="#menu"
            aria-label="Open menu"
        >
            <i class="bi bi-grid-3x3-gap fs-5"></i>
        </button>

        <a class="brand-mark ms-3" href="/">
            <span class="brand-monogram">TH</span>
            <span class="brand-word">Tech<span>Hub</span></span>
        </a>

        <div class="ms-auto d-flex align-items-center gap-2">

            <a class="nav-link d-none d-lg-inline" href="/">Home</a>
            <a class="nav-link d-none d-lg-inline" href="/about">About</a>
            <a class="nav-link d-none d-lg-inline" href="/contact">Contact</a>
            <a class="nav-link d-none d-lg-inline" href="/login">Login</a>

            <a href="/signup" class="btn btn-signup ms-lg-2 d-none d-sm-inline-block">
                Sign Up
            </a>

            <!-- ADMIN -->
            <a
                href="{{ url('/admin/login') }}"
                class="admin-btn"
                aria-label="Admin login"
            >
                <i class="bi bi-shield-lock"></i>
                Admin
            </a>
            <a
    class="nav-link d-none d-lg-inline"
    href="{{ url('/my-orders') }}"
>
    <i class="bi bi-box-seam me-1"></i>
    My Orders
</a>

            <!-- SEARCH -->
            <button
                type="button"
                class="btn nav-icon ms-1"
                id="searchToggle"
                aria-label="Search"
                title="Search"
            >
                <i class="bi bi-search"></i>
            </button>

            <!-- THEME TOGGLE -->
            <button
                type="button"
                class="theme-toggle"
                id="themeToggle"
                aria-label="Switch to dark mode"
                title="Switch to dark mode"
            >
                <i class="bi bi-moon-fill moon-icon"></i>
                <i class="bi bi-sun-fill sun-icon"></i>
            </button>

            <!-- CART -->
            <a
                href="/cart"
                class="text-decoration-none nav-icon"
                aria-label="Cart"
                title="Cart"
            >
                <i class="bi bi-bag"></i>
            </a>

        </div>
    </div>
</nav>

<!-- SEARCH BOX -->
<div id="searchBox" class="search-box">
    <form action="/" method="GET" class="container">
        <div class="input-group">
            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Search laptops, phones, headphones..."
                value="{{ request('search') }}"
                autocomplete="off"
            >

            <button type="submit" class="btn">
                <i class="bi bi-search me-1"></i>
                Search
            </button>
        </div>
    </form>
</div>

<!-- SIDEBAR -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="menu">

    <div class="offcanvas-header">
        <div>
            <small>TECHHUB / EXPLORE</small>
            <h4 class="mt-1">Categories</h4>
        </div>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
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

        <div class="category">
            <a href="{{ url('/category/AI-Smart-Devices') }}"><i class="bi bi-robot"></i>AI & Smart Devices</a>
        </div>

    </div>
</div>

<!-- HERO -->
<section class="hero">

    <div class="hero-grid"></div>
    <div class="orb"></div>

    <div class="container">
        <div class="row align-items-center g-5">

            <div class="col-lg-7">

                <div class="eyebrow">
                    <span class="dot"></span>
                    CURATED TECHNOLOGY / 2026
                </div>

                <h1>
                    Your Next Tech
                    <span class="gradient">Starts Here.</span>
                </h1>

                <p class="hero-copy">
                    Discover powerful laptops, phones, gaming gear, audio,
                    displays and accessories — selected for people who expect
                    more from their technology.
                </p>

                <div class="hero-actions">
                    <a href="#products" class="btn btn-main">
                        Explore Products <i class="bi bi-arrow-right ms-2"></i>
                    </a>

                    <a href="/about" class="btn btn-outline-tech">
                        Discover TechHub
                    </a>
                </div>

                <div class="hero-stats">
                    <div class="hero-stat">
                        <strong>10+</strong>
                        <span>Categories</span>
                    </div>
                    <div class="hero-stat">
                        <strong>Premium</strong>
                        <span>Selection</span>
                    </div>
                    <div class="hero-stat">
                        <strong>Secure</strong>
                        <span>Shopping</span>
                    </div>
                </div>

            </div>

            <div class="col-lg-5 mt-4 mt-lg-0">

                <div class="hero-product">
                    <img
                        src="{{ asset('https://imgs.search.brave.com/yBhc7SpvTAn33WE_NtF9MoZAMvGaazNNAPekN5AUFL8/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9jZHNh/c3NldHMuYXBwbGUu/Y29tL2xpdmUvN1dV/QVMzNTAvaW1hZ2Vz/L3RlY2gtc3BlY3Mv/aXBob25lLTE3LWhl/cm8ucG5n') }}"
                        alt="Featured Technology"
                        referrerpolicy="no-referrer"
                    >

                    <div class="hero-product-label">
                        <span>TH / FEATURED DEVICE</span>
                        <span>● AVAILABLE</span>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

<!-- CATEGORIES -->
<section class="section">

    <div class="container">

        <div class="text-center mb-5">
            <div class="section-kicker">Explore the ecosystem</div>

            <h2 class="section-title">
                Find your next upgrade.
            </h2>

            <p class="section-subtitle">
                Browse TechHub by category and jump straight into the gear
                you're looking for.
            </p>
        </div>


        <div class="row g-3" id="categoryGrid">

            <!-- Laptops -->
            <div class="col-6 col-lg-3">
                <a href="{{ url('/category/Laptops') }}" class="category-link">
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="bi bi-laptop"></i>
                        </div>

                        <h5>Laptops</h5>
                        <p>POWER / PRODUCTIVITY</p>
                    </div>
                </a>
            </div>


            <!-- Phones -->
            <div class="col-6 col-lg-3">
                <a href="{{ url('/category/Phones') }}" class="category-link">
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="bi bi-phone"></i>
                        </div>

                        <h5>Phones</h5>
                        <p>MOBILE / PERFORMANCE</p>
                    </div>
                </a>
            </div>


            <!-- Headphones -->
            <div class="col-6 col-lg-3">
                <a href="{{ url('/category/Headphones') }}" class="category-link">
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="bi bi-headphones"></i>
                        </div>

                        <h5>Headphones</h5>
                        <p>AUDIO / IMMERSION</p>
                    </div>
                </a>
            </div>


            <!-- Earbuds -->
            <div class="col-6 col-lg-3">
                <a href="{{ url('/category/Earbuds') }}" class="category-link">
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="bi bi-earbuds"></i>
                        </div>

                        <h5>Earbuds</h5>
                        <p>WIRELESS / DAILY</p>
                    </div>
                </a>
            </div>


            <!-- Smart Watches -->
            <div class="col-6 col-lg-3">
                <a href="{{ url('/category/Smart-Watches') }}" class="category-link">
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="bi bi-smartwatch"></i>
                        </div>

                        <h5>Smart Watches</h5>
                        <p>WEARABLE / SMART</p>
                    </div>
                </a>
            </div>


            <!-- Monitors -->
            <div class="col-6 col-lg-3">
                <a href="{{ url('/category/Monitors') }}" class="category-link">
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="bi bi-display"></i>
                        </div>

                        <h5>Monitors</h5>
                        <p>DISPLAY / DETAIL</p>
                    </div>
                </a>
            </div>


            <!-- Keyboards -->
            <div class="col-6 col-lg-3">
                <a href="{{ url('/category/Keyboards') }}" class="category-link">
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="bi bi-keyboard"></i>
                        </div>

                        <h5>Keyboards</h5>
                        <p>INPUT / CONTROL</p>
                    </div>
                </a>
            </div>


            <!-- Mouse -->
            <div class="col-6 col-lg-3">
                <a href="{{ url('/category/Mouse') }}" class="category-link">
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="bi bi-mouse2"></i>
                        </div>

                        <h5>Mouse</h5>
                        <p>PRECISION / GAMING</p>
                    </div>
                </a>
            </div>


            <!-- Gaming -->
            <div class="col-6 col-lg-3">
                <a href="{{ url('/category/Gaming') }}" class="category-link">
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="bi bi-controller"></i>
                        </div>

                        <h5>Gaming</h5>
                        <p>PLAY / PERFORMANCE</p>
                    </div>
                </a>
            </div>


            <!-- Cameras -->
            <div class="col-6 col-lg-3">
                <a href="{{ url('/category/Cameras') }}" class="category-link">
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="bi bi-camera"></i>
                        </div>

                        <h5>Cameras</h5>
                        <p>CAPTURE / CREATE</p>
                    </div>
                </a>
            </div>


            <!-- AI & Smart Devices -->
            <div class="col-6 col-lg-3">
                <a href="{{ url('/category/AI-Smart-Devices') }}" class="category-link">
                    <div class="category-card">

                        <div class="category-icon">
                            <i class="bi bi-robot"></i>
                        </div>

                        <h5>AI & Smart Devices</h5>
                        <p>AI / SMART LIVING</p>

                    </div>
                </a>
            </div>

        </div>

    </div>

</section>

<!-- PRODUCTS -->
<section class="section" id="products">

    <div class="container">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-5 gap-3">

            <div>
                <div class="section-kicker">Live collection</div>
                <h2 class="section-title mb-0">Featured products.</h2>
            </div>

            <div class="text-md-end">
                <span style="color:#667286;font:10px var(--mono);letter-spacing:1px;">
                    HAND-PICKED / READY TO SHOP
                </span>
            </div>

        </div>

        <div class="row g-4" id="productGrid">

            @foreach($products as $product)

                <div class="col-sm-6 col-lg-3">

                    <div class="product-card">

                        <a href="{{ url('/product/' . $product->id) }}"
                           class="product-details-link">

                            <div class="product-image-wrap">
                                <img
                                    src="{{ $product->image }}"
                                    alt="{{ $product->name }}"
                                    referrerpolicy="no-referrer"
                                >
                            </div>


                            <div class="card-body">

                                <span class="badge-cat">
                                    {{ $product->category }}
                                </span>

                                <h5>{{ $product->name }}</h5>

                            </div>
                        </a>

                        @if($product->stock > 0 && $product->stock <= 5)

    <span class="low-stock-badge">
        <i class="bi bi-exclamation-triangle-fill"></i>
        Hurry up! Low in stock
    </span>

@elseif($product->stock <= 0)

    <span class="out-stock-badge">
        <i class="bi bi-x-circle-fill"></i>
        Out of stock
    </span>

@endif

                        <div class="card-body pt-0">

                            <div class="product-meta">
                                <p class="product-price">
                                    ₹{{ number_format($product->price) }}
                                </p>

                                <p class="product-sold">
                                    {{ $product->sold_count }} sold
                                </p>
                            </div>

                            <form
                                action="{{ url('/cart/add/' . $product->id) }}"
                                method="POST"
                            >
                                @csrf

                                <button type="submit" class="btn-add-cart">
                                    <i class="bi bi-bag-plus me-2"></i>
                                    Add to Bag
                                </button>
                            </form>

                        </div>

                    </div>

                </div>

            @endforeach

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
    function closeWelcome() {
        const welcome = document.getElementById('welcomeToast');

        if (welcome) {
            welcome.style.display = 'none';
        }
    }

    const searchToggle = document.getElementById('searchToggle');

    if (searchToggle) {
        searchToggle.addEventListener('click', function () {

            const searchBox = document.getElementById('searchBox');

            searchBox.classList.toggle('active');

            if (searchBox.classList.contains('active')) {
                searchBox.querySelector('input').focus();
            }
        });
    }

    /* THEME TOGGLE — ONLY ADDITION */
    const themeToggle = document.getElementById('themeToggle');

    if (localStorage.getItem('techhub-theme') === 'dark') {
        document.body.classList.add('dark-mode');
    }

    if (themeToggle) {
        themeToggle.addEventListener('click', function () {

            document.body.classList.toggle('dark-mode');

            localStorage.setItem(
                'techhub-theme',
                document.body.classList.contains('dark-mode')
                    ? 'dark'
                    : 'light'
            );

            const dark = document.body.classList.contains('dark-mode');

            themeToggle.setAttribute(
                'aria-label',
                dark ? 'Switch to white mode' : 'Switch to dark mode'
            );

            themeToggle.setAttribute(
                'title',
                dark ? 'Switch to white mode' : 'Switch to dark mode'
            );
        });
    }
    /* =========================================================
   ORDER NOTIFICATIONS
========================================================= */

let knownNotificationIds = [];

let notificationAudioContext = null;


/*
|--------------------------------------------------------------------------
| PLAY NOTIFICATION SOUND
|--------------------------------------------------------------------------
*/

function playNotificationSound() {

    try {

        if (!notificationAudioContext) {

            notificationAudioContext =
                new (
                    window.AudioContext ||
                    window.webkitAudioContext
                )();

        }

        if (
            notificationAudioContext.state ===
            'suspended'
        ) {
            notificationAudioContext.resume();
        }


        const now =
            notificationAudioContext.currentTime;


        /*
        |--------------------------------------------------------------------------
        | FIRST TONE
        |--------------------------------------------------------------------------
        */

        const oscillator1 =
            notificationAudioContext.createOscillator();

        const gain1 =
            notificationAudioContext.createGain();


        oscillator1.type = 'sine';

        oscillator1.frequency.setValueAtTime(
            880,
            now
        );

        oscillator1.frequency.exponentialRampToValueAtTime(
            1320,
            now + 0.12
        );


        gain1.gain.setValueAtTime(
            0.001,
            now
        );

        gain1.gain.exponentialRampToValueAtTime(
            0.65,
            now + 0.03
        );

        gain1.gain.exponentialRampToValueAtTime(
            0.001,
            now + 0.35
        );


        oscillator1.connect(gain1);

        gain1.connect(
            notificationAudioContext.destination
        );


        oscillator1.start(now);

        oscillator1.stop(
            now + 0.35
        );


        /*
        |--------------------------------------------------------------------------
        | SECOND TONE
        |--------------------------------------------------------------------------
        */

        const oscillator2 =
            notificationAudioContext.createOscillator();

        const gain2 =
            notificationAudioContext.createGain();


        oscillator2.type = 'sine';

        oscillator2.frequency.setValueAtTime(
            1175,
            now + 0.16
        );

        oscillator2.frequency.exponentialRampToValueAtTime(
            1760,
            now + 0.28
        );


        gain2.gain.setValueAtTime(
            0.001,
            now + 0.16
        );

        gain2.gain.exponentialRampToValueAtTime(
            0.65,
            now + 0.19
        );

        gain2.gain.exponentialRampToValueAtTime(
            0.001,
            now + 0.55
        );


        oscillator2.connect(gain2);

        gain2.connect(
            notificationAudioContext.destination
        );


        oscillator2.start(
            now + 0.16
        );

        oscillator2.stop(
            now + 0.55
        );


    } catch (error) {

        console.log(
            'Notification sound unavailable:',
            error
        );

    }

}


/*
|--------------------------------------------------------------------------
| GET ICON
|--------------------------------------------------------------------------
*/

function getNotificationIcon(status) {

    switch (status) {

        case 'pending':
            return 'bi-hourglass-split';

        case 'processing':
            return 'bi-box-seam';

        case 'shipped':
            return 'bi-truck';

        case 'out_for_delivery':
            return 'bi-bicycle';

        case 'delivered':
            return 'bi-check-circle-fill';

        case 'cancelled':
            return 'bi-x-circle-fill';

        default:
            return 'bi-bell-fill';

    }

}


/*
|--------------------------------------------------------------------------
| SHOW POPUP
|--------------------------------------------------------------------------
*/

function showOrderNotification(notification) {

    const container =
        document.getElementById(
            'orderNotificationContainer'
        );


    if (!container) {
        return;
    }


    const popup =
        document.createElement('div');


    popup.className =
        'order-notification';


    popup.innerHTML = `

        <div class="order-notification-icon">

            <i class="bi ${getNotificationIcon(
                notification.status
            )}"></i>

        </div>


        <div class="order-notification-content">

            <div class="order-notification-label">
                ORDER UPDATE
            </div>

            <div class="order-notification-title">

                ${notification.title}

            </div>

            <div class="order-notification-message">

                ${notification.message}

            </div>

        </div>


        <button
            type="button"
            class="order-notification-close"
            aria-label="Close"
        >
            ×
        </button>

    `;


    popup
        .querySelector(
            '.order-notification-close'
        )
        .addEventListener(
            'click',
            function () {

                removeNotificationPopup(
                    popup
                );

            }
        );


    container.prepend(popup);


    playNotificationSound();


    /*
    |--------------------------------------------------------------------------
    | AUTO CLOSE
    |--------------------------------------------------------------------------
    */

    setTimeout(
        function () {

            removeNotificationPopup(
                popup
            );

        },
        7000
    );

}


/*
|--------------------------------------------------------------------------
| REMOVE POPUP
|--------------------------------------------------------------------------
*/

function removeNotificationPopup(popup) {

    if (!popup) {
        return;
    }


    popup.style.animation =
        'notificationSlideOut .3s ease forwards';


    setTimeout(
        function () {

            popup.remove();

        },
        300
    );

}


/*
|--------------------------------------------------------------------------
| CHECK NOTIFICATIONS
|--------------------------------------------------------------------------
*/

async function checkOrderNotifications() {

    try {

        const response =
            await fetch(
                '/customer/notifications',
                {
                    method: 'GET',

                    headers: {
                        'Accept':
                            'application/json',

                        'X-Requested-With':
                            'XMLHttpRequest'
                    },

                    credentials: 'same-origin'
                }
            );


        if (!response.ok) {
            return;
        }


        const data =
            await response.json();


        if (
            !data.notifications ||
            data.notifications.length === 0
        ) {
            return;
        }


        data.notifications.forEach(
            function (notification) {

                /*
                |--------------------------------------------------------------------------
                | ONLY SHOW NEW NOTIFICATIONS
                |--------------------------------------------------------------------------
                */

                if (
                    !knownNotificationIds.includes(
                        notification.id
                    )
                ) {

                    knownNotificationIds.push(
                        notification.id
                    );


                    showOrderNotification(
                        notification
                    );

                }

            }
        );


    } catch (error) {

        console.log(
            'Notification check failed:',
            error
        );

    }

}


/*
|--------------------------------------------------------------------------
| START CHECKING
|--------------------------------------------------------------------------
*/

checkOrderNotifications();


setInterval(
    checkOrderNotifications,
    5000
);
</script>

</body>
</html>