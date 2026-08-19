<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Coupons — TechHub</title>

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

        :root {
            --blue: #2563eb;
            --indigo: #4f46e5;
            --purple: #7c3aed;
            --green: #16a34a;
            --red: #dc2626;
            --text: #111827;
            --muted: #667085;
            --bg: #f7f9fc;
            --line: rgba(15,23,42,.10);
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

            font-family: 'Inter', sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5 {
            font-family: 'Space Grotesk', sans-serif;
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

        /* MAIN */

        .page-container {
            max-width: 1400px;

            margin: 0 auto;

            padding: 55px 30px;
        }

        /* HEADER */

        .page-header {
            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 20px;

            margin-bottom: 30px;
        }

        .header-left h1 {
            margin-bottom: 6px;

            font-size: 32px;

            letter-spacing: -1px;
        }

        .header-left p {
            margin: 0;

            color: var(--muted);

            font-size: 14px;
        }

        .header-buttons {
            display: flex;

            align-items: center;

            gap: 10px;
        }

        /* BUTTONS */

        .dashboard-btn {
            display: inline-flex;

            align-items: center;

            gap: 7px;

            padding: 11px 17px;

            border-radius: 10px;

            border: 1px solid var(--line);

            background: white;

            color: #344054;

            text-decoration: none;

            font-size: 13px;

            font-weight: 600;

            transition: .2s ease;
        }

        .dashboard-btn:hover {
            color: var(--blue);

            border-color:
                rgba(37,99,235,.30);

            transform: translateY(-1px);
        }

        .create-btn {
            display: inline-flex;

            align-items: center;

            gap: 7px;

            padding: 11px 18px;

            border: none;

            border-radius: 10px;

            background:
                linear-gradient(
                    135deg,
                    var(--blue),
                    var(--indigo)
                );

            color: white;

            font-size: 13px;

            font-weight: 700;

            transition: .2s ease;
        }

        .create-btn:hover {
            color: white;

            transform: translateY(-2px);

            box-shadow:
                0 8px 20px
                rgba(37,99,235,.20);
        }

        /* CREATE FORM */

        .create-card {
            border: none;

            border-radius: 18px;

            box-shadow:
                0 10px 35px
                rgba(15,23,42,.06);

            overflow: hidden;
        }

        .create-card-body {
            padding: 28px;
        }

        .create-title {
            display: flex;

            align-items: center;

            gap: 10px;

            margin-bottom: 25px;

            font-size: 21px;
        }

        .create-title i {
            color: var(--blue);
        }

        .form-label {
            font-size: 13px;

            color: #344054;

            margin-bottom: 7px;
        }

        .form-control,
        .form-select {
            border-radius: 9px;

            border-color: #d9dee7;

            padding: 10px 12px;

            font-size: 13px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--blue);

            box-shadow:
                0 0 0 3px
                rgba(37,99,235,.08);
        }

        .form-help {
            color: var(--muted);

            font-size: 11px;

            margin-top: 5px;
        }

        .submit-btn {
            border: none;

            border-radius: 9px;

            padding: 11px 20px;

            background:
                linear-gradient(
                    135deg,
                    var(--blue),
                    var(--indigo)
                );

            color: white;

            font-size: 13px;

            font-weight: 700;
        }

        .submit-btn:hover {
            color: white;

            opacity: .92;
        }

        /* ALERTS */

        .success-alert {
            border: none;

            border-radius: 11px;

            background: #ecfdf3;

            color: #15803d;

            font-size: 13px;
        }

        .error-alert {
            border-radius: 11px;

            font-size: 13px;
        }

        /* COUPON PANEL */

        .coupon-panel {
            background: white;

            border: 1px solid var(--line);

            border-radius: 18px;

            overflow: hidden;

            box-shadow:
                0 10px 35px
                rgba(15,23,42,.045);
        }

        .coupon-panel-header {
            padding: 23px 25px;

            border-bottom:
                1px solid var(--line);
        }

        .coupon-panel-header h4 {
            margin: 0;

            font-size: 20px;
        }

        .coupon-panel-header p {
            margin: 5px 0 0;

            color: var(--muted);

            font-size: 12px;
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

            font-size: 9px;

            letter-spacing: 1.2px;

            text-transform: uppercase;

            white-space: nowrap;
        }

        .table tbody td {
            padding: 17px 18px;

            vertical-align: middle;

            border-color: var(--line);

            font-size: 13px;
        }

        .table tbody tr {
            transition: .2s ease;
        }

        .table tbody tr:hover td {
            background: #f8fbff;
        }

        .coupon-code {
            display: inline-flex;

            align-items: center;

            padding: 6px 10px;

            border-radius: 7px;

            background:
                rgba(37,99,235,.08);

            color: var(--blue);

            font-family: monospace;

            font-size: 12px;

            font-weight: 700;
        }

        .discount-value {
            font-weight: 700;

            color: var(--purple);
        }

        .minimum-value {
            font-weight: 600;

            color: #344054;
        }

        .expiry {
            color: var(--muted);

            font-size: 12px;
        }

        /* EMPTY STATE */

        .empty-state {
            padding: 70px 20px;

            text-align: center;

            color: var(--muted);
        }

        .empty-icon {
            width: 65px;

            height: 65px;

            display: flex;

            align-items: center;

            justify-content: center;

            margin: 0 auto 18px;

            border-radius: 18px;

            background:
                rgba(37,99,235,.08);

            color: var(--blue);

            font-size: 30px;
        }

        .empty-state h4 {
            color: var(--text);

            margin-bottom: 6px;
        }

        .empty-state p {
            margin: 0;

            font-size: 13px;
        }

        /* MOBILE */

        @media(max-width: 768px) {

            .page-container {
                padding: 35px 18px;
            }

            .page-header {
                align-items: flex-start;

                flex-direction: column;
            }

            .header-buttons {
                width: 100%;
            }

            .dashboard-btn,
            .create-btn {
                flex: 1;

                justify-content: center;
            }

            .create-card-body {
                padding: 20px;
            }

        }

    </style>

</head>


<body>

<div class="top-line"></div>


<div class="page-container">


    <!-- HEADER -->

    <div class="page-header">

        <div class="header-left">

            <h1>
                🎟️ TechHub Coupons
            </h1>

            <p>
                Manage discount coupons for eligible products.
            </p>

        </div>


        <!-- ONLY ONE DASHBOARD BUTTON -->

        <div class="header-buttons">

            <a
                href="/admin"
                class="dashboard-btn"
            >

                <i class="bi bi-arrow-left"></i>

                Dashboard

            </a>


            <button
                type="button"
                class="create-btn"
                data-bs-toggle="collapse"
                data-bs-target="#createCouponForm"
            >

                <i class="bi bi-plus-lg"></i>

                Create Coupon

            </button>

        </div>

    </div>


    <!-- SUCCESS MESSAGE -->

    @if(session('success'))

        <div
            class="alert success-alert mb-4"
        >

            <i
                class="bi bi-check-circle-fill me-2"
            ></i>

            {{ session('success') }}

        </div>

    @endif


    <!-- CREATE COUPON FORM -->

    <div
        class="collapse mb-4"
        id="createCouponForm"
    >

        <div class="card create-card">

            <div class="create-card-body">


                <div class="create-title">

                    <i class="bi bi-ticket-perforated"></i>

                    Create New Coupon

                </div>


                @if($errors->any())

                    <div
                        class="alert alert-danger error-alert"
                    >

                        <ul class="mb-0">

                            @foreach($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                <form
                    action="{{ url('/admin/coupons') }}"
                    method="POST"
                >

                    @csrf


                    <div class="row g-4">


                        <!-- CODE -->

                        <div class="col-md-6">

                            <label
                                class="form-label fw-semibold"
                            >

                                Coupon Code

                            </label>

                            <input
                                type="text"
                                name="code"
                                class="form-control"
                                placeholder="Example: TECH10"
                                value="{{ old('code') }}"
                                required
                            >

                            <div class="form-help">

                                Customers will enter this code
                                at checkout.

                            </div>

                        </div>


                        <!-- TYPE -->

                        <div class="col-md-6">

                            <label
                                class="form-label fw-semibold"
                            >

                                Discount Type

                            </label>

                            <select
                                name="type"
                                class="form-select"
                                required
                            >

                                <option
                                    value="percentage"
                                    {{ old('type') === 'percentage'
                                        ? 'selected'
                                        : '' }}
                                >

                                    Percentage (%)

                                </option>

                                <option
                                    value="fixed"
                                    {{ old('type') === 'fixed'
                                        ? 'selected'
                                        : '' }}
                                >

                                    Fixed Amount (₹)

                                </option>

                            </select>

                        </div>


                        <!-- VALUE -->

                        <div class="col-md-6">

                            <label
                                class="form-label fw-semibold"
                            >

                                Discount Value

                            </label>

                            <input
                                type="number"
                                name="value"
                                class="form-control"
                                min="1"
                                step="0.01"
                                placeholder="Example: 10"
                                value="{{ old('value') }}"
                                required
                            >

                        </div>


                        <!-- MINIMUM -->

                        <div class="col-md-6">

                            <label
                                class="form-label fw-semibold"
                            >

                                Minimum Purchase

                            </label>

                            <input
                                type="number"
                                name="minimum_amount"
                                class="form-control"
                                min="10000"
                                step="0.01"
                                value="{{ old('minimum_amount', 10000) }}"
                                required
                            >

                            <div class="form-help">

                                Minimum purchase is ₹10,000.

                            </div>

                        </div>


                        <!-- EXPIRY -->

                        <div class="col-md-6">

                            <label
                                class="form-label fw-semibold"
                            >

                                Expiry Date

                            </label>

                            <input
                                type="datetime-local"
                                name="expires_at"
                                class="form-control"
                                value="{{ old('expires_at') }}"
                            >

                            <div class="form-help">

                                Leave empty for no expiry.

                            </div>

                        </div>


                        <!-- BUTTON -->

                        <div class="col-12">

                            <button
                                type="submit"
                                class="submit-btn"
                            >

                                <i
                                    class="bi bi-check-lg me-1"
                                ></i>

                                Create Coupon

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>


    <!-- COUPON LIST -->

    <div class="coupon-panel">


        <div class="coupon-panel-header">

            <h4>
                Your Coupons
            </h4>

            <p>
                View and manage your active TechHub discount coupons.
            </p>

        </div>


        @if($coupons->count() > 0)


            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>

                        <tr>

                            <th>
                                Code
                            </th>

                            <th>
                                Discount
                            </th>

                            <th>
                                Minimum Amount
                            </th>

                            <th>
                                Expiry
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Used
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                        @foreach($coupons as $coupon)

                            <tr>


                                <!-- CODE -->

                                <td>

                                    <span class="coupon-code">

                                        {{ $coupon->code }}

                                    </span>

                                </td>


                                <!-- DISCOUNT -->

                                <td>

                                    <span
                                        class="discount-value"
                                    >

                                        @if($coupon->type === 'percentage')

                                            {{ $coupon->value }}%

                                        @else

                                            ₹{{ number_format($coupon->value, 2) }}

                                        @endif

                                    </span>

                                </td>


                                <!-- MINIMUM -->

                                <td>

                                    <span
                                        class="minimum-value"
                                    >

                                        ₹{{ number_format(
                                            $coupon->minimum_amount,
                                            2
                                        ) }}

                                    </span>

                                </td>


                                <!-- EXPIRY -->

                                <td>

                                    <span class="expiry">

                                        @if($coupon->expires_at)

                                            {{ $coupon->expires_at->format(
                                                'd M Y, h:i A'
                                            ) }}

                                        @else

                                            No expiry

                                        @endif

                                    </span>

                                </td>


                                <!-- STATUS -->

                                <td>

                                    @if($coupon->is_active)

                                        <span
                                            class="badge bg-success"
                                        >

                                            Active

                                        </span>

                                    @else

                                        <span
                                            class="badge bg-secondary"
                                        >

                                            Inactive

                                        </span>

                                    @endif

                                </td>


                                <!-- USED -->

                                <td>

                                    {{ $coupon->used_count }}

                                </td>


                            </tr>

                        @endforeach


                    </tbody>

                </table>

            </div>


        @else


            <!-- EMPTY -->

            <div class="empty-state">

                <div class="empty-icon">

                    <i
                        class="bi bi-ticket-perforated"
                    ></i>

                </div>


                <h4>
                    No coupons created yet.
                </h4>


                <p>
                    Create your first TechHub discount coupon.
                </p>

            </div>


        @endif


    </div>


</div>


<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
></script>

</body>

</html>