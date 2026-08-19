<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Settings - TechHub Admin</title>

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

        /* CUSTOMER ORDERS */

.customer-orders-section {

    margin-top: 35px;

    padding-top: 30px;

    border-top: 1px solid #e5e7eb;

}

.customer-orders-header {

    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 25px;

}

.customer-orders-header h5 {

    font-weight: 700;

    margin-bottom: 6px;

}

.customer-orders-header p {

    margin: 0;

    color: #667085;

    font-size: 14px;

    line-height: 1.5;

}

.orders-btn {

    display: inline-flex;

    align-items: center;

    gap: 8px;

    padding: 12px 18px;

    border-radius: 10px;

    background: #111827;

    color: white;

    text-decoration: none;

    font-weight: 700;

    white-space: nowrap;

}

.orders-btn:hover {

    color: white;

    opacity: .9;

}

        body {
            background: #f7f9fc;
            font-family: Arial, sans-serif;
            color: #111827;
        }

        .navbar {
            background: #111827;
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: 700;
        }

        .settings-card {
            max-width: 800px;
            margin: 50px auto;
            border: none;
            border-radius: 18px;
            background: #ffffff;
        }

        .settings-header {
            padding-bottom: 20px;
            border-bottom: 1px solid #e5e7eb;
            margin-bottom: 25px;
        }

        .settings-header h2 {
            font-weight: 700;
            margin-bottom: 5px;
        }

        .settings-header p {
            color: #667085;
            margin: 0;
        }

        .form-label {
            font-weight: 700;
        }

        .form-control {
            padding: 12px;
            border-radius: 10px;
        }

        .qr-preview {
            width: 180px;
            height: 180px;
            border: 1px dashed #cbd5e1;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8fafc;
            overflow: hidden;
            margin-top: 10px;
        }

        .qr-preview img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .qr-placeholder {
            text-align: center;
            color: #94a3b8;
        }

        .qr-placeholder i {
            display: block;
            font-size: 40px;
            margin-bottom: 5px;
        }

        .save-btn {
            border: none;
            border-radius: 10px;
            padding: 12px 25px;
            background: linear-gradient(
                135deg,
                #2563eb,
                #4f46e5
            );
            color: white;
            font-weight: 700;
        }

        .save-btn:hover {
            color: white;
            opacity: .92;
        }

    </style>

</head>

<body>

<!-- NAVBAR -->

<nav class="navbar navbar-dark">

    <div class="container">

        <a
            class="navbar-brand"
            href="/admin"
        >
            TechHub Admin
        </a>

        <a
            href="/admin"
            class="btn btn-outline-light"
        >
            ← Dashboard
        </a>

    </div>

</nav>


<!-- SETTINGS -->

<div class="container">

    <div class="card settings-card shadow-sm p-4">

        <div class="settings-header">

            <h2>
                <i class="bi bi-gear me-2"></i>
                TechHub Settings
            </h2>

            <p>
                Manage your store payment settings.
            </p>

        </div>


        <!-- PAYMENT SETTINGS -->

        <h5 class="fw-bold mb-4">
            <i class="bi bi-credit-card me-2"></i>
            Payment Settings
        </h5>


        <form
            action="{{ url('/admin/settings') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf


            <!-- UPI ID -->

            <div class="mb-4">

                <label class="form-label">
                    Admin UPI ID
                </label>

                <input
                    type="text"
                    name="upi_id"
                    class="form-control"
                    placeholder="example@upi"
                    value="{{ $settings->upi_id ?? '' }}"
                    required
                >

                <small class="text-muted">
                    Customers will use this UPI ID for online payments.
                </small>

            </div>


            <!-- QR CODE -->

            <div class="mb-4">

                <label class="form-label">
                    Payment QR Code
                </label>

                <input
                    type="file"
                    name="payment_qr"
                    class="form-control"
                    accept="image/*"
                >

                <small class="text-muted">
                    Upload the QR code customers should scan to pay.
                </small>


                <div class="qr-preview">

                    @if(isset($settings) && $settings->payment_qr)

                        <img
    src="{{ $settings->payment_qr }}"
    alt="Payment QR"
>

                    @else

                        <div class="qr-placeholder">

                            <i class="bi bi-qr-code"></i>

                            No QR uploaded

                        </div>

                    @endif

                </div>

            </div>


            <!-- SAVE -->

            <button
                type="submit"
                class="save-btn"
            >

                <i class="bi bi-check-lg me-1"></i>

                Save Payment Settings

            </button>

                </form>


        <!-- CUSTOMER ORDERS -->

        <div class="customer-orders-section">

            <div class="customer-orders-header">

                <div>

                    <h5>
                        <i class="bi bi-box-seam me-2"></i>
                        Customer Orders
                    </h5>

                    <p>
                        View complete customer orders, payment details,
                        products, amounts and delivery status.
                    </p>

                </div>

                <a
                    href="{{ url('/admin/customer-orders') }}"
                    class="orders-btn"
                >

                    View Customer Orders

                    <i class="bi bi-arrow-right"></i>

                </a>

            </div>

        </div>


    </div>

</div>


</body>

</html>