<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Edit Admin — TechHub</title>

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

        .back-btn {
            border: 1px solid #d1d5db;
            color: #374151;
            background: white;
            border-radius: 9px;
            padding: 9px 16px;
            text-decoration: none;
            font-weight: 600;
        }

        .back-btn:hover {
            background: #2563eb;
            color: white;
            border-color: #2563eb;
        }

        .page-wrapper {
            max-width: 900px;
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
            box-shadow: 0 8px 25px rgba(15, 23, 42, .04);
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

        .save-btn {
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 12px 22px;
            font-weight: 700;
        }

        .save-btn:hover {
            background: #1d4ed8;
            color: white;
        }

        .cancel-btn {
            border: 1px solid #d1d5db;
            color: #374151;
            background: white;
            border-radius: 10px;
            padding: 12px 22px;
            font-weight: 700;
            text-decoration: none;
        }

        .cancel-btn:hover {
            background: #f3f4f6;
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
</a>

        <a
            href="{{ url('/admin/manage-admins') }}"
            class="back-btn"
        >
            ← Manage Admins
        </a>

    </div>

</nav>


<div class="page-wrapper">

    <h1 class="page-title">
        Edit Admin
    </h1>

    <p class="page-subtitle">
        Update this admin's email, password and permissions.
    </p>


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


    <div class="card-box">

        <form
            action="{{ url('/admin/manage-admins/' . $admin->id) }}"
            method="POST"
        >

            @csrf

            @method('PUT')


            <!-- EMAIL -->

            <div class="mb-4">

                <label class="form-label">
                    Admin Email / ID
                </label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email', $admin->email) }}"
                    required
                >

            </div>


            <!-- PASSWORD -->

            <div class="mb-4">

                <label class="form-label">
                    New Password
                </label>

                <input
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="Leave blank to keep current password"
                >

                <small class="text-muted">
                    Leave this empty if you do not want to change the password.
                </small>

            </div>


            <!-- PERMISSIONS -->

            <label class="form-label mb-3">
                Admin Permissions
            </label>


            @php
                $permissions = [
                    'view_dashboard' => [
                        'title' => 'Dashboard',
                        'description' => 'Allow this admin to access the admin dashboard.',
                        'column' => 'can_view_dashboard',
                    ],
                    'view_website' => [
                        'title' => 'View Website',
                        'description' => 'Allow this admin to open and view the TechHub website.',
                        'column' => 'can_view_website',
                    ],
                    'view_products' => [
                        'title' => 'Products',
                        'description' => 'Allow this admin to view and manage products.',
                        'column' => 'can_view_products',
                    ],
                    'add_products' => [
                        'title' => 'Add Products',
                        'description' => 'Allow this admin to add new products.',
                        'column' => 'can_add_products',
                    ],
                    'view_orders' => [
                        'title' => 'Orders',
                        'description' => 'Allow this admin to view and manage customer orders.',
                        'column' => 'can_view_orders',
                    ],
                    'view_customers' => [
                        'title' => 'Customers',
                        'description' => 'Allow this admin to view customer information.',
                        'column' => 'can_view_customers',
                    ],
                    'view_inventory' => [
                        'title' => 'Inventory',
                        'description' => 'Allow this admin to view inventory and stock reports.',
                        'column' => 'can_view_inventory',
                    ],
                    'view_coupons' => [
                        'title' => 'Coupons',
                        'description' => 'Allow this admin to manage store coupons.',
                        'column' => 'can_view_coupons',
                    ],
                    'view_settings' => [
                        'title' => 'Settings',
                        'description' => 'Allow this admin to access store settings.',
                        'column' => 'can_view_settings',
                    ],
                    'view_visitors' => [
                        'title' => 'Website Visitors',
                        'description' => 'Allow this admin to view website visitor analytics.',
                        'column' => 'can_view_visitors',
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
                            @checked(
                                old(
                                    'permissions',
                                    []
                                ) !== []
                                ? in_array(
                                    $value,
                                    old('permissions', [])
                                )
                                : $admin->{$permission['column']}
                            )
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


            <div class="d-flex gap-2 mt-4">

                <button
                    type="submit"
                    class="save-btn"
                >

                    <i class="bi bi-check2-circle me-1"></i>

                    Save Changes

                </button>


                <a
                    href="{{ url('/admin/manage-admins') }}"
                    class="cancel-btn"
                >

                    Cancel

                </a>

            </div>

        </form>

    </div>

</div>

</body>

</html>