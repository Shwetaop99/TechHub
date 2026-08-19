<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cart — TechHub</title>

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
        href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <style>

        * {
            box-sizing: border-box;
        }

        /* =========================================================
   COUPON BOX
========================================================= */

.coupon-box {

    padding: 16px;

    border: 1px dashed rgba(37, 99, 235, .35);

    border-radius: 13px;

    background:
        rgba(37, 99, 235, .045);

}


.coupon-title {

    display: flex;

    align-items: center;

    gap: 8px;

    margin-bottom: 11px;

    color: var(--ivory);

    font-size: 13px;

    font-weight: 700;

}


.coupon-title i {

    color: var(--ice);

    font-size: 17px;

}


.coupon-form {

    display: flex;

    gap: 8px;

}


.coupon-form input {

    flex: 1;

    min-width: 0;

    background: rgba(255,255,255,.04);

    border: 1px solid var(--hairline);

    color: var(--ivory);

    border-radius: 8px;

    font-size: 12px;

}


.coupon-form input:focus {

    border-color: var(--ice);

    box-shadow:
        0 0 0 3px
        rgba(39,229,255,.08);

}


.coupon-apply {

    border: none;

    border-radius: 8px;

    padding: 9px 15px;

    background: var(--ice);

    color: #0A0C10;

    font-weight: 700;

    font-size: 11px;

}


.coupon-help {

    display: block;

    margin-top: 8px;

    color: var(--muted);

    font-size: 9px;

}


.coupon-applied {

    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 10px;

}


.coupon-check {

    color: #22c55e;

    margin-right: 5px;

}


.coupon-saved {

    color: var(--muted);

    font-size: 10px;

    margin-left: 5px;

}


.coupon-remove {

    border: 1px solid rgba(220,38,38,.30);

    background: rgba(220,38,38,.06);

    color: #ef4444;

    border-radius: 7px;

    padding: 6px 9px;

    font-size: 10px;

}


