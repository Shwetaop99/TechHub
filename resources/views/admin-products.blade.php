<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Products - TechHub</title>
    <link
    rel="icon"
    type="image/png"
    href="{{ asset('css/techhub_TH_favicon.png') }}"
>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <style>
        :root {
            --blue: #2563eb;
            --indigo: #4f46e5;
            --text: #172033;
            --muted: #667085;
            --line: #e7ebf1;
            --bg: #f6f8fb;
            --green: #16a34a;
            --red: #dc2626;
            --purple: #7c3aed;
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
                radial-gradient(circle at 90% 5%, rgba(37,99,235,.07), transparent 28%),
                var(--bg);
            color: var(--text);
            font-family: Arial, Helvetica, sans-serif;
        }

        /* TOP LINE */

        body::before {
            content: "";
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
            animation: topFlow 6s linear infinite;
        }

        @keyframes topFlow {
            to {
                background-position: 200% 0;
            }
        }

        /* TOPBAR */

        .topbar {
            height: 74px;
            background: rgba(255,255,255,.96);
            border-bottom: 1px solid var(--line);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 40px;
            position: sticky;
            top: 0;
            z-index: 100;
            backdrop-filter: blur(14px);
            animation: topbarIn .5s ease-out both;
        }

        @keyframes topbarIn {
            from {
                opacity: 0;
                transform: translateY(-12px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 11px;
            text-decoration: none;
            color: var(--text);
            font-size: 23px;
            font-weight: 700;
        }

        .brand-box {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--blue), var(--indigo));
            color: white;
            font-size: 13px;
            font-weight: 800;
            letter-spacing: 1px;
            box-shadow: 0 7px 20px rgba(37,99,235,.18);
            transition: .25s ease;
        }

        .brand:hover .brand-box {
            transform: translateY(-2px) rotate(-2deg);
        }

        .top-actions {
            display: flex;
            gap: 10px;
        }

        .top-btn {
            display: inline-flex;
            align-items: center;
            text-decoration: none;
            padding: 9px 15px;
            border-radius: 9px;
            border: 1px solid #dce2ea;
            color: #344054;
            background: white;
            font-size: 13px;
            font-weight: 600;
            transition: .2s ease;
        }

        .top-btn:hover {
            background: #f3f6fa;
            color: var(--blue);
            border-color: #cbd5e1;
            transform: translateY(-1px);
        }

        .top-btn.primary {
            background: var(--blue);
            color: white;
            border-color: var(--blue);
            box-shadow: 0 6px 16px rgba(37,99,235,.14);
        }

        .top-btn.primary:hover {
            background: #1d4ed8;
            color: white;
            border-color: #1d4ed8;
        }

        /* PAGE */

        .page {
            max-width: 1280px;
            margin: auto;
            padding: 48px 30px 75px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            gap: 25px;
            margin-bottom: 34px;
            animation: fadeUp .6s ease-out both;
        }

        .eyebrow {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--blue);
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 9px;
        }

        .eyebrow::before {
            content: "";
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--green);
            box-shadow: 0 0 10px rgba(22,163,74,.35);
        }

        .page-title {
            font-size: 40px;
            font-weight: 750;
            margin: 0;
            letter-spacing: -1.2px;
        }

        .page-subtitle {
            color: var(--muted);
            margin: 9px 0 0;
            font-size: 14px;
        }

        /* SEARCH */

        .search-box {
            position: relative;
            width: 300px;
        }

        .search-box i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #98a2b3;
            pointer-events: none;
        }

        .search-box input {
            width: 100%;
            height: 45px;
            border: 1px solid #dce2ea;
            border-radius: 10px;
            background: white;
            padding: 0 15px 0 40px;
            outline: none;
            font-size: 13px;
            transition: .2s ease;
            box-shadow: 0 4px 15px rgba(15,23,42,.03);
        }

        .search-box input:focus {
            border-color: var(--blue);
            box-shadow: 0 0 0 3px rgba(37,99,235,.10);
        }

        /* PRODUCT GRID */

        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        /* PRODUCT CARD */

        .product-card {
            background: rgba(255,255,255,.97);
            border: 1px solid var(--line);
            border-radius: 16px;
            padding: 23px;
            transition: .25s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 7px 24px rgba(15,23,42,.035);
            animation: cardIn .55s ease-out both;
        }

        .product-card:nth-child(2) { animation-delay: .04s; }
        .product-card:nth-child(3) { animation-delay: .08s; }
        .product-card:nth-child(4) { animation-delay: .12s; }
        .product-card:nth-child(5) { animation-delay: .16s; }
        .product-card:nth-child(6) { animation-delay: .20s; }

        @keyframes cardIn {
            from {
                opacity: 0;
                transform: translateY(16px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .product-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--blue), var(--indigo));
            transform: scaleX(0);
            transform-origin: left;
            transition: .25s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            border-color: #cbd5e1;
            box-shadow: 0 16px 38px rgba(15,23,42,.09);
        }

        .product-card:hover::before {
            transform: scaleX(1);
        }

        .product-icon {
            width: 54px;
            height: 54px;
            border-radius: 13px;
            background: #eff6ff;
            color: var(--blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            margin-bottom: 17px;
            transition: .25s ease;
        }

        .product-card:hover .product-icon {
            transform: scale(1.05);
            background: #dbeafe;
        }

        .product-name {
            font-size: 19px;
            font-weight: 700;
            margin: 0 0 8px;
            color: var(--text);
        }

        .product-category {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: #f1f5f9;
            color: #475467;
            border-radius: 20px;
            padding: 5px 10px;
            font-size: 11px;
            font-weight: 600;
            margin-bottom: 18px;
        }

        .product-category i {
            color: var(--blue);
        }

        .product-price {
            font-size: 23px;
            font-weight: 750;
            color: var(--blue);
            margin-bottom: 19px;
        }

        /* STATS */

        .product-stats {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .stat-box {
            background: #f8fafc;
            border: 1px solid #edf0f4;
            border-radius: 10px;
            padding: 12px;
            transition: .2s ease;
        }

        .product-card:hover .stat-box {
            border-color: #e2e8f0;
        }

        .stat-label {
            color: #98a2b3;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: .7px;
            margin-bottom: 5px;
        }

        .stat-value {
            color: var(--text);
            font-size: 16px;
            font-weight: 700;
        }

        .stock-good {
            color: var(--green);
        }

        .stock-low {
            color: var(--red);
        }

        .sold-value {
            color: var(--purple);
        }

        /* EMPTY */

        .empty-state {
            background: white;
            border: 1px solid var(--line);
            border-radius: 16px;
            padding: 75px 20px;
            text-align: center;
            box-shadow: 0 7px 24px rgba(15,23,42,.035);
            animation: fadeUp .6s ease-out both;
        }

        .empty-icon {
            width: 72px;
            height: 72px;
            margin: auto;
            border-radius: 20px;
            background: #eff6ff;
            color: var(--blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
        }

        .empty-state h3 {
            margin: 19px 0 7px;
            font-size: 22px;
        }

        .empty-state p {
            color: var(--muted);
            margin-bottom: 0;
            font-size: 13px;
        }

        /* ANIMATIONS */

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* RESPONSIVE */

        @media (max-width: 1050px) {
            .product-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 760px) {
            .topbar {
                padding: 0 18px;
            }

            .top-actions {
                display: none;
            }

            .page {
                padding: 32px 18px 55px;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .search-box {
                width: 100%;
            }

            .page-title {
                font-size: 32px;
            }
        }

        @media (max-width: 560px) {
            .product-grid {
                grid-template-columns: 1fr;
            }

            .brand {
                font-size: 20px;
            }

            .product-card {
                padding: 20px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation: none !important;
                transition: none !important;
            }
        }
    </style>

</head>


<body>


<!-- =========================
     TOPBAR
========================= -->

<nav class="topbar">

    <a href="/admin" class="brand">

        <span class="brand-box">
            TH
        </span>

        TechHub

    </a>


    <div class="top-actions">

        <a href="/admin" class="top-btn">

            <i class="bi bi-grid me-1"></i>

            Dashboard

        </a>


        <a href="/" class="top-btn primary">

            <i class="bi bi-eye me-1"></i>

            Website

        </a>

    </div>

</nav>



<!-- =========================
     PAGE
========================= -->

<main class="page">


    <!-- HEADER -->

    <div class="page-header">

        <div>

            <div class="eyebrow">
                Inventory Management
            </div>

            <h1 class="page-title">
                TechHub Products
            </h1>

            <p class="page-subtitle">
                Manage your products, inventory and sales information.
            </p>

        </div>


        <div class="search-box">

            <i class="bi bi-search"></i>

            <input
                type="text"
                id="productSearch"
                placeholder="Search products..."
            >

        </div>

    </div>



    <!-- =========================
         PRODUCTS
    ========================= -->

    @if($products->count() > 0)

        <div
            class="product-grid"
            id="productGrid"
        >


            @foreach($products as $product)

                <div
                    class="product-card"
                    data-product="{{ strtolower($product->name . ' ' . $product->category) }}"
                >


                    <!-- ICON -->

                    <div class="product-icon">

                        <i class="bi bi-box-seam"></i>

                    </div>


                    <!-- NAME -->

                    <h2 class="product-name">

                        {{ $product->name }}

                    </h2>


                    <!-- CATEGORY -->

                    <div class="product-category">

                        <i class="bi bi-tag"></i>

                        {{ $product->category }}

                    </div>


                    <!-- PRICE -->

                    <div class="product-price">

                        ₹{{ number_format($product->price) }}

                    </div>


                    <!-- STATS -->

                    <div class="product-stats">


                        <!-- STOCK -->

                        <div class="stat-box">

                            <div class="stat-label">
                                Stock
                            </div>

                            <div
                                class="stat-value
                                {{ $product->stock <= 5 ? 'stock-low' : 'stock-good' }}"
                            >

                                {{ $product->stock }}

                            </div>

                        </div>


                        <!-- SOLD -->

                        <div class="stat-box">

                            <div class="stat-label">
                                Sold
                            </div>

                            <div class="stat-value sold-value">

                                {{ $product->sold_count }}

                            </div>

                        </div>


                    </div>


                </div>

            @endforeach


        </div>


        <!-- NO SEARCH RESULTS -->

        <div
            id="noResults"
            class="empty-state"
            style="display:none;"
        >

            <div class="empty-icon">

                <i class="bi bi-search"></i>

            </div>

            <h3>
                No products found
            </h3>

            <p>
                Try searching with another product name or category.
            </p>

        </div>


    @else


        <!-- EMPTY DATABASE -->

        <div class="empty-state">

            <div class="empty-icon">

                <i class="bi bi-box-seam"></i>

            </div>

            <h3>
                No products yet
            </h3>

            <p>
                Products added from the admin panel will appear here.
            </p>

        </div>


    @endif


</main>



<!-- =========================
     SEARCH
========================= -->

<script>

    const searchInput =
        document.getElementById('productSearch');

    const productCards =
        document.querySelectorAll('.product-card');

    const noResults =
        document.getElementById('noResults');


    if (searchInput) {

        searchInput.addEventListener('input', function () {

            const search =
                this.value.toLowerCase().trim();

            let visible = 0;


            productCards.forEach(function (card) {

                const product =
                    card.dataset.product;

                if (product.includes(search)) {

                    card.style.display = '';

                    visible++;

                } else {

                    card.style.display = 'none';

                }

            });


            if (noResults) {

                noResults.style.display =
                    visible === 0 ? 'block' : 'none';

            }

        });

    }

</script>


</body>