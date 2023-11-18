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
  </head>
  <body>
<div class="nav-bar">
   <a href="index.html">
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
                  <li><a class="menu__item" href="index.html">Home</a></li>
                  <li><a class="menu__item" href="login.php" style="color: rgb(0, 164, 0);"><?php session_start(); if(isset($_SESSION["username"])){echo $_SESSION["name"];}else{echo"Login";} ?></a></li>
                  <li><a class="menu__item" href="Registration.php">Register</a></li>
                  <li><a class="menu__item" href="product_airforce.php">shoes</a></li>
                  <li><a class="menu__item" href="clothing.html">clothing</a></li>
                  <li><a class="menu__item" href="./support.html">support</a></li>
                  <li><a class="menu__item" href="login.php?logout" name="logout" style="color: red;">Log Out</a></li>
              </div>

            <div class="navItem">
                <div class="search">
                    <input type="text" placeholder="Search..." class="searchInput">
                    <img src="./img/search.png" width="20" height="20" alt="" class="searchIcon">
                </div>
            </div>
            <div class="navItem">      
                
                <!-- <span>|</span>
                <a href="Registration.php"><button class="limitedOffer">SIGN-UP</button></a> -->
                <i class="fa fa-shopping-cart cart1" style="font-size:48px;color:green"></i>
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
      <p style="color: grey">Classic aiforce 1</p>
      <div class="pro-container">
        <?php
          
             getProducts();
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
          <div class="footerRight">
              <div class="footerRightMenu">
                  <h1 class="fMenuTitle">Subscribe to our newsletter</h1>
                  <div class="fMail">
                      <input type="text" placeholder="your@email.com" class="fInput">
                      <button class="fButton">Join!</button>
                  </div>
              </div>
              <div class="footerRightMenu">
                  <h1 class="fMenuTitle">Follow Us</h1>
                  <div class="fIcons">
                      <img src="./img/facebook.png" alt="" class="fIcon">
                      <img src="./img/twitter.png" alt="" class="fIcon">
                      <img src="./img/instagram.png" alt="" class="fIcon">
                      <img src="./img/whatsapp.png" alt="" class="fIcon">
                  </div>
              </div>
          </div>
      </footer>

  </body>
</html>
 