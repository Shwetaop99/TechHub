<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Website Visitors - TechHub Admin</title>

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
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css"
        rel="stylesheet"
    >

    <style>
* {
    box-sizing: border-box;
}

body {
    margin: 0;
    background: #f5f7fb;
    font-family: Arial, sans-serif;
    color: #111827;
}


/* =========================================================
   NAVBAR
========================================================= */

.navbar {
    background: #111827;
    padding: 18px 0;
}

.navbar-brand {
    color: white;
    font-size: 26px;
    font-weight: 800;
    text-decoration: none;
}

.navbar-brand span {
    color: #2248c5;
}

.back-btn {
    border: 1px solid rgba(255,255,255,.25);
    color: white;
    border-radius: 10px;
    padding: 9px 16px;
    text-decoration: none;
    transition: .2s ease;
}

.back-btn:hover {
    background: white;
    color: #111827;
}


/* =========================================================
   PAGE
========================================================= */

.page-container {
    max-width: 1400px;
    margin: auto;
    padding: 45px 25px;
}

.page-title {
    font-size: 32px;
    font-weight: 800;
    margin-bottom: 6px;
}

.page-title i {
    color: #2248c5;
}

.page-subtitle {
    color: #6b7280;
    margin-bottom: 30px;
}


/* =========================================================
   STAT CARDS
========================================================= */

.stat-card {
    background: #ffffff;
    border-radius: 18px;
    padding: 24px;
    height: 100%;
    border: 1px solid #e5e7eb;
    box-shadow: 0 8px 25px rgba(15, 23, 42, .05);
    transition: .25s ease;
}

.stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 15px 35px rgba(15, 23, 42, .09);
}


/* =========================================================
   STAT ICON
========================================================= */

.stat-icon {
    width: 48px;
    height: 48px;
    border-radius: 14px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #f0f6ff;
    border: 1px solid #cfe0ff;

    color: #2248c5;

    font-size: 22px;

    margin-bottom: 15px;

    transition: .25s ease;
}

.stat-card:hover .stat-icon {
    background: linear-gradient(
        135deg,
        #2563eb,
        #2248c5
    );

    color: #ffffff;
}


/* =========================================================
   STAT TEXT
========================================================= */

.stat-label {
    color: #6b7280;

    font-size: 13px;

    font-weight: 700;

    text-transform: uppercase;

    letter-spacing: .5px;
}

.stat-number {
    font-size: 30px;

    font-weight: 800;

    margin: 5px 0 0;

    color: #111827;
}


/* =========================================================
   TABLE CARD
========================================================= */

.table-card {
    background: #ffffff;

    border-radius: 18px;

    border: 1px solid #e5e7eb;

    box-shadow:
        0 8px 25px rgba(15, 23, 42, .05);

    overflow: hidden;

    margin-top: 35px;
}


/* =========================================================
   TABLE HEADER
========================================================= */

.table-header {
    padding: 22px 25px;

    border-bottom: 1px solid #e5e7eb;

    display: flex;

    justify-content: space-between;

    align-items: center;

    gap: 15px;
}

.table-title {
    margin: 0;

    font-size: 20px;

    font-weight: 800;
}

.table-title i {
    color: #2248c5;
}


/* =========================================================
   VISITOR COUNT
========================================================= */

.visitor-count {
    background: #f0f6ff;

    color: #2248c5;

    border: 1px solid #cfe0ff;

    padding: 7px 12px;

    border-radius: 30px;

    font-size: 12px;

    font-weight: 700;
}


/* =========================================================
   TABLE
========================================================= */

.table {
    margin: 0;
}

.table thead th {
    background: #f8fafc;

    color: #6b7280;

    font-size: 12px;

    text-transform: uppercase;

    letter-spacing: .5px;

    border-bottom: 1px solid #e5e7eb;

    padding: 15px 20px;

    white-space: nowrap;
}

