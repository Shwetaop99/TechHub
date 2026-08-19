<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Admin Panel - TechHub</title>

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
            min-height: 100vh;
            background: #f7f9fc;
            font-family: Arial, sans-serif;
            color: #111827;
        }

        /* =====================================================
           SIDEBAR
        ===================================================== */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;

            width: 250px;
            height: 100vh;

            background: #ffffff;

            border-right: 1px solid #e5e7eb;

            padding: 25px 18px;

            display: flex;
            flex-direction: column;

            z-index: 1000;

            overflow-y: auto;
        }

        .brand {
            display: block;

            color: #111827;

            font-size: 30px;
            font-weight: 800;

            text-decoration: none;

            padding: 5px 12px 30px;
        }

        .brand span {
            color: #2563eb;
        }

        .sidebar-title {
            font-size: 11px;
            font-weight: 700;

            color: #94a3b8;

            letter-spacing: 1px;

            padding: 0 12px;

            margin-bottom: 10px;
        }

        .sidebar-menu {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;

            gap: 13px;

            padding: 12px 13px;

            border-radius: 10px;

            color: #64748b;

            text-decoration: none;

            font-size: 15px;
            font-weight: 600;

            transition: .2s;
        }

        .sidebar-link i {
            width: 22px;

            font-size: 18px;

            text-align: center;
        }

        .sidebar-link:hover,
        .sidebar-link.active {
            background: #eff6ff;
            color: #2563eb;
        }

        .sidebar-bottom {
            margin-top: auto;

            padding-top: 20px;

            border-top: 1px solid #e5e7eb;
        }

        .logout-btn {
            width: 100%;

            border: none;

            background: transparent;

            color: #64748b;

            padding: 12px;

            border-radius: 10px;

            font-size: 15px;
            font-weight: 600;

            text-align: left;

            cursor: pointer;

            transition: .2s;
        }

        .logout-btn i {
            margin-right: 10px;
        }

        .logout-btn:hover {
            background: #fef2f2;
            color: #dc2626;
        }


        /* =====================================================
           MAIN CONTENT
        ===================================================== */

        .main-content {
            margin-left: 250px;

            min-height: 100vh;

            padding: 45px 50px;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 35px;
        }

        .page-title {
            margin: 0;

            font-size: 32px;
            font-weight: 800;
        }

        .page-subtitle {
            margin: 7px 0 0;

            color: #64748b;

            font-size: 15px;
        }

        .admin-badge {
            background: #eff6ff;

            color: #2563eb;

            padding: 9px 15px;

            border-radius: 20px;

            font-size: 13px;
            font-weight: 700;
        }


        /* =====================================================
           CARDS
        ===================================================== */

        .admin-grid {
            display: grid;

            grid-template-columns:
                repeat(3, minmax(0, 1fr));

            gap: 22px;
        }

        .admin-card {
            background: white;

            border: 1px solid #e5e7eb;

            border-radius: 18px;

            padding: 27px;

            min-height: 215px;

            text-decoration: none;

            color: inherit;

            box-shadow:
                0 8px 25px
                rgba(15,23,42,.05);

            transition: .25s;

            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .admin-card:hover {
            transform: translateY(-4px);

            border-color: #bfdbfe;

            box-shadow:
                0 15px 35px
                rgba(15,23,42,.09);
        }

        .admin-icon {
            width: 55px;
            height: 55px;

            border-radius: 15px;

            display: flex;

            align-items: center;
            justify-content: center;

            background: #eff6ff;

            color: #2563eb;

            font-size: 23px;

            margin-bottom: 22px;
        }

        .admin-card h3 {
            margin: 0 0 8px;

            font-size: 19px;

            font-weight: 800;
        }

        .admin-card p {
            margin: 0;

            color: #6b7280;

            font-size: 14px;

            line-height: 1.6;
        }

        .open-text {
            margin-top: 20px;

            color: #2563eb;

            font-size: 13px;

            font-weight: 700;
        }

        .no-permissions {
            background: white;

            border: 1px dashed #cbd5e1;

            border-radius: 18px;

            padding: 35px;

            color: #64748b;

            text-align: center;

            grid-column: 1 / -1;
        }


        /* =====================================================
           MOBILE
        ===================================================== */

        @media(max-width: 1000px) {

            .admin-grid {
                grid-template-columns:
                    repeat(2, minmax(0, 1fr));
            }

        }

        @media(max-width: 900px) {

            .sidebar {
                width: 220px;
            }

            .main-content {
                margin-left: 220px;
                padding: 35px 25px;
            }

        }

        @media(max-width: 650px) {

            .sidebar {
                position: relative;

                width: 100%;
                height: auto;

                border-right: none;
                border-bottom: 1px solid #e5e7eb;
            }

            .sidebar-menu {
                display: grid;

                grid-template-columns:
                    repeat(2, 1fr);
            }

            .sidebar-bottom {
                margin-top: 15px;
            }

            .main-content {
                margin-left: 0;

                padding: 30px 18px;
            }

            .topbar {
                align-items: flex-start;

                gap: 15px;
            }

            .page-title {
                font-size: 27px;
            }

            .admin-grid {
                grid-template-columns: 1fr;
            }

        }

    </style>

</head>


<body>


    <!-- =====================================================
         SIDEBAR
    ===================================================== -->

    <aside class="sidebar">


        <!-- LOGO -->

        <a
            href="{{ url('/admin-user') }}"
            class="brand"
        >
            Tech<span>Hub</span>
        </a>


        <div class="sidebar-title">
            ADMIN PANEL
        </div>


        <nav class="sidebar-menu">


            <!-- DASHBOARD -->

            @if(session('can_view_dashboard', false))

                <a
                    href="{{ url('/admin-user') }}"
                    class="sidebar-link active"
                >

                    <i class="bi bi-grid-1x2"></i>

                    Dashboard

                </a>

            @endif


            <!-- VIEW WEBSITE -->

            @if(session('can_view_website', false))

                <a
                    href="{{ url('/') }}"
                    class="sidebar-link"
                    target="_blank"
                >

                    <i class="bi bi-globe2"></i>

                    Visit Website

                </a>

            @endif


            <!-- PRODUCTS -->

            @if(session('can_view_products', false))

                <a
                    href="{{ url('/admin-user/products') }}"
                    class="sidebar-link"
                >

                    <i class="bi bi-box-seam"></i>

                    Products

                </a>

            @endif


            <!-- ADD PRODUCTS -->

            @if(session('can_add_products', false))

                <a
                    href="{{ url('/admin-user/products/create') }}"
                    class="sidebar-link"
                >

                    <i class="bi bi-plus-square"></i>

                    Add Products

                </a>

            @endif


            <!-- ORDERS -->

            @if(session('can_view_orders', false))

                <a
                    href="{{ url('/admin-user/orders') }}"
                    class="sidebar-link"
                >

                    <i class="bi bi-cart-check"></i>

                    Orders

                </a>

            @endif


            <!-- CUSTOMERS -->

            @if(session('can_view_customers', false))

                <a
                    href="{{ url('/admin-user/customers') }}"
                    class="sidebar-link"
                >

                    <i class="bi bi-people"></i>

                    Customers

                </a>

            @endif


            <!-- INVENTORY -->

            @if(session('can_view_inventory', false))

                <a
                    href="{{ url('/admin-user/inventory') }}"
                    class="sidebar-link"
                >

                    <i class="bi bi-clipboard-data"></i>

                    Inventory

                </a>

            @endif


            <!-- COUPONS -->

            @if(session('can_view_coupons', false))

                <a
                    href="{{ url('/admin-user/coupons') }}"
                    class="sidebar-link"
                >

                    <i class="bi bi-ticket-perforated"></i>

                    Coupons

                </a>

            @endif


            <!-- SETTINGS -->

            @if(session('can_view_settings', false))

                <a
                    href="{{ url('/admin-user/settings') }}"
                    class="sidebar-link"
                >

                    <i class="bi bi-gear"></i>

                    Settings

                </a>

            @endif


            <!-- WEBSITE VISITORS -->

            @if(session('can_view_visitors', false))

                <a
                    href="{{ url('/admin-user/visitors') }}"
                    class="sidebar-link"
                >

                    <i class="bi bi-bar-chart-line"></i>

                    Website Visitors

                </a>

            @endif


        </nav>


        <!-- LOGOUT -->

        <div class="sidebar-bottom">

            <form
                action="{{ url('/admin-user/logout') }}"
                method="POST"
            >

                @csrf

                <button
                    type="submit"
                    class="logout-btn"
                >

                    <i class="bi bi-box-arrow-right"></i>

                    Logout

                </button>

            </form>

        </div>


    </aside>



    <!-- =====================================================
         MAIN CONTENT
    ===================================================== -->

    <main class="main-content">


        <div class="topbar">


            <div>

                <h1 class="page-title">
                    Welcome, Admin 👋
                </h1>

                <p class="page-subtitle">
                    Access the TechHub tools assigned to you.
                </p>

            </div>


            <div class="admin-badge">
                Admin Panel
            </div>


        </div>



        <!-- =================================================
             DYNAMIC DASHBOARD CARDS
        ================================================= -->

        <div class="admin-grid">


            <!-- DASHBOARD -->

            @if(session('can_view_dashboard', false))

                <a
                    href="{{ url('/admin-user') }}"
                    class="admin-card"
                >

                    <div>

                        <div class="admin-icon">
                            <i class="bi bi-grid-1x2"></i>
                        </div>

                        <h3>
                            Dashboard
                        </h3>

                        <p>
                            View your assigned TechHub
                            administration tools.
                        </p>

                    </div>

                    <div class="open-text">
                        Open Dashboard
                        <i class="bi bi-arrow-right"></i>
                    </div>

                </a>

            @endif



            <!-- VISIT WEBSITE -->

            @if(session('can_view_website', false))

                <a
                    href="{{ url('/') }}"
                    class="admin-card"
                    target="_blank"
                >

                    <div>

                        <div class="admin-icon">
                            <i class="bi bi-globe2"></i>
                        </div>

                        <h3>
                            Visit Website
                        </h3>

                        <p>
                            Open the public TechHub
                            shopping website.
                        </p>

                    </div>

                    <div class="open-text">
                        Visit Website
                        <i class="bi bi-box-arrow-up-right"></i>
                    </div>

                </a>

            @endif



            <!-- PRODUCTS -->

            @if(session('can_view_products', false))

                <a
                    href="{{ url('/admin-user/products') }}"
                    class="admin-card"
                >

                    <div>

                        <div class="admin-icon">
                            <i class="bi bi-box-seam"></i>
                        </div>

                        <h3>
                            Products
                        </h3>

                        <p>
                            View and manage products
                            in the TechHub store.
                        </p>

                    </div>

                    <div class="open-text">
                        View Products
                        <i class="bi bi-arrow-right"></i>
                    </div>

                </a>

            @endif



            <!-- ADD PRODUCTS -->

            @if(session('can_add_products', false))

                <a
                    href="{{ url('/admin-user/products/create') }}"
                    class="admin-card"
                >

                    <div>

                        <div class="admin-icon">
                            <i class="bi bi-plus-square"></i>
                        </div>

                        <h3>
                            Add Products
                        </h3>

                        <p>
                            Add new products with images,
                            prices, stock and descriptions.
                        </p>

                    </div>

                    <div class="open-text">
                        Add New Product
                        <i class="bi bi-arrow-right"></i>
                    </div>

                </a>

            @endif



            <!-- ORDERS -->

            @if(session('can_view_orders', false))

                <a
                    href="{{ url('/admin-user/orders') }}"
                    class="admin-card"
                >

                    <div>

                        <div class="admin-icon">
                            <i class="bi bi-cart-check"></i>
                        </div>

                        <h3>
                            Customer Orders
                        </h3>

                        <p>
                            View customer orders,
                            payments and order status.
                        </p>

                    </div>

                    <div class="open-text">
                        View Orders
                        <i class="bi bi-arrow-right"></i>
                    </div>

                </a>

            @endif



            <!-- CUSTOMERS -->

            @if(session('can_view_customers', false))

                <a
                    href="{{ url('/admin-user/customers') }}"
                    class="admin-card"
                >

                    <div>

                        <div class="admin-icon">
                            <i class="bi bi-people"></i>
                        </div>

                        <h3>
                            Customers
                        </h3>

                        <p>
                            View customer accounts
                            and information.
                        </p>

                    </div>

                    <div class="open-text">
                        View Customers
                        <i class="bi bi-arrow-right"></i>
                    </div>

                </a>

            @endif



            <!-- INVENTORY -->

            @if(session('can_view_inventory', false))

                <a
                    href="{{ url('/admin-user/inventory') }}"
                    class="admin-card"
                >

                    <div>

                        <div class="admin-icon">
                            <i class="bi bi-clipboard-data"></i>
                        </div>

                        <h3>
                            Inventory
                        </h3>

                        <p>
                            View products, stock levels
                            and inventory information.
                        </p>

                    </div>

                    <div class="open-text">
                        View Inventory
                        <i class="bi bi-arrow-right"></i>
                    </div>

                </a>

            @endif



            <!-- COUPONS -->

            @if(session('can_view_coupons', false))

                <a
                    href="{{ url('/admin-user/coupons') }}"
                    class="admin-card"
                >

                    <div>

                        <div class="admin-icon">
                            <i class="bi bi-ticket-perforated"></i>
                        </div>

                        <h3>
                            Coupons
                        </h3>

                        <p>
                            Manage discount coupons
                            for the TechHub store.
                        </p>

                    </div>

                    <div class="open-text">
                        Manage Coupons
                        <i class="bi bi-arrow-right"></i>
                    </div>

                </a>

            @endif



            <!-- SETTINGS -->

            @if(session('can_view_settings', false))

                <a
                    href="{{ url('/admin-user/settings') }}"
                    class="admin-card"
                >

                    <div>

                        <div class="admin-icon">
                            <i class="bi bi-gear"></i>
                        </div>

                        <h3>
                            Settings
                        </h3>

                        <p>
                            Manage TechHub store
                            and payment settings.
                        </p>

                    </div>

                    <div class="open-text">
                        Open Settings
                        <i class="bi bi-arrow-right"></i>
                    </div>

                </a>

            @endif



            <!-- WEBSITE VISITORS -->

            @if(session('can_view_visitors', false))

                <a
                    href="{{ url('/admin-user/visitors') }}"
                    class="admin-card"
                >

                    <div>

                        <div class="admin-icon">
                            <i class="bi bi-bar-chart-line"></i>
                        </div>

                        <h3>
                            Website Visitors
                        </h3>

                        <p>
                            View visitor analytics,
                            devices and browser information.
                        </p>

                    </div>

                    <div class="open-text">
                        View Visitors
                        <i class="bi bi-arrow-right"></i>
                    </div>

                </a>

            @endif



            <!-- NO PERMISSIONS -->

            @if(
                !session('can_view_dashboard', false) &&
                !session('can_view_website', false) &&
                !session('can_view_products', false) &&
                !session('can_add_products', false) &&
                !session('can_view_orders', false) &&
                !session('can_view_customers', false) &&
                !session('can_view_inventory', false) &&
                !session('can_view_coupons', false) &&
                !session('can_view_settings', false) &&
                !session('can_view_visitors', false)
            )

                <div class="no-permissions">

                    <i
                        class="bi bi-shield-lock"
                        style="font-size: 32px;"
                    ></i>

                    <h3 style="margin-top: 12px;">
                        No Permissions Assigned
                    </h3>

                    <p>
                        Please contact the Super Admin
                        to assign access to your account.
                    </p>

                </div>

            @endif


        </div>


    </main>


</body>

</html>