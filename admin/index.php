<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/style.css">
    <style>
    /* footer {
        position: absolute;
        bottom: 0;
        right: 0;
        left: 0;
    } */
    </style>
</head>

<body class="bg-dark-subtle">
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-dark ">
            <div class="container-fluid">
                <img src="./bot1.png" alt="Logo" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome Guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <div class="container-fluid bg-success d-flex justify-content-center ">
            <h2 class="text-light">Manage Smartphones</h2>
        </div>

        <div class="row pb-2 bg-success-subtle ">
            <div class="col-md-12 bg-success-subtle d-flex flex-column align-items-center gap-4 pt-4">
                <a href="">
                    <img src="../assets/images/samsung_galaxy_ultra.jpg" alt="Admin Image" width="250px" height="250px">
                </a>
                <h5 class="text-center">Langer Pereira</h5>
                <div class="button text-center d-flex gap-2">
                    <button><a href="./index.php?add_product" class="nav-link text-light bg-success p-2">Add Shoe</a></button>
                    <button><a href="" class="nav-link text-light bg-success p-2">View Shoes</a></button>
                    <button><a href="./index.php?add_supplier" class="nav-link text-light bg-success p-2">Add
                            Seller</a></button>
                    <button><a href="" class="nav-link text-light bg-success p-2">View Sellers</a></button>
                    <button><a href="./index.php?add_brand" class="nav-link text-light bg-success p-2">Add Brand</a></button>
                    <button><a href="" class="nav-link text-light bg-success p-2">View Brands</a></button>
                    <button><a href="" class="nav-link text-light bg-success p-2">All Orders</a></button>
                    <button><a href="" class="nav-link text-light bg-success p-2">All Payments</a></button>
                    <button><a href="" class="nav-link text-light bg-success p-2">List Users</a></button>
                    <button class="bg-danger"><a href="" class="nav-link text-light bg-danger p-2">Logout</a></button>
                </div>
            </div>
        </div>
        
        <div class="container rounded bg-body-tertiary pt-3 pb-3 mb-3 mt-3">
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
