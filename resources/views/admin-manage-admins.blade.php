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
            background: #f5f7fb;
            color: #1f2937;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background: white;
            border-bottom: 1px solid #e5e7eb;
        }

        .brand {
            color: #111827;
            text-decoration: none;
            font-size: 24px;
            font-weight: bold;
        }

        .brand span {
            color: #2563eb;
        }

        .admin-label {
            margin-left: 8px;
            padding: 5px 9px;
            border-radius: 20px;
            background: #eff6ff;
            color: #2563eb;
            font-size: 10px;
            font-weight: bold;
        }

        .dashboard-btn {
            padding: 8px 14px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background: white;
            color: #374151;
            text-decoration: none;
            font-size: 13px;
        }

        .dashboard-btn:hover {
            background: #2563eb;
            color: white;
        }

        .page-wrapper {
            max-width: 1150px;
            margin: 40px auto;
            padding: 0 15px;
        }

        .page-title {
            margin-bottom: 5px;
            font-size: 32px;
            font-weight: bold;
        }

        .page-subtitle {
            margin-bottom: 25px;
            color: #6b7280;
        }

        .card-box {
            margin-bottom: 25px;
            padding: 25px;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            background: white;
            box-shadow: 0 5px 20px rgba(0,0,0,.05);
        }

        .card-title {
            margin-bottom: 20px;
            color: #111827;
            font-size: 19px;
            font-weight: bold;
        }

        .form-label {
            margin-bottom: 7px;
            font-weight: 600;
        }

        .form-control {
            border-radius: 8px;
        }

        .form-control:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37,99,235,.1);
        }

        .password-wrap {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translateY(-50%);
            border: 0;
            background: transparent;
            color: #6b7280;
        }

        .input-hint {
            margin-top: 5px;
            color: #9ca3af;
            font-size: 11px;
        }

        .permissions-toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
        }

        .permissions-count {
            color: #6b7280;
            font-size: 12px;
        }

        .permissions-count strong {
            color: #2563eb;
        }

        .permission-actions {
            display: flex;
            gap: 6px;
        }

        .permission-action {
            padding: 6px 10px;
            border: 1px solid #d1d5db;
            border-radius: 7px;
            background: white;
            font-size: 11px;
            cursor: pointer;
        }

        .permission-action:hover {
            background: #eff6ff;
            color: #2563eb;
        }

        .permissions-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .permission-box {
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            background: white;
        }

        .permission-box:hover {
            border-color: #93c5fd;
        }

        .permission-label {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 14px;
            cursor: pointer;
        }

        .permission-checkbox {
            width: 18px;
            height: 18px;
            margin-top: 2px;
            accent-color: #2563eb;
        }

        .permission-icon {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            background: #eff6ff;
            color: #2563eb;
        }

        .permission-title {
            display: block;
            font-weight: bold;
            font-size: 13px;
        }

        .permission-description {
            display: block;
            margin-top: 3px;
            color: #6b7280;
            font-size: 11px;
        }

        .create-btn {
            padding: 10px 18px;
            border: 0;
            border-radius: 8px;
            background: #2563eb;
            color: white;
            font-weight: bold;
        }

        .create-btn:hover {
            background: #1d4ed8;
        }

        .admin-table {
            margin-bottom: 0;
        }

        .admin-table th {
            background: #f9fafb;
            color: #6b7280;
            font-size: 11px;
            text-transform: uppercase;
        }

        .admin-table td,
        .admin-table th {
            padding: 14px;
            vertical-align: middle;
        }

        .permission-badge {
            display: inline-block;
            margin: 2px;
            padding: 5px 8px;
            border-radius: 15px;
            background: #eff6ff;
            color: #2563eb;
            font-size: 10px;
            font-weight: bold;
        }

        .action-buttons {
            display: flex;
            gap: 6px;
        }

        .edit-btn,
        .delete-btn {
            padding: 7px 10px;
            border-radius: 7px;
            font-size: 11px;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
        }

        .edit-btn {
            border: 1px solid #bfdbfe;
            background: #eff6ff;
            color: #2563eb;
        }

        .edit-btn:hover {
            background: #2563eb;
            color: white;
        }

        .delete-btn {
            border: 1px solid #fecaca;
            background: #fef2f2;
            color: #dc2626;
        }

        .delete-btn:hover {
            background: #dc2626;
            color: white;
        }

        @media (max-width: 768px) {

            .permissions-grid {
                grid-template-columns: 1fr;
            }

            .permissions-toolbar {
                align-items: flex-start;
                flex-direction: column;
                gap: 10px;
            }

            .page-title {
                font-size: 27px;
            }

        }

        @media (max-width: 500px) {

            .dashboard-btn {
                font-size: 0;
            }

            .dashboard-btn::before {
                content: "←";
                font-size: 18px;
            }

            .action-buttons {
                flex-direction: column;
            }

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


            <div class="row g-3">

                <div class="col-lg-6">

                    <label class="form-label" for="adminPassword">
                        Password
                    </label>

                    <div class="password-wrap">

                        <input
                            type="password"
                            name="password"
                            id="adminPassword"
                            class="form-control"
                            placeholder="Create admin password"
                            autocomplete="new-password"
                            required
                        >

                        <button
                            type="button"
                            class="password-toggle"
                            onclick="togglePassword('adminPassword', this)"
                            aria-label="Show password"
                        >
                            <i class="bi bi-eye"></i>
                        </button>

                    </div>

                    <div class="input-hint">
                        Minimum 6 characters.
                    </div>

                </div>

                <div class="col-lg-6">

                    <label class="form-label" for="adminPasswordConfirmation">
                        Confirm Password
                    </label>

                    <div class="password-wrap">

                        <input
                            type="password"
                            name="password_confirmation"
                            id="adminPasswordConfirmation"
                            class="form-control"
                            placeholder="Confirm admin password"
                            autocomplete="new-password"
                            required
                        >

                        <button
                            type="button"
                            class="password-toggle"
                            onclick="togglePassword('adminPasswordConfirmation', this)"
                            aria-label="Show password"
                        >
                            <i class="bi bi-eye"></i>
                        </button>

                    </div>

                </div>

            </div>


            <div class="permissions-toolbar">

                <div>

                    <label class="form-label mb-1">
                        Admin Permissions
                    </label>

                    <div class="permissions-count">
                        <strong id="permissionCount">0</strong>
                        of <strong>10</strong> permissions selected
                    </div>

                </div>

                <div class="permission-actions">

                    <button
                        type="button"
                        class="permission-action"
                        id="selectAllPermissions"
                    >
                        <i class="bi bi-check2-all me-1"></i>
                        Select All
                    </button>

                    <button
                        type="button"
                        class="permission-action"
                        id="clearAllPermissions"
                    >
                        <i class="bi bi-x-lg me-1"></i>
                        Clear All
                    </button>

                </div>

            </div>


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

                    <label class="permission-label">

                        <input
                            type="checkbox"
                            name="permissions[]"
                            value="{{ $value }}"
                            class="permission-checkbox permission-input"
                            @checked(in_array($value, old('permissions', [])))
                        >

                        <span class="permission-icon">
                            <i class="bi bi-shield-check"></i>
                        </span>

                        <span class="permission-content">

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
                                        onsubmit="return confirm('Are you sure you want to delete this admin?');"
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


<script>

    const permissionInputs =
        document.querySelectorAll('.permission-input');

    const permissionCount =
        document.getElementById('permissionCount');


    function updatePermissionCount() {

        const selected =
            document.querySelectorAll(
                '.permission-input:checked'
            ).length;

        if (permissionCount) {
            permissionCount.textContent = selected;
        }
    }


    permissionInputs.forEach(function (input) {

        input.addEventListener(
            'change',
            updatePermissionCount
        );

    });


    const selectAll =
        document.getElementById(
            'selectAllPermissions'
        );

    if (selectAll) {

        selectAll.addEventListener(
            'click',
            function () {

                permissionInputs.forEach(
                    function (input) {
                        input.checked = true;
                    }
                );

                updatePermissionCount();

            }
        );

    }


    const clearAll =
        document.getElementById(
            'clearAllPermissions'
        );

    if (clearAll) {

        clearAll.addEventListener(
            'click',
            function () {

                permissionInputs.forEach(
                    function (input) {
                        input.checked = false;
                    }
                );

                updatePermissionCount();

            }
        );

    }


    function togglePassword(
        inputId,
        button
    ) {

        const input =
            document.getElementById(inputId);

        if (!input) {
            return;
        }

        const icon =
            button.querySelector('i');

        if (input.type === 'password') {

            input.type = 'text';

            icon.className =
                'bi bi-eye-slash';

        } else {

            input.type = 'password';

            icon.className =
                'bi bi-eye';

        }

    }


    updatePermissionCount();

</script>

</body>