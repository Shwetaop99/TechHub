<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Product - TechHub</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <style>

        body {
            background: #f5f7fb;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background: #111827;
        }

        .navbar-brand {
            font-size: 28px;
            font-weight: bold;
        }

        .form-card {
            max-width: 700px;
            margin: 50px auto;
            border: none;
            border-radius: 18px;
        }

        .form-control,
        .form-select {
            padding: 12px;
            border-radius: 10px;
        }

        .btn-info {
            border-radius: 30px;
            padding: 12px 30px;
            font-weight: bold;
        }

    </style>

</head>

<body>


<!-- NAVBAR -->

<nav class="navbar navbar-dark">

    <div class="container">

        <a class="navbar-brand" href="/admin">
            TechHub Admin
        </a>

        <a href="/admin" class="btn btn-outline-light">
            ← Dashboard
        </a>

    </div>

</nav>


<!-- FORM -->

<div class="container">

    <div class="card form-card shadow-sm p-4">

        <h2 class="fw-bold mb-2">
            Add New Product
        </h2>

        <p class="text-muted mb-4">
            Add a new product to your TechHub store.
        </p>


        <form
    action="/admin/products"
    method="POST"
    enctype="multipart/form-data"
>

            @csrf


            <!-- PRODUCT NAME -->

            <div class="mb-3">

                <label class="form-label fw-bold">
                    Product Name
                </label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    placeholder="Example: ASUS ROG Strix G16"
                    required
                >

            </div>


            <!-- CATEGORY -->

            <div class="mb-3">

                <label class="form-label fw-bold">
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

                    <option>Laptops</option>
                    <option>Phones</option>
                    <option>Headphones</option>
                    <option>Earbuds</option>
                    <option>Smart Watches</option>
                    <option>Monitors</option>
                    <option>Keyboards</option>
                    <option>Mouse</option>
                    <option>Gaming</option>
                    <option>Cameras</option>

                </select>

            </div>


            <!-- PRICE -->

            <div class="mb-3">

                <label class="form-label fw-bold">
                    Price
                </label>

                <input
                    type="number"
                    name="price"
                    class="form-control"
                    placeholder="149999"
                    required
                >

            </div>


            <!-- STOCK -->

            <div class="mb-3">

                <label class="form-label fw-bold">
                    Stock
                </label>

                <input
                    type="number"
                    name="stock"
                    class="form-control"
                    placeholder="20"
                    required
                >

            </div>


            <!-- DESCRIPTION -->

            <div class="mb-4">

                <label class="form-label fw-bold">
                    Description
                </label>

                <textarea
                    name="description"
                    class="form-control"
                    rows="4"
                    placeholder="Write a short product description..."
                    required
                ></textarea>

            </div>

            <div class="mb-4">

    <label class="form-label fw-bold">
        Product Image
    </label>

    <input
        type="file"
        name="image"
        class="form-control"
        accept="image/*"
        required
    >

    <small class="text-muted">
        Upload a product image.
    </small>

</div>


            <button
                type="submit"
                class="btn btn-info w-100"
            >
                Add Product
            </button>

        </form>

    </div>

</div>

</body>

</html>