.table tbody td {
    padding: 17px 20px;

    vertical-align: middle;

    border-bottom: 1px solid #f1f5f9;
}

.table tbody tr {
    transition: .2s ease;
}

.table tbody tr:hover {
    background: #f5f9ff;
}


/* =========================================================
   DEVICE BADGES
========================================================= */

.device-badge {
    display: inline-flex;

    align-items: center;

    gap: 7px;

    padding: 7px 11px;

    border-radius: 30px;

    font-size: 12px;

    font-weight: 700;
}


/* Desktop */

.device-desktop {
    background: #eff6ff;

    color: #2563eb;

    border: 1px solid #dbeafe;
}


/* Mobile */

.device-mobile {
    background: #f5f3ff;

    color: #7c3aed;

    border: 1px solid #ddd6fe;
}


/* Tablet */

.device-tablet {
    background: #eef2ff;

    color: #4f46e5;

    border: 1px solid #c7d2fe;
}


/* =========================================================
   BROWSER
========================================================= */

.browser-name {
    font-weight: 600;

    color: #374151;
}


/* =========================================================
   IP ADDRESS
========================================================= */

.ip-address {
    font-family: monospace;

    font-size: 13px;

    background: #f3f6fb;

    color: #334155;

    padding: 6px 9px;

    border-radius: 7px;

    border: 1px solid #e2e8f0;
}


/* =========================================================
   VISITS
========================================================= */

.visit-count {
    font-weight: 800;

    color: #2248c5;
}


/* =========================================================
   DATE / TIME
========================================================= */

.table tbody td:nth-child(6),
.table tbody td:nth-child(7) {
    color: #64748b;

    font-size: 13px;

    white-space: nowrap;
}


/* =========================================================
   EMPTY STATE
========================================================= */

.empty-state {
    padding: 70px 20px;

    text-align: center;

    color: #6b7280;
}

.empty-icon {
    font-size: 55px;

    color: #cbd5e1;

    margin-bottom: 15px;
}

.empty-state h4 {
    color: #374151;

    font-weight: 700;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 768px) {

    .page-container {
        padding: 30px 15px;
    }

    .page-title {
        font-size: 26px;
    }

    .page-subtitle {
        font-size: 14px;
    }

    .table-header {
        align-items: flex-start;

        flex-direction: column;
    }

    .stat-number {
        font-size: 27px;
    }

}


/* =========================================================
   SMALL MOBILE
========================================================= */

@media (max-width: 480px) {

    .navbar-brand {
        font-size: 21px;
    }

    .back-btn {
        padding: 7px 10px;

        font-size: 13px;
    }

    .page-container {
        padding: 25px 12px;
    }

    .stat-card {
        padding: 20px;
    }

}

    </style>

</head>


<body>


<!-- =========================================================
     NAVBAR
========================================================= -->

<nav class="navbar">

    <div class="container-fluid px-4">

        <a
            href="{{ url('/admin') }}"
            class="navbar-brand"
        >
            Tech<span>Hub</span> Admin
        </a>

        <a
            href="{{ url('/admin') }}"
            class="back-btn"
        >
            <i class="bi bi-arrow-left me-1"></i>
            Dashboard
        </a>

    </div>

</nav>


<!-- =========================================================
     PAGE
========================================================= -->

