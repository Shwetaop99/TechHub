<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $product->name }} — TechHub</title>
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

    <link
        href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap"
        rel="stylesheet"
    >

    <style>

        /* =========================================================
   COUPON OFFER
========================================================= */

.coupon-offer {
    display: flex;
    align-items: center;
    gap: 12px;

    margin: 5px 0 22px;

    padding: 14px;

    background:
        linear-gradient(
            135deg,
            rgba(37, 99, 235, .055),
            rgba(124, 58, 237, .055)
        );

    border: 1px dashed rgba(37, 99, 235, .28);

    border-radius: 13px;
}

.coupon-offer-icon {
    width: 38px;
    height: 38px;

    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 10px;

    background:
        rgba(37, 99, 235, .10);

    color: var(--blue);

    font-size: 18px;
}

.coupon-offer-content {
    flex: 1;
}

.coupon-offer-content strong {
    display: block;

    color: var(--text);

    font-size: 12px;

    margin-bottom: 3px;
}

.coupon-offer-content span {
    display: block;

    color: var(--muted);

    font-size: 10px;
}

.coupon-offer-btn {
    flex-shrink: 0;

    padding: 8px 12px;

    border-radius: 8px;

    background:
        linear-gradient(
            135deg,
            var(--blue),
            var(--indigo)
        );

    color: white;

    text-decoration: none;

    font-size: 10px;

    font-weight: 700;

    transition: .2s ease;
}

.coupon-offer-btn:hover {
    color: white;

    transform: translateY(-1px);

    box-shadow:
        0 6px 15px
        rgba(37, 99, 235, .18);
}