.coupon-discount {

    color: #22c55e;

    font-weight: 700;

}

        :root {
            --blue: #2563eb;
            --blue-dark: #1d4ed8;
            --blue-soft: #eff6ff;
            --text: #172033;
            --muted: #667085;
            --border: #e7ebf1;
            --surface: #ffffff;
            --background: #f6f8fb;
            --danger: #dc2626;
            --success: #16a34a;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background: var(--background);
            color: var(--text);
            font-family: 'Inter', sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5 {
            font-family: 'Space Grotesk', sans-serif;
        }

        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            background: rgba(255,255,255,.96);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border);
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 11px;
            text-decoration: none;
        }

        .brand-mark {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: linear-gradient(135deg, #2563eb, #4f46e5);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 700;
            font-size: 14px;
            letter-spacing: 1px;
            box-shadow: 0 6px 16px rgba(37,99,235,.18);
        }

        .brand-name {
            color: var(--text);
            font-family: 'Space Grotesk', sans-serif;
            font-size: 21px;
            font-weight: 700;
        }

        .nav-link {
            color: var(--muted) !important;
            margin-left: 22px;
            font-size: 14px;
            font-weight: 600;
            transition: .2s ease;
        }

        .nav-link:hover,
        .cart-nav {
            color: var(--blue) !important;
        }

        .navbar-toggler {
            border: 1px solid #dce2ea;
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 3px rgba(37,99,235,.10);
        }

        /* =========================
           MAIN
        ========================= */

        .cart-page {
            flex: 1;
            padding: 65px 0 75px;
            position: relative;
            overflow: hidden;
        }

        .cart-page::before {
            content: "";
            position: absolute;
            width: 430px;
            height: 430px;
            right: -180px;
            top: -180px;
            background: #dbeafe;
            border-radius: 50%;
            opacity: .42;
            filter: blur(5px);
            pointer-events: none;
        }

        .cart-page .container {
            position: relative;
            z-index: 1;
        }

        /* =========================
           ALERTS
        ========================= */

        .tech-alert {
            background: white;
            border: 1px solid var(--border);
            color: var(--text);
            border-radius: 10px;
            padding: 14px 18px;
            margin-bottom: 28px;
        }

        .success-alert {
            border-color: rgba(22,163,74,.25);
        }

        .success-alert i {
            color: var(--success);
        }

        .error-alert {
            border-color: rgba(220,38,38,.25);
        }

        .error-alert i {
            color: var(--danger);
        }

        /* =========================
           HEADER
        ========================= */

        .eyebrow {
            display: flex;
            align-items: center;
            gap: 9px;
            color: var(--blue);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .eyebrow .dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--blue);
            box-shadow: 0 0 10px rgba(37,99,235,.35);
        }

        .page-title {
            font-size: clamp(2.4rem, 5vw, 4rem);
            font-weight: 700;
            letter-spacing: -1.5px;
            margin-bottom: 8px;
        }

        .page-title span {
            color: var(--blue);
        }

        .page-subtitle {
            color: var(--muted);
            margin-bottom: 42px;
        }

        /* =========================
           CART CARD
        ========================= */

        .cart-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 22px;
            margin-bottom: 16px;
            transition: .25s ease;
        }

        .cart-card:hover {
            border-color: #cbd5e1;
            transform: translateY(-3px);
            box-shadow: 0 14px 30px rgba(15,23,42,.07);
        }

        .product-image {
            width: 90px;
            height: 90px;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid var(--border);
            background: #f8fafc;
            transition: .25s ease;
        }

        .cart-card:hover .product-image {
            border-color: #bfdbfe;
            transform: scale(1.03);
        }

        .product-name {
            color: var(--text);
            font-weight: 700;
            margin-bottom: 6px;
        }

        .product-category {
            display: inline-block;
            background: var(--blue-soft);
            color: var(--blue);
            border-radius: 20px;
            padding: 5px 10px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .7px;
        }

        .product-price {
            color: var(--blue);
            font-weight: 700;
        }

        .small-label {
            color: #98a2b3;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 5px;
        }

        /* =========================
           QUANTITY
        ========================= */

        .quantity-form {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .quantity {
            width: 70px;
            background: white;
            border: 1px solid #dce2ea;
            color: var(--text);
            border-radius: 8px;
            text-align: center;
        }

        .quantity:focus {
            border-color: var(--blue);
            box-shadow: 0 0 0 3px rgba(37,99,235,.10);
        }

        .update-btn {
            background: var(--blue-soft);
            border: 1px solid #bfdbfe;
            color: var(--blue);
            border-radius: 8px;
            padding: 7px 10px;
            transition: .2s ease;
        }

        .update-btn:hover {
            background: var(--blue);
            border-color: var(--blue);
            color: white;
        }

        /* =========================
           REMOVE
        ========================= */

        .remove-btn {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff7f7;
            border: 1px solid rgba(220,38,38,.18);
            color: var(--danger);
            border-radius: 9px;
            transition: .2s ease;
        }

        .remove-btn:hover {
            background: var(--danger);
            border-color: var(--danger);
            color: white;
            transform: scale(1.04);
        }

        /* =========================
           SUMMARY
        ========================= */

        .total-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 28px;
            position: sticky;
            top: 100px;
            box-shadow: 0 8px 25px rgba(15,23,42,.04);
        }

        .summary-title {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 25px;
        }

        .summary-label {
            color: var(--muted);
        }

        .summary-value {
            color: var(--text);
            font-weight: 700;
        }

        .status-ready {
            color: var(--success);
            font-weight: 700;
        }

        .total-price {
    color: var(--ice);
    font-family: var(--font-display);
    font-weight: 700;
    font-size: 28px !important;
    white-space: nowrap;
}

        /* PRICE SUMMARY FIX */
        .summary-breakdown {
            width: 100%;
            margin-bottom: 24px;
        }

        .summary-row {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 12px;
        }

        .summary-row .summary-label {
            flex-shrink: 0;
        }

        .summary-row .summary-value,
        .summary-row .coupon-discount {
            text-align: right;
            white-space: nowrap;
        }

        .final-total-row {
            margin-top: 16px;
            margin-bottom: 0;
        }

        .final-total-row .summary-label {
            font-size: 16px;
            font-weight: 600;
        }

        @media (max-width: 576px) {
            .summary-row {
                gap: 10px;
            }

            .total-price {
                font-size: 24px !important;
            }
        }

