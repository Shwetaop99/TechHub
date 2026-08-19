<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard — TechHub</title>
    <link
    rel="icon"
    type="image/png"
    href="{{ asset('css/techhub_TH_favicon.png') }}"
>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap"
          rel="stylesheet">

    <style>
        .status-notification-bell {
    background: rgba(37, 99, 235, .10);
    color: #2563eb;
}

        /* =========================================================
   ORDERS SIDEBAR LINK
========================================================= */

.sidebar .orders-card {
    position: relative;

    display: flex;
    align-items: center;
    gap: 12px;

    color: #667085;
    text-decoration: none !important;

    padding: 12px 14px;
    margin-bottom: 7px;

    border: 1px solid transparent;
    border-radius: 11px;

    font-size: 13px;
    font-weight: 600;

    transition: .2s ease;
}

.sidebar .orders-card:hover {
    color: var(--blue);
    background: rgba(37,99,235,.055);
    border-color: rgba(37,99,235,.13);
    transform: translateX(3px);
}

.sidebar .orders-card .admin-card-icon {
    width: 20px;
    height: 20px;

    flex: 0 0 20px;

    display: flex;
    align-items: center;
    justify-content: center;

    margin: 0;
    padding: 0;

    background: transparent;
    border: 0;
    border-radius: 0;

    color: #98a2b3;
    font-size: 17px;
}

.sidebar .orders-card:hover .admin-card-icon {
    background: transparent;
    color: var(--blue);
}

.sidebar .orders-card .admin-card-content {
    display: block;
    min-width: 0;
}

.sidebar .orders-card .admin-card-content h5 {
    margin: 0;

    color: inherit;

    font-family: var(--body);
    font-size: 13px;
    font-weight: 600;
    line-height: 1.3;

    text-decoration: none !important;
}

.sidebar .orders-card .admin-card-content p {
    margin: 0;

    color: #667085;

    font-family: var(--body);
    font-size: 12px;
    font-weight: 400;
    line-height: 1.3;

    text-decoration: none !important;
}

.sidebar .orders-card:hover .admin-card-content h5 {
    color: var(--blue);
}

/* New-order count */
.sidebar .orders-card .order-notification {
    position: absolute;

    top: 50%;
    right: 12px;

    transform: translateY(-50%);

    min-width: 30px;
    height: 30px;

    padding: 0 8px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 50px;

    background: #ef4444;
    color: #ffffff !important;

    font-family: var(--body);
    font-size: 12px;
    font-weight: 800;
    line-height: 1;

    box-shadow: 0 0 0 4px rgba(239,68,68,.12);

    animation: notificationPulse 1.5s infinite;
}

@keyframes notificationPulse {
    0%, 100% {
        transform: translateY(-50%) scale(1);
    }

    50% {
        transform: translateY(-50%) scale(1.06);
    }
}

:root {
            --bg: #f7f9fc;
            --white: #ffffff;
            --surface: #ffffff;
            --surface-2: #f8fafc;

            --text: #111827;
            --muted: #667085;

            --blue: #2563eb;
            --indigo: #4f46e5;
            --purple: #7c3aed;

            --green: #16a34a;
            --red: #dc2626;
            --orange: #ea580c;

            --line: rgba(15,23,42,.10);

            --display: 'Space Grotesk', sans-serif;
            --body: 'Inter', sans-serif;
            --mono: 'JetBrains Mono', monospace;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background:
                radial-gradient(circle at 88% 5%, rgba(37,99,235,.07), transparent 28%),
                radial-gradient(circle at 10% 90%, rgba(124,58,237,.045), transparent 30%),
                var(--bg);
            color: var(--text);
            font-family: var(--body);
        }

        h1,h2,h3,h4,h5,h6 {
            font-family: var(--display);
            font-weight: 700;
        }

        a {
            color: inherit;
        }

        /* =========================================================
           TOP LINE
        ========================================================= */

        .top-line {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            z-index: 2000;
            background: linear-gradient(
                90deg,
                var(--blue),
                var(--indigo),
                var(--purple),
                var(--blue)
            );
            background-size: 200% 100%;
            animation: flow 6s linear infinite;
        }

        @keyframes flow {
            to {
                background-position: 200% 0;
            }
        }

        /* =========================================================
           LAYOUT
        ========================================================= */

        .admin-layout {
            min-height: 100vh;
            display: flex;
        }

        /* =========================================================
           SIDEBAR
        ========================================================= */

        .sidebar {
            width: 265px;
            min-height: 100vh;

            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;

            z-index: 100;

            padding: 28px 20px;

            background: rgba(255,255,255,.94);
            border-right: 1px solid var(--line);

            box-shadow: 8px 0 35px rgba(15,23,42,.035);

            backdrop-filter: blur(18px);

            animation: sidebarIn .65s ease-out both;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            margin-bottom: 8px;
        }

        .brand:focus,
