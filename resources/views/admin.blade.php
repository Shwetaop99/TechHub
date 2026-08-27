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

        body {
            margin: 0;
            background: #f5f7fb;
            color: #1f2937;
            font-family: Arial, sans-serif;
        }

        .admin-layout {
            min-height: 100vh;
        }

        /* Sidebar */

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            padding: 25px 18px;
            background: white;
            border-right: 1px solid #e5e7eb;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            margin-bottom: 8px;
        }

        .brand-mark {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background: #2563eb;
            color: white;
            font-weight: bold;
        }

        .brand-name {
            color: #111827;
            font-size: 21px;
            font-weight: bold;
        }

        .brand-name span {
            color: #2563eb;
        }

        .admin-label {
            margin: 10px 0 25px 50px;
            color: #2563eb;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .sidebar-section {
            margin: 20px 0 10px 10px;
            color: #9ca3af;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 13px;
            margin-bottom: 6px;
            border-radius: 8px;
            color: #667085;
            text-decoration: none;
            font-size: 13px;
        }

        .sidebar-link i {
            width: 20px;
            font-size: 17px;
        }

        .sidebar-link:hover,
        .sidebar-link.active {
            background: #eff6ff;
            color: #2563eb;
        }

        .orders-card {
            position: relative;
        }

        .order-notification {
            margin-left: auto;
            min-width: 25px;
            padding: 5px 8px;
            border-radius: 20px;
            background: #ef4444;
            color: white;
            font-size: 11px;
            font-weight: bold;
            text-align: center;
        }

        .sidebar-bottom {
            position: absolute;
            bottom: 20px;
            color: #9ca3af;
            font-size: 10px;
        }

        .sidebar-bottom i {
            color: #16a34a;
        }

        /* Main content */

        .main-content {
            margin-left: 250px;
            min-height: 100vh;
            padding: 40px;
        }

        .page-title {
            margin-bottom: 5px;
            font-size: 36px;
            font-weight: bold;
        }

        .page-title span {
            color: #2563eb;
        }

        .page-subtitle {
            color: #667085;
            font-size: 14px;
        }

        .eyebrow {
            margin-bottom: 8px;
            color: #2563eb;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .eyebrow .dot {
            display: inline-block;
            width: 7px;
            height: 7px;
            margin-right: 5px;
            border-radius: 50%;
            background: #16a34a;
        }

        .view-btn {
            padding: 9px 16px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background: white;
            color: #374151;
            font-size: 13px;
        }

        .view-btn:hover {
            background: #2563eb;
            color: white;
        }

        /* Statistics */

        .stat-card {
            height: 100%;
            padding: 22px;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            background: white;
            box-shadow: 0 5px 20px rgba(0,0,0,.05);
        }

        .stat-card:hover {
            border-color: #93c5fd;
            transform: translateY(-2px);
        }

        .stat-icon {
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            border-radius: 10px;
            background: #eff6ff;
            color: #2563eb;
            font-size: 20px;
        }

        .stat-label {
            color: #667085;
            font-size: 11px;
            text-transform: uppercase;
        }

        .stat-number {
            margin-top: 5px;
            margin-bottom: 0;
            font-size: 28px;
            font-weight: bold;
        }

        .visitor-stat-card {
            display: block;
            color: inherit;
        }

        .visitor-stat-icon {
            background: #f0fdf4;
            color: #16a34a;
        }

        .visitor-stat-link {
            margin-top: 8px;
            color: #16a34a;
            font-size: 11px;
            font-weight: bold;
        }

        /* Products */

        .product-panel {
            overflow: hidden;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            background: white;
            box-shadow: 0 5px 20px rgba(0,0,0,.05);
        }

        .product-header {
            padding: 22px;
            border-bottom: 1px solid #e5e7eb;
        }

        .product-header h4 {
            margin: 0;
            font-weight: bold;
        }

        .add-btn {
            padding: 9px 15px;
            border: 0;
            border-radius: 8px;
            background: #2563eb;
            color: white;
            font-size: 12px;
            font-weight: bold;
        }

        .add-btn:hover {
            background: #1d4ed8;
            color: white;
        }

        .table thead th {
            padding: 14px;
            background: #f9fafb;
            color: #667085;
            font-size: 10px;
            text-transform: uppercase;
        }

        .table tbody td {
            padding: 15px;
            vertical-align: middle;
        }

        .product-name {
            font-weight: bold;
        }

        .category-text {
            color: #667085;
            font-size: 12px;
        }

        .price-text {
            color: #2563eb;
            font-weight: bold;
        }

        .stock-text {
            font-weight: 600;
        }

        .sold-text {
            color: #667085;
        }

        .remove-btn {
            padding: 6px 10px;
            border: 1px solid #fecaca;
            border-radius: 7px;
            background: #fef2f2;
            color: #dc2626;
            font-size: 11px;
        }

        .remove-btn:hover {
            background: #dc2626;
            color: white;
        }

        .empty-state {
            padding: 45px 20px;
            color: #667085;
            text-align: center;
        }

        .empty-state i {
            display: block;
            margin-bottom: 10px;
            color: #9ca3af;
            font-size: 35px;
        }

        /* Popups */

        .new-order-popup {
            position: fixed;
            right: 25px;
            bottom: 25px;
            z-index: 9999;
            width: 350px;
            padding: 18px 20px;
            border: 1px solid #dbeafe;
            border-radius: 15px;
            background: white;
            box-shadow: 0 15px 40px rgba(0,0,0,.15);
            opacity: 0;
            transform: translateY(120px);
            pointer-events: none;
            transition: .3s;
        }

        /* =========================================================
   ADMIN CUSTOMER MESSAGE POPUP
========================================================= */

