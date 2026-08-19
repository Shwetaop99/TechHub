<!DOCTYPE html>
<html lang="en">

<head>
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    rel="stylesheet"
>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Add Product - TechHub</title>


    <link
        rel="icon"
        type="image/png"
        href="{{ asset('css/techhub_TH_favicon.png') }}"
    >


    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >


    <style>

        .image-upload-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 12px;
    margin-top: 15px;
}

.image-upload-box {
    height: 145px;
    position: relative;
}

.image-upload-box input {
    display: none;
}

.image-upload-box label {
    width: 100%;
    height: 100%;
    display: block;
    cursor: pointer;
    border: 2px dashed #dbe2ea;
    border-radius: 12px;
    overflow: hidden;
    background: #f8fafc;
}

.image-upload-box label:hover {
    border-color: #2563eb;
    background: #f1f5ff;
}

.upload-content {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 6px;
    color: #64748b;
}

.upload-content i {
    font-size: 28px;
    color: #2563eb;
}

.upload-content strong {
    color: #374151;
}

.upload-content small {
    font-size: 12px;
}

.image-preview {
    display: none;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

        * {
            box-sizing: border-box;
        }


        body {

            margin: 0;

            background: #f5f7fb;

            font-family:
                Arial,
                sans-serif;

            color: #111827;
        }


        /* =====================================================
           NAVBAR
        ===================================================== */

        .navbar {

            background: #111827;

            padding: 17px 0;
        }


        .navbar-brand {

            font-size: 26px;

            font-weight: 800;

            color: white;

            text-decoration: none;
        }


        .navbar-brand span {

            color: #2563eb;
        }


        .admin-badge {

            display: inline-block;

            margin-left: 8px;

            padding: 5px 9px;

            border-radius: 20px;

            background: #2563eb;

            color: white;

            font-size: 11px;

            font-weight: 700;

            vertical-align: middle;
        }


        .dashboard-btn {

            border: 1px solid
                rgba(255,255,255,.3);

            color: white;

            background: transparent;

            border-radius: 9px;

            padding: 8px 15px;

            text-decoration: none;

            font-weight: 600;

            transition: .2s;
        }


        .dashboard-btn:hover {

            background: white;

            color: #111827;
        }


        /* =====================================================
           FORM CARD
        ===================================================== */

        .form-card {

            max-width: 720px;

            margin: 50px auto;

            background: white;

            border: 1px solid #e5e7eb;

            border-radius: 20px;

            padding: 35px;

            box-shadow:
                0 10px 30px
                rgba(15,23,42,.06);
        }


        .page-title {

            font-size: 28px;

            font-weight: 800;

            margin-bottom: 5px;
        }


        .page-subtitle {

            color: #6b7280;

            margin-bottom: 30px;
        }


        /* =====================================================
           FORM
        ===================================================== */

        .form-label {

            font-weight: 700;

            color: #374151;
        }


        .form-control,
        .form-select {

            padding: 12px 14px;

            border-radius: 10px;

            border: 1px solid #dbe2ea;
        }


        .form-control:focus,
        .form-select:focus {

            border-color: #2563eb;

            box-shadow:
                0 0 0 3px
                rgba(37,99,235,.12);
        }


        textarea.form-control {

            resize: vertical;
        }


        /* =====================================================
           IMAGE UPLOAD
        ===================================================== */

        .image-help {

            display: block;

            margin-top: 7px;

            color: #6b7280;

            font-size: 12px;
        }


        /* =====================================================
           SUCCESS / ERROR
        ===================================================== */

        .alert {

            border-radius: 10px;

            margin-bottom: 25px;
        }


        /* =====================================================
           SUBMIT BUTTON
        ===================================================== */

        .add-product-btn {

            width: 100%;

            border: none;

            border-radius: 10px;

            padding: 13px;

            background: #2563eb;

            color: white;

            font-weight: 700;

            font-size: 15px;

            transition: .2s;
        }


        .add-product-btn:hover {

            background: #1d4ed8;

            transform:
                translateY(-1px);
        }


        /* =====================================================
           MOBILE
        ===================================================== */

        @media(max-width: 600px) {

            .form-card {

                margin: 30px 15px;

                padding: 25px 20px;
            }


            .page-title {

                font-size: 24px;
            }


            .navbar-brand {

                font-size: 21px;
            }


            .admin-badge {

                display: none;
            }

        }

    </style>

</head>


<body>


<!-- =========================================================
     NAVBAR
========================================================= -->

<nav class="navbar">

    <a
        href="{{ url('/admin-user') }}"
        class="brand"
    >
        Tech<span>Hub</span>
    </a>

    <div>

        <span class="admin-label">
            Admin Panel
        </span>

        <form
            action="{{ url('/admin-user/logout') }}"
            method="POST"
            style="display:inline;"
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

</nav>



<!-- =========================================================
     FORM
========================================================= -->

<div class="container">

    <div class="form-card">


        <h1 class="page-title">
            Add New Product
        </h1>


        <p class="page-subtitle">
            Add a new product to your TechHub store.
        </p>


        <!-- =================================================
             SUCCESS MESSAGE
        ================================================== -->

        @if(session('success'))

            <div class="alert alert-success">

                {{ session('success') }}

            </div>

        @endif


        <!-- =================================================
             VALIDATION ERRORS
        ================================================== -->

        @if($errors->any())

            <div class="alert alert-danger">

                <strong>
                    Please fix the following:
                </strong>

                <ul class="mb-0 mt-2">

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <!-- =================================================
             PRODUCT FORM
        ================================================== -->

        <form
    action="{{ session('admin_logged_in')
        ? url('/admin/products')
        : url('/admin-user/products') }}"
    method="POST"
    enctype="multipart/form-data"
