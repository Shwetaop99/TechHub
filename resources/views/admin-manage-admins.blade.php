<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Manage Admins — TechHub</title>

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
            margin: 0;
            background: #f7f9fc;
            font-family: Arial, sans-serif;
            color: #111827;
        }

        .navbar {
            background: #ffffff;
            border-bottom: 1px solid #e5e7eb;
            padding: 18px 0;
        }

        .brand {
            font-size: 25px;
            font-weight: 800;
            text-decoration: none;
            color: #111827;
        }

        .brand span {
            color: #2563eb;
        }

        .admin-label {
            margin-left: 10px;
            padding: 5px 10px;
            border-radius: 20px;
            background: #2563eb;
            color: white;
            font-size: 10px;
            font-weight: 700;
        }

        .dashboard-btn {
            border: 1px solid #d1d5db;
            color: #374151;
            background: white;
            border-radius: 9px;
            padding: 9px 16px;
            text-decoration: none;
            font-weight: 600;
        }

        .dashboard-btn:hover {
            background: #2563eb;
            color: white;
            border-color: #2563eb;
        }

        .page-wrapper {
            max-width: 1150px;
            margin: 45px auto;
            padding: 0 20px;
        }

        .page-title {
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 5px;
        }

        .page-subtitle {
            color: #6b7280;
            margin-bottom: 30px;
        }

        .card-box {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 18px;
            padding: 28px;
            margin-bottom: 25px;
            box-shadow: 0 8px 25px rgba(15, 23, 42, .04);
        }

        .card-title {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: 600;
        }

        .form-control {
            padding: 12px;
            border-radius: 10px;
        }

        .permission-box {
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 15px 18px;
            margin-bottom: 10px;
            transition: .2s;
        }

        .permission-box:hover {
            border-color: #2563eb;
            background: #f8fbff;
        }

        .permission-box label {
            cursor: pointer;
            width: 100%;
        }

        .permission-title {
            font-weight: 700;
        }

        .permission-description {
            display: block;
            color: #6b7280;
            font-size: 13px;
            margin-top: 3px;
        }

        .create-btn {
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 12px 22px;
            font-weight: 700;
        }

        .create-btn:hover {
            background: #1d4ed8;
            color: white;
        }

        .admin-table th {
            color: #6b7280;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .8px;
        }

        .admin-table td {
            vertical-align: middle;
        }

        .permission-badge {
            display: inline-block;
            background: #eff6ff;
            color: #2563eb;
            border-radius: 20px;
            padding: 5px 9px;
            font-size: 11px;
            font-weight: 700;
            margin: 2px;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .edit-btn {
            background: #eff6ff;
            color: #2563eb;
            border: 1px solid #bfdbfe;
            border-radius: 8px;
            padding: 7px 12px;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            display: inline-block;
        }

        .edit-btn:hover {
            background: #2563eb;
            color: white;
        }

        .delete-btn {
            background: #fff1f2;
            color: #dc2626;
            border: 1px solid #fecdd3;
            border-radius: 8px;
            padding: 7px 12px;
            font-size: 12px;
            font-weight: 700;
        }

        .delete-btn:hover {
            background: #dc2626;
            color: white;
        }
    </style>

</head>

<body>

<nav class="navbar">

    <div class="container d-flex justify-content-between align-items-center">

        <a
            href="{{ url('/admin') }}"
            class="brand"
        >
            Tech<span>Hub</span>

            <span class="admin-label">
                SUPER ADMIN
            </span>
        </a>

        <a
            href="{{ url('/admin') }}"
            class="dashboard-btn"
        >
            ← Dashboard
        </a>

    </div>

</nav>


<div class="page-wrapper">

    <h1 class="page-title">
        Manage Admins
    </h1>

    <p class="page-subtitle">
        Create admin accounts and control which sections they can access.
    </p>


    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    @if($errors->any())

        <div class="alert alert-danger">

            <strong>Please fix the following:</strong>

            <ul class="mb-0 mt-2">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    <!-- CREATE ADMIN -->

    <div class="card-box">

        <div class="card-title">
            <i class="bi bi-person-plus me-2"></i>
            Create New Admin
        </div>

        <form
            action="{{ url('/admin/manage-admins') }}"
            method="POST"
        >

            @csrf

            <div class="mb-4">

                <label class="form-label">
                    Admin Email / ID
                </label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    placeholder="admin@techhub.com"
                    value="{{ old('email') }}"
                    required
                >

            </div>


            <div class="mb-4">

                <label class="form-label">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="Create admin password"
                    required
                >

            </div>


            <label class="form-label mb-3">
                Admin Permissions
            </label>


            @php
                $permissions = [
                    'view_dashboard' => [
                        'title' => 'Dashboard',
                        'description' => 'Allow this admin to access the admin dashboard.',
                    ],
                    'view_website' => [
                        'title' => 'View Website',
                        'description' => 'Allow this admin to open and view the TechHub website.',
                    ],
                    'view_products' => [
                        'title' => 'Products',
                        'description' => 'Allow this admin to view and manage products.',
                    ],
                    'add_products' => [
                        'title' => 'Add Products',
                        'description' => 'Allow this admin to add new products.',
                    ],
                    'view_orders' => [
                        'title' => 'Orders',
                        'description' => 'Allow this admin to view and manage customer orders.',
                    ],
                    'view_customers' => [
                        'title' => 'Customers',
                        'description' => 'Allow this admin to view customer information.',
                    ],
                    'view_inventory' => [
                        'title' => 'Inventory',
                        'description' => 'Allow this admin to view inventory and stock reports.',
                    ],
                    'view_coupons' => [
                        'title' => 'Coupons',
                        'description' => 'Allow this admin to manage store coupons.',
                    ],
                    'view_settings' => [
                        'title' => 'Settings',
                        'description' => 'Allow this admin to access store settings.',
                    ],
                    'view_visitors' => [
                        'title' => 'Website Visitors',
                        'description' => 'Allow this admin to view website visitor analytics.',
                    ],
                ];
            @endphp


            @foreach($permissions as $value => $permission)

                <div class="permission-box">

                    <label class="d-flex align-items-start gap-3">

                        <input
                            type="checkbox"
                            name="permissions[]"
                            value="{{ $value }}"
                            class="form-check-input mt-1"
                            @checked(in_array($value, old('permissions', [])))
                        >

                        <span>

                            <span class="permission-title">
                                {{ $permission['title'] }}
                            </span>

                            <span class="permission-description">
                                {{ $permission['description'] }}
                            </span>

                        </span>

                    </label>

                </div>

            @endforeach


            <button
                type="submit"
                class="create-btn mt-3"
            >

                <i class="bi bi-person-plus me-1"></i>

                Create Admin

            </button>

        </form>

    </div>


    <!-- EXISTING ADMINS -->

    <div class="card-box">

        <div class="card-title">
            <i class="bi bi-people me-2"></i>
            Existing Admins
        </div>


        <div class="table-responsive">

            <table class="table admin-table align-middle">

                <thead>

                    <tr>

                        <th>
                            Email
                        </th>

                        <th>
                            Permissions
                        </th>

                        <th>
                            Created
                        </th>

                        <th>
                            Action
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($admins as $admin)

                        <tr>

                            <td>
                                <strong>
                                    {{ $admin->email }}
                                </strong>
                            </td>


                            <td>

                                @php
                                    $hasPermission = false;
                                @endphp

                                @if($admin->can_view_dashboard)
                                    @php $hasPermission = true; @endphp
                                    <span class="permission-badge">Dashboard</span>
                                @endif

                                @if($admin->can_view_website)
                                    @php $hasPermission = true; @endphp
                                    <span class="permission-badge">Website</span>
                                @endif

                                @if($admin->can_view_products)
                                    @php $hasPermission = true; @endphp
                                    <span class="permission-badge">Products</span>
                                @endif

                                @if($admin->can_add_products)
                                    @php $hasPermission = true; @endphp
                                    <span class="permission-badge">Add Products</span>
                                @endif

                                @if($admin->can_view_orders)
                                    @php $hasPermission = true; @endphp
                                    <span class="permission-badge">Orders</span>
                                @endif

                                @if($admin->can_view_customers)
                                    @php $hasPermission = true; @endphp
                                    <span class="permission-badge">Customers</span>
                                @endif

                                @if($admin->can_view_inventory)
                                    @php $hasPermission = true; @endphp
                                    <span class="permission-badge">Inventory</span>
                                @endif

                                @if($admin->can_view_coupons)
                                    @php $hasPermission = true; @endphp
                                    <span class="permission-badge">Coupons</span>
                                @endif

                                @if($admin->can_view_settings)
                                    @php $hasPermission = true; @endphp
                                    <span class="permission-badge">Settings</span>
                                @endif

                                @if($admin->can_view_visitors)
                                    @php $hasPermission = true; @endphp
                                    <span class="permission-badge">Visitors</span>
                                @endif

                                @if(!$hasPermission)

                                    <span class="text-muted">
                                        No permissions
                                    </span>

                                @endif

                            </td>


                            <td>
                                {{ $admin->created_at->format('d M Y') }}
                            </td>


                            <td>

                                <div class="action-buttons">

                                    <!-- EDIT -->

                                    <a
                                        href="{{ url('/admin/manage-admins/' . $admin->id . '/edit') }}"
                                        class="edit-btn"
                                    >

                                        <i class="bi bi-pencil-square me-1"></i>

                                        Edit

                                    </a>


                                    <!-- DELETE -->

                                    <form
                                        action="{{ url('/admin/manage-admins/' . $admin->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Delete this admin?');"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="delete-btn"
                                        >

                                            <i class="bi bi-trash3 me-1"></i>

                                            Delete

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="4"
                                class="text-center text-muted py-4"
                            >

                                No normal admins created yet.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>

</html>