.summary-breakdown {
    display: flex;
    flex-direction: column;
    gap: 12px;
    margin-bottom: 25px;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
}

.summary-row .summary-label {
    flex-shrink: 0;
}

.summary-row .summary-value {
    text-align: right;
    white-space: nowrap;
}

.discount-value {
    color: var(--success);
    font-family: var(--font-mono);
    font-weight: 600;
}

.final-total-row {
    padding-top: 15px;
    border-top: 1px solid var(--hairline);
}

.final-total-row .summary-label {
    font-size: 16px;
    font-weight: 600;
}

@media (max-width: 576px) {
    .total-price {
        font-size: 24px !important;
    }

    .summary-row {
        gap: 10px;
    }
}


        /* =========================
           PAYMENT METHOD
        ========================= */

        .payment-box {
            background: #f8fafc;
            border: 1px solid var(--border);
            border-radius: 13px;
            padding: 16px;
            margin-bottom: 22px;
        }

        .payment-title {
            font-weight: 700;
            margin-bottom: 12px;
            color: var(--text);
        }

        .payment-option {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px;
            margin-bottom: 8px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 9px;
            cursor: pointer;
            transition: .2s ease;
        }

        .payment-option:last-child {
            margin-bottom: 0;
        }

        .payment-option:hover {
            border-color: #bfdbfe;
            background: #f8fbff;
        }

        .payment-option input {
            accent-color: var(--blue);
        }

        .payment-icon {
            color: var(--blue);
            font-size: 18px;
        }

        .payment-name {
            font-weight: 700;
            color: var(--text);
        }

        .payment-description {
            display: block;
            color: var(--muted);
            font-size: 10px;
            margin-top: 2px;
        }

        .online-payment-box {
            display: none;
            margin-top: 12px;
            padding: 15px;
            text-align: center;
            background: white;
            border: 1px dashed #bfdbfe;
            border-radius: 10px;
        }

        .online-payment-box.active {
            display: block;
        }

        .qr-placeholder {
            width: 150px;
            height: 150px;
            margin: 0 auto 10px;
            border: 1px solid #dbeafe;
            border-radius: 10px;
            background: #eff6ff;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--blue);
            font-size: 42px;
        }

        .payment-qr-image {
            width: 180px;
            height: 180px;
            object-fit: contain;
            display: block;
            margin: 0 auto 12px;
            padding: 8px;
            background: white;
            border: 1px solid #dbeafe;
            border-radius: 10px;
        }

        .admin-upi {
            margin: 10px auto 7px;
            padding: 9px 12px;
            max-width: 280px;
            background: #f8fafc;
            border: 1px solid var(--border);
            border-radius: 8px;
        }

        .admin-upi span {
            display: block;
            color: var(--muted);
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: .8px;
            margin-bottom: 3px;
        }

        .admin-upi strong {
            color: var(--blue);
            font-size: 13px;
            word-break: break-all;
        }

        .payment-note {
            color: var(--muted);
            font-size: 10px;
            margin: 0;
        }

        .online-payment-box > .payment-option {
            text-align: left;
        }

        .online-payment-box .form-control {
            background: #fff;
        }

        .confirm-payment-btn {
            margin-top: 12px;
            border: none;
            border-radius: 8px;
            padding: 9px 16px;
            background: var(--blue);
            color: white;
            font-size: 11px;
            font-weight: 700;
            cursor: pointer;
            transition: .2s ease;
        }

        .confirm-payment-btn:hover {
            background: var(--blue-dark);
        }

        .payment-confirmed {
            display: none;
            color: var(--success);
            font-size: 11px;
            font-weight: 700;
            margin-top: 10px;
        }

        .payment-confirmed.active {
            display: block;
        }

        .checkout-btn {
            width: 100%;
            background: var(--blue);
            border: 1px solid var(--blue);
            color: white;
            padding: 13px;
            font-weight: 700;
            border-radius: 9px;
            transition: .2s ease;
        }

        .checkout-btn:hover {
            background: var(--blue-dark);
            border-color: var(--blue-dark);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 22px rgba(37,99,235,.18);
        }

        .checkout-note {
            color: #98a2b3;
            font-size: 11px;
            text-align: center;
            margin-top: 12px;
        }

        /* =========================
           EMPTY CART
        ========================= */

        .empty-cart {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            text-align: center;
            padding: 85px 20px;
        }

        .empty-icon {
            width: 90px;
            height: 90px;
            margin: 0 auto 25px;
            background: var(--blue-soft);
            border: 1px solid #bfdbfe;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--blue);
            font-size: 38px;
        }

        .empty-cart h3 {
            font-size: 28px;
            font-weight: 700;
        }

        .empty-cart p {
            color: var(--muted);
        }

        .continue-btn {
            display: inline-block;
            margin-top: 15px;
            background: var(--blue);
            color: white;
            border: 1px solid var(--blue);
            padding: 11px 25px;
            border-radius: 9px;
            text-decoration: none;
            font-weight: 700;
            transition: .2s ease;
        }

        .continue-btn:hover {
            background: var(--blue-dark);
            color: white;
            transform: translateY(-2px);
        }

        /* =========================
           FOOTER
        ========================= */

        footer {
            background: white;
            border-top: 1px solid var(--border);
            color: var(--muted);
            padding: 30px 0;
        }

        footer strong {
            color: var(--text);
            font-family: 'Space Grotesk', sans-serif;
        }

        @media(max-width: 991px) {

            .nav-links {
                margin-top: 15px;
                text-align: center;
            }

            .nav-link {
                margin-left: 10px;
            }

            .total-card {
                position: static;
            }

        }

        @media(max-width: 767px) {

            .cart-page {
                padding: 50px 0;
            }

            .cart-card {
                padding: 18px;
            }

            .product-image {
                margin-bottom: 10px;
            }

            .quantity-form {
                margin-top: 10px;
            }

            .remove-btn {
                margin-top: 10px;
            }

            .nav-link {
                display: block !important;
                padding: 8px 0;
                margin-left: 0;
            }

        }

        @media(max-width: 576px) {

            .brand-name {
                font-size: 19px;
            }

            .page-title {
                font-size: 2.4rem;
            }

        }

    </style>

