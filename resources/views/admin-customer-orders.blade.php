<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Customer Orders - TechHub Admin</title>

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

        body {
            background: #f5f7fb;
            font-family: Arial, sans-serif;
            color: #111827;
        }

        .navbar {
            background: #111827;
        }

        .navbar-brand {
            font-size: 25px;
            font-weight: 700;
        }

        .page-container {
            max-width: 1400px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .page-header {
            margin-bottom: 30px;
        }

        .page-header h1 {
            font-weight: 700;
            margin-bottom: 5px;
        }

        .page-header p {
            color: #667085;
            margin: 0;
        }

        .order-card {
            background: white;
            border-radius: 18px;
            border: 1px solid #e5e7eb;
            margin-bottom: 20px;
            overflow: hidden;
        }

        .order-header {
            padding: 18px 22px;
            background: #f8fafc;
            border-bottom: 1px solid #e5e7eb;

            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .order-number {
            font-weight: 700;
            font-size: 17px;
        }

        .order-date {
            color: #667085;
            font-size: 13px;
        }

        .order-body {
            padding: 22px;
        }

        .info-title {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: .8px;
            color: #98a2b3;
            font-weight: 700;
            margin-bottom: 7px;
        }

        .info-value {
            font-weight: 600;
            color: #111827;
        }

        .info-muted {
            color: #667085;
            font-size: 13px;
            margin-top: 3px;
        }

        .product-box {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .product-image {
            width: 65px;
            height: 65px;
            border-radius: 10px;
            object-fit: contain;
            background: #f8fafc;
            border: 1px solid #e5e7eb;
        }

        .amount {
            font-size: 20px;
            font-weight: 800;
            color: #2563eb;
        }

        .payment-badge,
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 10px;
            border-radius: 9px;
            font-size: 11px;
            font-weight: 700;
        }

        .payment-badge {
            background: #eff6ff;
            color: #2563eb;
            border: 1px solid #dbeafe;
        }

        .status-badge {
            background: #fef3c7;
            color: #92400e;
        }

        .upi-box {
            margin-top: 8px;
            padding: 9px 11px;
            border-radius: 9px;
            background: #f8fafc;
            border: 1px solid #e5e7eb;
        }

        .upi-label {
            display: block;
            font-size: 9px;
            color: #98a2b3;
            text-transform: uppercase;
            letter-spacing: .7px;
            margin-bottom: 3px;
        }

        .upi-value {
            font-weight: 700;
            color: #111827;
            word-break: break-all;
        }

        .empty-state {
            background: white;
            border-radius: 18px;
            padding: 70px 20px;
            text-align: center;
            border: 1px solid #e5e7eb;
        }

        .empty-state i {
            font-size: 50px;
            color: #94a3b8;
        }

        .empty-state h4 {
            margin-top: 15px;
            font-weight: 700;
        }

        .empty-state p {
            color: #667085;
        }

        @media (max-width: 768px) {

            .order-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .product-box {
                align-items: flex-start;
            }

        }

    </style>

</head>

<body>


<!-- NAVBAR -->

<nav class="navbar navbar-dark">

    <div class="container-fluid px-4">

        <a
            class="navbar-brand"
            href="/admin"
        >
            TechHub Admin
        </a>

        <div class="d-flex gap-2">

            <a
                href="/admin/settings"
                class="btn btn-outline-light"
            >
                ← Settings
            </a>

            <a
                href="/admin"
                class="btn btn-outline-light"
            >
                Dashboard
            </a>

        </div>

    </div>

</nav>


<!-- PAGE -->

<div class="page-container">

    <div class="page-header">

        <h1>
            <i class="bi bi-box-seam me-2"></i>
            Customer Orders
        </h1>

        <p>
            View customer information, products, payments and delivery details.
        </p>

    </div>


    @if($orders->count() > 0)


        @foreach($orders as $order)

            <div class="order-card">


                <!-- ORDER HEADER -->

                <div class="order-header">

                    <div>

                        <div class="order-number">
                            Order #{{ $order->id }}
                        </div>

                        <div class="order-date">

                            <i class="bi bi-calendar3 me-1"></i>

                           {{ $order->created_at->timezone('Asia/Kolkata')->format('d M Y, h:i A') }}
                        </div>

                    </div>


                    <div>

                        <span class="status-badge">

                            <i class="bi bi-truck"></i>

                            {{ ucfirst($order->status ?? 'pending') }}

                        </span>

                    </div>

                </div>


                <!-- ORDER BODY -->

                <div class="order-body">

                    <div class="row g-4">


                        <!-- CUSTOMER -->

                        <div class="col-lg-3 col-md-6">

                            <div class="info-title">
                                Customer
                            </div>

                            <div class="info-value">

                                {{ $order->user->name ?? 'Guest' }}

                            </div>

                            @if($order->user)

                                <div class="info-muted">

                                    <i class="bi bi-envelope me-1"></i>

                                    {{ $order->user->email }}

                                </div>

                            @endif

                        </div>


                        <!-- PRODUCT -->

                        <div class="col-lg-4 col-md-6">

                            <div class="info-title">
                                Product
                            </div>

                            <div class="product-box">

                                @if($order->product && $order->product->image)

                                    <img
                                        src="{{ $order->product->image }}"
                                        class="product-image"
                                        alt="{{ $order->product->name }}"
                                    >

                                @endif

                                <div>

                                    <div class="info-value">

                                        {{ $order->product->name ?? 'Product deleted' }}

                                    </div>

                                    <div class="info-muted">

                                        Quantity:
                                        {{ $order->quantity }}

                                    </div>

                                    <div class="info-muted">

                                        Price:
                                        ₹{{ number_format($order->price) }}

                                    </div>

                                </div>

                            </div>

                        </div>


                        <!-- AMOUNT -->

                        <div class="col-lg-2 col-md-6">

                            <div class="info-title">
                                Amount
                            </div>

                            <div class="amount">

                                ₹{{ number_format($order->total) }}

                            </div>

                        </div>


                        <!-- PAYMENT -->

                        <div class="col-lg-3 col-md-6">

                            <div class="info-title">
                                Payment
                            </div>

                            @php

                                $paymentType =
                                    $order->payment_type ?? null;

                            @endphp


                            @if($paymentType === 'upi')

                                <div class="payment-badge">

                                    <i class="bi bi-qr-code"></i>

                                    UPI / QR

                                </div>

                                @if($order->customer_upi_id)

                                    <div class="upi-box">

                                        <span class="upi-label">
                                            Customer UPI ID
                                        </span>

                                        <span class="upi-value">

                                            {{ $order->customer_upi_id }}

                                        </span>

                                    </div>

                                @endif


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


                            @else

                                <div class="payment-badge">

                                    <i class="bi bi-credit-card"></i>

                                    {{ ucfirst($order->payment_method ?? 'Unknown') }}

                                </div>

                            @endif


                            <div class="info-muted mt-2">

                                Payment status:

                                <strong>

                                    {{ ucfirst($order->payment_status ?? 'pending') }}

                                </strong>

                            </div>

                        </div>


                    </div>

                </div>

            </div>

        @endforeach


    @else


        <div class="empty-state">

            <i class="bi bi-box-seam"></i>

            <h4>
                No Customer Orders Yet
            </h4>

            <p>
                Orders placed by customers will appear here.
            </p>

        </div>


    @endif


</div>


</body>

</html>