>

            @csrf


            <!-- PRODUCT NAME -->

            <div class="mb-3">

                <label class="form-label">
                    Product Name
                </label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    placeholder="Example: ASUS ROG Strix G16"
                    value="{{ old('name') }}"
                    required
                >

            </div>



            <!-- CATEGORY -->

            <div class="mb-3">

                <label class="form-label">
                    Category
                </label>

                <select
                    name="category"
                    class="form-select"
                    required
                >

                    <option value="">
                        Select Category
                    </option>

                    <option
                        value="Laptops"
                        {{ old('category') == 'Laptops' ? 'selected' : '' }}
                    >
                        Laptops
                    </option>

                    <option
                        value="Phones"
                        {{ old('category') == 'Phones' ? 'selected' : '' }}
                    >
                        Phones
                    </option>

                    <option
                        value="Headphones"
                        {{ old('category') == 'Headphones' ? 'selected' : '' }}
                    >
                        Headphones
                    </option>

                    <option
                        value="Earbuds"
                        {{ old('category') == 'Earbuds' ? 'selected' : '' }}
                    >
                        Earbuds
                    </option>

                    <option
                        value="Smart Watches"
                        {{ old('category') == 'Smart Watches' ? 'selected' : '' }}
                    >
                        Smart Watches
                    </option>

                    <option
                        value="Monitors"
                        {{ old('category') == 'Monitors' ? 'selected' : '' }}
                    >
                        Monitors
                    </option>

                    <option
                        value="Keyboards"
                        {{ old('category') == 'Keyboards' ? 'selected' : '' }}
                    >
                        Keyboards
                    </option>

                    <option
                        value="Mouse"
                        {{ old('category') == 'Mouse' ? 'selected' : '' }}
                    >
                        Mouse
                    </option>

                    <option
                        value="Gaming"
                        {{ old('category') == 'Gaming' ? 'selected' : '' }}
                    >
                        Gaming
                    </option>

                    <option
                        value="Cameras"
                        {{ old('category') == 'Cameras' ? 'selected' : '' }}
                    >
                        Cameras
                    </option>

                    <option
                        value="AI & Smart Devices"
                        {{ old('category') == 'AI & Smart Devices' ? 'selected' : '' }}
                    >
                        AI & Smart Devices
                    </option>

                </select>

            </div>



            <!-- PRICE -->

            <div class="mb-3">

                <label class="form-label">
                    Price
                </label>

                <input
                    type="number"
                    name="price"
                    class="form-control"
                    placeholder="149999"
                    min="0"
                    step="0.01"
                    value="{{ old('price') }}"
                    required
                >

            </div>



            <!-- STOCK -->

            <div class="mb-3">

                <label class="form-label">
                    Stock
                </label>

                <input
                    type="number"
                    name="stock"
                    class="form-control"
                    placeholder="20"
                    min="0"
                    value="{{ old('stock') }}"
                    required
                >

            </div>



            <!-- DESCRIPTION -->

            <div class="mb-4">

                <label class="form-label">
                    Description
                </label>

                <textarea
                    name="description"
                    class="form-control"
                    rows="4"
                    placeholder="Write a short product description..."
                    required
                >{{ old('description') }}</textarea>

            </div>

            <!-- PRODUCT IMAGES -->

