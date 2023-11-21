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
    }
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
    href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Old+Standard+TT&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>KicK Game</title>
</head>
<body>    
    <nav id="nav" >
        <div class="navTop">
            <div class="navItem">
                <img src="./img/bot1.png" alt="">
            </div>

            <div class="hamburger-menu">
                <input id="menu__toggle" type="checkbox" />
                <label class="menu__btn" for="menu__toggle">
                  <span></span>
                </label>
                <ul class="menu__box">
                  <li><a class="menu__item" href="index.php">Home</a></li>
                  <li><a class="menu__item" href="login.php" style="color: rgb(0, 164, 0);"><?php session_start(); if(isset($_SESSION["username"])){echo 'Welcome ' .$_SESSION["name"];}else{echo"Login";} ?></a></li>
                  <li><a class="menu__item" href="Registration.php">Register</a></li>
                  <li><a class="menu__item" href="orders.php">my orders</a></li>
                  <li><a class="menu__item" href="product_airforce.php">shoes</a></li>
                  <li><a class="menu__item" href="clothing.html">clothing</a></li>
                  <li><a class="menu__item" href="./support.html">support</a></li>            
                 <a class="nav-link" href="">
                 <?php if(isset($_SESSION["username"])){echo "<a href='index.php?logout'><li><a class='menu__item' href='index.php?logout' name='logout' style='color: red;' >Log Out</a></li></a>";}else{echo"Welcome Guest";} ?></a></li>
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
            <a class="icon" href="cart.php">    
    <i class="fa fa-shopping-cart cart1" style="font-size:48px;color:goldenrod; position: fixed; z-index: 1030; right: 50px; top: 10px;">
        <span style="font-size: 14px; position: absolute; top: -8px; left: -12px; background-color: red; color: white; border-radius: 50%; padding: 2px 5px;"><?php echo getCartItemCount(); ?></span>
    </i>
</a> 
        </div>
        <div class="navBottom" style="color: #a28309;">
            <h3 class="menuItem">AIR FORCE</h3>
            <h3 class="menuItem">JORDAN</h3>
            <h3 class="menuItem">BLAZER</h3>
            <h3 class="menuItem">CRATER</h3>
            <h3 class="menuItem">HIPPIE</h3>
        </div>
    </nav>
    <div class="slider">
        <div class="sliderWrapper">
            <div class="sliderItem">
                <img src="./img/air.png" alt="" class="sliderImg">
                <div class="sliderBg"></div>
                <h1 class="sliderTitle">AIR FORCE</br> NEW</br> SEASON</h1>
                <h2 class="sliderPrice" style="color: black;">Rs11,999</h2>
                <a href="#product">
                    <button class="buyButton">BUY NOW!</button>
                </a>
            </div>
            <div class="sliderItem">
                <img src="./img/jordan.png" alt="" class="sliderImg">
                <div class="sliderBg"></div>
                <h1 class="sliderTitle">AIR JORDAN</br> NEW</br> SEASON</h1>
                <h2 class="sliderPrice"  style="color": black;>Rs14,999</h2>
                <a href="#product">
                    <button class="buyButton">BUY NOW!</button>
                </a>
            </div>
            <div class="sliderItem">
                <img src="./img/blazer.png" alt="" class="sliderImg">
                <div class="sliderBg"></div>
                <h1 class="sliderTitle">BLAZER</br> NEW</br> SEASON</h1>
                <h2 class="sliderPrice" style="color: rgb(1, 1, 52);">Rs10,999</h2>
                <a href="#product">
                    <button class="buyButton">BUY NOW!</button>
                </a>
            </div>
            <div class="sliderItem">
                <img src="./img/crater.png" alt="" class="sliderImg">
                <div class="sliderBg"></div>
                <h1 class="sliderTitle">CRATER</br> NEW</br> SEASON</h1>
                <h2 class="sliderPrice">Rs12,999</h2>
                <a href="#product">
                    <button class="buyButton">BUY NOW!</button>
                </a>
            </div>
            <div class="sliderItem">
                <img src="./img/hippie.png" alt="" class="sliderImg">
                <div class="sliderBg"></div>
                <h1 class="sliderTitle">HIPPIE</br> NEW</br> SEASON</h1>
                <h2 class="sliderPrice">Rs9,999</h2>
                <a href="#product">
                    <button class="buyButton">BUY NOW!</button>
                </a>
            </div>
        </div>
    </div>
   
    <div class="features">
        <div class="feature">
            <img src="./img/shipping.png" alt="" class="featureIcon">
            <span class="featureTitle">FREE SHIPPING</span>
            <span class="featureDesc">Free worldwide shipping on all orders.</span>
        </div>
        <div class="feature">
            <img class="featureIcon" src="./img/return.png" alt="">
            <span class="featureTitle">30 DAYS RETURN</span>
            <span class="featureDesc">No question return and easy refund in 14 days.</span>
        </div>
        <div class="feature">
            <img class="featureIcon" src="./img/gift.png" alt="">
            <span class="featureTitle">GIFT CARDS</span>
            <span class="featureDesc">Buy gift cards and use coupon codes easily.</span>
        </div>
        <div class="feature">
            <img class="featureIcon" src="./img/contact.png" alt="">
            <span class="featureTitle">CONTACT US!</span>
            <span class="featureDesc">Keep in touch via email and support system.</span>
        </div>
    </div>

    <div class="product" id="product">
        <img src="./img/air.png" alt="" class="productImg">
        <div class="productDetails">
            <h1 class="productTitle">AIR FORCE</h1>
            <h2 class="productPrice">$199</h2>
            <p class="productDesc">From musicians to artists to streetwear icons, the Air Force 1 has always been more than a sneaker. Everywhere it's gone, it's changed the game. But the past 40 years are behind us, so let's set the stage for the next 40. Because Force has always been strongest when we do it together.</p>
            <div class="colors">
                <div class="color"></div>
                <div class="color"></div>
            </div>
            <div class="sizes">
                <div class="size">42</div>
                <div class="size">43</div>
                <div class="size">44</div>
            </div>
            <button class="productButton">BUY NOW!</button>
           <a href="product_airforce.php"> <button class="productButton">EXPLORE</button></a>
        </div>


        <div class="payment" style="max-height:100%; overflow:auto; border:1px solid red;">

    <div class="container" style="background-color: aliceblue; max-width: 500px; padding: 20px; position: relative;">

        <a class="go-back-link" href="#" onclick="history.back();"><i class="bi bi-arrow-left-square"></i> Go back</a>

        <div class="qr">
            <img src="assets/shoes/qr.jpg" alt="qr" style="border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 100%;">
        </div>

        <button type="button" class="close-btn" onclick="closeContainer()">&times;</button>

        <form method="POST" action="add_order.php" class="form-floating" style="background-color: aliceblue;">

            <h2><i class="bi bi-qr-code-scan"></i> Payment Details</h2>

            <div class="transaction-details">
                <h3>Grand Total</h3>
                <?php
                if (!isset($_SESSION)) {
                    session_start();
                }
                if (isset($_SESSION['username'])) {
                    $c_id = $_SESSION['cid'];
                    $select_products_query = "SELECT * FROM cart INNER JOIN product ON product.p_id = cart.p_id INNER JOIN customer ON customer.c_id = cart.c_id WHERE cart.c_id = $c_id;";
                    $result_products_query = mysqli_query($conn, $select_products_query);
                    $totalPrice = 0;
                    $items = 0;
                    while ($cartData = mysqli_fetch_assoc($result_products_query)) {
                        $price = $cartData['p_price'];
                        $qty = $cartData['buy_qty'];
                        $totalPrice = $totalPrice + ($price * $qty);
                    }
                    printf("<h4>Rs %.2f</h4>", $totalPrice);
                }
                ?>
            </div>

            <?php
            if (!isset($_SESSION)) {
                session_start();
            }
            if (isset($_SESSION['username'])) {
                echo "<h4>Name : {$_SESSION['username']}</h4>
                    <h4>Email : {$_SESSION['email']}</h4>
                    <h4>Address : {$_SESSION['address']}</h4>";
            }
            ?>