</head>


<body>

<!-- NAVBAR -->

<nav class="navbar navbar-expand-lg">

    <div class="container">

        <a href="/" class="brand">

            <span class="brand-mark">
                TH
            </span>

            <span class="brand-name">
                TechHub
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

            <div class="nav-links ms-auto">

                <a
                    class="nav-link d-inline-block"
                    href="/"
                >
                    Home
                </a>

                <a
                    class="nav-link d-inline-block"
                    href="/about"
                >
                    About
                </a>

                <a
                    class="nav-link d-inline-block"
                    href="/contact"
                >
                    Contact
                </a>

                <a
                    class="nav-link cart-nav d-inline-block"
                    href="/cart"
                >
                    <i class="bi bi-cart3 me-1"></i>
                    Cart
                </a>

            </div>

        </div>

    </div>

</nav>


<!-- MAIN -->

<main class="cart-page">

    <div class="container">

        @if(session('success'))

            <div
                class="alert tech-alert success-alert alert-dismissible fade show"
                role="alert"
            >

                <i class="bi bi-check-circle me-2"></i>

                <strong>Success:</strong>

                {{ session('success') }}

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close"
                ></button>

            </div>

        @endif


        @if(session('error'))

            <div
                class="alert tech-alert error-alert alert-dismissible fade show"
                role="alert"
            >

                <i class="bi bi-exclamation-circle me-2"></i>

                <strong>Error:</strong>

                {{ session('error') }}

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close"
                ></button>

            </div>

        @endif


        <div class="eyebrow">

            <span class="dot"></span>

            Shopping Cart

        </div>


        <h1 class="page-title">

            Your <span>Cart</span>

        </h1>


        <p class="page-subtitle">

            Review your selected technology before checkout.

        </p>


        @if(count($cart) > 0)

            <div class="row g-4">

                <!-- PRODUCTS -->

                <div class="col-lg-8">

                    @foreach($cart as $id => $item)

                        <div class="cart-card">

                            <div class="row align-items-center g-3">

                                <div class="col-md-2 col-12 text-center">

                                    <img
                                        src="{{ $item['image'] }}"
                                        class="product-image"
                                        alt="{{ $item['name'] }}"
                                    >

                                </div>


                                <div class="col-md-3 col-12">

                                    <h5 class="product-name">

                                        {{ $item['name'] }}

                                    </h5>

                                    <div class="product-category">

                                        {{ $item['category'] }}

                                    </div>

                                </div>


                                <div class="col-md-2 col-6">

                                    <div class="small-label">
                                        PRICE
                                    </div>

                                    <div class="product-price">

                                        ₹{{ number_format($item['price']) }}

                                    </div>

                                </div>


                                <div class="col-md-3 col-6">

                                    <div class="small-label">
                                        QUANTITY
                                    </div>

                                    <form
                                        action="{{ url('/cart/update/' . $id) }}"
                                        method="POST"
                                        class="quantity-form mt-1"
                                    >

                                        @csrf

                                        <input
                                            type="number"
                                            name="quantity"
                                            value="{{ $item['quantity'] }}"
                                            min="1"
                                            class="form-control quantity"
                                            required
                                        >

                                        <button
                                            type="submit"
                                            class="update-btn"
                                            title="Update quantity"
                                        >

                                            <i class="bi bi-check-lg"></i>

                                        </button>

                                    </form>

                                </div>


                                <div class="col-md-2 text-md-end text-start">

                                    <form
                                        action="{{ url('/cart/remove/' . $id) }}"
                                        method="POST"
                                    >

                                        @csrf

                                        <button
                                            type="submit"
                                            class="remove-btn"
                                            title="Remove item"
                                        >

                                            <i class="bi bi-trash3"></i>

                                        </button>

                                    </form>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>


                <!-- SUMMARY -->

                <div class="col-lg-4">

                    <div class="total-card">

                        <h3 class="summary-title">
                            Cart Summary
                        </h3>


                        <div class="d-flex justify-content-between mb-3">

                            <span class="summary-label">
                                Items
                            </span>

                            <strong class="summary-value">
                                {{ count($cart) }}
                            </strong>

                        </div>


                        <div class="d-flex justify-content-between mb-3">

                            <span class="summary-label">
                                Status
                            </span>

                            <span class="status-ready">
                                Ready
                            </span>

                        </div>

                        <!-- =========================
     COUPON
