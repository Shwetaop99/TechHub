<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sign Up — TechHub</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts: Same as About Page -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <style>

        /* =========================
           THEME
        ========================= */

        :root{

            --bg:#0A0C10;

            --surface:#12151B;

            --surface-2:#1A1E26;

            --ice:#5FD3F3;

            --ice-light:#A9E9FA;

            --ice-dim:rgba(95,211,243,.28);

            --ice-glow:rgba(95,211,243,.13);

            --ivory:#E9ECF0;

            --muted:#838B96;

            --hairline:rgba(233,236,240,.08);

            --font-display:'Space Grotesk',sans-serif;

            --font-body:'Inter',sans-serif;

            --font-mono:'JetBrains Mono',monospace;

        }


        *{
            box-sizing:border-box;
        }


        html{
            scroll-behavior:smooth;
        }


        body{

            margin:0;

            min-height:100vh;

            background:var(--bg);

            color:var(--ivory);

            font-family:var(--font-body);

        }


        h1,
        h2,
        h3,
        h4,
        h5,
        h6{

            font-family:var(--font-display);

            color:var(--ivory);

        }


        a{
            color:inherit;
        }


        /* =========================
           NAVBAR
        ========================= */

        .navbar{

            background:rgba(10,12,16,.92);

            backdrop-filter:blur(10px);

            border-bottom:1px solid var(--hairline);

            padding:16px 0;

        }


        .brand-mark{

            display:flex;

            align-items:center;

            gap:12px;

            text-decoration:none;

        }


        .brand-monogram{

            width:40px;

            height:40px;

            border:1px solid var(--ice);

            display:flex;

            align-items:center;

            justify-content:center;

            font-family:var(--font-display);

            font-size:15px;

            font-weight:700;

            color:var(--ice);

            letter-spacing:1px;

            transition:.3s;

        }


        .brand-mark:hover .brand-monogram{

            background:var(--ice);

            color:#0A0C10;

        }


        .brand-word{

            font-family:var(--font-display);

            font-size:21px;

            font-weight:700;

            color:var(--ivory);

        }


        /* =========================
           HOME BUTTON
        ========================= */

        .btn-home{

            background:transparent;

            border:1px solid var(--hairline);

            color:var(--ivory);

            padding:9px 20px;

            font-size:14px;

            border-radius:4px;

            transition:.25s;

        }


        .btn-home:hover{

            border-color:var(--ice);

            color:var(--ice);

            transform:translateY(-2px);

        }


        /* =========================
           SIGNUP AREA
        ========================= */

        .signup-wrapper{

            min-height:calc(100vh - 73px);

            display:flex;

            align-items:center;

            padding:70px 0;

            position:relative;

            overflow:hidden;

            background:var(--bg);

        }


        /* Background grid */

        .signup-wrapper::before{

            content:"";

            position:absolute;

            inset:0;

            background:

                radial-gradient(
                    ellipse at 85% 20%,
                    var(--ice-glow) 0%,
                    transparent 45%
                ),

                repeating-linear-gradient(
                    0deg,
                    var(--hairline) 0 1px,
                    transparent 1px 64px
                ),

                repeating-linear-gradient(
                    90deg,
                    var(--hairline) 0 1px,
                    transparent 1px 64px
                );

            opacity:.5;

            pointer-events:none;

        }


        .signup-wrapper .container{

            position:relative;

            z-index:1;

        }


        /* =========================
           EYEBROW
        ========================= */

        .eyebrow{

            display:flex;

            justify-content:center;

            align-items:center;

            gap:9px;

            font-family:var(--font-mono);

            font-size:12px;

            letter-spacing:2.5px;

            text-transform:uppercase;

            color:var(--ice);

            font-weight:500;

            animation:fadeDown .7s ease-out both;

        }


        .eyebrow .dot{

            width:6px;

            height:6px;

            border-radius:50%;

            background:var(--ice);

            box-shadow:0 0 8px var(--ice);

            animation:pulse 2s ease-in-out infinite;

        }


        @keyframes pulse{

            0%,
            100%{
                opacity:1;
            }

            50%{
                opacity:.35;
            }

        }


        /* =========================
           TITLE
        ========================= */

        .signup-title{

            text-align:center;

            font-size:clamp(2.2rem,4vw,3rem);

            margin-top:12px;

            animation:fadeUp .8s ease-out .1s both;

        }


        .signup-title span{

            color:var(--ice);

            text-shadow:0 0 24px var(--ice-glow);

        }


        .signup-subtitle{

            text-align:center;

            color:var(--muted);

            font-size:15px;

            margin-top:10px;

            margin-bottom:30px;

            animation:fadeUp .8s ease-out .2s both;

        }


        /* =========================
           SIGNUP CARD
        ========================= */

        .signup-card{

            max-width:500px;

            margin:auto;

            background:var(--surface);

            border:1px solid var(--hairline);

            border-radius:4px;

            padding:44px;

            box-shadow:0 20px 50px rgba(0,0,0,.35);

            animation:cardAppear .8s cubic-bezier(.19,1,.22,1) .3s both;

        }


        .signup-icon{

            width:64px;

            height:64px;

            margin:0 auto 22px;

            border:1px solid var(--ice-dim);

            border-radius:50%;

            display:flex;

            align-items:center;

            justify-content:center;

            color:var(--ice);

            font-size:27px;

            box-shadow:0 0 25px var(--ice-glow);

            animation:floatIcon 3s ease-in-out 1s infinite;

        }


        @keyframes floatIcon{

            0%,
            100%{
                transform:translateY(0);
            }

            50%{
                transform:translateY(-5px);
            }

        }


        /* =========================
           FORM
        ========================= */

        .form-label{

            font-family:var(--font-mono);

            font-size:11px;

            letter-spacing:1.5px;

            text-transform:uppercase;

            color:var(--muted);

            font-weight:500;

            margin-bottom:8px;

        }


        .form-control{

            background:var(--surface-2);

            border:1px solid var(--hairline);

            color:var(--ivory);

            border-radius:4px;

            padding:12px 14px;

            transition:.25s;

        }


        .form-control::placeholder{

            color:var(--muted);

        }


        .form-control:focus{

            background:var(--surface-2);

            color:var(--ivory);

            border-color:var(--ice);

            box-shadow:0 0 0 3px var(--ice-glow);

            transform:translateY(-2px);

        }


        /* =========================
           SIGNUP BUTTON
        ========================= */

        .btn-signup{

            width:100%;

            background:var(--ice);

            border:1px solid var(--ice);

            color:#0A0C10;

            font-weight:600;

            font-size:14px;

            letter-spacing:.5px;

            padding:13px;

            border-radius:4px;

            transition:.25s;

        }


        .btn-signup:hover{

            background:var(--ice-light);

            border-color:var(--ice-light);

            color:#0A0C10;

            transform:translateY(-3px);

            box-shadow:0 12px 25px rgba(0,0,0,.35);

        }


        .btn-signup:active{

            transform:translateY(0);

        }


        /* =========================
           LOGIN LINK
        ========================= */

        .login-line{

            text-align:center;

            margin-top:25px;

            margin-bottom:0;

            color:var(--muted);

            font-size:14px;

        }


        .login-line a{

            color:var(--ice);

            text-decoration:none;

            font-weight:600;

            border-bottom:1px solid transparent;

            transition:.2s;

        }


        .login-line a:hover{

            color:var(--ice-light);

            border-bottom-color:var(--ice);

        }


        /* =========================
           ANIMATIONS
        ========================= */

        @keyframes fadeDown{

            from{

                opacity:0;

                transform:translateY(-15px);

            }

            to{

                opacity:1;

                transform:translateY(0);

            }

        }


        @keyframes fadeUp{

            from{

                opacity:0;

                transform:translateY(22px);

            }

            to{

                opacity:1;

                transform:translateY(0);

            }

        }


        @keyframes cardAppear{

            from{

                opacity:0;

                transform:translateY(35px) scale(.98);

            }

            to{

                opacity:1;

                transform:translateY(0) scale(1);

            }

        }


        /* =========================
           MOBILE
        ========================= */

        @media(max-width:576px){

            .navbar{

                padding:13px 0;

            }


            .brand-word{

                font-size:19px;

            }


            .signup-wrapper{

                padding:50px 0;

            }


            .signup-card{

                padding:32px 22px;

            }


            .signup-title{

                font-size:2.2rem;

            }

        }


        /* =========================
           REDUCED MOTION
        ========================= */

        @media(prefers-reduced-motion:reduce){

            *{

                animation:none !important;

                transition:none !important;

            }

        }

    </style>

