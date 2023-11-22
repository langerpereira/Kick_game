<?php
    include('./restricted.php');
    include('./includes/connect.php');
    include('./common_functions/common_functions.php');
    if(isset($_GET['logout'])){
        session_start();
        session_unset();
        session_destroy();
        echo "<script>alert('Logout Sucessfull')</script>";
        echo "<script>location.href='./index.php';</script>";
    }

    if(isset($_GET['pro_id'])){
      session_start();
      $quantity = $_POST['quantity'];
      $c_id = $_SESSION['cid'];
      $p_id = $_GET['pro_id'];
      $set_query = "UPDATE `cart`
      SET buy_qty = $quantity
      WHERE c_id=$c_id and p_id=$p_id;";
      $result_select = mysqli_query($conn,$set_query);
      echo "<script>location.href='./cart.php';</script>";
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Airforce</title>
    <link rel="stylesheet" href="product1.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Old+Standard+TT&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">
    <!-- <link rel="stylesheet" href="style.css"/> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
    body {
        background-image: url('https://i.postimg.cc/MKq2brY5/shoes-02.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
    }

    .container-card {
        background-color: rgba(255, 255, 255, 0.9);
        border: 3px solid #ffffff;
        border-radius: 10px;
        margin-top: 20px;
        margin-right: 12%;
        margin-left: 12%;
        padding: 20px;
    }

    .row-item {
        margin-bottom: 20px;
    }

    .img-fluid {
        max-width: 100%;
        height: auto;
    }

    .btn-dark {
        background-color: #343a40;
        color: #fff;
    }

    .btn-dark:hover {
        background-color: #23272b;
    }
    </style>
</head>

<body>
    <div class="nav-bar">
        <a href="index.php">
            <span class="navItem">
                <img src="./img/bot1.png" alt="">
            </span>
        </a>

        <div class="hamburger-menu">
            <input id="menu__toggle" type="checkbox" />
            <label class="menu__btn" for="menu__toggle">
                <span></span>
            </label>
            <ul class="menu__box">
                <li><a class="menu__item" href="index.php">Home</a></li>
                <li><a class="menu__item" href="login.php"
                        style="color: rgb(0, 164, 0);"><?php session_start(); if(isset($_SESSION["username"])){echo'Welcome '. $_SESSION["name"];}else{echo"Login";} ?></a>
                </li>
                <li><a class="menu__item" href="Registration.php">Register</a></li>
                <li><a class="menu__item" href="product_airforce.php">Shoes</a></li>
                <li><a class="menu__item" href="clothing.html">Clothing</a></li>
                <li><a class="menu__item" href="./support.html">Support</a></li>
                <a class="nav-link" href="">
                    <?php if(isset($_SESSION["username"])){echo"<a href='index.php?logout'><li><a class='menu__item' href='product_airforce.php?logout' name='logout' style='color: red;' >Log Out</a></li></a>";}else{echo" Welcome Guest";} ?></a>
                </li>
            </ul>
        </div>

        <div class="navItem">
            <form class="search" action="search_product.php" method="get">
                <input type="text" placeholder="Search..." class="searchInput" name="keyword">
                <button name="search_product" type="submit" style="background-color: grey; font-size: 2px;">
                    <img src="./img/search.png" width="20" height="20" alt="" class="searchIcon">
                </button>
            </form>
        </div>
        <div class="navItem">

            <a class="icon" href="cart.php">
                <i class="fa fa-shopping-cart cart1"
                    style="font-size:48px;color:goldenrod; position: fixed; z-index: 1030; right: 50px; top: -10px;">
                    <span
                        style="font-size: 14px; position: absolute; top: 34px; left: 28px; background-color: red; color: white; border-radius: 50%; padding: 2px 5px;"><?php echo getCartItemCount(); ?></span>
                </i>
            </a>



        </div>
    </div>
    </div>

    <section class="h-100 h-custom " style="background-color: #ffffff;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="p-5">
                                    <div class="d-flex justify-content-between align-items-center mb-5">
                                        <h1 class="fw-bold mb-0 text-black">
                                            My Orders
                                        </h1>
                                    </div>

                                    <div class="row mb-4 d-flex justify-content-between align-items-center">
                                        <div class="col-2">
                                            <h6>Order ID</h6>
                                        </div>
                                        <div class="col-3">
                                            <h6>Order Date</h6>
                                        </div>
                                        <div class="col-2">
                                            <h6>Order Price</h6>
                                        </div>
                                        <div class="col-3">
                                            <h6>Transaction ID</h6>
                                        </div>
                                        <div class="col-2">
                                            <h6>View Details</h6>
                                        </div>

                                        <hr class="my-4">

                                        <?php
                    getOrderProducts();
                  ?>

                                        <div class="pt-5">
                                            <h6 class="mb-0"><a href="index.php" class="text-body"><i
                                                        class="fas fa-long-arrow-alt-left me-2"></i>Go Back</a></h6>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>