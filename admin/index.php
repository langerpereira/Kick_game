<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Old Standard TT', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container-fluid {
            padding-right: 0;
            padding-left: 0;
        }

        .navbar {
            background-color: #333;
            padding: 10px;
        }

        .logo {
            max-width: 100%;
            height: auto;
        }

        .hamburger-menu {
            display: none;
        }

        .navbar-nav .nav-link {
            color: #fff;
            font-weight: bold;
            font-size: 18px;
            transition: color 0.3s ease-in-out;
        }

        .navbar-nav .nav-link:hover {
            color: #ffc107;
        }

        .navbar-toggler-icon {
            background-color: #fff;
        }

        .navbar-toggler {
            border: none;
        }

        .container-fluid.bg-secondary {
            padding: 20px 0;
            text-align: center;
        }

        .container-fluid.bg-secondary h2 {
            margin: 0;
            color: #fff;
            font-size: 32px;
            font-weight: bold;
        }

        .button {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 20px;
        }

        .button button {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 15px 30px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease-in-out;
        }

        .button button:hover {
            background-color: #45a049;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-dark-subtle">
    <div class="container-fluid p-0 bg-dark text-white" >
        <nav class="navbar navbar-expand-lg navbar-light bg-dark ">
            <div class="container-fluid">
                <img src="./bot1.png" alt="Logo" class="logo">

                <div class="hamburger-menu">
                    <input id="menu__toggle" type="checkbox" />
                    <label class="menu__btn" for="menu__toggle">
                      <span></span>
                    </label>
                    <ul class="menu__box">
                      <li><a class="menu__item" href="index.html">Home</a></li>
                      <li><a class="menu__item" href="login.php">Login</a></li>
                      <li><a class="menu__item" href="Registration.php">Register</a></li>
                      <li><a class="menu__item" href="product_airforce.php">shoes</a></li>
                      <li><a class="menu__item" href="clothing.html">clothing</a></li>
                      <li><a class="menu__item" href="#">support</a></li>
                    </ul>
                  </div>

                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link text-white">Welcome Guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <div class="container-fluid bg-secondary text-white d-flex justify-content-center ">
            <h2 class="text-light">Manage Kick_Game </h2>
        </div>

        <div class="row pb-2 bg-secondary text-white ">
            <div class="col-md-12 p-3 mb-2 bg-dark text-white d-flex flex-column align-items-center gap-4 pt-4">
                <h5 class="text-center">Langer Pereira</h5>
                <div class="button text-center d-flex gap-4">
                    <button class="bg-secondary text-white"><a href="./index.php?add_product" class="nav-link text-light bg-secondary text-white p-2 rounded border border-light">Add Shoe</a></button>
                    <button class="bg-secondary text-white"><a href="view_product.php" class="nav-link text-light bg-secondary text-white p-2 rounded border border-light">View Shoes</a></button>
                    <button class="bg-secondary text-white"><a href="./index.php?add_supplier" class="nav-link text-light bg-secondary text-white p-2 rounded border border-light">Add
                            Seller</a></button>
                    <button class="bg-secondary text-white"><a href="view_seller.php" class="nav-link text-light bg-secondary text-white p-2 rounded border border-light">View Sellers</a></button>
                    <button class="bg-secondary text-white"><a href="./index.php?add_brand" class="nav-link text-light bg-secondary text-white p-2 rounded border border-light">Add Brand</a></button>
                    <button class="bg-secondary text-white"><a href="view_brand.php" class="nav-link text-light bg-secondary text-white p-2 rounded border border-light">View Brands</a></button>
                    <button class="bg-secondary text-white"><a href="" class="nav-link text-light bg-secondary text-white p-2 rounded border border-light">All Orders</a></button>
                    <button class="bg-secondary text-white"><a href="" class="nav-link text-light bg-secondary text-white p-2 rounded border border-light">All Payments</a></button>
                    <button class="bg-secondary text-white"><a href="" class="nav-link text-light bg-secondary text-white p-2 rounded border border-light">List Users</a></button>
                    <button class="bg-danger"><a href="" class="nav-link text-light bg-danger p-2 rounded border border-danger">Logout</a></button>
                </div>
            </div>
        </div>
        
        <div class="container rounded p-3 mb-2 bg-dark text-white pt-3 pb-3 mb-3 mt-3">
        <?php
                if(isset($_GET['add_product'])){
                  include('add_product.php');
                }
                if(isset($_GET['add_supplier'])){
                    include('add_supplier.php');
                }
                if(isset($_GET['add_brand'])){
                    include('add_brand.php');
                }
                
        ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
</html>