========================= -->

<div class="coupon-box mb-4">

    <div class="coupon-title">

        <i class="bi bi-ticket-perforated-fill"></i>

        Have a coupon?

    </div>


    @if(session('coupon_code'))

        <div class="coupon-applied">

            <div>

                <span class="coupon-check">
                    <i class="bi bi-check-circle-fill"></i>
                </span>

                <strong>
                    {{ session('coupon_code') }}
                </strong>

                <span class="coupon-saved">
                    Coupon applied
                </span>

            </div>


            <form
                action="{{ url('/cart/remove-coupon') }}"
                method="POST"
            >

                @csrf

                <button
                    type="submit"
                    class="coupon-remove"
                >

                    Remove

                </button>

            </form>

        </div>

    @else

        <form
            action="{{ url('/cart/apply-coupon') }}"
            method="POST"
            class="coupon-form"
        >

            @csrf

            <input
                type="text"
                name="code"
                class="form-control"
                placeholder="Enter coupon code"
                autocomplete="off"
                required
            >

            <button
                type="submit"
                class="coupon-apply"
            >

                Apply

            </button>

        </form>

        <small class="coupon-help">

            Coupons are available on purchases of ₹10,000 or more.

        </small>

    @endif

</div>


                        <hr style="border-color:#e7ebf1;">


                        <!-- PRICE SUMMARY -->

                        <div class="summary-breakdown">

                            <!-- SUBTOTAL -->
                            <div class="summary-row">

                                <span class="summary-label">
                                    Subtotal
                                </span>

                                <span class="summary-value">
                                    ₹{{ number_format($total, 2) }}
                                </span>

                            </div>


                            <!-- COUPON DISCOUNT -->
                            @if($discount > 0)

                                <div class="summary-row">

                                    <span class="summary-label">
                                        Coupon Discount
                                    </span>

                                    <span class="coupon-discount">
                                        -₹{{ number_format($discount, 2) }}
                                    </span>

                                </div>

                            @endif


                            <!-- DIVIDER -->
                            <hr style="border-color:#e7ebf1;">


                            <!-- FINAL TOTAL -->
                            <div class="summary-row final-total-row">

                                <span class="summary-label">
                                    Total
                                </span>

                                <span class="total-price">
                                    ₹{{ number_format($finalTotal, 2) }}
                                </span>

                            </div>

                        </div>


                        <!-- PAYMENT METHOD -->

                        <div class="payment-box">

                            <div class="payment-title">
                                <i class="bi bi-credit-card me-2"></i>
                                Payment Method
                            </div>

                            <label class="payment-option">
                                <input type="radio" name="payment_choice" value="online" checked>

                                <i class="bi bi-credit-card payment-icon"></i>

                                <span>
                                    <span class="payment-name">Online Payment</span>
                                    <span class="payment-description">Pay securely online</span>
                                </span>
                            </label>

                            <div class="online-payment-box active" id="onlinePaymentBox">

                                <!-- UPI / QR -->
                                <label class="payment-option">
                                    <input
                                        type="radio"
                                        name="online_payment_type"
                                        value="upi"
                                        checked
                                    >

                                    <i class="bi bi-qr-code payment-icon"></i>

                                    <span>
                                        <span class="payment-name">
                                            UPI / Scan QR
                                        </span>
                                        <span class="payment-description">
                                            Scan the QR code and pay using your UPI app
                                        </span>
                                    </span>
                                </label>

                                <div id="upiPaymentBox">

                                    @if($paymentQr)

                                        <img
                                            src="data:image/svg+xml;base64,{{ $paymentQr }}"
                                            alt="TechHub Payment QR"
                                            class="payment-qr-image"
                                        >

                                    @elseif(isset($settings) && $settings->payment_qr)

                                        {{-- Fallback to the static Cloudinary QR --}}
                                        <img
                                            src="{{ $settings->payment_qr }}"
                                            alt="TechHub Payment QR"
                                            class="payment-qr-image"
                                        >

                                    @else

                                        <div class="qr-placeholder">
                                            <i class="bi bi-qr-code"></i>
                                        </div>

                                    @endif

                                    <strong>Scan & Pay</strong>

                                    @if(isset($settings) && $settings->upi_id)

                                        <p class="payment-note">
                                            Scan the QR code or pay using the UPI ID above.
                                        </p>

                                    @else

                                        <p class="payment-note">
                                            Payment details are currently unavailable.
                                        </p>

                                    @endif

                                </div>

                                @if(isset($settings) && $settings->upi_id)

    <!-- CUSTOMER UPI ID -->

    <div class="customer-upi-input mt-3">

        <label
            for="customerUpiId"
            class="form-label"
        >
            Your UPI ID
        </label>

        <input
            type="text"
            name="customer_upi_id"
            id="customerUpiId"
            class="form-control"
            placeholder="example@upi"
            autocomplete="off"
        >

        <small class="text-muted">
            Enter the UPI ID you used to make the payment.
        </small>

    </div>