<div class="form-floating mt-5 mb-2">
                <input type="text" class="form-control" id="tid" name="tid" minlength="12" maxlength="45" required>
                <label for="transactionid">Transaction Id</label>
            </div>

            <div class="form-floating">
                <div class="mb-2 form-check">
                    <input type="checkbox" class="form-check-input" id="tandc" name="tandc" required>
                    <label class="form-check-label small" for="tandc">I agree to the terms and conditions and the
                        privacy policy</label>
                </div>
            </div>

            <button class="w-100 btn btn-success mb-3" name='addorder' type="submit">Submit</button>
        </form>
    </div>
</div>

<style>
    .close-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 20px;
        cursor: pointer;
        background: none;
        border: none;
        outline: none;
    }
</style>

<script>
     function closeContainer() {
        document.querySelector('.payment').style.display = 'none';
    }
</script>

        </div>
    </div>
    <div class="gallery">
        <div class="galleryItem">
            <h1 class="galleryTitle">Be Yourself!</h1>
            <a href="clothing.html">
            <img src="https://images.pexels.com/photos/9295809/pexels-photo-9295809.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500"
                alt="" class="galleryImg">
            </a>
        </div>
        <div class="galleryItem">
            <img src="https://i.postimg.cc/L5VZKnt0/a100f12f5f1a366107426676099e20b9.jpg"
                alt="" class="galleryImg">
            <h1 class="galleryTitle">This is the First Day of Your New Life</h1>
        </div>
        <div class="galleryItem">
            <h1 class="galleryTitle">Just Do it!</h1>
            <img src="https://i.postimg.cc/K4XtFdwR/sneaker-4687823-640.jpg"
                alt="" class="galleryImg">
        </div>
    </div>
    <div class="newSeason">
        <div class="nsItem">
            <img src="https://i.postimg.cc/8kYF2ggH/outdoor-image-o-0.png
                alt=" class="nsImg">
        </div>
        <div class="nsItem">
            <h3 class="nsTitleSm">WINTER NEW ARRIVALS</h3>
            <h1 class="nsTitle">New Season</h1>
            <h1 class="nsTitle">New Collection</h1>
            <a href="#nav">
                <button class="nsButton">CHOOSE YOUR STYLE</button>
            </a>
        </div>
        <div class="nsItem">
            <img src="https://i.postimg.cc/bwVNtQYR/people-wearing-0.png"
                alt="" class="nsImg">
        </div>
    </div>
    <footer style="background-color: black;">
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
    <script src="./app.js"></script>
</body>

</html>