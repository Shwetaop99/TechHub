<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cart — TechHub</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap"
        rel="stylesheet">


    <style>

        /* =========================
           THEME
        ========================= */

        :root{

            --bg:#0A0C10;

            --surface:#12151B;

            --surface-2:#1A1E26;

            --ice:#5FD3F3;

            --ice-light:#A9E9FA;

            --ice-dim:rgba(95,211,243,.28);

            --ice-glow:rgba(95,211,243,.13);

            --ivory:#E9ECF0;

            --muted:#838B96;

            --hairline:rgba(233,236,240,.08);

            --font-display:'Space Grotesk',sans-serif;

            --font-body:'Inter',sans-serif;

            --font-mono:'JetBrains Mono',monospace;

        }


        *{
            box-sizing:border-box;
        }


        html{
            scroll-behavior:smooth;
        }


        body{

            margin:0;

            min-height:100vh;

            display:flex;

            flex-direction:column;

            background:var(--bg);

            color:var(--ivory);

            font-family:var(--font-body);

        }


        h1,
        h2,
        h3,
        h4,
        h5,
        h6{

            font-family:var(--font-display);

        }


        /* =========================
           NAVBAR
        ========================= */

        .navbar{

            background:rgba(10,12,16,.92);

            backdrop-filter:blur(10px);

            border-bottom:1px solid var(--hairline);

            padding:16px 0;

            animation:navDown .7s ease-out both;

        }


        .brand{

            display:flex;

            align-items:center;

            gap:12px;

            text-decoration:none;

        }


        .brand-mark{

            width:40px;

            height:40px;

            border:1px solid var(--ice);

            display:flex;

            justify-content:center;

            align-items:center;

            color:var(--ice);

            font-family:var(--font-display);

            font-weight:700;

            font-size:14px;

            letter-spacing:1px;

            transition:.3s;

        }


        .brand:hover .brand-mark{

            background:var(--ice);

            color:#0A0C10;

        }


        .brand-name{

            font-family:var(--font-display);

            font-size:21px;

            font-weight:700;

            color:var(--ivory);

        }


        .nav-link{

            color:var(--muted)!important;

            margin-left:22px;

            font-size:14px;

            transition:.25s;

        }


        .nav-link:hover{

            color:var(--ice)!important;

        }


        .cart-nav{

            color:var(--ice)!important;

        }


        /* =========================
           PAGE
        ========================= */

        .cart-page{

            flex:1;

            position:relative;

            padding:80px 0;

            overflow:hidden;

        }


        .cart-page::before{

            content:"";

            position:absolute;

            inset:0;

            background:

                radial-gradient(
                    ellipse at 85% 10%,
                    var(--ice-glow),
                    transparent 45%
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

            opacity:.45;

            pointer-events:none;

        }


        .cart-page .container{

            position:relative;

            z-index:1;

        }


        /* =========================
           PAGE HEADER
        ========================= */

        .eyebrow{

            display:flex;

            align-items:center;

            gap:9px;

            font-family:var(--font-mono);

            font-size:12px;

            letter-spacing:2.5px;

            text-transform:uppercase;

            color:var(--ice);

            margin-bottom:12px;

            animation:fadeUp .7s ease-out both;

        }


        .eyebrow .dot{

            width:6px;

            height:6px;

            border-radius:50%;

            background:var(--ice);

            box-shadow:0 0 10px var(--ice);

        }


        .page-title{

            font-size:clamp(2.3rem,5vw,4rem);

            font-weight:700;

            margin-bottom:10px;

            animation:fadeUp .8s ease-out .1s both;

        }


        .page-title span{

            color:var(--ice);

            text-shadow:0 0 25px var(--ice-glow);

        }


        .page-subtitle{

            color:var(--muted);

            margin-bottom:45px;

            animation:fadeUp .8s ease-out .2s both;

        }


        /* =========================
           PRODUCT CARD
        ========================= */

        .cart-card{

            background:var(--surface);

            border:1px solid var(--hairline);

            border-radius:4px;

            padding:22px;

            margin-bottom:16px;

            transition:.3s;

            animation:cardIn .7s ease-out both;

        }


        .cart-card:hover{

            border-color:var(--ice-dim);

            transform:translateY(-4px);

            box-shadow:0 15px 35px rgba(0,0,0,.25);

        }


        .product-image{

            width:90px;

            height:90px;

            object-fit:cover;

            border-radius:4px;

            border:1px solid var(--hairline);

            transition:.3s;

        }


        .cart-card:hover .product-image{

            border-color:var(--ice-dim);

            transform:scale(1.04);

        }


        .product-name{

            color:var(--ivory);

            font-weight:600;

            margin-bottom:6px;

        }


        .product-category{

            color:var(--muted);

            font-family:var(--font-mono);

            font-size:11px;

            text-transform:uppercase;

            letter-spacing:1px;

        }


        .product-price{

            color:var(--ice);

            font-family:var(--font-mono);

            font-weight:600;

        }


        /* =========================
           QUANTITY
        ========================= */

        .quantity-form{

            display:flex;

            gap:8px;

            align-items:center;

        }


        .quantity{

            width:70px;

            background:var(--surface-2);

            border:1px solid var(--hairline);

            color:var(--ivory);

            border-radius:4px;

            text-align:center;

        }


        .quantity:focus{

            background:var(--surface-2);

            color:var(--ivory);

            border-color:var(--ice);

            box-shadow:0 0 0 3px var(--ice-glow);

        }


        .update-btn{

            background:transparent;

            border:1px solid var(--ice-dim);

            color:var(--ice);

            border-radius:4px;

            padding:7px 10px;

            transition:.25s;

        }


        .update-btn:hover{

            background:var(--ice);

            color:#0A0C10;

        }


        /* =========================
           REMOVE BUTTON
        ========================= */

        .remove-btn{

            width:40px;

            height:40px;

            display:flex;

            align-items:center;

            justify-content:center;

            background:transparent;

            border:1px solid rgba(248,113,113,.25);

            color:#f87171;

            border-radius:4px;

            transition:.25s;

        }


        .remove-btn:hover{

            background:#f87171;

            border-color:#f87171;

            color:#0A0C10;

            transform:scale(1.05);

        }


        /* =========================
           SUMMARY
        ========================= */

        .total-card{

            background:var(--surface);

            border:1px solid var(--hairline);

            border-radius:4px;

            padding:30px;

            position:sticky;

            top:100px;

            animation:cardIn .8s ease-out .25s both;

        }


        .summary-title{

            font-size:22px;

            margin-bottom:25px;

        }


        .summary-label{

            color:var(--muted);

        }


        .summary-value{

            color:var(--ivory);

            font-family:var(--font-mono);

        }


        .total-price{

            color:var(--ice);

            font-family:var(--font-display);

            font-weight:700;

        }


        .checkout-btn{

            width:100%;

            background:var(--ice);

            border:1px solid var(--ice);

            color:#0A0C10;

            padding:13px;

            font-weight:600;

            border-radius:4px;

            transition:.25s;

        }


        .checkout-btn:hover{

            background:var(--ice-light);

            border-color:var(--ice-light);

            transform:translateY(-3px);

            box-shadow:0 12px 25px rgba(0,0,0,.3);

        }


        /* =========================
           EMPTY CART
        ========================= */

        .empty-cart{

            text-align:center;

            padding:90px 20px;

            animation:fadeUp .8s ease-out both;

        }


        .empty-icon{

            width:90px;

            height:90px;

            margin:0 auto 25px;

            border:1px solid var(--ice-dim);

            border-radius:50%;

            display:flex;

            justify-content:center;

            align-items:center;

            color:var(--ice);

            font-size:38px;

            box-shadow:0 0 30px var(--ice-glow);

        }


        .empty-cart h3{

            font-size:28px;

        }


        .empty-cart p{

            color:var(--muted);

        }


        .continue-btn{

            display:inline-block;

            margin-top:15px;

            background:var(--ice);

            color:#0A0C10;

            border:1px solid var(--ice);

            padding:11px 25px;

            border-radius:4px;

            text-decoration:none;

            font-weight:600;

            transition:.25s;

        }


        .continue-btn:hover{

            background:var(--ice-light);

            color:#0A0C10;

            transform:translateY(-3px);

        }


        /* =========================
           FOOTER
        ========================= */

        footer{

            background:#080A0E;

            border-top:1px solid var(--hairline);

            color:var(--muted);

            padding:30px 0;

        }


        footer strong{

            color:var(--ivory);

            font-family:var(--font-display);

        }


        /* =========================
           ANIMATIONS
        ========================= */

        @keyframes navDown{

            from{

                opacity:0;

                transform:translateY(-20px);

            }

            to{

                opacity:1;

                transform:translateY(0);

            }

        }


        @keyframes fadeUp{

            from{

                opacity:0;

                transform:translateY(25px);

            }

            to{

                opacity:1;

                transform:translateY(0);

            }

        }


        @keyframes cardIn{

            from{

                opacity:0;

                transform:translateY(25px);

            }

            to{

                opacity:1;

                transform:translateY(0);

            }

        }


        /* Stagger product cards */

        .cart-card:nth-child(1){
            animation-delay:.05s;
        }

        .cart-card:nth-child(2){
            animation-delay:.12s;
        }

        .cart-card:nth-child(3){
            animation-delay:.19s;
        }

        .cart-card:nth-child(4){
            animation-delay:.26s;
        }


        /* =========================
           MOBILE
        ========================= */

        @media(max-width:991px){

            .nav-links{

                margin-top:15px;

                text-align:center;

            }


            .nav-link{

                margin-left:10px;

            }


            .total-card{

                position:static;

            }

        }


        @media(max-width:767px){

            .cart-page{

                padding:55px 0;

            }


            .cart-card{

                padding:18px;

            }


            .product-image{

                margin-bottom:15px;

            }


            .quantity-form{

                margin-top:15px;

            }


            .remove-btn{

                margin-top:15px;

            }

        }


        @media(max-width:576px){

            .brand-name{

                font-size:19px;

            }


            .page-title{

                font-size:2.4rem;

            }

        }


        @media(prefers-reduced-motion:reduce){

            *{

                animation:none!important;

                transition:none!important;

            }

        }

    </style>

</head>


<body>


<!-- =========================
     NAVBAR
========================= -->

<nav class="navbar">

    <div class="container">

        <div class="d-flex justify-content-between align-items-center">

            <a href="/" class="brand">

                <span class="brand-mark">
                    TH
                </span>

                <span class="brand-name">
                    TechHub
                </span>

            </a>


            <div class="nav-links">

                <a class="nav-link d-inline"
                   href="/">

                    Home

                </a>


                <a class="nav-link d-inline"
                   href="/about">

                    About

                </a>


                <a class="nav-link d-inline"
                   href="/contact">

                    Contact

                </a>


                <a class="nav-link cart-nav d-inline"
                   href="/cart">

                    <i class="bi bi-cart3 me-1"></i>

                    Cart

                </a>

            </div>

        </div>

    </div>

</nav>


<!-- =========================
     CART PAGE
========================= -->

<main class="cart-page">

    <div class="container">


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


                <!-- =================
                     PRODUCTS
                ================= -->

                <div class="col-lg-8">


                    @foreach($cart as $id => $item)


                        <div class="cart-card">


                            <div class="row align-items-center g-3">


                                <!-- IMAGE -->

                                <div class="col-md-2 col-12 text-center">

                                    <img
                                        src="{{ $item['image'] }}"
                                        class="product-image"
                                        alt="{{ $item['name'] }}"
                                    >

                                </div>


                                <!-- NAME -->

                                <div class="col-md-3 col-12">

                                    <h5 class="product-name">

                                        {{ $item['name'] }}

                                    </h5>

                                    <div class="product-category">

                                        {{ $item['category'] }}

                                    </div>

                                </div>


                                <!-- PRICE -->

                                <div class="col-md-2 col-6">

                                    <span class="small"
                                          style="color:var(--muted);">

                                        PRICE

                                    </span>

                                    <div class="product-price">

                                        ₹{{ number_format($item['price']) }}

                                    </div>

                                </div>


                                <!-- QUANTITY -->

                                <div class="col-md-3 col-6">

                                    <span class="small"
                                          style="color:var(--muted);">

                                        QUANTITY

                                    </span>


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


                                <!-- REMOVE -->

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


                <!-- =================
                     SUMMARY
                ================= -->

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

                            <span style="color:var(--ice);">

                                Ready

                            </span>

                        </div>


                        <hr style="border-color:var(--hairline);">


                        <div class="d-flex justify-content-between align-items-center mb-4">

                            <span class="summary-label">

                                Total

                            </span>


                            <span class="total-price fs-3">

                                ₹{{ number_format($total) }}

                            </span>

                        </div>


                        <button
                            class="checkout-btn"
                            type="button"
                        >

                            Proceed to Checkout

                            <i class="bi bi-arrow-right ms-2"></i>

                        </button>


                    </div>

                </div>


            </div>


        @else


            <!-- =================
                 EMPTY CART
            ================= -->

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


<!-- =========================
     FOOTER
========================= -->

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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>