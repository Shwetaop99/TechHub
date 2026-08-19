<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Orders — TechHub Admin</title>
    <<link
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
                radial-gradient(circle at 8% 90%, rgba(124,58,237,.05), transparent 30%),
                var(--bg);

            color: var(--text);
            font-family: var(--body);
        }

        h1,h2,h3,h4,h5,h6 {
            font-family: var(--display);
            font-weight: 700;
        }

        /* TOP GRADIENT LINE */

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

        /* LAYOUT */

        .admin-layout {
            min-height: 100vh;
            display: flex;
        }

        /* SIDEBAR */

        .sidebar {
            width: 265px;
            min-height: 100vh;

            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;

            z-index: 100;

            padding: 28px 20px;

            background: rgba(255,255,255,.95);

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

            box-shadow: 0 8px 22px rgba(37,99,235,.16);

            transition: .25s ease;
        }

        .brand:hover .brand-mark {
            transform: translateY(-2px);
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
            opacity: 1;
            margin-bottom: 22px;
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

        /* MAIN */

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

        /* HEADER */

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

        .new-orders {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            background: rgba(220,38,38,.07);

            color: var(--red);

            border: 1px solid rgba(220,38,38,.16);

            border-radius: 999px;

            padding: 9px 14px;

            font-size: 11px;
            font-weight: 700;

            font-family: var(--mono);

            letter-spacing: .4px;
        }

        .new-orders i {
            font-size: 8px;
        }

        /* ALERT */

        .success-alert {
            border: 1px solid rgba(22,163,74,.18);

            background: rgba(22,163,74,.055);

            color: #15803d;

            border-radius: 12px;

            padding: 13px 16px;

            font-size: 13px;
        }

        /* ORDER CARD */

        .order-card {
            position: relative;

            background: rgba(255,255,255,.96);

            border: 1px solid var(--line);

            border-radius: 18px;

            margin-bottom: 18px;

            overflow: hidden;

            box-shadow: 0 9px 30px rgba(15,23,42,.045);

            transition: .25s ease;

            animation: fadeUp .7s ease-out both;
        }

        .order-card:hover {
            transform: translateY(-3px);

            border-color: rgba(37,99,235,.18);

            box-shadow: 0 17px 40px rgba(15,23,42,.08);
        }

        .order-card.unread {
            border-color: rgba(37,99,235,.34);

            box-shadow:
                0 12px 35px rgba(37,99,235,.075),
                inset 3px 0 0 var(--blue);
        }

        .order-header {
            padding: 20px;

            border-bottom: 1px solid var(--line);

            background: linear-gradient(
                90deg,
                #ffffff,
                #f9fbff
            );
        }

        .order-number {
            font-family: var(--mono);

            color: var(--text);

            font-size: 12px;
            font-weight: 700;
        }

        .new-badge {
            display: inline-flex;

            align-items: center;

            background: rgba(220,38,38,.08);

            color: var(--red);

            border: 1px solid rgba(220,38,38,.16);

            padding: 4px 9px;

            border-radius: 999px;

            font-family: var(--mono);

            font-size: 8px;

            letter-spacing: 1px;

            font-weight: 700;
        }

        .label {
            color: #98a2b3;

            font-family: var(--mono);

            font-size: 8px;

            letter-spacing: 1.2px;

            text-transform: uppercase;
        }

        .customer-name {
            color: var(--text);

            font-size: 13px;

            font-weight: 700;
        }

        .customer-email {
            color: var(--muted);

            font-size: 12px;
        }

        .order-date {
            color: var(--muted);

            font-family: var(--mono);

            font-size: 10px;
        }

        .order-body {
            padding: 22px 20px;
        }

        /* PRODUCT */

        .product-image {
            width: 78px;
            height: 78px;

            object-fit: cover;

            border-radius: 13px;

            border: 1px solid var(--line);

            background: #f8fafc;

            box-shadow: 0 5px 15px rgba(15,23,42,.06);
        }

        .product-name {
            color: var(--text);

            font-size: 14px;

            font-weight: 700;
        }

        .product-category {
            color: var(--muted);

            font-family: var(--mono);

            font-size: 9px;

            text-transform: uppercase;

            letter-spacing: .7px;
        }

        .muted {
            color: var(--muted);
        }

        .quantity-number {
            color: var(--text);

            font-size: 17px;

            font-weight: 700;
        }

        .total-price {
            color: var(--blue);

            font-family: var(--mono);

            font-size: 16px;

            font-weight: 700;
        }

        /* STATUS */

        .status {
            background: #f8fafc;

            color: var(--blue);

            border: 1px solid rgba(37,99,235,.16);

            border-radius: 10px;

            min-height: 42px;

            font-size: 12px;

            font-weight: 600;
        }

        .status:focus {
            border-color: var(--blue);

            box-shadow: 0 0 0 3px rgba(37,99,235,.08);
        }

        /* PAYMENT */

        .payment-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;

            padding: 7px 10px;

            border-radius: 9px;

            font-size: 10px;
            font-weight: 700;

            border: 1px solid rgba(37,99,235,.14);

            background: rgba(37,99,235,.06);

            color: var(--blue);
        }

        .payment-status {
            display: block;

            margin-top: 6px;

            font-family: var(--mono);

            font-size: 8px;

            letter-spacing: .7px;

            text-transform: uppercase;

            color: var(--muted);
        }

        .btn-ice {
            width: 100%;

            background: linear-gradient(
                135deg,
                var(--blue),
                var(--indigo)
            );

            border: none;

            color: #ffffff;

            border-radius: 10px;

            padding: 9px 13px;

            font-size: 11px;

            font-weight: 700;

            transition: .2s ease;

            box-shadow: 0 7px 18px rgba(37,99,235,.13);
        }

        .btn-ice:hover {
            background: linear-gradient(
                135deg,
                var(--indigo),
                var(--purple)
            );

            color: #ffffff;

            transform: translateY(-2px);

            box-shadow: 0 10px 23px rgba(37,99,235,.19);
        }

        /* EMPTY STATE */

        .empty-state {
            text-align: center;

            padding: 85px 20px;

            background: rgba(255,255,255,.9);

            border: 1px solid var(--line);

            border-radius: 18px;

            box-shadow: 0 9px 30px rgba(15,23,42,.04);
        }

        .empty-state-icon {
            width: 75px;
            height: 75px;

            margin: 0 auto 18px;

            display: grid;
            place-items: center;

            border-radius: 20px;

            background: #f1f5f9;

            color: #98a2b3;

            font-size: 32px;
        }

        .empty-state h3 {
            margin-bottom: 7px;
        }

        /* ANIMATIONS */

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

        /* MOBILE */

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

            .sidebar-link {
                width: 100%;
            }

            .page-title {
                font-size: 2.2rem;
            }

            .order-header,
            .order-body {
                padding: 17px;
            }

            .product-image {
                width: 65px;
                height: 65px;
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

<div class="admin-layout">

    <!-- =========================================================
         SIDEBAR
    ========================================================== -->

    <aside class="sidebar">

        <a href="/admin" class="brand">

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
           class="sidebar-link">

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

        <a href="/admin/orders"
           class="sidebar-link active">

            <i class="bi bi-cart-check"></i>
            Orders

        </a>

        <a href="/admin/customers"
           class="sidebar-link">

            <i class="bi bi-people"></i>
            Customers

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

                        Order Management

                    </div>

                    <h1 class="page-title">

                        Customer <span>Orders</span>

                    </h1>

                    <p class="page-subtitle mb-0">

                        Manage customer orders and update their status from here.

                    </p>

                </div>


                <div class="col-lg-4 text-lg-end header-actions">

                    <span class="new-orders">

                        <i class="bi bi-circle-fill"></i>

                        {{ $newOrders }} New Orders

                    </span>

                </div>

            </div>


            @if(session('success'))

                <div class="success-alert mb-4">

                    <i class="bi bi-check-circle me-2"></i>

                    {{ session('success') }}

                </div>

            @endif


            @if($orders->count() > 0)

                @foreach($orders as $order)

                    <div
                        class="order-card {{ !$order->is_read ? 'unread' : '' }}"
                    >

                        <!-- ORDER HEADER -->

                        <div class="order-header">

                            <div class="row align-items-center g-3">

                                <div class="col-md-3">

                                    <div class="label mb-1">
                                        Order
                                    </div>

                                    <strong class="order-number">

                                        #{{ $order->id }}

                                    </strong>


                                    @if(!$order->is_read)

                                        <span class="new-badge ms-2">

                                            NEW

                                        </span>

                                    @endif

                                </div>


                                <div class="col-md-3">

                                    <div class="label">
                                        Customer
                                    </div>

                                    <div class="customer-name">

                                        {{ $order->user->name ?? 'Unknown' }}

                                    </div>

                                </div>


                                <div class="col-md-3">

                                    <div class="label">
                                        Email
                                    </div>

                                    <div class="customer-email">

                                        {{ $order->user->email ?? 'N/A' }}

                                    </div>

                                </div>


                                <div class="col-md-3 text-md-end">

                                    <div class="label">
                                        Ordered
                                    </div>

                                    <div class="order-date">

                                        {{ $order->created_at->format('d M Y, h:i A') }}

                                    </div>

                                </div>

                            </div>

                        </div>


                        <!-- ORDER BODY -->

                        <div class="order-body">

                            <div class="row align-items-center g-4">


                                <!-- PRODUCT -->

                                <div class="col-lg-5">

                                    <div class="d-flex align-items-center">

                                        @if($order->product)

                                            <img
                                                src="{{ $order->product->image }}"
                                                class="product-image me-3"
                                                alt="{{ $order->product->name }}"
                                            >

                                        @endif

                                        <div>

                                            <div class="product-name">

                                                {{ $order->product->name ?? 'Product removed' }}

                                            </div>

                                            <div class="product-category mt-1">

                                                {{ $order->product->category ?? '' }}

                                            </div>

                                        </div>

                                    </div>

                                </div>


                                <!-- QUANTITY -->

                                <div class="col-lg-2">

                                    <div class="label mb-1">
                                        Quantity
                                    </div>

                                    <div class="quantity-number">

                                        {{ $order->quantity }}

                                    </div>

                                </div>


                                <!-- TOTAL -->

                                <div class="col-lg-2">

                                    <div class="label mb-1">
                                        Total
                                    </div>

                                    <div class="total-price">

                                        ₹{{ number_format($order->total) }}

                                    </div>

                                </div>


                                <!-- PAYMENT -->

                                <div class="col-lg-3">

                                    <div class="label mb-1">
                                        Payment
                                    </div>

                                    @php
                                        $paymentType = $order->payment_type ?? null;
                                    @endphp

                                    @if($paymentType === 'upi')

                                        <div class="payment-badge">
                                            <i class="bi bi-qr-code"></i>
                                            UPI / QR
                                        </div>

                                    @elseif($paymentType === 'card')

                                        <div class="payment-badge">
                                            <i class="bi bi-credit-card"></i>
                                            Credit / Debit Card
                                        </div>

                                    @elseif($paymentType === 'cod')

                                        <div class="payment-badge">
                                            <i class="bi bi-cash-coin"></i>
                                            Cash on Delivery
                                        </div>

                                    @elseif($order->payment_method === 'online')

                                        <div class="payment-badge">
                                            <i class="bi bi-credit-card"></i>
                                            Online Payment
                                        </div>

                                    @else

                                        <div class="payment-badge">
                                            <i class="bi bi-cash-coin"></i>
                                            Cash on Delivery
                                        </div>

                                    @endif

                                    <span class="payment-status">
                                        Payment:
                                        {{ ucfirst($order->payment_status ?? 'pending') }}
                                    </span>

                                </div>


                                <!-- STATUS -->

                                <div class="col-lg-3">

                                    <form
                                        action="{{ url('/admin/orders/' . $order->id . '/status') }}"
                                        method="POST"
                                    >

                                        @csrf

                                        <select
    name="status"
    class="form-select status mb-2"
    onchange="this.form.submit()"
>

    <option
        value="pending"
        {{ $order->status === 'pending' ? 'selected' : '' }}
    >
        Pending
    </option>

    <option
        value="processing"
        {{ $order->status === 'processing' ? 'selected' : '' }}
    >
        Processing
    </option>

    <option
        value="shipped"
        {{ $order->status === 'shipped' ? 'selected' : '' }}
    >
        Shipped
    </option>

    <option
        value="out_for_delivery"
        {{ $order->status === 'out_for_delivery' ? 'selected' : '' }}
    >
        Out for Delivery
    </option>

    <option
        value="delivered"
        {{ $order->status === 'delivered' ? 'selected' : '' }}
    >
        Delivered
    </option>

    <option
        value="cancelled"
        {{ $order->status === 'cancelled' ? 'selected' : '' }}
    >
        Cancelled
    </option>

</select>

                                    </form>


                                    @if(!$order->is_read)

                                        <form
                                            action="{{ url('/admin/orders/' . $order->id . '/read') }}"
                                            method="POST"
                                        >

                                            @csrf

                                            <button
                                                type="submit"
                                                class="btn btn-ice btn-sm"
                                            >

                                                <i class="bi bi-check2 me-1"></i>

                                                Mark as Read

                                            </button>

                                        </form>

                                    @endif

                                </div>

                            </div>

                        </div>

                    </div>

                @endforeach

            @else

                <div class="empty-state">

                    <div class="empty-state-icon">

                        <i class="bi bi-cart-x"></i>

                    </div>

                    <h3>
                        No orders yet
                    </h3>

                    <p class="muted mb-0">

                        New customer orders will appear here.

                    </p>

                </div>

            @endif

        </div>

    </main>

</div>


<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js">
</script>

</body>

</html>