@endif


                                <!-- Credit / Debit Card -->
                                <label class="payment-option">
                                    <input
                                        type="radio"
                                        name="online_payment_type"
                                        value="card"
                                    >

                                    <i class="bi bi-credit-card-2-front payment-icon"></i>

                                    <span>
                                        <span class="payment-name">
                                            Credit / Debit Card
                                        </span>
                                        <span class="payment-description">
                                            Pay securely using your card
                                        </span>
                                    </span>
                                </label>

                                <div
                                    id="cardPaymentBox"
                                    style="display: none; text-align: left; margin-top: 12px;"
                                >

                                    <div class="mb-2">
                                        <label class="form-label fw-bold">
                                            Card Number
                                        </label>

                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="1234 5678 9012 3456"
                                            maxlength="19"
                                            autocomplete="cc-number"
                                        >
                                    </div>

                                    <div class="row g-2">

                                        <div class="col-6">
                                            <label class="form-label fw-bold">
                                                Expiry
                                            </label>

                                            <input
                                                type="text"
                                                class="form-control"
                                                placeholder="MM/YY"
                                                maxlength="5"
                                                autocomplete="cc-exp"
                                            >
                                        </div>

                                        <div class="col-6">
                                            <label class="form-label fw-bold">
                                                CVV
                                            </label>

                                            <input
                                                type="password"
                                                class="form-control"
                                                placeholder="•••"
                                                maxlength="4"
                                                autocomplete="cc-csc"
                                            >
                                        </div>

                                    </div>

                                </div>


                                <button
                                    type="button"
                                    class="confirm-payment-btn"
                                    id="confirmPaymentBtn"
                                >
                                    Confirm Payment
                                </button>

                                <div
                                    class="payment-confirmed"
                                    id="paymentConfirmed"
                                >
                                    <i class="bi bi-check-circle-fill me-1"></i>
                                    Payment confirmation received
                                </div>

                            </div>

                            <label class="payment-option">
                                <input type="radio" name="payment_choice" value="cod">

                                <i class="bi bi-cash-coin payment-icon"></i>

                                <span>
                                    <span class="payment-name">Cash on Delivery</span>
                                    <span class="payment-description">Pay when your order is delivered</span>
                                </span>
                            </label>

                        </div>


                        <form
                            action="{{ url('/cart/checkout') }}"
                            method="POST"
                        >

                            @csrf

                            <input type="hidden"
                                   name="payment_method"
                                   id="selectedPaymentMethod"
                                   value="online">

                            <input type="hidden"
                                   name="payment_type"
                                   id="selectedPaymentType"
                                   value="upi">

                            <input type="hidden"
                                    name="customer_upi_id"
                                    id="submittedCustomerUpiId"
                                    value="">

                            <button
                                type="submit"
                                class="btn checkout-btn"
                            >

                                <i class="bi bi-bag-check me-2"></i>

                                Proceed to Checkout

                            </button>

                        </form>


                        <div class="checkout-note">

                            <i class="bi bi-shield-check me-1"></i>

                            Secure order processing

                        </div>

                    </div>

                </div>

            </div>

        @else

            <div class="empty-cart">

                <div class="empty-icon">

                    <i class="bi bi-cart-x"></i>

                </div>

                <h3>
                    Your Cart is Empty
                </h3>

                <p>
                    Looks like you haven't added anything yet.
                </p>

                <a
                    href="/"
                    class="continue-btn"
                >

                    <i class="bi bi-arrow-left me-2"></i>

                    Continue Shopping

                </a>

            </div>

        @endif

    </div>

