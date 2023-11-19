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
      $set_query = "UPDATE cart
      SET buy_qty = $quantity
      WHERE c_id=$c_id and p_id=$p_id;";
      $result_select = mysqli_query($conn,$set_query);
      echo "<script>location.href='./cart.php';</script>";
  }

  if(isset($_GET['delete_item_cid']) && isset($_GET['delete_item_pid'])){
    global $conn;
    $c_id = $_GET['delete_item_cid'];
    $p_id = $_GET['delete_item_pid'];
    $delete_query = "DELETE FROM cart WHERE c_id=$c_id and p_id=$p_id;";
    mysqli_query($conn,$delete_query);
    echo "<script>location.href='./cart.php';</script>";
  }

  ?>

<html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="product1.css" />
    
<style>
    .remove-button {
        text-decoration: none;
        color: rgb(168, 28, 15);
        cursor: pointer;
    }

    .remove-button:hover {
        color: #c71515;
    }

    body {
        background-color: rgb(104, 15, 15);
        margin: 0;
        padding: 0;
    }

    .form1 {
        background-repeat: no-repeat;
        height: 100vh;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    form {
        max-width: 600px;
        width: 100%;
        padding: 20px;
        margin: 20px;
    }

    h3 {
        color: white;
        text-align: center;
    }

    .input-group {
        margin-bottom: 20px;
    }

    .input-group-text {
        background-color: #8B4513;
        color: white;
    }

    .form-control {
        border-color: #8B4513;
    }

    .btn-success {
        background-color: #8B4513;
        border-color: #8B4513;
    }

    .btn-success:hover {
        background-color: #A52A2A;
        border-color: #A52A2A;
    }

    .form1 img {
        max-width: 200%;
        height: auto;
        margin-top: 20px;
    }
</style>

  </head>
  <body style="background-color: grey; margin:0px">
    <div class="nav-bar" style="background-color: black;">
      <a href="index.php">
        <span class="navItem">
          <img src="./img/bot1.png" alt="" style="transform: translate(10%, 10%);"/>
        </span>
      </a>

      <div class="hamburger-menu">
                <input id="menu__toggle" type="checkbox" />
                <label class="menu_btn" for="menu_toggle">
                  <span></span>
                </label>
                <ul class="menu__box">
                  <li><a class="menu__item" href="index.php">Home</a></li>
                  <li><a class="menu__item" href="login.php" style="color: rgb(0, 164, 0);">
                  <?php
                   if(!isset($_SESSION))
                   session_start(); 
                   if(isset($_SESSION["username"])){echo $_SESSION["name"];}else{echo"Login";} ?></a></li>
                  <li><a class="menu__item" href="Registration.php">Register</a></li>
                  <li><a class="menu__item" href="product_airforce.php">shoes</a></li>
                  <li><a class="menu__item" href="clothing.html">clothing</a></li>
                  <li><a class="menu__item" href="support.html">support</a></li>
                  <li><a class="menu__item" href="login.php?logout" name="logout" style="color: red;">Log Out</a></li>
              </div>
    </div>

    <div class="small-container cart-page">
      <table>
        <tr>
          <th>Product</th>
          <th>Quantity</th>
          <th>Subtotal</th>
        </tr>
        <!-- <tr>
          <td>
            <div class="cart-info">
              <img src="https://i.postimg.cc/YSpFQ4WP/cab9b853-9d87-4ef3-9db3-2f054c1a654d.webp" alt="">
              <div>
                <p>Shoes</p>
                <small>Price :15,000</small>
                <br>
                <a href="">Remove</a>
              </div>
            </div>
          </td>
          <td><input type="number" value="1" /></td>
          <td>50</td>
        </tr> -->
        <?php
                    getCartProducts();
                  ?>
                 

        <!-- <tr>
          <td>
            <div class="cart-info">
              <img src="https://i.postimg.cc/YSpFQ4WP/cab9b853-9d87-4ef3-9db3-2f054c1a654d.webp" alt="">
              <div>
                <p>Shoes</p>
                <small>Price :15,000</small>
                <br>
                <a href="">Remove</a>
              </div>
            </div>
          </td>
          <td><input type="number" value="1" /></td>
          <td>50</td>
        </tr> -->
      </table>
    </div>
    <div class="col-lg-4 bg-grey">
                <div class="p-5 ">
                  <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                  <hr class="my-4">

                  <?php
                      cartSummary();
                  ?>

                </div>
              </div>

    <footer style="background-color: black; width: 100%;">
      <div class="footerLeft">
        <div class="footerMenu">
          <h1 class="fMenuTitle" style="color: aliceblue">About Us</h1>
          <ul class="fList">
            <li class="fListItem">Company</li>
            <li class="fListItem">Contact</li>
            <li class="fListItem">Careers</li>
            <li class="fListItem">Affiliates</li>
            <li class="fListItem">Stores</li>
          </ul>
        </div>
        <div class="footerMenu">
          <h1 class="fMenuTitle" style="color: aliceblue">Useful Links</h1>
          <ul class="fList">
            <li class="fListItem">Support</li>
            <li class="fListItem">Refund</li>
            <li class="fListItem">FAQ</li>
            <li class="fListItem">Feedback</li>
            <li class="fListItem">Stories</li>
          </ul>
        </div>
        <div class="footerMenu">
          <h1 class="fMenuTitle" style="color: aliceblue">Products</h1>
          <ul class="fList">
            <li class="fListItem">Air Force</li>
            <li class="fListItem">Air Jordan</li>
            <li class="fListItem">Blazer</li>
            <li class="fListItem">Crater</li>
            <li class="fListItem">Hippie</li>
          </ul>
        </div>
      </div>
    </footer>
  </body>
</html>