</head>


<body>


<!-- =========================
     NAVBAR
========================= -->

<nav class="navbar">

    <div class="container d-flex justify-content-between align-items-center">

        <a class="brand-mark" href="/">

            <span class="brand-monogram">
                TH
            </span>

            <span class="brand-word">
                TechHub
            </span>

        </a>


        <a href="/" class="btn btn-home">

            <i class="bi bi-arrow-left me-2"></i>

            Home

        </a>

    </div>

</nav>


<!-- =========================
     SIGN UP
========================= -->

<section class="signup-wrapper">

    <div class="container">

        <div class="eyebrow">

            <span class="dot"></span>

            Member Registration

        </div>


        <h1 class="signup-title">

            Create Your <span>Account</span>

        </h1>


        <p class="signup-subtitle">

            Join TechHub and explore modern technology.

        </p>


        <div class="signup-card">


            <!-- Icon -->

            <div class="signup-icon">

                <i class="bi bi-person-plus"></i>

            </div>


            <h2 class="text-center">

                Create Account

            </h2>


            <p class="text-center mb-4"
               style="color:var(--muted);">

                Start your TechHub journey today.

            </p>


            <!-- Form -->

            <form action="/signup" method="POST">

                @csrf


                <!-- Name -->

                <div class="mb-3">

                    <label class="form-label">

                        Name

                    </label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        placeholder="Enter your name"
                        required
                    >

                </div>


                <!-- Email -->

                <div class="mb-3">

                    <label class="form-label">

                        Email

                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        placeholder="Enter your email"
                        required
                    >

                </div>


                <!-- Password -->

                <div class="mb-3">

                    <label class="form-label">

                        Password

                    </label>

                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="Create a password"
                        required
                    >

                </div>


                <!-- Confirm Password -->

                <div class="mb-4">

                    <label class="form-label">

                        Confirm Password

                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        class="form-control"
                        placeholder="Confirm your password"
                        required
                    >

                </div>


                <!-- Button -->

                <button
                    type="submit"
                    class="btn btn-signup"
                >

                    <i class="bi bi-person-plus me-2"></i>

                    Create Account

                </button>


            </form>


            <!-- Login -->

            <p class="login-line">

                Already have an account?

                <a href="/login">

                    Login

                </a>

            </p>


        </div>

    </div>

</section>


<!-- Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>