<div class="page-container">


    <h1 class="page-title">

        <i class="bi bi-graph-up-arrow me-2"></i>

        Website Visitors

    </h1>

    <p class="page-subtitle">

        Track website traffic, devices and visitor activity.

    </p>


    <!-- =====================================================
         STATISTICS
    ====================================================== -->

    <div class="row g-4">


        <!-- TOTAL UNIQUE VISITORS -->

        <div class="col-12 col-sm-6 col-xl-3">

            <div class="stat-card">

                <div class="stat-icon">

                    <i class="bi bi-people-fill"></i>

                </div>

                <div class="stat-label">
                    Unique Visitors
                </div>

                <div class="stat-number">
                    {{ $totalVisitors }}
                </div>

            </div>

        </div>


        <!-- TOTAL VISITS -->

        <div class="col-12 col-sm-6 col-xl-3">

            <div class="stat-card">

                <div class="stat-icon">

                    <i class="bi bi-bar-chart-fill"></i>

                </div>

                <div class="stat-label">
                    Total Visits
                </div>

                <div class="stat-number">
                    {{ $totalVisits }}
                </div>

            </div>

        </div>


        <!-- TODAY -->

        <div class="col-12 col-sm-6 col-xl-3">

            <div class="stat-card">

                <div class="stat-icon">

                    <i class="bi bi-calendar-day"></i>

                </div>

                <div class="stat-label">
                    Today's Visitors
                </div>

                <div class="stat-number">
                    {{ $todayVisitors }}
                </div>

            </div>

        </div>


        <!-- MOBILE -->

        <div class="col-12 col-sm-6 col-xl-3">

            <div class="stat-card">

                <div class="stat-icon">

                    <i class="bi bi-phone-fill"></i>

                </div>

                <div class="stat-label">
                    Mobile Visitors
                </div>

                <div class="stat-number">
                    {{ $mobileVisitors }}
                </div>

            </div>

        </div>

    </div>


    <!-- =====================================================
         VISITOR TABLE
    ====================================================== -->

    <div class="table-card">


        <div class="table-header">

            <h3 class="table-title">

                <i class="bi bi-people me-2"></i>

                Visitor Activity

            </h3>

            <span class="visitor-count">

                {{ $visitors->count() }}

                Records

            </span>

        </div>


        @if($visitors->count() > 0)


            <div class="table-responsive">

                <table class="table">


                    <thead>

                        <tr>

                            <th>#</th>

                            <th>IP Address</th>

                            <th>Device</th>

                            <th>Browser</th>

                            <th>Visits</th>

                            <th>First Visit</th>

                            <th>Last Visit</th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach($visitors as $visitor)

                            <tr>

                                <td>

                                    <strong>
                                        {{ $loop->iteration }}
                                    </strong>

                                </td>


                                <td>

                                    <span class="ip-address">

                                        {{ $visitor->ip_address }}

                                    </span>

                                </td>


                                <td>

                                    @if($visitor->device === 'Mobile')

                                        <span
                                            class="device-badge device-mobile"
                                        >

                                            <i class="bi bi-phone"></i>

                                            Mobile

                                        </span>

                                    @elseif($visitor->device === 'Tablet')

                                        <span
                                            class="device-badge device-tablet"
                                        >

                                            <i class="bi bi-tablet"></i>

                                            Tablet

                                        </span>

                                    @else

                                        <span
                                            class="device-badge device-desktop"
                                        >

                                            <i class="bi bi-pc-display"></i>

                                            Desktop

                                        </span>

                                    @endif

                                </td>


                                <td>

                                    <span class="browser-name">

                                        {{ $visitor->browser }}

                                    </span>

                                </td>


                                <td>

                                    <span class="visit-count">

                                        {{ $visitor->visits }}

                                    </span>

                                </td>


                                <td>

                                    {{ $visitor->first_visited_at
                                        ? $visitor->first_visited_at->format('d M Y, h:i A')
                                        : '—'
                                    }}

                                </td>


                                <td>

                                    {{ $visitor->last_visited_at
                                        ? $visitor->last_visited_at->format('d M Y, h:i A')
                                        : '—'
                                    }}

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>


        @else


            <div class="empty-state">

                <div class="empty-icon">

                    <i class="bi bi-people"></i>

                </div>

                <h4>
                    No visitors yet
                </h4>

                <p>
                    Visitor activity will appear here
                    once people start visiting TechHub.
                </p>

            </div>


        @endif

    </div>

</div>


</body>

</html>