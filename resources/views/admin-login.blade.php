<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Login - TechHub</title>
     <link
    rel="icon"
    type="image/png"
    href="{{ asset('css/techhub_TH_favicon.png') }}"
>

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

        body {
            min-height: 100vh;
            margin: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #f7f9fc;

            font-family: Arial, sans-serif;
        }

        .login-card {
            width: 100%;
            max-width: 420px;

            background: white;

            padding: 40px;

            border-radius: 20px;

            border: 1px solid #e5eaf2;

            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
        }

        .logo {
            width: 60px;
            height: 60px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin: 0 auto 20px;

            border-radius: 16px;

            background: linear-gradient(
                135deg,
                #2563eb,
                #4f46e5
            );

            color: white;

            font-size: 22px;
            font-weight: 800;
        }

        .login-title {
            text-align: center;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .login-subtitle {
            text-align: center;
            color: #6b7280;
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: 600;
        }

        .form-control {
            padding: 12px 14px;
            border-radius: 10px;
            border: 1px solid #dbe2ea;
        }

        .form-control:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, .12);
        }

        .login-btn {
            width: 100%;

            padding: 12px;

            border: none;
            border-radius: 10px;

            background: #2563eb;
            color: white;

            font-weight: 700;

            margin-top: 10px;
        }

        .login-btn:hover {
            background: #1d4ed8;
        }

        .back-link {
            display: block;

            text-align: center;

            margin-top: 20px;

            color: #6b7280;

            text-decoration: none;
        }

        .back-link:hover {
            color: #2563eb;
        }

    </style>

</head>

<body>

<div class="login-card">

    <div class="logo">
        TH
    </div>

    <h2 class="login-title">
        Admin Login
    </h2>

    <p class="login-subtitle">
        Sign in to manage TechHub
    </p>


    @if(session('error'))

        <div class="alert alert-danger">
            {{ session('error') }}
        </div>

    @endif


    <form action="{{ url('/admin/login') }}" method="POST">

        @csrf

        <div class="mb-3">

            <label class="form-label">
                Admin ID
            </label>

            <input
                type="text"
                name="admin_id"
                class="form-control"
                placeholder="Enter admin ID"
                required
            >

        </div>


        <div class="mb-3">

            <label class="form-label">
                Password
            </label>

            <input
                type="password"
                name="password"
                class="form-control"
                placeholder="Enter password"
                required
            >

        </div>


        <button
            type="submit"
            class="login-btn"
        >

            <i class="bi bi-box-arrow-in-right me-1"></i>

            Login to Admin

        </button>

    </form>


    <a
        href="{{ url('/') }}"
        class="back-link"
    >
        ← Back to TechHub
    </a>

</div>

</body>

</html>