.brand:focus-visible,
.brand:active {
    outline: none !important;
    border: none !important;
    box-shadow: none !important;
}

        .brand-mark {
            width: 42px;
            height: 42px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 12px;

            background: linear-gradient(135deg, var(--blue), var(--indigo));
            color: #ffffff;

            font-family: var(--display);
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 1px;

            box-shadow: 0 8px 22px rgba(37,99,235,.16);

            transition: .25s ease;
        }

        .brand:hover .brand-mark {
            transform: translateY(-2px);
            box-shadow: 0 12px 28px rgba(37,99,235,.22);
        }

        .brand-name {
            font-family: var(--display);
            color: var(--text);
            font-size: 21px;
            font-weight: 700;
        }

        .brand-name span {
            color: var(--blue);
        }

        .admin-label {
            font-family: var(--mono);
            font-size: 9px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--blue);
            margin: 12px 0 25px 54px;
        }

        .sidebar hr {
            border-color: var(--line);
            margin-bottom: 22px;
            opacity: 1;
        }

        .sidebar-section {
            font-family: var(--mono);
            font-size: 9px;
            letter-spacing: 1.6px;
            text-transform: uppercase;
            color: #98a2b3;
            margin: 0 0 10px 12px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;

            color: #667085;
            text-decoration: none;

            padding: 12px 14px;

            border: 1px solid transparent;
            border-radius: 11px;

            margin-bottom: 7px;

            font-size: 13px;
            font-weight: 600;

            transition: .2s ease;
        }

        .sidebar-link i {
            width: 20px;
            font-size: 17px;
            color: #98a2b3;
        }

        .sidebar-link:hover {
            color: var(--blue);
            background: rgba(37,99,235,.055);
            border-color: rgba(37,99,235,.13);
            transform: translateX(3px);
        }

        .sidebar-link:hover i {
            color: var(--blue);
        }

        .sidebar-link.active {
            color: var(--blue);
            background: linear-gradient(
                90deg,
                rgba(37,99,235,.09),
                rgba(79,70,229,.045)
            );
            border-color: rgba(37,99,235,.16);
        }

        .sidebar-link.active i {
            color: var(--blue);
        }

        .sidebar-bottom {
            position: absolute;
            left: 20px;
            right: 20px;
            bottom: 24px;

            padding-top: 18px;
            border-top: 1px solid var(--line);

            color: #98a2b3;
            font: 9px var(--mono);
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .sidebar-bottom i {
            color: var(--green);
        }

        /* =========================================================
           MAIN
        ========================================================= */

        .main-content {
            margin-left: 265px;
            width: calc(100% - 265px);
            min-height: 100vh;

            padding: 45px;

            position: relative;
            overflow: hidden;
        }

        .main-content::before {
            content: "";

            position: fixed;
            inset: 0 0 0 265px;

            background:
                linear-gradient(
                    rgba(15,23,42,.025) 1px,
                    transparent 1px
                ),
                linear-gradient(
                    90deg,
                    rgba(15,23,42,.025) 1px,
                    transparent 1px
                );

            background-size: 64px 64px;

            mask-image: linear-gradient(
                to bottom,
                black,
                transparent 78%
            );

            pointer-events: none;
        }

        .content-wrapper {
            position: relative;
            z-index: 1;
            max-width: 1500px;
            margin: 0 auto;
        }

        /* =========================================================
           HEADER
        ========================================================= */

        .eyebrow {
            display: flex;
            align-items: center;
            gap: 9px;

            font-family: var(--mono);
            font-size: 10px;
            letter-spacing: 2.2px;
            text-transform: uppercase;

            color: var(--blue);
            margin-bottom: 10px;
        }

        .eyebrow .dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;

            background: var(--green);
            box-shadow: 0 0 10px rgba(22,163,74,.35);

            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%,100% {
                opacity: 1;
            }

            50% {
                opacity: .45;
            }
        }

        .page-title {
            font-size: clamp(2rem, 4vw, 3rem);
            margin-bottom: 5px;
            letter-spacing: -1.5px;

            animation: fadeUp .65s ease-out both;
        }

        .page-title span {
            background: linear-gradient(
                90deg,
                var(--blue),
                var(--indigo),
                var(--purple)
            );

            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .page-subtitle {
            color: var(--muted);
            font-size: 14px;
            animation: fadeUp .65s ease-out .08s both;
        }

        .view-btn {
            display: inline-flex;
            align-items: center;

            background: #ffffff;
            color: #344054;

            border: 1px solid var(--line);
            border-radius: 11px;

            padding: 10px 18px;

            font-size: 13px;
            font-weight: 600;

            transition: .2s ease;
        }

        .view-btn:hover {
            border-color: rgba(37,99,235,.30);
            color: var(--blue);
            transform: translateY(-2px);
            box-shadow: 0 8px 22px rgba(15,23,42,.06);
        }

        /* =========================================================
           STAT CARDS
        ========================================================= */

        .stat-card {
            position: relative;
            overflow: hidden;

            background: rgba(255,255,255,.94);

            border: 1px solid var(--line);
            border-radius: 18px;

            color: var(--text);

            padding: 25px;
            height: 100%;

            box-shadow: 0 8px 30px rgba(15,23,42,.045);

            transition: .25s ease;

            animation: cardIn .65s ease-out both;
        }

        .stat-card::after {
            content: "";

            position: absolute;
            width: 120px;
            height: 120px;

            right: -55px;
            top: -55px;

            border-radius: 50%;

            background: rgba(37,99,235,.06);
        }

        .stat-card:hover {
            border-color: rgba(37,99,235,.22);
            transform: translateY(-5px);
            box-shadow: 0 18px 42px rgba(15,23,42,.09);
        }

        .stat-icon {
            position: relative;
            z-index: 1;

            width: 48px;
            height: 48px;

            display: flex;
            align-items: center;
            justify-content: center;

            border: 1px solid rgba(37,99,235,.16);
            background: rgba(37,99,235,.065);

            color: var(--blue);

            border-radius: 13px;

            font-size: 21px;
            margin-bottom: 20px;

            transition: .25s ease;
        }

        .stat-card:hover .stat-icon {
            background: linear-gradient(135deg, var(--blue), var(--indigo));
            border-color: transparent;
            color: #ffffff;
            transform: scale(1.06);
        }

        .stat-label {
            color: var(--muted);

            font-family: var(--mono);
            font-size: 9px;
            letter-spacing: 1.4px;
            text-transform: uppercase;
        }

        .stat-number {
            color: var(--text);
            font-size: 30px;
            margin-top: 5px;
            margin-bottom: 0;
        }

        /* =========================================================
           PRODUCT PANEL
        ========================================================= */

        .product-panel {
            background: rgba(255,255,255,.96);

            border: 1px solid var(--line);
            border-radius: 18px;

            overflow: hidden;

            box-shadow: 0 10px 35px rgba(15,23,42,.045);

            animation: fadeUp .8s ease-out .30s both;
        }

        .product-header {
            padding: 24px;
            border-bottom: 1px solid var(--line);
        }

        .product-header h4 {
            margin: 0;
            font-size: 21px;
        }

        .add-btn {
            display: inline-flex;
            align-items: center;

            background: linear-gradient(
                135deg,
                var(--blue),
                var(--indigo)
            );

            color: #ffffff;

            border: 0;
            border-radius: 11px;

            padding: 10px 17px;

            font-weight: 700;
            font-size: 12px;

            box-shadow: 0 8px 22px rgba(37,99,235,.15);

            transition: .2s ease;
        }

        .add-btn:hover {
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 12px 28px rgba(37,99,235,.22);
        }

        .table {
            margin: 0;
            color: var(--text);
        }

        .table thead th {
            background: #f8fafc;

            color: #667085;

            border-bottom: 1px solid var(--line);
            border-top: none;

            padding: 15px 18px;

            font-family: var(--mono);
            font-size: 9px;
            letter-spacing: 1.2px;
            text-transform: uppercase;

            white-space: nowrap;
        }

        .table tbody td {
            background: #ffffff;

            color: var(--text);

            border-color: var(--line);

            padding: 17px 18px;
            vertical-align: middle;
        }

        .table tbody tr {
            transition: .2s ease;
        }

        .table tbody tr:hover td {
            background: #f8fbff;
        }

        .product-name {
            font-weight: 700;
            color: var(--text);
        }

        .category-text {
            color: var(--muted);

            font-family: var(--mono);
            font-size: 10px;
        }

        .price-text {
            color: var(--blue);

            font-family: var(--mono);
            font-weight: 700;
            font-size: 12px;
        }

        .stock-text {
            color: var(--text);
            font-weight: 600;
        }

        .sold-text {
            color: var(--muted);
        }

        .remove-btn {
            background: rgba(220,38,38,.045);

            color: var(--red);

            border: 1px solid rgba(220,38,38,.16);
            border-radius: 9px;

            padding: 6px 12px;

            font-size: 11px;
            font-weight: 600;

            transition: .2s ease;
        }

        .remove-btn:hover {
            background: var(--red);
            border-color: var(--red);
            color: #ffffff;
            transform: translateY(-1px);
        }

        .empty-state {
            padding: 55px 20px;
            text-align: center;
            color: var(--muted);
        }

        .empty-state i {
            display: block;
            font-size: 35px;
            color: #98a2b3;
            margin-bottom: 10px;
        }

        /* =========================================================
           VISITOR STAT CARD
        ========================================================= */

        .visitor-stat-card {
            cursor: pointer;
        }

        .visitor-stat-icon {
            background: rgba(22,163,74,.07);
            border-color: rgba(22,163,74,.16);
            color: var(--green);
        }

        .visitor-stat-card:hover .visitor-stat-icon {
            background: linear-gradient(135deg, var(--green), #15803d);
            color: #ffffff;
        }

        .visitor-stat-link {
            display: flex;
            align-items: center;
            gap: 6px;
            margin-top: 10px;
            color: var(--green);
            font-size: 11px;
            font-weight: 700;
        }

        .visitor-stat-link i {
            transition: transform .2s ease;
        }

        .visitor-stat-card:hover .visitor-stat-link i {
            transform: translateX(4px);
        }

        /* =========================================================
           ANIMATIONS
        ========================================================= */

        @keyframes sidebarIn {
            from {
                opacity: 0;
                transform: translateX(-25px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes cardIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .stat-card:nth-child(1) {
            animation-delay: .05s;
        }

        .stat-card:nth-child(2) {
            animation-delay: .12s;
        }

        .stat-card:nth-child(3) {
            animation-delay: .19s;
        }

        .stat-card:nth-child(4) {
            animation-delay: .26s;
        }

        /* =========================================================
           MOBILE
        ========================================================= */

        @media(max-width: 991px) {

            .sidebar {
                width: 220px;
            }

            .main-content {
                margin-left: 220px;
                width: calc(100% - 220px);
                padding: 30px;
            }

            .main-content::before {
                inset: 0 0 0 220px;
            }
        }

        @media(max-width: 767px) {

            .admin-layout {
                display: block;
            }

            .sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
                padding: 20px;
            }

            .sidebar hr {
                margin: 15px 0;
            }

            .sidebar-link {
                display: inline-flex;
                margin-right: 5px;
            }

            .sidebar-bottom {
                display: none;
            }

            .main-content {
                margin-left: 0;
                width: 100%;
                padding: 25px 18px;
            }

            .main-content::before {
                inset: 0;
            }

            .header-actions {
                margin-top: 20px;
            }
        }

        @media(max-width: 576px) {

            .brand-name {
                font-size: 19px;
            }

            .sidebar-link {
                width: 100%;
            }

            .page-title {
                font-size: 2.2rem;
            }

            .product-header {
                padding: 20px;
            }
        }

        @media(prefers-reduced-motion: reduce) {

            * {
                animation: none !important;
                transition: none !important;
            }
        }

        /* =========================================================
   NEW ORDER POPUP
========================================================= */

.new-order-popup {
    position: fixed;
    right: 25px;
    bottom: 25px;

    width: 350px;

    background: rgba(255, 255, 255, 0.97);

    border: 1px solid rgba(37, 99, 235, 0.15);

    border-radius: 18px;

    padding: 18px 20px;

    box-shadow:
        0 20px 50px rgba(15, 23, 42, 0.18);

    backdrop-filter: blur(15px);

    z-index: 9999;

    transform: translateY(130px);
    opacity: 0;

    pointer-events: none;

    transition:
        transform .35s ease,
        opacity .35s ease;
}

.new-order-popup.show {
    transform: translateY(0);
    opacity: 1;

    pointer-events: auto;
}


/* Popup top */

.new-order-popup-top {
    display: flex;
    align-items: center;
    justify-content: space-between;

    margin-bottom: 14px;
}


/* Bell */

.new-order-bell {
    width: 42px;
    height: 42px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 12px;

    background: rgba(239, 68, 68, .10);

    color: #ef4444;

    font-size: 20px;

    box-shadow:
        0 0 0 4px rgba(239, 68, 68, .06);

    animation: orderBellPulse 1.5s infinite;
}

@keyframes orderBellPulse {

    0%, 100% {
        transform: scale(1);
    }

    50% {
        transform: scale(1.08);
    }

}


/* Close */

.new-order-close {
    width: 30px;
    height: 30px;

    border: 0;

    background: transparent;

    color: #98a2b3;

    border-radius: 8px;

    display: flex;
    align-items: center;
    justify-content: center;

    cursor: pointer;

    transition: .2s ease;
}

.new-order-close:hover {
    background: #f2f4f7;
    color: #344054;
}


/* Title */

.new-order-title {
    font-family: var(--display);

    font-size: 17px;

    font-weight: 700;

    color: var(--text);

    margin-bottom: 4px;
}


/* Subtitle */

.new-order-subtitle {
    color: var(--muted);

    font-size: 12px;

    margin-bottom: 15px;
}


/* Order information */

.new-order-info {
    background: #f8fafc;

    border: 1px solid #edf0f4;

    border-radius: 12px;

    padding: 12px 14px;

    margin-bottom: 14px;
}

.new-order-row {
    display: flex;

    justify-content: space-between;

    gap: 15px;

    margin-bottom: 7px;

    font-size: 12px;
}

.new-order-row:last-child {
    margin-bottom: 0;
}

.new-order-label {
    color: #98a2b3;
}

.new-order-value {
    color: var(--text);

    font-weight: 700;

    text-align: right;
}


/* View button */

.new-order-view {
    width: 100%;

    display: flex;

    align-items: center;

    justify-content: center;

    gap: 7px;

    padding: 10px 15px;

    border-radius: 10px;

    background: linear-gradient(
        135deg,
        var(--blue),
        var(--indigo)
    );

    color: white;

    text-decoration: none;

    font-size: 12px;

    font-weight: 700;

    box-shadow:
        0 7px 18px rgba(37, 99, 235, .16);

    transition: .2s ease;
}

.new-order-view:hover {
    color: white;

    transform: translateY(-1px);

    box-shadow:
        0 10px 24px rgba(37, 99, 235, .23);
}


/* Mobile */

@media(max-width: 576px) {

    .new-order-popup {
        left: 15px;
        right: 15px;
        bottom: 15px;

        width: auto;
    }

}

    </style>

</head>

<body>

<div class="top-line"></div>

<div class="admin-layout">

    <!-- =========================================================
         SIDEBAR
    ========================================================== -->

    <aside class="sidebar">

        <a href="/" class="brand">

            <span class="brand-mark">
                TH
            </span>

            <span class="brand-name">
                Tech<span>Hub</span>
            </span>

        </a>

        <div class="admin-label">
            Admin Panel
        </div>

        <hr>

        <div class="sidebar-section">
            Control Center
        </div>

        <a href="/admin"
           class="sidebar-link active">

            <i class="bi bi-speedometer2"></i>
            Dashboard

        </a>

        <a href="/"
           class="sidebar-link">

            <i class="bi bi-shop"></i>
            View Website

        </a>

        <a href="/admin/products"
           class="sidebar-link">

            <i class="bi bi-box-seam"></i>
            Products

        </a>

        <a href="{{ url('/admin/customer-orders') }}"
   class="sidebar-link orders-card">

    <div class="admin-card-icon">
        <i class="bi bi-cart3"></i>
    </div>

    <div class="admin-card-content">
        <h5>Orders</h5>

        <p>
            Manage customer orders
        </p>
    </div>

    @if($newOrders > 0)
        <span class="order-notification">
            {{ $newOrders }}
        </span>
    @endif

</a>

        <a href="/admin/customers"
           class="sidebar-link">

            <i class="bi bi-people"></i>
            Customers

        </a>

        <a href="{{ url('/admin/inventory') }}"
   class="sidebar-link">

    <i class="bi bi-clipboard-data"></i>

    Inventory Report

</a>

<a
    href="{{ url('/admin/manage-admins') }}"
    class="sidebar-link"
>
    <i class="bi bi-person-gear"></i>
    Manage Admins
</a>

<a href="/admin/coupons"
   class="sidebar-link">

    <i class="bi bi-ticket-perforated"></i>

    Coupons

</a>

        <a href="{{ url('/admin/settings') }}"
           class="sidebar-link">

            <i class="bi bi-gear"></i>

            Settings

        </a>

        <a href="{{ url('/admin/visitors') }}"
           class="sidebar-link">

            <i class="bi bi-graph-up-arrow"></i>

            Website Visitors

        </a>

        <div class="sidebar-bottom">
            <i class="bi bi-circle-fill me-1"></i>
            Admin system online
        </div>

    </aside>


    <!-- =========================================================
         MAIN CONTENT
    ========================================================== -->

    <main class="main-content">

        <div class="content-wrapper">

            <!-- HEADER -->

            <div class="row align-items-center mb-5">

                <div class="col-lg-8">

                    <div class="eyebrow">
                        <span class="dot"></span>
                        Control Center
                    </div>

                    <h1 class="page-title">
                        Admin <span>Dashboard</span>
                    </h1>

                    <p class="page-subtitle mb-0">
                        Welcome to the TechHub administration panel.
                    </p>

                </div>

                <div class="col-lg-4 text-lg-end header-actions">

                    <a href="/"
                       class="btn view-btn">

                        <i class="bi bi-eye me-2"></i>
                        View Website

                    </a>

                </div>

            </div>


            <!-- =================================================
                 STAT CARDS
            ================================================== -->

            <div class="row g-4 mb-5">

                <!-- PRODUCTS -->

                <div class="col-md-6 col-xl-3">

                    <div class="stat-card">

                        <div class="stat-icon">
                            <i class="bi bi-box-seam"></i>
                        </div>

                        <div class="stat-label">
                            Total Products
                        </div>

                        <h2 class="stat-number">
                            {{ $totalProducts }}
                        </h2>

                    </div>

                </div>


                <!-- SOLD -->

                <div class="col-md-6 col-xl-3">

                    <div class="stat-card">

                        <div class="stat-icon">
                            <i class="bi bi-cart-check"></i>
                        </div>

                        <div class="stat-label">
                            Products Sold
                        </div>

                        <h2 class="stat-number">
                            {{ $totalSold }}
                        </h2>

                    </div>

                </div>


                <!-- CATEGORIES -->

                <div class="col-md-6 col-xl-3">

                    <div class="stat-card">

                        <div class="stat-icon">
                            <i class="bi bi-grid"></i>
                        </div>

                        <div class="stat-label">
                            Categories
                        </div>

                        <h2 class="stat-number">
                            {{ $totalCategories }}
                        </h2>

                    </div>

                </div>


                <!-- STOCK -->

                <div class="col-md-6 col-xl-3">

                    <div class="stat-card">

                        <div class="stat-icon">
                            <i class="bi bi-bar-chart"></i>
                        </div>

                        <div class="stat-label">
                            Total Stock
                        </div>

                        <h2 class="stat-number">
                            {{ $totalStock }}
                        </h2>

                    </div>

                </div>

                <!-- WEBSITE VISITORS -->

                <div class="col-md-6 col-xl-3">

                    <a href="{{ url('/admin/visitors') }}"
                       class="text-decoration-none">

                        <div class="stat-card visitor-stat-card">

                            <div class="stat-icon visitor-stat-icon">
                                <i class="bi bi-people-fill"></i>
                            </div>

                            <div class="stat-label">
                                Website Visitors
                            </div>

                            <h2 class="stat-number">
                                {{ $totalVisitors ?? 0 }}
                            </h2>

                            <div class="visitor-stat-link">
                                View visitor analytics
                                <i class="bi bi-arrow-right"></i>
                            </div>

                        </div>

                    </a>

                </div>

            </div>


            <!-- =================================================
                 PRODUCTS
            ================================================== -->

            <div class="product-panel">

                <div class="product-header">

                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                        <div>

                            <div class="eyebrow mb-1">
                                Inventory
                            </div>

                            <h4>
                                Products
                            </h4>

                        </div>

                        <a href="/admin/products/create"
                           class="btn add-btn">

                            <i class="bi bi-plus-lg me-1"></i>
                            Add Product

                        </a>

                    </div>

                </div>


                <div class="table-responsive">

                    <table class="table align-middle mb-0">

                        <thead>

                            <tr>

                                <th>Product</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Sold</th>
                                <th>Action</th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($products as $product)

                                <tr>

                                    <td>

                                        <span class="product-name">
                                            {{ $product->name }}
                                        </span>

                                    </td>


                                    <td>

                                        <span class="category-text">
                                            {{ $product->category }}
                                        </span>

                                    </td>


                                    <td>

                                        <span class="price-text">
                                            ₹{{ number_format($product->price) }}
                                        </span>

                                    </td>


                                    <td>

                                        <span class="stock-text">
                                            {{ $product->stock }}
                                        </span>

                                    </td>


                                    <td>

                                        <span class="sold-text">
                                            {{ $product->sold_count }}
                                        </span>

                                    </td>


                                    <td>

                                        <form
                                            action="/admin/products/{{ $product->id }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to remove this product?');"
                                        >

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn remove-btn btn-sm"
                                            >

                                                <i class="bi bi-trash3 me-1"></i>
                                                Remove

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="6">

                                        <div class="empty-state">

                                            <i class="bi bi-box-seam"></i>

                                            No products have been added yet.

                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </main>

</div>

<!-- =========================================================
     NEW ORDER POPUP
========================================================= -->

<div
    id="newOrderPopup"
    class="new-order-popup"
>

    <div class="new-order-popup-top">

        <div class="new-order-bell">

            <i class="bi bi-bell-fill"></i>

        </div>

        <button
            type="button"
            class="new-order-close"
            id="closeOrderPopup"
            aria-label="Close"
        >

            <i class="bi bi-x-lg"></i>

        </button>

    </div>


    <div class="new-order-title">

        New Order Received!

    </div>


    <div class="new-order-subtitle">

        A customer has just placed a new order.

    </div>


    <div class="new-order-info">

        <div class="new-order-row">

            <span class="new-order-label">
                Order
            </span>

            <span
                class="new-order-value"
                id="popupOrderId"
            >
                —
            </span>

        </div>


        <div class="new-order-row">

            <span class="new-order-label">
                Customer
            </span>

            <span
                class="new-order-value"
                id="popupCustomer"
            >
                —
            </span>

        </div>


        <div class="new-order-row">

            <span class="new-order-label">
                Total
            </span>

            <span
                class="new-order-value"
                id="popupTotal"
            >
                —
            </span>

        </div>

    </div>


    <a
        href="{{ url('/admin/orders') }}"
        class="new-order-view"
    >

        View Order

        <i class="bi bi-arrow-right"></i>

    </a>

</div>

<!-- =========================================================
     ORDER STATUS UPDATE POPUP
========================================================= -->

<div
    id="orderStatusPopup"
    class="new-order-popup"
>

    <div class="new-order-popup-top">

        <div class="new-order-bell status-notification-bell">

            <i
                id="statusPopupIcon"
                class="bi bi-truck"
            ></i>

        </div>

        <button
            type="button"
            class="new-order-close"
            id="closeStatusPopup"
            aria-label="Close"
        >

            <i class="bi bi-x-lg"></i>

        </button>

    </div>


    <div
        class="new-order-title"
        id="statusPopupTitle"
    >
        Order Status Updated
    </div>


    <div
        class="new-order-subtitle"
        id="statusPopupMessage"
    >
        An order status has been updated.
    </div>


    <div class="new-order-info">

        <div class="new-order-row">

            <span class="new-order-label">
                Order
            </span>

            <span
                class="new-order-value"
                id="statusPopupOrderId"
            >
                —
            </span>

        </div>


        <div class="new-order-row">

            <span class="new-order-label">
                Customer
            </span>

            <span
                class="new-order-value"
                id="statusPopupCustomer"
            >
                —
            </span>

        </div>


        <div class="new-order-row">

            <span class="new-order-label">
                Status
            </span>

            <span
                class="new-order-value"
                id="statusPopupStatus"
            >
                —
            </span>

        </div>

    </div>


    <a
        href="{{ url('/admin/orders') }}"
        class="new-order-view"
    >

        View Order

        <i class="bi bi-arrow-right"></i>

    </a>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

<audio id="orderNotificationSound" preload="auto">
    <source src="{{ asset('sounds/order-notification.mp3') }}" type="audio/mpeg">
</audio>



<script>

document.addEventListener('DOMContentLoaded', function () {

    const popup = document.getElementById('newOrderPopup');
    const closeButton = document.getElementById('closeOrderPopup');

    const popupOrderId = document.getElementById('popupOrderId');
    const popupCustomer = document.getElementById('popupCustomer');
    const popupTotal = document.getElementById('popupTotal');

    const sound = document.getElementById('orderNotificationSound');


    /* =========================================================
       SOUND UNLOCK
    ========================================================= */

    let soundUnlocked = false;

    function unlockSound() {

        if (!sound || soundUnlocked) {
            return;
        }

        sound.muted = true;
        sound.currentTime = 0;

        const promise = sound.play();

        if (promise !== undefined) {

            promise.then(function () {

                sound.pause();
                sound.currentTime = 0;
                sound.muted = false;

                soundUnlocked = true;

                console.log(
                    '🔊 TechHub notification sound enabled!'
                );

            }).catch(function () {

                console.log(
                    '🔇 Sound waiting for user interaction...'
                );

            });

        }
    }


    document.addEventListener(
        'pointerdown',
        unlockSound
    );

    document.addEventListener(
        'keydown',
        unlockSound
    );


    /* =========================================================
       SHOW NEW ORDER POPUP
    ========================================================= */

    function showNewOrderPopup(order) {

        if (!popup) {
            return;
        }

        popupOrderId.textContent =
            '#' + (order.id || '—');

        popupCustomer.textContent =
            order.customer || 'New customer';

        popupTotal.textContent =
            '₹' + (order.total || '0');


        // Show popup
        popup.classList.add('show');


        // Play notification sound
        if (sound) {

            sound.muted = false;
            sound.currentTime = 0;
            sound.volume = 1;

            sound.play()
                .then(function () {

                    console.log(
                        '🔔 NEW ORDER BEEP PLAYED!'
                    );

                })
                .catch(function (error) {

                    console.log(
                        '❌ Automatic beep blocked:',
                        error
                    );

                });
        }


        // Hide popup after 10 seconds
        setTimeout(function () {

            popup.classList.remove('show');

        }, 10000);

    }


    /* =========================================================
       CLOSE POPUP
    ========================================================= */

    if (closeButton) {

        closeButton.addEventListener(
            'click',
            function () {

                popup.classList.remove('show');

            }
        );

    }


    /* =========================================================
       LAST KNOWN ORDER
    ========================================================= */

    let lastKnownOrderId = null;


    /* =========================================================
       INITIALISE CURRENT ORDER
    ========================================================= */

    function initialiseOrderId() {

        return fetch(
            '{{ url('/admin/check-new-order') }}',
            {
                method: 'GET',

                headers: {
                    'Accept': 'application/json'
                },

                cache: 'no-store'
            }
        )

        .then(function (response) {

            if (!response.ok) {

                throw new Error(
                    'Server returned ' +
                    response.status
                );

            }

            return response.json();

        })

        .then(function (data) {

            if (
                data &&
                data.success
            ) {

                lastKnownOrderId =
                    Number(
                        data.latest_order_id || 0
                    );

                console.log(
                    'TechHub notification started. Latest order:',
                    lastKnownOrderId
                );

            }

        })

        .catch(function (error) {

            console.error(
                'Initial order check failed:',
                error
            );

        });

    }


    /* =========================================================
       CHECK FOR NEW ORDER
    ========================================================= */

    function checkForNewOrder() {

        fetch(
            '{{ url('/admin/check-new-order') }}',
            {
                method: 'GET',

                headers: {
                    'Accept': 'application/json'
                },

                cache: 'no-store'
            }
        )

        .then(function (response) {

            if (!response.ok) {

                throw new Error(
                    'Server returned ' +
                    response.status
                );

            }

            return response.json();

        })

        .then(function (data) {

            if (
                !data ||
                !data.success
            ) {
                return;
            }


            const serverOrderId =
                Number(
                    data.latest_order_id || 0
                );


            console.log(
                'ORDER CHECK:',
                serverOrderId,
                'previous:',
                lastKnownOrderId
            );


            /*
             * First check:
             * Just establish the current order.
             */

            if (lastKnownOrderId === null) {

                lastKnownOrderId =
                    serverOrderId;

                return;
            }


            /*
             * New order detected
             */

            if (
                serverOrderId >
                lastKnownOrderId
            ) {

                console.log(
                    '🛒 NEW ORDER DETECTED:',
                    serverOrderId
                );


                lastKnownOrderId =
                    serverOrderId;


                if (data.order) {

                    showNewOrderPopup(
                        data.order
                    );

                }

            }

        })

        .catch(function (error) {

            console.error(
                'Order notification check failed:',
                error
            );

        });

    }


    /* =========================================================
       START NOTIFICATION SYSTEM
    ========================================================= */

    initialiseOrderId()
        .then(function () {

            // Start normal polling
            checkForNewOrder();

            setInterval(
                checkForNewOrder,
                5000
            );


            /*
             * When user switches back to Admin tab,
             * check immediately.
             */

            document.addEventListener(
                'visibilitychange',
                function () {

                    if (
                        document.visibilityState === 'visible'
                    ) {

                        console.log(
                            '👀 Admin tab active - checking for new order...'
                        );

                        checkForNewOrder();

                    }

                }
            );

        });
});
</script>
</body>
</html>