.admin-support-notification {

    position: fixed;

    right: 25px;
    bottom: 25px;

    z-index: 10000;

    width: 350px;

    display: flex;

    align-items: flex-start;

    gap: 12px;

    padding: 18px 20px;

    border: 1px solid #dbeafe;

    border-radius: 15px;

    background: white;

    box-shadow:
        0 15px 40px rgba(0, 0, 0, .15);

    opacity: 0;

    transform: translateY(120px);

    pointer-events: none;

    transition: .3s ease;
}


.admin-support-notification.show {

    opacity: 1;

    transform: translateY(0);

    pointer-events: auto;

}


.admin-support-notification-icon {

    width: 42px;
    height: 42px;

    flex-shrink: 0;

    display: flex;

    align-items: center;

    justify-content: center;

    border-radius: 10px;

    background: #eff6ff;

    color: #2563eb;

    font-size: 20px;
}


.admin-support-notification-content {

    flex: 1;

    min-width: 0;

}


.admin-support-notification-content strong {

    display: block;

    margin-bottom: 4px;

    color: #111827;

    font-size: 15px;

}


.admin-support-notification-content p {

    margin: 0;

    color: #667085;

    font-size: 12px;

    line-height: 1.5;

}


.admin-support-notification > button {

    border: 0;

    background: transparent;

    color: #9ca3af;

    font-size: 20px;

    line-height: 1;

    cursor: pointer;

    padding: 0;

}


.admin-support-notification > button:hover {

    color: #111827;

}


