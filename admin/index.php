<!DOCTYPE html>
<html lang="en">
  <!--  
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Page</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Old+Standard+TT&family=Roboto:wght@400;500;700&display=swap"
      rel="stylesheet"/>

    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
--><head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
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
                <img src="#" alt="Logo" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome Guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <div class="container-fluid bg-dark d-flex justify-content-center ">
            <h2 class="text-light">Manage Shoes</h2>
        </div>
    <!-- <?php 
    // include("header.php");
    ?> -->
    <!-- 
    <div class="container">
      <section>
        <form
          action=""
          method="post"
          class="add-product-form"
          style="color: rgb(81, 81, 81)"
        >
          <h3>add a new product</h3>
          <input
            type="text"
            name="p_name"
            placeholder="enter the product name"
            class="box"
            required
          />
          <input
            type="number"
            name="p_price"
            min="0"
            placeholder="enter the product price"
            class="box"
            required
          />
          <input
            type="text"
            name="p_desc"
            placeholder="enter the product desc"
            class="box"
            required
          />
          <input
            type="file"
            name="p_image"
            accept="image/png, image/jpg, image/jpeg"
            class="box"
            required
          />
          <input
            type="submit"
            value="add the product"
            name="add_product"
            class="btn"
          />  -->
          <div class="row pb-2 bg-dark-subtle ">
            <div class="col-md-12 bg-dark-subtle d-flex flex-column align-items-center gap-4 pt-4">
                <a href="">
                    <img src="../assets/images/samsung_galaxy_ultra.jpg" alt="Admin Image" width="250px" height="250px">
                </a>
Q                <h5 class="text-center">KICK_GAME</h5>
                <div class="button text-center d-flex gap-2">
                    <button><a href="./index.php?add_product" class="nav-link text-light bg-dark p-2">Add Shoe</a></button>
                    <button><a href="" class="nav-link text-light bg-dark p-2">View Shoes</a></button>
                    <button><a href="./index.php?add_supplier" class="nav-link text-light bg-dark p-2">Add Supplier</a></button>
                    <button><a href="" class="nav-link text-light bg-dark p-2">View Suppliers</a></button>
                    <button><a href="./index.php?add_brand" class="nav-link text-light bg-dark p-2">Add Brand</a></button>
                    <button><a href="" class="nav-link text-light bg-dark p-2">View Brands</a></button>
                    <button><a href="" class="nav-link text-light bg-dark p-2">All Orders</a></button>
                    <button><a href="" class="nav-link text-light bg-dark p-2">All Payments</a></button>
                    <button><a href="" class="nav-link text-light bg-dark p-2">List Users</a></button>
                    <button class="bg-danger"><a href="" class="nav-link text-light bg-danger p-2">Logout</a></button>
                </div>
            </div>
        </div>
        </form>  
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
        
      </section>
    </div>
    <script src="script.js"></script>
  </body>
</html>
