<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Customers - TechHub</title>
    <link
    rel="icon"
    type="image/png"
    href="{{ asset('css/techhub_TH_favicon.png') }}"
>


    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <style>

        /* =====================================================
           GLOBAL
        ===================================================== */

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f6f8fb;
            color: #172033;
            font-family: Arial, Helvetica, sans-serif;
        }


        /* =====================================================
           NAVBAR
        ===================================================== */

        .topbar {
            height: 72px;
            background: #ffffff;
            border-bottom: 1px solid #e7ebf1;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 40px;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: #172033;
            font-size: 23px;
            font-weight: 700;
        }

        .brand-box {
            width: 36px;
            height: 36px;
            background: #111827;
            color: #ffffff;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .top-actions {
            display: flex;
            gap: 10px;
        }

        .top-btn {
            text-decoration: none;
            padding: 9px 16px;
            border-radius: 8px;
            border: 1px solid #dce2ea;
            color: #344054;
            background: #ffffff;
            font-size: 14px;
            font-weight: 600;
            transition: .2s ease;
        }

        .top-btn:hover {
            background: #f3f6fa;
            color: #111827;
            transform: translateY(-1px);
        }

        .top-btn.primary {
            background: #2563eb;
            color: white;
            border-color: #2563eb;
        }

        .top-btn.primary:hover {
            background: #1d4ed8;
            color: white;
        }


        /* =====================================================
           PAGE
        ===================================================== */

        .page {
            max-width: 1250px;
            margin: auto;
            padding: 45px 30px 70px;
        }


        /* =====================================================
           HEADER
        ===================================================== */

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            gap: 20px;
            margin-bottom: 35px;
        }

        .eyebrow {
            color: #2563eb;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .page-title {
            font-size: 38px;
            font-weight: 750;
            margin: 0;
            letter-spacing: -1px;
        }

        .page-subtitle {
            color: #667085;
            margin: 10px 0 0;
            font-size: 15px;
        }


        /* =====================================================
           SEARCH
        ===================================================== */

        .search-box {
            position: relative;
            width: 280px;
        }

        .search-box i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #98a2b3;
        }

        .search-box input {
            width: 100%;
            height: 43px;
            border: 1px solid #dce2ea;
            border-radius: 9px;
            background: #ffffff;
            padding: 0 15px 0 40px;
            outline: none;
            font-size: 14px;
            transition: .2s ease;
        }

        .search-box input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, .10);
        }


        /* =====================================================
           CUSTOMER GRID
        ===================================================== */

        .customer-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }


        /* =====================================================
           CUSTOMER CARD
        ===================================================== */

        .customer-card {
            background: #ffffff;
            border: 1px solid #e7ebf1;
            border-radius: 14px;
            padding: 24px;
            transition: .25s ease;
            position: relative;
            overflow: hidden;
        }

        .customer-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: #2563eb;
            transform: scaleX(0);
            transform-origin: left;
            transition: .25s ease;
        }

        .customer-card:hover {
            transform: translateY(-5px);
            border-color: #cbd5e1;
            box-shadow: 0 14px 35px rgba(15, 23, 42, .08);
        }

        .customer-card:hover::before {
            transform: scaleX(1);
        }


        /* =====================================================
           CUSTOMER TOP
        ===================================================== */

        .customer-top {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 22px;
        }

        .avatar {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: #eff6ff;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: 700;
            flex-shrink: 0;
        }

        .customer-name {
            font-size: 18px;
            font-weight: 700;
            margin: 0;
            color: #172033;
        }

        .customer-email {
            color: #667085;
            font-size: 13px;
            margin: 5px 0 0;
            word-break: break-word;
        }


        /* =====================================================
           CUSTOMER STATS
        ===================================================== */

        .customer-stats {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .stat-box {
            background: #f8fafc;
            border: 1px solid #edf0f4;
            border-radius: 9px;
            padding: 13px;
        }

        .stat-label {
            color: #98a2b3;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: .7px;
            margin-bottom: 5px;
        }

        .stat-value {
            color: #172033;
            font-size: 17px;
            font-weight: 700;
        }

        .money {
            color: #2563eb;
        }


        /* =====================================================
           EMPTY STATE
        ===================================================== */

        .empty-state {
            background: #ffffff;
            border: 1px solid #e7ebf1;
            border-radius: 14px;
            padding: 70px 20px;
            text-align: center;
        }

        .empty-icon {
            width: 70px;
            height: 70px;
            margin: auto;
            border-radius: 50%;
            background: #eff6ff;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
        }

        .empty-state h3 {
            margin-top: 20px;
            font-size: 22px;
        }

        .empty-state p {
            color: #667085;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 992px) {

            .customer-grid {
                grid-template-columns: repeat(2, 1fr);
            }

        }


        @media (max-width: 700px) {

            .topbar {
                padding: 0 18px;
            }

            .top-actions {
                display: none;
            }

            .page {
                padding: 30px 18px 50px;
            }

            .page-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .search-box {
                width: 100%;
            }

            .page-title {
                font-size: 31px;
            }

            .customer-grid {
                grid-template-columns: 1fr;
            }

        }

    </style>

</head>


<body>


<!-- =====================================================
     TOPBAR
===================================================== -->

<nav class="topbar">

    <a href="/admin" class="brand">

        <span class="brand-box">
            TH
        </span>

        TechHub

    </a>


    <div class="top-actions">

        <a href="/admin" class="top-btn">
            <i class="bi bi-grid me-1"></i>
            Dashboard
        </a>

        <a href="/" class="top-btn primary">
            <i class="bi bi-eye me-1"></i>
            Website
        </a>

    </div>

</nav>



<!-- =====================================================
     PAGE
===================================================== -->

<main class="page">


    <!-- HEADER -->

    <div class="page-header">

        <div>

            <div class="eyebrow">
                Customer Management
            </div>

            <h1 class="page-title">
                TechHub Customers
            </h1>

            <p class="page-subtitle">
                View customer accounts, orders and spending information.
            </p>

        </div>


        <div class="search-box">

            <i class="bi bi-search"></i>

            <input
                type="text"
                id="customerSearch"
                placeholder="Search customers..."
            >

        </div>

    </div>



    <!-- =================================================
         CUSTOMERS
    ================================================= -->

    @if($customers->count() > 0)

        <div class="customer-grid" id="customerGrid">


            @foreach($customers as $customer)

                <div
                    class="customer-card"
                    data-customer="{{ strtolower($customer->name . ' ' . $customer->email) }}"
                >


                    <!-- CUSTOMER -->

                    <div class="customer-top">


                        <div class="avatar">

                            {{ strtoupper(substr($customer->name, 0, 1)) }}

                        </div>


                        <div>

                            <h3 class="customer-name">

                                {{ $customer->name }}

                            </h3>


                            <p class="customer-email">

                                {{ $customer->email }}

                            </p>

                        </div>


                    </div>



                    <!-- STATS -->

                    <div class="customer-stats">


                        <div class="stat-box">

                            <div class="stat-label">
                                Orders
                            </div>

                            <div class="stat-value">

                                {{ $customer->orders_count }}

                            </div>

                        </div>



                        <div class="stat-box">

                            <div class="stat-label">
                                Total Spent
                            </div>

                            <div class="stat-value money">

                                ₹{{ number_format($customer->orders_sum_total ?? 0) }}

                            </div>

                        </div>


                    </div>


                </div>

            @endforeach


        </div>


        <!-- NO SEARCH RESULTS -->

        <div
            id="noResults"
            class="empty-state"
            style="display:none;"
        >

            <div class="empty-icon">

                <i class="bi bi-search"></i>

            </div>

            <h3>
                No customers found
            </h3>

            <p>
                Try searching with a different name or email.
            </p>

        </div>


    @else


        <!-- EMPTY DATABASE -->

        <div class="empty-state">

            <div class="empty-icon">

                <i class="bi bi-people"></i>

            </div>

            <h3>
                No customers yet
            </h3>

            <p>
                Customers who create an account will appear here.
            </p>

        </div>


    @endif


</main>



<!-- =====================================================
     SEARCH SCRIPT
===================================================== -->

<script>

    const searchInput =
        document.getElementById('customerSearch');

    const customerCards =
        document.querySelectorAll('.customer-card');

    const noResults =
        document.getElementById('noResults');


    if (searchInput) {

        searchInput.addEventListener('input', function () {

            const search =
                this.value.toLowerCase().trim();

            let visible = 0;


            customerCards.forEach(function (card) {

                const customer =
                    card.dataset.customer;

                if (customer.includes(search)) {

                    card.style.display = '';

                    visible++;

                } else {

                    card.style.display = 'none';

                }

            });


            if (noResults) {

                noResults.style.display =
                    visible === 0 ? 'block' : 'none';

            }

        });

    }

</script>


</body>

</html>