<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard — TechHub</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- TechHub Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap"
        rel="stylesheet">


    <style>

        /* =========================
           TECHHUB THEME
        ========================= */

        :root {

            --bg: #0A0C10;

            --surface: #12151B;

            --surface-2: #1A1E26;

            --ice: #5FD3F3;

            --ice-light: #A9E9FA;

            --ice-dim: rgba(95, 211, 243, 0.28);

            --ice-glow: rgba(95, 211, 243, 0.13);

            --ivory: #E9ECF0;

            --muted: #838B96;

            --hairline: rgba(233, 236, 240, 0.08);

            --danger: #f87171;

            --font-display: 'Space Grotesk', sans-serif;

            --font-body: 'Inter', sans-serif;

            --font-mono: 'JetBrains Mono', monospace;

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

            background: var(--bg);

            color: var(--ivory);

            font-family: var(--font-body);

        }


        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {

            font-family: var(--font-display);

        }


        /* =========================
           LAYOUT
        ========================= */

        .admin-layout {

            min-height: 100vh;

            display: flex;

        }


        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {

            width: 260px;

            min-height: 100vh;

            position: fixed;

            left: 0;

            top: 0;

            bottom: 0;

            background: #080A0E;

            border-right: 1px solid var(--hairline);

            padding: 28px 20px;

            z-index: 100;

            animation: sidebarIn .7s ease-out both;

        }


        .brand {

            display: flex;

            align-items: center;

            gap: 12px;

            text-decoration: none;

            margin-bottom: 8px;

        }


        .brand-mark {

            width: 42px;

            height: 42px;

            border: 1px solid var(--ice);

            display: flex;

            justify-content: center;

            align-items: center;

            color: var(--ice);

            font-family: var(--font-display);

            font-size: 14px;

            font-weight: 700;

            letter-spacing: 1px;

            transition: .3s;

        }


        .brand:hover .brand-mark {

            background: var(--ice);

            color: #0A0C10;

        }


        .brand-name {

            font-family: var(--font-display);

            color: var(--ivory);

            font-size: 21px;

            font-weight: 700;

        }


        .admin-label {

            font-family: var(--font-mono);

            font-size: 10px;

            letter-spacing: 2px;

            text-transform: uppercase;

            color: var(--muted);

            margin: 0 0 28px 54px;

        }


        .sidebar hr {

            border-color: var(--hairline);

            margin-bottom: 25px;

        }


        .sidebar-link {

            display: flex;

            align-items: center;

            gap: 12px;

            color: var(--muted);

            text-decoration: none;

            padding: 12px 14px;

            border: 1px solid transparent;

            border-radius: 4px;

            margin-bottom: 7px;

            font-size: 14px;

            transition: .25s;

        }


        .sidebar-link i {

            font-size: 17px;

            width: 20px;

        }


        .sidebar-link:hover {

            color: var(--ice);

            background: var(--ice-glow);

            border-color: var(--ice-dim);

            transform: translateX(3px);

        }


        .sidebar-link.active {

            color: var(--ice);

            background: var(--ice-glow);

            border-color: var(--ice-dim);

        }


        /* =========================
           MAIN CONTENT
        ========================= */

        .main-content {

            margin-left: 260px;

            width: calc(100% - 260px);

            min-height: 100vh;

            padding: 45px;

            position: relative;

            overflow: hidden;

        }


        .main-content::before {

            content: "";

            position: fixed;

            inset: 0 0 0 260px;

            background:

                radial-gradient(
                    ellipse at 85% 5%,
                    var(--ice-glow),
                    transparent 42%
                ),

                repeating-linear-gradient(
                    0deg,
                    var(--hairline) 0 1px,
                    transparent 1px 64px
                ),

                repeating-linear-gradient(
                    90deg,
                    var(--hairline) 0 1px,
                    transparent 1px 64px
                );

            opacity: .35;

            pointer-events: none;

        }


        .content-wrapper {

            position: relative;

            z-index: 1;

        }


        /* =========================
           HEADER
        ========================= */

        .eyebrow {

            display: flex;

            align-items: center;

            gap: 9px;

            font-family: var(--font-mono);

            font-size: 11px;

            letter-spacing: 2.5px;

            text-transform: uppercase;

            color: var(--ice);

            margin-bottom: 10px;

        }


        .eyebrow .dot {

            width: 6px;

            height: 6px;

            border-radius: 50%;

            background: var(--ice);

            box-shadow: 0 0 9px var(--ice);

            animation: pulse 2s ease-in-out infinite;

        }


        .page-title {

            font-size: clamp(2rem, 4vw, 3rem);

            font-weight: 700;

            margin-bottom: 5px;

            animation: fadeUp .7s ease-out both;

        }


        .page-subtitle {

            color: var(--muted);

            animation: fadeUp .7s ease-out .1s both;

        }


        .view-btn {

            background: transparent;

            color: var(--ivory);

            border: 1px solid var(--hairline);

            border-radius: 4px;

            padding: 10px 18px;

            transition: .25s;

        }


        .view-btn:hover {

            border-color: var(--ice);

            color: var(--ice);

            transform: translateY(-2px);

        }


        /* =========================
           STAT CARDS
        ========================= */

        .stat-card {

            background: var(--surface);

            border: 1px solid var(--hairline);

            border-radius: 4px;

            color: var(--ivory);

            padding: 25px;

            height: 100%;

            transition: .3s;

            animation: cardIn .7s ease-out both;

        }


        .stat-card:hover {

            border-color: var(--ice-dim);

            transform: translateY(-7px);

            box-shadow: 0 18px 40px rgba(0,0,0,.3);

        }


        .stat-icon {

            width: 48px;

            height: 48px;

            display: flex;

            align-items: center;

            justify-content: center;

            border: 1px solid var(--ice-dim);

            color: var(--ice);

            border-radius: 4px;

            font-size: 22px;

            margin-bottom: 20px;

            transition: .3s;

        }


        .stat-card:hover .stat-icon {

            background: var(--ice);

            color: #0A0C10;

            transform: scale(1.08);

        }


        .stat-label {

            color: var(--muted);

            font-family: var(--font-mono);

            font-size: 10px;

            letter-spacing: 1.5px;

            text-transform: uppercase;

        }


        .stat-number {

            color: var(--ivory);

            font-size: 30px;

            margin-top: 5px;

        }


        /* =========================
           PRODUCT TABLE
        ========================= */

        .product-panel {

            background: var(--surface);

            border: 1px solid var(--hairline);

            border-radius: 4px;

            overflow: hidden;

            animation: fadeUp .8s ease-out .35s both;

        }


        .product-header {

            padding: 24px;

            border-bottom: 1px solid var(--hairline);

        }


        .product-header h4 {

            margin: 0;

        }


        .add-btn {

            background: var(--ice);

            color: #0A0C10;

            border: 1px solid var(--ice);

            border-radius: 4px;

            padding: 9px 17px;

            font-weight: 600;

            transition: .25s;

        }


        .add-btn:hover {

            background: var(--ice-light);

            border-color: var(--ice-light);

            color: #0A0C10;

            transform: translateY(-2px);

        }


        .table {

            margin: 0;

            color: var(--ivory);

        }


        .table thead th {

            background: var(--surface-2);

            color: var(--muted);

            border-bottom: 1px solid var(--hairline);

            border-top: none;

            padding: 15px 18px;

            font-family: var(--font-mono);

            font-size: 10px;

            letter-spacing: 1.2px;

            text-transform: uppercase;

            white-space: nowrap;

        }


        .table tbody td {

            background: var(--surface);

            color: var(--ivory);

            border-color: var(--hairline);

            padding: 17px 18px;

            vertical-align: middle;

        }


        .table tbody tr {

            transition: .25s;

        }


        .table tbody tr:hover td {

            background: var(--surface-2);

        }


        .product-name {

            font-weight: 600;

            color: var(--ivory);

        }


        .category-text {

            color: var(--muted);

            font-family: var(--font-mono);

            font-size: 11px;

        }


        .price-text {

            color: var(--ice);

            font-family: var(--font-mono);

            font-weight: 600;

        }


        .stock-text {

            color: var(--ivory);

        }


        .sold-text {

            color: var(--muted);

        }


        .remove-btn {

            background: transparent;

            color: var(--danger);

            border: 1px solid rgba(248,113,113,.25);

            border-radius: 4px;

            padding: 6px 12px;

            transition: .25s;

        }


        .remove-btn:hover {

            background: var(--danger);

            border-color: var(--danger);

            color: #0A0C10;

            transform: translateY(-2px);

        }


        /* =========================
           ANIMATIONS
        ========================= */

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

                transform: translateY(25px);

            }

            to {

                opacity: 1;

                transform: translateY(0);

            }

        }


        @keyframes cardIn {

            from {

                opacity: 0;

                transform: translateY(25px);

            }

            to {

                opacity: 1;

                transform: translateY(0);

            }

        }


        @keyframes pulse {

            0%,
            100% {

                opacity: 1;

            }

            50% {

                opacity: .35;

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


        /* =========================
           MOBILE
        ========================= */

        @media(max-width:991px) {

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


        @media(max-width:767px) {

            .admin-layout {

                display: block;

            }


            .sidebar {

                position:relative;

                width:100%;

                min-height:auto;

                padding:20px;

            }


            .sidebar hr {

                margin:15px 0;

            }


            .sidebar-link {

                display:inline-flex;

                margin-right:5px;

            }


            .main-content {

                margin-left:0;

                width:100%;

                padding:25px 18px;

            }


            .main-content::before {

                inset:0;

            }


            .header-actions {

                margin-top:20px;

            }

        }


        @media(max-width:576px) {

            .brand-name {

                font-size:19px;

            }


            .sidebar-link {

                width:100%;

            }


            .page-title {

                font-size:2.2rem;

            }


            .product-header {

                padding:20px;

            }

        }


        @media(prefers-reduced-motion:reduce) {

            * {

                animation:none !important;

                transition:none !important;

            }

        }

    </style>

</head>


<body>


<div class="admin-layout">


    <!-- =========================
         SIDEBAR
    ========================= -->

    <aside class="sidebar">


        <a href="/" class="brand">

            <span class="brand-mark">

                TH

            </span>


            <span class="brand-name">

                TechHub

            </span>

        </a>


        <div class="admin-label">

            Admin Panel

        </div>


        <hr>


        <a
            href="/admin"
            class="sidebar-link active"
        >

            <i class="bi bi-speedometer2"></i>

            Dashboard

        </a>


        <a
            href="/"
            class="sidebar-link"
        >

            <i class="bi bi-shop"></i>

            View Website

        </a>


        <a
            href="#"
            class="sidebar-link"
        >

            <i class="bi bi-box-seam"></i>

            Products

        </a>


        <a
            href="#"
            class="sidebar-link"
        >

            <i class="bi bi-cart-check"></i>

            Orders

        </a>


        <a
            href="#"
            class="sidebar-link"
        >

            <i class="bi bi-people"></i>

            Customers

        </a>


        <a
            href="#"
            class="sidebar-link"
        >

            <i class="bi bi-envelope"></i>

            Messages

        </a>


    </aside>


    <!-- =========================
         MAIN
    ========================= -->

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

                        Admin <span style="color:var(--ice);">Dashboard</span>

                    </h1>


                    <p class="page-subtitle mb-0">

                        Welcome to the TechHub administration panel.

                    </p>


                </div>


                <div class="col-lg-4 text-lg-end header-actions">


                    <a
                        href="/"
                        class="btn view-btn"
                    >

                        <i class="bi bi-eye me-2"></i>

                        View Website

                    </a>


                </div>


            </div>


            <!-- =========================
                 STAT CARDS
            ========================= -->

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


            </div>


            <!-- =========================
                 PRODUCTS
            ========================= -->

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


                        <a
                            href="/admin/products/create"
                            class="btn add-btn"
                        >

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


                            @foreach($products as $product)


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


                            @endforeach


                        </tbody>


                    </table>


                </div>


            </div>


        </div>


    </main>


</div>


<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js">
</script>


</body>

</html>