<div class="mb-4">

    <label class="form-label">
        Product Images
    </label>

    <p class="text-muted mb-3">
        Add up to 5 images. The first image will be the main product image.
    </p>


    <div class="image-upload-grid">


        <!-- IMAGE 1 -->

        <div class="image-upload-box">

            <label for="image1">

                <div
                    class="upload-content"
                    id="content1"
                >

                    <i class="bi bi-image"></i>

                    <strong>
                        Image 1
                    </strong>

                    <small>
                        Choose image
                    </small>

                </div>


                <img
                    id="preview1"
                    class="image-preview"
                >

            </label>


            <input
                type="file"
                name="images[]"
                id="image1"
                accept="image/*"
                onchange="previewImage(this, 'preview1', 'content1')"
                required
            >

        </div>


        <!-- IMAGE 2 -->

        <div class="image-upload-box">

            <label for="image2">

                <div
                    class="upload-content"
                    id="content2"
                >

                    <i class="bi bi-image"></i>

                    <strong>
                        Image 2
                    </strong>

                    <small>
                        Choose image
                    </small>

                </div>


                <img
                    id="preview2"
                    class="image-preview"
                >

            </label>


            <input
                type="file"
                name="images[]"
                id="image2"
                accept="image/*"
                onchange="previewImage(this, 'preview2', 'content2')"
            >

        </div>


        <!-- IMAGE 3 -->

        <div class="image-upload-box">

            <label for="image3">

                <div
                    class="upload-content"
                    id="content3"
                >

                    <i class="bi bi-image"></i>

                    <strong>
                        Image 3
                    </strong>

                    <small>
                        Choose image
                    </small>

                </div>


                <img
                    id="preview3"
                    class="image-preview"
                >

            </label>


            <input
                type="file"
                name="images[]"
                id="image3"
                accept="image/*"
                onchange="previewImage(this, 'preview3', 'content3')"
            >

        </div>


        <!-- IMAGE 4 -->

        <div class="image-upload-box">

            <label for="image4">

                <div
                    class="upload-content"
                    id="content4"
                >

                    <i class="bi bi-image"></i>

                    <strong>
                        Image 4
                    </strong>

                    <small>
                        Choose image
                    </small>

                </div>


                <img
                    id="preview4"
                    class="image-preview"
                >

            </label>


            <input
                type="file"
                name="images[]"
                id="image4"
                accept="image/*"
                onchange="previewImage(this, 'preview4', 'content4')"
            >

        </div>


        <!-- IMAGE 5 -->

        <div class="image-upload-box">

            <label for="image5">

                <div
                    class="upload-content"
                    id="content5"
                >

                    <i class="bi bi-image"></i>

                    <strong>
                        Image 5
                    </strong>

                    <small>
                        Choose image
                    </small>

                </div>


                <img
                    id="preview5"
                    class="image-preview"
                >

            </label>


            <input
                type="file"
                name="images[]"
                id="image5"
                accept="image/*"
                onchange="previewImage(this, 'preview5', 'content5')"
            >

        </div>


    </div>


    <small class="image-help">
        Maximum 5 images. JPG, JPEG, PNG and WEBP supported.
    </small>

</div>



            <!-- SUBMIT -->

            <button
                type="submit"
                class="add-product-btn"
            >

                Add Product

            </button>


        </form>

    </div>

</div>

<script>

function previewImage(
    input,
    previewId,
    contentId
) {

    const preview =
        document.getElementById(previewId);

    const content =
        document.getElementById(contentId);


    if (
        input.files &&
        input.files[0]
    ) {

        const reader =
            new FileReader();


        reader.onload =
            function (event) {

                preview.src =
                    event.target.result;

                preview.style.display =
                    'block';

                content.style.display =
                    'none';

            };


        reader.readAsDataURL(
            input.files[0]
        );

    }

}

</script>
</body>

</html>