</main>


<!-- FOOTER -->

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
document.addEventListener('DOMContentLoaded', function () {

    const choices = document.querySelectorAll(
        'input[name="payment_choice"]'
    );

    const selectedPaymentMethod =
        document.getElementById('selectedPaymentMethod');

    const selectedPaymentType =
        document.getElementById('selectedPaymentType');

    const submittedCustomerUpiId =
        document.getElementById('submittedCustomerUpiId');

    const onlinePaymentBox =
        document.getElementById('onlinePaymentBox');

    const confirmPaymentBtn =
        document.getElementById('confirmPaymentBtn');

    const paymentConfirmed =
        document.getElementById('paymentConfirmed');

    const onlinePaymentTypes =
        document.querySelectorAll(
            'input[name="online_payment_type"]'
        );

    const upiPaymentBox =
        document.getElementById('upiPaymentBox');

    const customerUpiId =
        document.getElementById('customerUpiId');

    const cardPaymentBox =
        document.getElementById('cardPaymentBox');


    /* Sync visible UPI field with the checkout form */
    if (customerUpiId && submittedCustomerUpiId) {
        customerUpiId.addEventListener('input', function () {
            submittedCustomerUpiId.value = this.value.trim();
        });
    }


    /* Online payment type */
    onlinePaymentTypes.forEach(function (type) {

        type.addEventListener('change', function () {

            selectedPaymentType.value = this.value;

            if (this.value === 'upi') {

                upiPaymentBox.style.display = 'block';
                cardPaymentBox.style.display = 'none';

                if (customerUpiId) {
                    customerUpiId.required = true;
                }

            } else if (this.value === 'card') {

                upiPaymentBox.style.display = 'none';
                cardPaymentBox.style.display = 'block';

                if (customerUpiId) {
                    customerUpiId.required = false;
                    customerUpiId.value = '';
                }

                if (submittedCustomerUpiId) {
                    submittedCustomerUpiId.value = '';
                }
            }

            paymentConfirmed.classList.remove('active');
            confirmPaymentBtn.disabled = false;
            confirmPaymentBtn.textContent = 'Confirm Payment';
        });

    });


    /* Online / COD */
    choices.forEach(function (choice) {

        choice.addEventListener('change', function () {

            selectedPaymentMethod.value = this.value;

            if (this.value === 'online') {

                onlinePaymentBox.classList.add('active');

                const selectedOnline =
                    document.querySelector(
                        'input[name="online_payment_type"]:checked'
                    );

                selectedPaymentType.value =
                    selectedOnline
                        ? selectedOnline.value
                        : 'upi';

                if (selectedPaymentType.value === 'upi') {
                    upiPaymentBox.style.display = 'block';
                    cardPaymentBox.style.display = 'none';

                    if (customerUpiId) {
                        customerUpiId.required = true;
                    }
                }

            } else {

                onlinePaymentBox.classList.remove('active');
                selectedPaymentType.value = 'cod';

                paymentConfirmed.classList.remove('active');
                confirmPaymentBtn.disabled = false;
                confirmPaymentBtn.textContent = 'Confirm Payment';

                if (customerUpiId) {
                    customerUpiId.required = false;
                    customerUpiId.value = '';
                }

                if (submittedCustomerUpiId) {
                    submittedCustomerUpiId.value = '';
                }
            }
        });

    });


    /* Initial state */
    if (selectedPaymentMethod.value === 'online') {
        onlinePaymentBox.classList.add('active');
    }

    if (selectedPaymentType.value === 'upi') {
        upiPaymentBox.style.display = 'block';
        cardPaymentBox.style.display = 'none';

        if (customerUpiId) {
            customerUpiId.required = true;
        }
    }


    /* Confirm Payment */
    if (confirmPaymentBtn) {

        confirmPaymentBtn.addEventListener('click', function () {

            if (
                selectedPaymentMethod.value === 'online' &&
                selectedPaymentType.value === 'upi'
            ) {

                if (
                    !customerUpiId ||
                    !customerUpiId.value.trim()
                ) {

                    alert(
                        'Please enter your UPI ID before confirming payment.'
                    );

                    if (customerUpiId) {
                        customerUpiId.focus();
                    }

                    return;
                }

                if (submittedCustomerUpiId) {
                    submittedCustomerUpiId.value =
                        customerUpiId.value.trim();
                }
            }

            paymentConfirmed.classList.add('active');
            this.textContent = 'Payment Confirmed';
            this.disabled = true;
        });

    }


    /* Checkout form */
    const checkoutForm =
        document.querySelector(
            'form[action="{{ url('/cart/checkout') }}"]'
        );

    if (checkoutForm) {

        checkoutForm.addEventListener('submit', function (event) {

            const method =
                selectedPaymentMethod.value;

            const type =
                selectedPaymentType.value;

            if (method === 'online' && type === 'upi') {

                const upi =
                    customerUpiId
                        ? customerUpiId.value.trim()
                        : '';

                if (!upi) {

                    event.preventDefault();

                    alert(
                        'Please enter your UPI ID before proceeding to checkout.'
                    );

                    if (customerUpiId) {
                        customerUpiId.focus();
                    }

                    return;
                }

                if (submittedCustomerUpiId) {
                    submittedCustomerUpiId.value = upi;
                }
            }
        });
    }

});
</script>

</body>

</html>