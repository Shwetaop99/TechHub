<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>My Orders - TechHub</title>

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
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        rel="stylesheet"
    >

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f7f9fc;
            color: #172033;
            font-family: Arial, sans-serif;
        }


        /* NAVBAR */

        .navbar {
            height: 90px;
            background: #ffffff;
            border-bottom: 1px solid #e5eaf1;
            display: flex;
            align-items: center;
        }

        .navbar-inner {
            width: 92%;
            max-width: 1250px;
            margin: auto;

            display: flex;
            align-items: center;
            justify-content: space-between;
        }


        /* LOGO */

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;

            text-decoration: none;
            color: #172033;
            font-size: 24px;
            font-weight: 700;
        }

        .brand-logo {
            width: 48px;
            height: 48px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 13px;

            background: linear-gradient(
                135deg,
                #2563eb,
                #4f46e5
            );

            color: white;
            font-weight: 800;
            font-size: 17px;

            box-shadow: 0 8px 20px rgba(37, 99, 235, .20);
        }

        .brand span span {
            color: #2563eb;
        }


        /* NAV LINKS */

        .nav-links {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .nav-links a {
            text-decoration: none;
            color: #667085;
            font-weight: 600;
            transition: .2s;
        }

        .nav-links a:hover {
            color: #2563eb;
        }

        .home-btn {
            padding: 10px 17px;
            border: 1px solid #dbe3ef;
            border-radius: 10px;
            background: white;
        }


        /* PAGE */

        .page {
            width: 92%;
            max-width: 1100px;
            margin: 45px auto 70px;
        }

        .page-heading {
            margin-bottom: 30px;
        }

        .page-heading h1 {
            margin: 0;
            font-size: 38px;
            font-weight: 800;
            letter-spacing: -.7px;
        }

        .page-heading p {
            margin-top: 8px;
            color: #7b8494;
            font-size: 15px;
        }


        /* ORDER CARD */

        .order-card {
            background: #ffffff;

            border: 1px solid #e4e9f0;

            border-radius: 18px;

            margin-bottom: 24px;

            overflow: hidden;

            box-shadow:
                0 8px 30px rgba(25, 40, 70, .06);

            transition: .25s;
        }

        .order-card:hover {
            transform: translateY(-2px);

            box-shadow:
                0 14px 35px rgba(25, 40, 70, .09);
        }


        /* ORDER TOP */

        .order-top {
            padding: 22px 25px;

            border-bottom: 1px solid #edf0f5;

            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .order-number {
            font-size: 18px;
            font-weight: 800;
        }

        .order-date {
            color: #8992a2;
            font-size: 13px;
            margin-top: 5px;
        }


        /* STATUS */

        .status-badge {
            padding: 8px 14px;

            border-radius: 30px;

            font-size: 12px;

            font-weight: 700;

            text-transform: uppercase;

            letter-spacing: .4px;
        }

        .status-pending {
            background: #fff7df;
            color: #a16a00;
        }

        .status-processing {
            background: #eef5ff;
            color: #2563eb;
        }

        .status-shipped {
            background: #f1edff;
            color: #6546d7;
        }

        .status-out_for_delivery {
            background: #fff0e6;
            color: #d65a00;
        }

        .status-delivered {
            background: #e9f9ef;
            color: #168344;
        }

        .status-cancelled {
            background: #ffecec;
            color: #d93030;
        }


        /* ORDER CONTENT */

        .order-content {
            padding: 25px;
        }

        .product-section {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .product-image {
            width: 90px;
            height: 90px;

            object-fit: cover;

            border-radius: 14px;

            border: 1px solid #e4e9f0;

            background: #f7f9fc;
        }

        .product-placeholder {
            width: 90px;
            height: 90px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 14px;

            background: #f1f4f8;

            color: #98a1b2;

            font-size: 30px;
        }

        .product-name {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .product-info {
            color: #7d8797;
            font-size: 14px;
        }


        /* PRICE */

        .order-details {
            margin-top: 24px;

            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 15px;
        }

        .detail-box {
            background: #f8fafc;

            border: 1px solid #edf0f4;

            border-radius: 12px;

            padding: 15px;
        }

        .detail-label {
            display: block;

            color: #8a94a5;

            font-size: 12px;

            margin-bottom: 5px;

            text-transform: uppercase;

            letter-spacing: .5px;
        }

        .detail-value {
            font-size: 16px;
            font-weight: 700;
        }

        .price {
            color: #2563eb;
        }


        /* TRACKING */

        .tracking {
            margin-top: 28px;

            padding-top: 24px;

            border-top: 1px solid #edf0f5;
        }

        .tracking-title {
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 22px;
        }

        .timeline {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;

            position: relative;
        }

        .timeline::before {
            content: "";

            position: absolute;

            top: 13px;
            left: 8%;
            right: 8%;

            height: 3px;

            background: #e5e9ef;

            z-index: 0;
        }

        .step {
            position: relative;
            z-index: 1;

            text-align: center;

            width: 20%;
        }

        .step-dot {
            width: 27px;
            height: 27px;

            margin: 0 auto 9px;

            border-radius: 50%;

            background: #e5e9ef;

            border: 4px solid #ffffff;

            box-shadow: 0 0 0 1px #dce2eb;
        }

        .step.active .step-dot {
            background: #2563eb;

            box-shadow:
                0 0 0 1px #2563eb,
                0 4px 12px rgba(37, 99, 235, .25);
        }

        .step.completed .step-dot {
            background: #2563eb;
            box-shadow: 0 0 0 1px #2563eb;
        }

        .step-label {
            font-size: 11px;
            color: #98a1b0;
            font-weight: 600;
        }

        .step.active .step-label,
        .step.completed .step-label {
            color: #2563eb;
        }


        /* EMPTY */

        .empty-orders {
            background: white;

            border: 1px solid #e4e9f0;

            border-radius: 18px;

            text-align: center;

            padding: 70px 25px;

            box-shadow:
                0 8px 30px rgba(25, 40, 70, .05);
        }

        .empty-orders i {
            font-size: 60px;
            color: #b6bfcc;
        }

        .empty-orders h3 {
            margin-top: 20px;
            font-weight: 700;
        }

        .empty-orders p {
            color: #8992a2;
        }

        .shop-btn {
            display: inline-block;

            margin-top: 10px;

            padding: 11px 20px;

            border-radius: 10px;

            background: #2563eb;

            color: white;

            text-decoration: none;

            font-weight: 700;
        }

        .shop-btn:hover {
            background: #1d4ed8;
            color: white;
        }


        /* MOBILE */

        @media(max-width: 768px) {

            .navbar {
                height: auto;
                padding: 15px 0;
            }

            .nav-links a:not(.home-btn) {
                display: none;
            }

            .page {
                margin-top: 30px;
            }

            .page-heading h1 {
                font-size: 30px;
            }

            .order-top {
                align-items: flex-start;
                flex-direction: column;
            }

            .order-content {
                padding: 20px;
            }

            .order-details {
                grid-template-columns: 1fr;
            }

            .timeline {
                overflow-x: auto;
                padding-bottom: 10px;
            }

            .step {
                min-width: 100px;
            }

        }

    </style>

</head>


<body>


<!-- NAVBAR -->

<nav class="navbar">

    <div class="navbar-inner">

        <a
            href="{{ url('/') }}"
            class="brand"
        >

            <div class="brand-logo">
                TH
            </div>

            <span>
                Tech<span>Hub</span>
            </span>

        </a>


        <div class="nav-links">

            <a href="{{ url('/') }}">
                Home
            </a>

            <a
                href="{{ url('/about') }}"
                class="d-none d-md-inline"
            >
                About
            </a>

            <a
                href="{{ url('/contact') }}"
                class="d-none d-md-inline"
            >
                Contact
            </a>

            <a
                href="{{ url('/cart') }}"
                class="d-none d-sm-inline"
            >
                <i class="bi bi-bag"></i>
                Cart
            </a>

            <a
                href="{{ url('/') }}"
                class="home-btn"
            >
                Continue Shopping
            </a>

        </div>

    </div>

</nav>


<!-- PAGE -->

<div class="page">


    <div class="page-heading">

        <h1>
            <i
                class="bi bi-box-seam"
                style="color:#2563eb;"
            ></i>

            My Orders
        </h1>

        <p>
            Track your TechHub orders and delivery status.
        </p>

    </div>


    @if($orders->count() > 0)


        @foreach($orders as $order)


            @php

                $statuses = [
                    'pending',
                    'processing',
                    'shipped',
                    'out_for_delivery',
                    'delivered'
                ];

                $currentIndex = array_search(
                    $order->status,
                    $statuses
                );

            @endphp


            <div class="order-card">


                <!-- ORDER HEADER -->

                <div class="order-top">

                    <div>

                        <div class="order-number">
                            Order #{{ $order->id }}
                        </div>

                        <div class="order-date">

                            Ordered
                            {{ $order->created_at->format('d M Y, h:i A') }}

                        </div>

                    </div>


                    <span
                        class="status-badge status-{{ $order->status }}"
                    >

                        {{ ucwords(
                            str_replace(
                                '_',
                                ' ',
                                $order->status
                            )
                        ) }}

                    </span>

                </div>


                <!-- ORDER CONTENT -->

                <div class="order-content">


                    <!-- PRODUCT -->

                    <div class="product-section">

                        @if($order->product)

                            @if($order->product->image)

                                <img
                                    src="{{ $order->product->image }}"
                                    class="product-image"
                                    alt="{{ $order->product->name }}"
                                >

                            @else

                                <div class="product-placeholder">

                                    <i class="bi bi-box"></i>

                                </div>

                            @endif

                            <div>

                                <div class="product-name">

                                    {{ $order->product->name }}

                                </div>

                                <div class="product-info">

                                    {{ $order->product->category }}

                                </div>

                            </div>

                        @else

                            <div class="product-placeholder">

                                <i class="bi bi-box"></i>

                            </div>

                            <div>

                                <div class="product-name">

                                    Product no longer available

                                </div>

                            </div>

                        @endif

                    </div>


                    <!-- DETAILS -->

                    <div class="order-details">

                        <div class="detail-box">

                            <span class="detail-label">
                                Quantity
                            </span>

                            <span class="detail-value">
                                {{ $order->quantity }}
                            </span>

                        </div>


                        <div class="detail-box">

                            <span class="detail-label">
                                Price
                            </span>

                            <span class="detail-value">
                                ₹{{ number_format($order->price) }}
                            </span>

                        </div>


                        <div class="detail-box">

                            <span class="detail-label">
                                Total
                            </span>

                            <span class="detail-value price">
                                ₹{{ number_format($order->total) }}
                            </span>

                        </div>

                    </div>


                    <!-- TRACKING -->

                    @if($order->status !== 'cancelled')

                        <div class="tracking">

                            <div class="tracking-title">

                                <i class="bi bi-truck me-1"></i>

                                Order Tracking

                            </div>


                            <div class="timeline">


                                @foreach($statuses as $index => $status)

                                    @php

                                        $isCompleted =
                                            $currentIndex !== false &&
                                            $index < $currentIndex;

                                        $isActive =
                                            $currentIndex !== false &&
                                            $index === $currentIndex;

                                    @endphp


                                    <div
                                        class="
                                            step
                                            {{ $isCompleted ? 'completed' : '' }}
                                            {{ $isActive ? 'active' : '' }}
                                        "
                                    >

                                        <div class="step-dot"></div>

                                        <div class="step-label">

                                            {{ ucwords(
                                                str_replace(
                                                    '_',
                                                    ' ',
                                                    $status
                                                )
                                            ) }}

                                        </div>

                                    </div>

                                @endforeach


                            </div>

                        </div>

                    @else

                        <div class="tracking">

                            <div
                                class="text-danger fw-bold"
                            >

                                <i class="bi bi-x-circle me-1"></i>

                                This order has been cancelled.

                            </div>

                        </div>

                    @endif


                </div>

            </div>


        @endforeach


    @else


        <div class="empty-orders">

            <i class="bi bi-bag-x"></i>

            <h3>
                No Orders Yet
            </h3>

            <p>
                You haven't placed any orders yet.
            </p>

            <a
                href="{{ url('/') }}"
                class="shop-btn"
            >
                Start Shopping
            </a>

        </div>


    @endif


</div>


</body>

</html>