@media(max-width: 576px) {

    .coupon-offer {
        align-items: flex-start;

        flex-wrap: wrap;
    }

    .coupon-offer-btn {
        width: 100%;

        text-align: center;
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
            --yellow: #eab308;

            --line: rgba(15, 23, 42, .10);

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
                radial-gradient(
                    circle at 8% 5%,
                    rgba(37, 99, 235, .07),
                    transparent 27%
                ),
                radial-gradient(
                    circle at 92% 75%,
                    rgba(124, 58, 237, .05),
                    transparent 30%
                ),
                var(--bg);

            color: var(--text);
            font-family: var(--body);
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: var(--display);
            font-weight: 700;
        }

        /* =========================================================
           TOP LINE
        ========================================================== */

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
           NAVBAR
        ========================================================== */

        .navbar {
            background: rgba(255, 255, 255, .94);

            backdrop-filter: blur(16px);

            border-bottom: 1px solid var(--line);

            padding: 15px 0;

            position: sticky;
            top: 0;

            z-index: 1000;
        }

        .brand {
            display: flex;
            align-items: center;

            gap: 12px;

            text-decoration: none;
        }

        .brand-mark {
            width: 42px;
            height: 42px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 12px;

            background: linear-gradient(
                135deg,
                var(--blue),
                var(--indigo)
            );

            color: #ffffff;

            font-family: var(--display);

            font-size: 14px;
            font-weight: 700;

            letter-spacing: 1px;

            box-shadow:
                0 8px 22px rgba(37, 99, 235, .15);

            transition: .25s ease;
        }

        .brand:hover .brand-mark {
            transform: translateY(-2px);

            box-shadow:
                0 12px 28px rgba(37, 99, 235, .22);
        }

        .brand-name {
            color: var(--text);

            font-size: 21px;

            font-family: var(--display);

            font-weight: 700;
        }

        .brand-name span {
            color: var(--blue);
        }

        .nav-link {
            color: #667085 !important;

            margin-left: 22px;

            font-size: 13px;
            font-weight: 600;

            transition: .2s ease;
        }

        .nav-link:hover {
            color: var(--blue) !important;
        }

        .cart-link {
            color: var(--blue) !important;

            padding: 9px 14px !important;

            border: 1px solid rgba(37, 99, 235, .15);

            background: rgba(37, 99, 235, .05);

            border-radius: 10px;

            transition: .2s ease;
        }

        .cart-link:hover {
            background: rgba(37, 99, 235, .10);
            transform: translateY(-1px);
        }

        .navbar-toggler {
            border-color: var(--line);
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 3px rgba(37, 99, 235, .08);
        }

        /* =========================================================
           PRODUCT SECTION
        ========================================================== */

        .product-gallery {
    width: 100%;
}

.main-image-box {
    position: relative;
    overflow: hidden;
}

.gallery-arrow {
    position: absolute;

    top: 50%;
    transform: translateY(-50%);

    width: 42px;
    height: 42px;

    border: none;
    border-radius: 50%;

    background: rgba(255, 255, 255, 0.95);

    box-shadow:
        0 3px 12px rgba(0, 0, 0, 0.15);

    z-index: 10;

    cursor: pointer;

    font-size: 20px;

    transition: 0.2s;
}

.gallery-arrow:hover {
    background: #2563eb;
    color: white;
}

.gallery-left {
    left: 15px;
}

.gallery-right {
    right: 15px;
}


/* THUMBNAILS */

.product-thumbnails {
    display: flex;

    gap: 12px;

    margin-top: 15px;

    overflow-x: auto;

    padding: 5px;

    scroll-behavior: smooth;
}

.product-thumbnail {
    flex: 0 0 80px;

    width: 80px;
    height: 80px;

    border: 2px solid #e5e7eb;

    border-radius: 10px;

    overflow: hidden;

    cursor: pointer;

    background: white;

    transition: 0.2s;
}

.product-thumbnail:hover {
    border-color: #2563eb;
}

.product-thumbnail.active {
    border-color: #2563eb;

    box-shadow:
        0 0 0 2px
        rgba(37, 99, 235, 0.15);
}

.product-thumbnail img {
    width: 100%;
    height: 100%;

    object-fit: cover;
}

        .product-section {
            position: relative;

            min-height: calc(100vh - 80px);

            padding: 55px 0 75px;

            overflow: hidden;
        }

        .product-section::before {
            content: "";

            position: absolute;

            width: 520px;
            height: 520px;

            top: 60px;
            left: -220px;

            background: rgba(37, 99, 235, .055);

            border-radius: 50%;

            filter: blur(60px);

            pointer-events: none;
        }

        .product-section::after {
            content: "";

            position: absolute;

            width: 450px;
            height: 450px;

            right: -200px;
            bottom: -100px;

            background: rgba(124, 58, 237, .045);

            border-radius: 50%;

            filter: blur(65px);

            pointer-events: none;
        }

        .product-section .container {
            position: relative;
            z-index: 1;
        }

        /* =========================================================
           BREADCRUMB
        ========================================================== */

        .breadcrumb-area {
            margin-bottom: 30px;

            color: var(--muted);

            font-size: 12px;

            animation: fadeUp .6s ease both;
        }

        .breadcrumb-area a {
            color: var(--muted);

            text-decoration: none;

            transition: .2s ease;
        }

        .breadcrumb-area a:hover {
            color: var(--blue);
        }

        .breadcrumb-area span {
            color: #98a2b3;

            margin: 0 8px;
        }

        .breadcrumb-area strong {
            color: var(--text);

            font-weight: 600;
        }

        /* =========================================================
           PRODUCT IMAGE
        ========================================================== */

        .image-box {
            position: relative;

            background: rgba(255, 255, 255, .92);

            border: 1px solid var(--line);

            min-height: 500px;

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 40px;

            border-radius: 20px;

            overflow: hidden;

            box-shadow:
                0 12px 40px rgba(15, 23, 42, .055);

            animation: imageIn .8s ease both;
        }

        .image-box::before {
            content: "";

            position: absolute;

            width: 310px;
            height: 310px;

            background: rgba(37, 99, 235, .055);

            border-radius: 50%;

            filter: blur(65px);
        }

        .image-box::after {
            content: "";

            position: absolute;

            inset: 18px;

            border: 1px solid rgba(37, 99, 235, .07);

            border-radius: 15px;

            pointer-events: none;
        }

        .product-image {
            position: relative;

            z-index: 1;

            max-width: 100%;

            max-height: 450px;

            width: auto;
            height: auto;

            object-fit: contain;

            transition: .4s ease;
        }

        .image-box:hover .product-image {
            transform: scale(1.035);
        }

        /* =========================================================
           PRODUCT INFO
        ========================================================== */

        .product-info {
            padding: 8px 10px;

            animation: fadeUp .8s ease .12s both;
        }

        .category-label {
            display: inline-flex;

            align-items: center;

            color: var(--blue);

            background: rgba(37, 99, 235, .065);

            border: 1px solid rgba(37, 99, 235, .13);

            padding: 7px 11px;

            border-radius: 999px;

            font-family: var(--mono);

            font-size: 9px;

            letter-spacing: 1.5px;

            text-transform: uppercase;

            margin-bottom: 14px;
        }

        .product-title {
            font-size: clamp(2.1rem, 4vw, 3.3rem);

            line-height: 1.05;

            font-weight: 700;

            letter-spacing: -1.4px;

            margin-bottom: 17px;
        }

        .rating-row {
            display: flex;

            align-items: center;

            gap: 10px;

            margin-bottom: 22px;
        }

        .stars {
            color: var(--yellow);

            letter-spacing: 2px;

            font-size: 15px;
        }

        .rating-text {
            color: var(--muted);

            font-size: 12px;
        }

        .soft-line {
            border-color: var(--line);

            opacity: 1;
        }

        /* =========================================================
           PRICE
        ========================================================== */

        .price {
            color: var(--blue);

            font-family: var(--display);

            font-size: 34px;

            font-weight: 700;

            margin-bottom: 6px;
        }

        .price-note {
            color: var(--muted);

            font-size: 12px;

            margin-bottom: 22px;
        }

        /* =========================================================
           STOCK
        ========================================================== */

        .stock {
            display: inline-flex;

            align-items: center;

            gap: 8px;

            color: #15803d;

            background: rgba(22, 163, 74, .055);

            border: 1px solid rgba(22, 163, 74, .13);

            border-radius: 999px;

            padding: 8px 12px;

            font-size: 11px;

            font-weight: 600;

            margin-bottom: 24px;
        }

        .stock-dot {
            width: 7px;
            height: 7px;

            border-radius: 50%;

            background: var(--green);

            box-shadow:
                0 0 9px rgba(22, 163, 74, .35);
        }

        .out-stock {
            color: var(--red);

            background: rgba(220, 38, 38, .055);

            border-color: rgba(220, 38, 38, .13);
        }

        .out-stock .stock-dot {
            background: var(--red);

            box-shadow:
                0 0 9px rgba(220, 38, 38, .35);
        }

        /* =========================================================
           DESCRIPTION
        ========================================================== */

        .description-heading {
            font-size: 17px;

            margin-bottom: 8px;
        }

        .description {
            color: var(--muted);

            line-height: 1.8;

            font-size: 14px;

            margin-bottom: 27px;
        }

        /* =========================================================
           QUANTITY
        ========================================================== */

        .quantity-label {
            color: var(--muted);

            font-family: var(--mono);

            font-size: 9px;

            letter-spacing: 1.3px;

            text-transform: uppercase;

            margin-bottom: 8px;
        }

        .quantity {
            width: 90px;

            height: 44px;

            background: #ffffff;

            border: 1px solid var(--line);

            color: var(--text);

            border-radius: 10px;

            text-align: center;

            font-weight: 600;
        }

        .quantity:focus {
            background: #ffffff;

            color: var(--text);

            border-color: rgba(37, 99, 235, .45);

            box-shadow:
                0 0 0 3px rgba(37, 99, 235, .08);
        }

        /* =========================================================
           BUTTONS
        ========================================================== */

        .action-row {
            display: flex;

            gap: 12px;

            margin-top: 22px;
        }

        .btn-cart,
        .btn-buy {
            flex: 1;

            padding: 13px 18px;

            border-radius: 11px;

            font-size: 12px;

            font-weight: 700;

            transition: .22s ease;
        }

        .btn-cart {
            border: 1px solid rgba(37, 99, 235, .28);

            background: #ffffff;

            color: var(--blue);
        }

        .btn-cart:hover {
            background: rgba(37, 99, 235, .055);

            border-color: var(--blue);

            color: var(--blue);

            transform: translateY(-2px);

            box-shadow:
                0 9px 22px rgba(37, 99, 235, .08);
        }

        .btn-buy {
            border: 1px solid transparent;

            background: linear-gradient(
                135deg,
                var(--blue),
                var(--indigo)
            );

            color: #ffffff;

            box-shadow:
                0 9px 23px rgba(37, 99, 235, .16);
        }

        .btn-buy:hover {
            background: linear-gradient(
                135deg,
                var(--indigo),
                var(--purple)
            );

            border-color: transparent;

            color: #ffffff;

            transform: translateY(-2px);

            box-shadow:
                0 13px 28px rgba(37, 99, 235, .22);
        }

        .unavailable-btn {
            border-radius: 11px;

            padding: 13px;

            font-size: 12px;
        }

        /* =========================================================
           INFORMATION BOXES
        ========================================================== */

        .info-grid {
            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 10px;

            margin-top: 28px;
        }

        .info-box {
            background: rgba(255, 255, 255, .86);

            border: 1px solid var(--line);

            padding: 16px 10px;

            text-align: center;

            border-radius: 13px;

            transition: .2s ease;
        }

        .info-box:hover {
            border-color: rgba(37, 99, 235, .17);

            transform: translateY(-2px);

            box-shadow:
                0 9px 22px rgba(15, 23, 42, .045);
        }

        .info-box i {
            display: block;

            color: var(--blue);

            font-size: 19px;

            margin-bottom: 7px;
        }

        .info-box strong {
            display: block;

            color: var(--text);

            font-size: 11px;
        }

        .info-box small {
            color: var(--muted);

            font-size: 9px;
        }

        /* =========================================================
           FOOTER
        ========================================================== */

        footer {
            background: #ffffff;

            border-top: 1px solid var(--line);

            padding: 28px 0;

            color: var(--muted);
        }

        footer strong {
            color: var(--text);

            font-family: var(--display);
        }

        /* =========================================================
           ANIMATIONS
        ========================================================== */

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

        @keyframes imageIn {

            from {
                opacity: 0;

                transform: translateX(-30px) scale(.97);
            }

            to {
                opacity: 1;

                transform: translateX(0) scale(1);
            }

        }

        /* =========================================================
           RESPONSIVE
        ========================================================== */

        @media(max-width: 991px) {

            .product-info {
                padding: 30px 0 0;
            }

            .image-box {
                min-height: 400px;
            }

            .nav-link {
                margin-left: 0;

                padding: 8px 0;
            }

            .cart-link {
                display: inline-block !important;

                margin-top: 4px;
            }

        }

        @media(max-width: 767px) {

            .product-section {
                padding: 40px 0 55px;
            }

            .image-box {
                min-height: 330px;

                padding: 25px;
            }

            .product-image {
                max-height: 300px;
            }

            .action-row {
                flex-direction: column;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

        }

        @media(max-width: 576px) {

            .product-title {
                font-size: 2.2rem;
            }

            .price {
                font-size: 29px;
            }

            .image-box {
                border-radius: 16px;
            }

        }

        @media(prefers-reduced-motion: reduce) {

            * {
                animation: none !important;

                transition: none !important;
            }

        }

    </style>

</head>

<body>

<div class="top-line"></div>


<!-- =========================================================
     NAVBAR
========================================================== -->

<nav class="navbar navbar-expand-lg">

    <div class="container">

        <a href="/" class="brand">

            <span class="brand-mark">
                TH
            </span>

            <span class="brand-name">
                Tech<span>Hub</span>
            </span>

        </a>


        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#techHubNav"
            aria-controls="techHubNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >

            <span class="navbar-toggler-icon"></span>

        </button>


        <div
            class="collapse navbar-collapse"
            id="techHubNav"
        >

            <div class="ms-auto">

                <a
                    href="/"
                    class="nav-link d-inline-block"
                >
                    Home
                </a>


                <a
                    href="/about"
                    class="nav-link d-inline-block"
                >
                    About
                </a>


                <a
                    href="/contact"
                    class="nav-link d-inline-block"
                >
                    Contact
                </a>


                <a
                    href="/cart"
                    class="nav-link cart-link d-inline-block"
                >

                    <i class="bi bi-cart3 me-1"></i>

                    Cart

                </a>

            </div>

        </div>

    </div>

</nav>


<!-- =========================================================
     PRODUCT DETAILS
========================================================== -->

<main class="product-section">

    <div class="container">


        <!-- BREADCRUMB -->

        <div class="breadcrumb-area">

            <a href="/">
                Home
            </a>

            <span>/</span>

            <span>
                {{ $product->category }}
            </span>

            <span>/</span>

            <strong>
                {{ $product->name }}
            </strong>

        </div>


        <div class="row g-5 align-items-start">


            <!-- PRODUCT IMAGE -->

            <div class="col-lg-6">

    <div class="product-gallery">

        <!-- MAIN IMAGE -->
        <div class="image-box main-image-box">

            @if($product->images->count() > 0)

                <button
                    type="button"
                    class="gallery-arrow gallery-left"
                    onclick="changeProductImage(-1)"
                >
                    ❮
                </button>


                <img
                    id="mainProductImage"
                    src="{{ $product->images->first()->image }}"
                    alt="{{ $product->name }}"
                    class="product-image"
                >


                <button
                    type="button"
                    class="gallery-arrow gallery-right"
                    onclick="changeProductImage(1)"
                >
                    ❯
                </button>

            @elseif($product->image)

                <img
                    id="mainProductImage"
                    src="{{ $product->image }}"
                    alt="{{ $product->name }}"
                    class="product-image"
                >

            @else

                <div class="text-center">

                    <i
                        class="bi bi-image"
                        style="font-size:70px;color:#98a2b3;"
                    ></i>

                    <p class="muted mt-3">
                        No image available
                    </p>

                </div>

            @endif

        </div>


        <!-- THUMBNAILS -->

        @if($product->images->count() > 0)

            <div class="product-thumbnails">

                @foreach($product->images as $index => $productImage)

                    <div
                        class="product-thumbnail {{ $index === 0 ? 'active' : '' }}"
                        onclick="selectProductImage({{ $index }})"
                    >

                        <img
                            src="{{ $productImage->image }}"
                            alt="{{ $product->name }}"
                        >

                    </div>

                @endforeach

            </div>

        @endif

    </div>

</div>


            <!-- PRODUCT INFORMATION -->

            <div class="col-lg-6">

                <div class="product-info">


                    <div class="category-label">

                        {{ $product->category }}

                    </div>


                    <h1 class="product-title">

                        {{ $product->name }}

                    </h1>


                    <!-- RATING -->

                    <div class="rating-row">

                        <div class="stars">
                            ★★★★★
                        </div>

                        <span class="rating-text">
                            4.8 / 5 · Customer ratings
                        </span>

                    </div>


                    <hr class="soft-line">


                    <!-- PRICE -->

                    <div class="price">

                        ₹{{ number_format($product->price) }}

                    </div>


                    <div class="price-note">

                        Inclusive of all applicable taxes

                    </div>

                    @if($product->price >= 10000)

    <div class="coupon-offer">

        <div class="coupon-offer-icon">
            <i class="bi bi-ticket-perforated-fill"></i>
        </div>

        <div class="coupon-offer-content">

            <strong>
                Special Discount Available
            </strong>

            <span>
                Apply a coupon and save on this purchase
            </span>

        </div>

        <a
            href="/cart"
            class="coupon-offer-btn"
        >
            Apply Coupon
        </a>

    </div>

@endif


                    <!-- STOCK -->

                    @if($product->stock > 0)

                        <div class="stock">

                            <span class="stock-dot"></span>

                            <span>

                                In Stock
                                ({{ $product->stock }} available)

                            </span>

                        </div>

                    @else

                        <div class="stock out-stock">

                            <span class="stock-dot"></span>

                            <span>
                                Currently Out of Stock
                            </span>

                        </div>

                    @endif


                    <!-- DESCRIPTION -->

                    <h5 class="description-heading">

                        About this product

                    </h5>


                    <div class="description">

                        {{ $product->description }}

                    </div>


                    @if($product->stock > 0)


                        <!-- QUANTITY -->

                        <div class="quantity-label">

                            Quantity

                        </div>


                        <input
                            type="number"
                            id="quantity"
                            value="1"
                            min="1"
                            max="{{ $product->stock }}"
                            class="form-control quantity"
                        >


                        <!-- ACTION BUTTONS -->

                        <div class="action-row">


                            <!-- ADD TO CART -->

                            <form
                                action="{{ url('/cart/add/' . $product->id) }}"
                                method="POST"
                                style="flex:1;"
                            >

                                @csrf

                                <input
                                    type="hidden"
                                    name="quantity"
                                    value="1"
                                    id="cartQuantity"
                                >


                                <button
                                    type="submit"
                                    class="btn-cart w-100"
                                >

                                    <i class="bi bi-cart-plus me-2"></i>

                                    Add to Cart

                                </button>

                            </form>


                            <!-- BUY NOW -->

                            <form
                                action="{{ url('/cart/add/' . $product->id) }}"
                                method="POST"
                                style="flex:1;"
                            >

                                @csrf

                                <input
                                    type="hidden"
                                    name="quantity"
                                    value="1"
                                    id="buyQuantity"
                                >


                                <button
                                    type="submit"
                                    class="btn-buy w-100"
                                >

                                    <i class="bi bi-lightning-charge-fill me-2"></i>

                                    Buy Now

                                </button>

                            </form>


                        </div>


                    @else

                        <button
                            class="btn btn-secondary unavailable-btn w-100 mt-3"
                            disabled
                        >

                            <i class="bi bi-x-circle me-1"></i>

                            Currently Unavailable

                        </button>

                    @endif


                    <!-- INFORMATION -->

                    <div class="info-grid">


                        <div class="info-box">

                            <i class="bi bi-truck"></i>

                            <strong>
                                Fast Delivery
                            </strong>

                            <small>
                                Quick dispatch
                            </small>

                        </div>


                        <div class="info-box">

                            <i class="bi bi-shield-check"></i>

                            <strong>
                                Secure Order
                            </strong>

                            <small>
                                Safe checkout
                            </small>

                        </div>


                        <div class="info-box">

                            <i class="bi bi-headset"></i>

                            <strong>
                                Support
                            </strong>

                            <small>
                                We're here to help
                            </small>

                        </div>


                    </div>


                </div>

            </div>


        </div>


    </div>

</main>


<!-- =========================================================
     FOOTER
========================================================== -->

<footer>

    <div class="container text-center">

        <strong>
            TH — TechHub
        </strong>

        <br>

        <small>
            © {{ date('Y') }} TechHub — ALL RIGHTS RESERVED
        </small>

    </div>

</footer>


<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js">
</script>


<script>

    const quantity = document.getElementById('quantity');

    const cartQuantity = document.getElementById('cartQuantity');

    const buyQuantity = document.getElementById('buyQuantity');


    if (quantity) {

        quantity.addEventListener('input', function () {

            let value = parseInt(this.value) || 1;

            const max = parseInt(this.max);


            if (value < 1) {
                value = 1;
            }


            if (value > max) {
                value = max;
            }


            this.value = value;


            if (cartQuantity) {
                cartQuantity.value = value;
            }


            if (buyQuantity) {
                buyQuantity.value = value;
            }

        });

    }

</script>

<script>

const productImages = [

    @foreach($product->images as $productImage)

        "{{ $productImage->image }}",

    @endforeach

];


let currentProductImage = 0;


function selectProductImage(index)
{
    currentProductImage = index;

    updateProductImage();
}


function changeProductImage(direction)
{
    if (productImages.length === 0) {
        return;
    }


    currentProductImage += direction;


    if (currentProductImage < 0) {

        currentProductImage =
            productImages.length - 1;

    }


    if (
        currentProductImage >=
        productImages.length
    ) {

        currentProductImage = 0;

    }


    updateProductImage();
}


function updateProductImage()
{
    const mainImage =
        document.getElementById(
            'mainProductImage'
        );


    if (!mainImage) {
        return;
    }


    mainImage.src =
        productImages[currentProductImage];


    document
        .querySelectorAll(
            '.product-thumbnail'
        )
        .forEach(
            (thumbnail, index) => {

                thumbnail.classList.toggle(
                    'active',
                    index === currentProductImage
                );

            }
        );
}
</script>
</body>
</html>