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
            --blue: #2563eb;
            --indigo: #4f46e5;
            --purple: #7c3aed;
            --green: #16a34a;
            --red: #dc2626;
            --text: #111827;
            --muted: #667085;
            --line: #e5e7eb;
            --bg: #f6f8fb;
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
                var(--bg);
            color: var(--text);
            font-family: Arial, Helvetica, sans-serif;
        }

        h1, h2, h3, h4, h5, h6 {
            font-weight: 700;
        }

        /* Top animated line */

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

        /* Layout */

        .admin-layout {
            min-height: 100vh;
        }

        /* Sidebar */

        .sidebar {
            width: 265px;
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            z-index: 100;
            padding: 28px 20px;
            background: rgba(255,255,255,.96);
            border-right: 1px solid var(--line);
            box-shadow: 8px 0 35px rgba(15,23,42,.04);
            backdrop-filter: blur(15px);
            animation: sidebarIn .6s ease-out;
        }

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
            background: linear-gradient(135deg, var(--blue), var(--indigo));
            color: white;
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
            color: var(--text);
            font-size: 21px;
            font-weight: 700;
        }

        .brand-name span {
            color: var(--blue);
        }

        .admin-label {
            margin: 12px 0 25px 54px;
            color: var(--blue);
            font-size: 9px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .sidebar hr {
            border-color: var(--line);
            opacity: 1;
            margin-bottom: 22px;
        }

        .sidebar-section {
            margin: 0 0 10px 12px;
            color: #98a2b3;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            margin-bottom: 7px;
            border: 1px solid transparent;
            border-radius: 11px;
            color: var(--muted);
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            transition: .2s ease;
        }

        .sidebar-link i {
            width: 20px;
            color: #98a2b3;
            font-size: 17px;
        }

        .sidebar-link:hover {
            color: var(--blue);
            background: #eff6ff;
            border-color: #dbeafe;
            transform: translateX(3px);
        }

        .sidebar-link:hover i,
        .sidebar-link.active,
        .sidebar-link.active i {
            color: var(--blue);
        }

        .sidebar-link.active {
            background: linear-gradient(
                90deg,
                rgba(37,99,235,.09),
                rgba(79,70,229,.04)
            );
            border-color: rgba(37,99,235,.16);
        }

        .sidebar-bottom {
            position: absolute;
            left: 20px;
            right: 20px;
            bottom: 24px;
            padding-top: 18px;
            border-top: 1px solid var(--line);
            color: #98a2b3;
            font-size: 9px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .sidebar-bottom i {
            color: var(--green);
        }

        /* Main */

        .main-content {
            margin-left: 265px;
            width: calc(100% - 265px);
            min-height: 100vh;
            padding: 45px;
            position: relative;
        }

        .content-wrapper {
            max-width: 1500px;
            margin: auto;
            position: relative;
            z-index: 1;
        }

        /* Header */

        .eyebrow {
            display: flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 10px;
            color: var(--blue);
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .eyebrow .dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--green);
            box-shadow: 0 0 10px rgba(22,163,74,.35);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            50% {
                opacity: .45;
            }
        }

        .page-title {
            margin-bottom: 5px;
            font-size: clamp(2rem, 4vw, 3rem);
            letter-spacing: -1.5px;
            animation: fadeUp .6s ease-out;
        }

        .page-title span {
            color: var(--blue);
        }

        .page-subtitle {
            color: var(--muted);
            font-size: 14px;
            animation: fadeUp .6s ease-out .05s both;
        }

        .new-orders {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 14px;
            border: 1px solid rgba(220,38,38,.16);
            border-radius: 999px;
            background: #fef2f2;
            color: var(--red);
            font-size: 11px;
            font-weight: 700;
        }

        .new-orders i {
            font-size: 8px;
        }

        .success-alert {
            padding: 13px 16px;
            border: 1px solid rgba(22,163,74,.18);
            border-radius: 12px;
            background: #f0fdf4;
            color: #15803d;
            font-size: 13px;
        }

        /* Order card */

        .order-card {
            margin-bottom: 18px;
            overflow: hidden;
            border: 1px solid var(--line);
            border-radius: 18px;
            background: rgba(255,255,255,.97);
            box-shadow: 0 9px 30px rgba(15,23,42,.045);
            transition: .25s ease;
            animation: fadeUp .6s ease-out both;
        }

        .order-card:hover {
            transform: translateY(-3px);
            border-color: #bfdbfe;
            box-shadow: 0 17px 40px rgba(15,23,42,.08);
        }

        .order-card.unread {
            border-color: rgba(37,99,235,.34);
            box-shadow:
                0 12px 35px rgba(37,99,235,.07),
                inset 3px 0 0 var(--blue);
        }

        .order-header {
            padding: 20px;
            border-bottom: 1px solid var(--line);
            background: linear-gradient(90deg, #fff, #f9fbff);
        }

        .order-number {
            color: var(--text);
            font-size: 12px;
            font-weight: 700;
        }

        .new-badge {
            display: inline-flex;
            align-items: center;
            padding: 4px 9px;
            border: 1px solid rgba(220,38,38,.16);
            border-radius: 999px;
            background: #fef2f2;
            color: var(--red);
            font-size: 8px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .label {
            color: #98a2b3;
            font-size: 8px;
            font-weight: 700;
            letter-spacing: 1.2px;
            text-transform: uppercase;
        }

        .customer-name {
            color: var(--text);
            font-size: 13px;
            font-weight: 700;
        }

        .customer-email,
        .order-date {
            color: var(--muted);
            font-size: 11px;
        }

        .order-date {
            font-family: monospace;
        }

        .order-body {
            padding: 22px 20px;
        }

        /* Product */

        .product-image {
            width: 78px;
            height: 78px;
            object-fit: cover;
            border: 1px solid var(--line);
            border-radius: 13px;
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
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: .7px;
        }

        .quantity-number {
            color: var(--text);
            font-size: 17px;
            font-weight: 700;
        }

        .total-price {
            color: var(--blue);
            font-size: 16px;
            font-weight: 700;
        }

        /* Order Status */

        .status {
            display: block;
            width: 100%;
            min-height: 44px;
            padding: 9px 30px 9px 11px;
            border: 2px solid #93c5fd;
            border-radius: 10px;
            background: #eff6ff;
            color: #1d4ed8;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            appearance: auto;
        }

        .status:hover {
            border-color: #2563eb;
            background: #dbeafe;
        }

        .status:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37,99,235,.12);
            outline: none;
        }

        /* Payment */

        .payment-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 10px;
            border: 1px solid rgba(37,99,235,.14);
            border-radius: 9px;
            background: #eff6ff;
            color: var(--blue);
            font-size: 10px;
            font-weight: 700;
        }

        .payment-status {
            display: block;
            margin-top: 6px;
            color: var(--muted);
            font-size: 8px;
            letter-spacing: .7px;
            text-transform: uppercase;
        }

        .btn-ice {
            width: 100%;
            padding: 9px 13px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--blue), var(--indigo));
            color: white;
            font-size: 11px;
            font-weight: 700;
            transition: .2s ease;
            box-shadow: 0 7px 18px rgba(37,99,235,.13);
        }

        .btn-ice:hover {
            background: linear-gradient(135deg, var(--indigo), var(--purple));
            color: white;
            transform: translateY(-2px);
        }

        /* Empty */

        .empty-state {
            padding: 85px 20px;
            border: 1px solid var(--line);
            border-radius: 18px;
            background: white;
            text-align: center;
            box-shadow: 0 9px 30px rgba(15,23,42,.04);
        }

        .empty-state-icon {
            width: 75px;
            height: 75px;
            display: grid;
            place-items: center;
            margin: 0 auto 18px;
            border-radius: 20px;
            background: #f1f5f9;
            color: #98a2b3;
            font-size: 32px;
        }

        .empty-state h3 {
            margin-bottom: 7px;
        }

        .muted {
            color: var(--muted);
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(18px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */

        @media (max-width: 991px) {
            .sidebar {
                width: 220px;
            }

            .main-content {
                margin-left: 220px;
                width: calc(100% - 220px);
                padding: 30px;
            }
        }

        @media (max-width: 767px) {
            .admin-layout {
                display: block;
            }

            .sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
                padding: 20px;
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

            .page-title {
                font-size: 2.2rem;
            }
        }

        @media (max-width: 576px) {
            .sidebar-link {
                width: 100%;
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

        @media (prefers-reduced-motion: reduce) {
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

                                <div class="col-lg-4">

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

                                <div class="col-lg-2">

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


                                <!-- ORDER STATUS -->

                                <div class="col-lg-2">

                                    <div class="label mb-1">
                                        Order Status
                                    </div>

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