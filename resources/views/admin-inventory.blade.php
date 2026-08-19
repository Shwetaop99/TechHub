<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Inventory Report — TechHub</title>

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

        :root {

            --bg: #f7f9fc;

            --white: #ffffff;

            --text: #111827;

            --muted: #667085;

            --blue: #2563eb;

            --indigo: #4f46e5;

            --purple: #7c3aed;

            --green: #16a34a;

            --red: #dc2626;

            --orange: #ea580c;

            --line: rgba(15,23,42,.10);

            --display: 'Space Grotesk', sans-serif;

            --body: 'Inter', sans-serif;

            --mono: 'JetBrains Mono', monospace;

        }


        * {
            box-sizing: border-box;
        }


        body {

            margin: 0;

            min-height: 100vh;

            background:
                radial-gradient(
                    circle at 88% 5%,
                    rgba(37,99,235,.07),
                    transparent 28%
                ),

                radial-gradient(
                    circle at 10% 90%,
                    rgba(124,58,237,.045),
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
        h5 {

            font-family: var(--display);

            font-weight: 700;

        }


        /* TOP LINE */

        .top-line {

            position: fixed;

            top: 0;

            left: 0;

            right: 0;

            height: 3px;

            z-index: 2000;

            background:
                linear-gradient(
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

            background: rgba(255,255,255,.94);

            border-right: 1px solid var(--line);

            box-shadow:
                8px 0 35px rgba(15,23,42,.035);

            backdrop-filter: blur(18px);

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

            background:
                linear-gradient(
                    135deg,
                    var(--blue),
                    var(--indigo)
                );

            color: white;

            font-family: var(--display);

            font-size: 14px;

            font-weight: 700;

            letter-spacing: 1px;

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

            margin:
                12px 0 25px 54px;

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

            margin:
                0 0 10px 12px;

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

            background:
                rgba(37,99,235,.055);

            border-color:
                rgba(37,99,235,.13);

            transform:
                translateX(3px);

        }


        .sidebar-link:hover i {

            color: var(--blue);

        }


        .sidebar-link.active {

            color: var(--blue);

            background:
                linear-gradient(
                    90deg,
                    rgba(37,99,235,.09),
                    rgba(79,70,229,.045)
                );

            border-color:
                rgba(37,99,235,.16);

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

            border-top:
                1px solid var(--line);

            color: #98a2b3;

            font:
                9px var(--mono);

            letter-spacing: 1px;

            text-transform: uppercase;

        }


        .sidebar-bottom i {

            color: var(--green);

        }


        /* MAIN */

        .main-content {

            margin-left: 265px;

            width:
                calc(100% - 265px);

            min-height: 100vh;

            padding: 45px;

        }


        .content-wrapper {

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


        .dot {

            width: 7px;

            height: 7px;

            border-radius: 50%;

            background: var(--green);

        }


        .page-title {

            font-size:
                clamp(2rem, 4vw, 3rem);

            margin-bottom: 5px;

            letter-spacing: -1.5px;

        }


        .page-title span {

            background:
                linear-gradient(
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

        }


        .back-btn {

            display: inline-flex;

            align-items: center;

            gap: 7px;

            padding: 10px 16px;

            border:
                1px solid var(--line);

            border-radius: 11px;

            background: white;

            color: #344054;

            text-decoration: none;

            font-size: 13px;

            font-weight: 600;

        }


        .back-btn:hover {

            color: var(--blue);

            border-color:
                rgba(37,99,235,.25);

        }


        /* SUMMARY CARDS */

        .summary-card {

            background:
                rgba(255,255,255,.95);

            border:
                1px solid var(--line);

            border-radius: 18px;

            padding: 22px;

            box-shadow:
                0 8px 30px
                rgba(15,23,42,.045);

        }


        .summary-icon {

            width: 45px;

            height: 45px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 12px;

            background:
                rgba(37,99,235,.08);

            color: var(--blue);

            font-size: 20px;

            margin-bottom: 15px;

        }


        .summary-label {

            font-family: var(--mono);

            font-size: 9px;

            letter-spacing: 1.3px;

            text-transform: uppercase;

            color: var(--muted);

        }


        .summary-number {

            margin: 5px 0 0;

            font-size: 29px;

        }


        /* INVENTORY PANEL */

        .inventory-panel {

            background: white;

            border:
                1px solid var(--line);

            border-radius: 18px;

            overflow: hidden;

            box-shadow:
                0 10px 35px
                rgba(15,23,42,.045);

        }


        .inventory-header {

            padding: 24px;

            border-bottom:
                1px solid var(--line);

        }


        .inventory-header h4 {

            margin: 0;

            font-size: 21px;

        }


        /* TABLE */

        .table {

            margin: 0;

        }


        .table thead th {

            background: #f8fafc;

            color: #667085;

            border-bottom:
                1px solid var(--line);

            padding: 15px 18px;

            font-family: var(--mono);

            font-size: 9px;

            letter-spacing: 1.2px;

            text-transform: uppercase;

            white-space: nowrap;

        }


        .table tbody td {

            padding: 18px;

            vertical-align: middle;

            border-color: var(--line);

        }


        .product-name {

            font-weight: 700;

        }


        .product-category {

            color: var(--muted);

            font-family: var(--mono);

            font-size: 10px;

        }


        .number {

            font-family: var(--mono);

            font-weight: 600;

        }


        .received {

            color: var(--blue);

        }


        .sold {

            color: var(--purple);

        }


        .available {

            color: var(--green);

        }


        .low-stock {

            color: var(--orange);

            font-weight: 700;

        }


        .out-stock {

            color: var(--red);

            font-weight: 700;

        }


        /* ADD STOCK */

        .stock-form {

            display: flex;

            align-items: center;

            gap: 7px;

        }


        .stock-input {

            width: 95px;

            padding: 7px 9px;

            border:
                1px solid #d9dee7;

            border-radius: 8px;

            font-size: 12px;

            outline: none;

        }


        .stock-input:focus {

            border-color: var(--blue);

            box-shadow:
                0 0 0 3px
                rgba(37,99,235,.08);

        }


        .stock-btn {

            border: 0;

            border-radius: 8px;

            padding: 8px 11px;

            background:
                linear-gradient(
                    135deg,
                    var(--blue),
                    var(--indigo)
                );

            color: white;

            font-size: 11px;

            font-weight: 700;

            white-space: nowrap;

        }


        .stock-btn:hover {

            opacity: .92;

        }


        /* EMPTY */

        .empty {

            padding: 60px;

            text-align: center;

            color: var(--muted);

        }


        .empty i {

            font-size: 40px;

            display: block;

            margin-bottom: 10px;

        }


        /* ALERT */

        .success-alert {

            border: 0;

            border-radius: 12px;

            background: #ecfdf3;

            color: #168344;

            font-size: 13px;

        }


        /* MOBILE */

        @media(max-width: 991px) {

            .sidebar {

                width: 220px;

            }

            .main-content {

                margin-left: 220px;

                width:
                    calc(100% - 220px);

                padding: 30px;

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

            }


            .sidebar-bottom {

                display: none;

            }


            .main-content {

                margin-left: 0;

                width: 100%;

                padding: 25px 18px;

            }


            .header-actions {

                margin-top: 15px;

            }


            .stock-form {

                flex-direction: column;

                align-items: flex-start;

            }

        }

    </style>

</head>


<body>


<div class="top-line"></div>


<div class="admin-layout">


    <!-- SIDEBAR -->

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


        <a
            href="/admin"
            class="sidebar-link"
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
            href="/admin/products"
            class="sidebar-link"
        >

            <i class="bi bi-box-seam"></i>

            Products

        </a>


        <a
            href="/admin/orders"
            class="sidebar-link"
        >

            <i class="bi bi-cart-check"></i>

            Orders

        </a>


        <a
            href="/admin/inventory"
            class="sidebar-link active"
        >

            <i class="bi bi-clipboard-data"></i>

            Inventory Report

        </a>


        <a
            href="/admin/customers"
            class="sidebar-link"
        >

            <i class="bi bi-people"></i>

            Customers

        </a>


        <div class="sidebar-bottom">

            <i class="bi bi-circle-fill me-1"></i>

            Admin system online

        </div>

    </aside>


    <!-- MAIN -->

    <main class="main-content">

        <div class="content-wrapper">


            <!-- HEADER -->

            <div
                class="row align-items-center mb-4"
            >

                <div class="col-lg-8">

                    <div class="eyebrow">

                        <span class="dot"></span>

                        Inventory Control

                    </div>


                    <h1 class="page-title">

                        Inventory
                        <span>Report</span>

                    </h1>


                    <p class="page-subtitle mb-0">

                        Track incoming stock, products sold,
                        and currently available inventory.

                    </p>

                </div>


                <div
                    class="col-lg-4 text-lg-end header-actions"
                >

                    <a
                        href="/admin"
                        class="back-btn"
                    >

                        <i class="bi bi-arrow-left"></i>

                        Dashboard

                    </a>

                </div>

            </div>


            <!-- SUCCESS MESSAGE -->

            @if(session('success'))

                <div
                    class="alert success-alert mb-4"
                >

                    <i class="bi bi-check-circle-fill me-2"></i>

                    {{ session('success') }}

                </div>

            @endif


            <!-- SUMMARY -->

            <div class="row g-4 mb-4">


                <div class="col-md-4">

                    <div class="summary-card">

                        <div class="summary-icon">

                            <i class="bi bi-box-seam"></i>

                        </div>


                        <div class="summary-label">

                            Total Products

                        </div>


                        <h2 class="summary-number">

                            {{ $totalProducts }}

                        </h2>

                    </div>

                </div>


                <div class="col-md-4">

                    <div class="summary-card">

                        <div class="summary-icon">

                            <i class="bi bi-box-arrow-in-down"></i>

                        </div>


                        <div class="summary-label">

                            Current Stock

                        </div>


                        <h2 class="summary-number">

                            {{ $totalStock }}

                        </h2>

                    </div>

                </div>


                <div class="col-md-4">

                    <div class="summary-card">

                        <div class="summary-icon">

                            <i class="bi bi-cart-check"></i>

                        </div>


                        <div class="summary-label">

                            Products Sold

                        </div>


                        <h2 class="summary-number">

                            {{ $totalSold }}

                        </h2>

                    </div>

                </div>

            </div>


            <!-- INVENTORY TABLE -->

            <div class="inventory-panel">


                <div class="inventory-header">

                    <div class="eyebrow mb-1">

                        Stock Overview

                    </div>


                    <h4>

                        Product Inventory

                    </h4>

                </div>


                <div class="table-responsive">

                    <table
                        class="table align-middle"
                    >

                        <thead>

                            <tr>

                                <th>
                                    Product
                                </th>

                                <th>
                                    Stock Received
                                </th>

                                <th>
                                    Sold
                                </th>

                                <th>
                                    Current Stock
                                </th>

                                <th>
                                    Status
                                </th>

                                <th>
                                    Add New Stock
                                </th>

                            </tr>

                        </thead>


                        <tbody>


                            @forelse($products as $product)


                                <tr>


                                    <!-- PRODUCT -->

                                    <td>

                                        <div
                                            class="product-name"
                                        >

                                            {{ $product->name }}

                                        </div>


                                        <div
                                            class="product-category"
                                        >

                                            {{ $product->category }}

                                        </div>

                                    </td>


                                    <!-- RECEIVED -->

                                    <td>

                                        <span
                                            class="number received"
                                        >

                                            {{ $product->stock_received }}

                                        </span>

                                    </td>


                                    <!-- SOLD -->

                                    <td>

                                        <span
                                            class="number sold"
                                        >

                                            {{ $product->sold_count }}

                                        </span>

                                    </td>


                                    <!-- CURRENT -->

                                    <td>

                                        <span
                                            class="
                                                number
                                                {{ $product->stock <= 0
                                                    ? 'out-stock'
                                                    : ($product->stock <= 5
                                                        ? 'low-stock'
                                                        : 'available') }}
                                            "
                                        >

                                            {{ $product->stock }}

                                        </span>

                                    </td>


                                    <!-- STATUS -->

                                    <td>


                                        @if($product->stock <= 0)

                                            <span
                                                class="out-stock"
                                            >

                                                <i
                                                    class="bi bi-x-circle me-1"
                                                ></i>

                                                Out of Stock

                                            </span>


                                        @elseif($product->stock <= 5)

                                            <span
                                                class="low-stock"
                                            >

                                                <i
                                                    class="bi bi-exclamation-triangle me-1"
                                                ></i>

                                                Low Stock

                                            </span>


                                        @else

                                            <span
                                                class="available"
                                            >

                                                <i
                                                    class="bi bi-check-circle me-1"
                                                ></i>

                                                In Stock

                                            </span>

                                        @endif


                                    </td>


                                    <!-- ADD STOCK -->

                                    <td>


                                        <form
                                            action="{{ url('/admin/inventory/' . $product->id . '/stock') }}"
                                            method="POST"
                                            class="stock-form"
                                        >

                                            @csrf


                                            <input
                                                type="number"
                                                name="quantity"
                                                min="1"
                                                required
                                                class="stock-input"
                                                placeholder="Qty"
                                            >


                                            <button
                                                type="submit"
                                                class="stock-btn"
                                            >

                                                <i
                                                    class="bi bi-plus-lg me-1"
                                                ></i>

                                                Add Stock

                                            </button>

                                        </form>


                                    </td>


                                </tr>


                            @empty


                                <tr>

                                    <td
                                        colspan="6"
                                    >

                                        <div class="empty">

                                            <i
                                                class="bi bi-box-seam"
                                            ></i>

                                            No products found.

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


<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
></script>


</body>

</html>