@media (max-width: 767px) {

    .admin-support-notification {

        left: 15px;

        right: 15px;

        bottom: 15px;

        width: auto;

    }

}
        .new-order-popup.show {
            opacity: 1;
            transform: translateY(0);
            pointer-events: auto;
        }

        .new-order-popup-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 12px;
        }

        .new-order-bell {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background: #fef2f2;
            color: #ef4444;
            font-size: 20px;
        }

        .status-notification-bell {
            background: #eff6ff;
            color: #2563eb;
        }

        .new-order-close {
            border: 0;
            background: transparent;
            color: #9ca3af;
            cursor: pointer;
        }

        .new-order-title {
            margin-bottom: 4px;
            font-size: 17px;
            font-weight: bold;
        }

        .new-order-subtitle {
            margin-bottom: 14px;
            color: #667085;
            font-size: 12px;
        }

        .new-order-info {
            margin-bottom: 14px;
            padding: 12px;
            border: 1px solid #edf0f4;
            border-radius: 10px;
            background: #f9fafb;
        }

        .new-order-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 7px;
            font-size: 12px;
        }

        .new-order-row:last-child {
            margin-bottom: 0;
        }

        .new-order-label {
            color: #9ca3af;
        }

        .new-order-value {
            font-weight: bold;
            text-align: right;
        }

        .new-order-view {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 9px;
            border-radius: 8px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            font-size: 12px;
            font-weight: bold;
        }

        .new-order-view:hover {
            background: #1d4ed8;
            color: white;
        }

        @media (max-width: 991px) {

            .sidebar {
                width: 220px;
            }

            .main-content {
                margin-left: 220px;
                padding: 25px;
            }

        }

        @media (max-width: 767px) {

            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .sidebar-bottom {
                display: none;
            }

            .main-content {
                margin-left: 0;
                padding: 20px;
            }

            .new-order-popup {
                left: 15px;
                right: 15px;
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

<a
    href="{{ url('/admin/customer-messages') }}"
    class="sidebar-link"
>

    <i class="bi bi-chat-dots"></i>

    <span>
        Customer Messages
    </span>

    @if(($newMessages ?? 0) > 0)

        <span class="order-notification">
            {{ $newMessages }}
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
     ADMIN CUSTOMER MESSAGE POPUP
========================================================= -->

<div
    id="adminSupportNotification"
    class="admin-support-notification"
>

    <div class="admin-support-notification-icon">

        <i class="bi bi-chat-dots-fill"></i>

    </div>


    <div class="admin-support-notification-content">

        <strong>
            New Customer Message
        </strong>

        <p id="adminSupportNotificationText">
            A customer sent you a new message.
        </p>

    </div>


    <button
        type="button"
        onclick="closeAdminSupportNotification()"
        aria-label="Close notification"
    >
        ×
    </button>

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
<script>

/* =========================================================
   ADMIN CUSTOMER MESSAGE NOTIFICATIONS
========================================================= */

let lastAdminSupportMessageId = null;

let adminSupportAudioContext = null;


/* =========================================================
   ENABLE AUDIO
========================================================= */

async function enableAdminSupportSound() {

    try {

        const AudioContext =
            window.AudioContext ||
            window.webkitAudioContext;


        if (!AudioContext) {

            return false;

        }


        if (!adminSupportAudioContext) {

            adminSupportAudioContext =
                new AudioContext();

        }


        if (
            adminSupportAudioContext.state ===
            "suspended"
        ) {

            await adminSupportAudioContext.resume();

        }


        return (
            adminSupportAudioContext.state ===
            "running"
        );

    }

    catch (error) {

        console.log(
            "Admin audio error:",
            error
        );

        return false;

    }

}


/* =========================================================
   PLAY ADMIN NOTIFICATION SOUND
========================================================= */

async function playAdminSupportSound() {

    const ready =
        await enableAdminSupportSound();


    if (!ready) {

        return;

    }


    const now =
        adminSupportAudioContext.currentTime;


    const oscillator =
        adminSupportAudioContext.createOscillator();

    const gain =
        adminSupportAudioContext.createGain();


    oscillator.type = "sine";


    oscillator.frequency.setValueAtTime(
        880,
        now
    );


    oscillator.frequency.setValueAtTime(
        1174,
        now + 0.15
    );


    gain.gain.setValueAtTime(
        0.001,
        now
    );


    gain.gain.exponentialRampToValueAtTime(
        0.35,
        now + 0.03
    );


    gain.gain.exponentialRampToValueAtTime(
        0.001,
        now + 0.55
    );


    oscillator.connect(gain);

    gain.connect(
        adminSupportAudioContext.destination
    );


    oscillator.start(now);

    oscillator.stop(
        now + 0.55
    );

}


/* =========================================================
   UNLOCK ADMIN AUDIO
========================================================= */

document.addEventListener(
    "click",
    function () {

        enableAdminSupportSound();

    }
);


document.addEventListener(
    "keydown",
    function () {

        enableAdminSupportSound();

    }
);


/* =========================================================
   SHOW ADMIN POPUP
========================================================= */

function showAdminSupportNotification(message) {

    const popup =
        document.getElementById(
            "adminSupportNotification"
        );


    const text =
        document.getElementById(
            "adminSupportNotificationText"
        );


    if (!popup) {

        console.log(
            "Admin notification popup not found."
        );

        return;

    }


    if (
        message &&
        message.text &&
        text
    ) {

        text.textContent =
            message.text;

    }


    popup.classList.add(
        "show"
    );


    playAdminSupportSound();


    clearTimeout(
        window.adminSupportNotificationTimer
    );


    window.adminSupportNotificationTimer =
        setTimeout(
            function () {

                popup.classList.remove(
                    "show"
                );

            },
            6000
        );

}


/* =========================================================
   CLOSE ADMIN POPUP
========================================================= */

function closeAdminSupportNotification() {

    const popup =
        document.getElementById(
            "adminSupportNotification"
        );


    if (popup) {

        popup.classList.remove(
            "show"
        );

    }

}


/* =========================================================
   CHECK FOR CUSTOMER MESSAGE
========================================================= */

async function checkAdminSupportNotifications() {

    try {

        const response =
            await fetch(
                "{{ url('/admin/customer-messages/check-notifications') }}",
                {
                    method: "GET",

                    headers: {
                        "Accept":
                            "application/json",

                        "X-Requested-With":
                            "XMLHttpRequest"
                    },

                    cache: "no-store"
                }
            );


        if (!response.ok) {

            throw new Error(
                "HTTP " +
                response.status
            );

        }


        const data =
            await response.json();


        if (!data.success) {

            return;

        }


        if (!data.message) {

            return;

        }


        /*
         * First request only remembers
         * the existing unread message.
         */

        if (
            data.message.id !=
            lastAdminSupportMessageId
        ) {


            if (
                lastAdminSupportMessageId !==
                null
            ) {

                showAdminSupportNotification(
                    data.message
                );

            }


            lastAdminSupportMessageId =
                data.message.id;

        }

    }

    catch (error) {

        console.log(
            "Admin support notification error:",
            error
        );

    }

}


/* =========================================================
   START CHECKING
========================================================= */

checkAdminSupportNotifications();


setInterval(
    checkAdminSupportNotifications,
    5000
);

</script>
</body>
</html>