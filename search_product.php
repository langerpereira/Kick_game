<?php
    include("./includes/connect.php");
    include("./common_functions/common_functions.php");
    if(isset($_GET['logout'])){
        session_start();
        session_unset();
        session_destroy();
        echo "<script>alert('Logout Sucessfull')</script>";
        echo "<script>location.href='./login.php';</script>";
    }
    if(isset($_GET['add_to_cart'])){
       cartFunction();
        echo "<script>alert('Item added successfully.')</script>";
        echo "<script>location.href='./product_airforce.php';</script>";
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
    href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Old+Standard+TT&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="style.css"/> -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
                  <li><a class="menu__item" href="login.php" style="color: rgb(0, 164, 0);"><?php session_start(); if(isset($_SESSION["username"])){echo'Welcome '. $_SESSION["name"];}else{echo"Login";} ?></a></li>
                  <li><a class="menu__item" href="Registration.php">Register</a></li>
                  <li><a class="menu__item" href="product_airforce.php">Shoes</a></li>
                  <li><a class="menu__item" href="clothing.html">Clothing</a></li>
                  <li><a class="menu__item" href="./support.html">Support</a></li>
                  <a class="nav-link" href="">
                  <?php if(isset($_SESSION["username"])){echo"<a href='index.php?logout'><li><a class='menu__item' href='product_airforce.php?logout' name='logout' style='color: red;' >Log Out</a></li></a>";}else{echo" Welcome Guest";} ?></a></li>
                </ul>
              </div>

              <div class="navItem">
                <form class="search" action="search_product.php" method="get">
                    <input type="text" placeholder="Search..." class="searchInput" name="keyword">
                    <button name="search_product" type="submit" style="background-color: grey; font-size: 2px;">
                    <img src="./img/search.png" width="20" height="20" alt="" class="searchIcon" >
                    </button>
                </form>
            </div>
            <div class="navItem">      
                
            <a class="icon" href="cart.php">    
    <i class="fa fa-shopping-cart cart1" style="font-size:48px;color:goldenrod; position: fixed; z-index: 1030; right: 50px; top: -10px;">
        <span style="font-size: 14px; position: absolute; top: 34px; left: 28px; background-color: red; color: white; border-radius: 50%; padding: 2px 5px;"><?php echo getCartItemCount(); ?></span>
    </i>
</a>



            </div>
        </div>
</div>
    <section class="main-banner">
        <div class="banner">
            <img src="https://i.postimg.cc/d3JcG5ZM/NIKE-BANNERS-1920-X696.jpg">
        </div>
    </section>

    <section id="product1" class="section-p1">
      <h1 class="h1-main" style="margin-top: -50px;">
        Featured Product
      </h1>
      <p style="color: grey">Shoes</p>
      <div class="pro-container">
        <?php
             searchProducts();
        ?>
        
        
      </div>
    </section>

    <section class="img_main">
        <div class="img1">
            <img src="https://i.postimg.cc/FRkWB3cP/5a019d180969579-1-6513d8cbe7620.jpg">
        </div>
        <div class="img1">
            <h3 class="nsTitleSm">JUST DO IT</h3>
            <h1 class="nsTitle">Choose your own style</h1>
            <h1 class="nsTitle">Feel it </h1>
        </div>
        <div class="img1">
            <img src="https://i.postimg.cc/pV5ZX5QY/0323aa180969579-1-6513d8cbe663f.jpg">
        </div>
    </section>

        <footer>
          <div class="footerLeft">
              <div class="footerMenu">
                  <h1 class="fMenuTitle" style="color: aliceblue;">About Us</h1>
                  <ul class="fList">
                      <li class="fListItem">Company</li>
                      <li class="fListItem">Contact</li>
                      <li class="fListItem">Careers</li>
                      <li class="fListItem">Affiliates</li>
                      <li class="fListItem">Stores</li>
                  </ul>
              </div>
              <div class="footerMenu">
                  <h1 class="fMenuTitle" style="color: aliceblue;">Useful Links</h1>
                  <ul class="fList">
                      <li class="fListItem">Support</li>
                      <li class="fListItem">Refund</li>
                      <li class="fListItem">FAQ</li>
                      <li class="fListItem">Feedback</li>
                      <li class="fListItem">Stories</li>
                  </ul>
              </div>
              <div class="footerMenu">
                  <h1 class="fMenuTitle" style="color: aliceblue;">Products</h1>
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

      <script>
   
    function updateCartItemCount() {
        $.ajax({
            url: 'get_cart_item_count.php',
            type: 'GET',
            success: function (data) {
                $('#cartItemCount').text(data);
            },
            error: function () {
                console.log('Error fetching cart item count');
            }
        });
    }
    $(document).ready(function () {
        updateCartItemCount();
    });
</script>

  </body>
</html>
 