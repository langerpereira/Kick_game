<?php
include("./includes/connect.php");
include("./common_functions/common_functions.php"); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Ecommerce Support</title>
    <style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
    }

    .parallax {
        background-image: url('https://i.postimg.cc/4yLJw0Bz/air-jordan-miles-morales-como-spiderman-6001.webp');
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        text-align: center;
    }

    .content {
        color: white;
        padding: 50px;
        background-color: #0e212f;
        text-align: center;
    }

    #menu__toggle {
        opacity: 0;
    }

    #menu__toggle:checked+.menu__btn>span {
        transform: rotate(45deg);
    }

    #menu__toggle:checked+.menu__btn>span::before {
        top: 0;
        transform: rotate(0deg);
    }

    #menu__toggle:checked+.menu__btn>span::after {
        top: 0;
        transform: rotate(90deg);
    }

    #menu__toggle:checked~.menu__box {
        left: 0 !important;
    }

    .menu__btn {
        position: fixed;
        top: 25px;
        left: 20px;
        width: 30px;
        height: 30px;
        cursor: pointer;
        z-index: 2;
        bottom: 10px;
    }

    .menu__btn>span,
    .menu__btn>span::before,
    .menu__btn>span::after {
        display: block;
        position: absolute;
        width: 100%;
        height: 2px;
        background-color: goldenrod;
        transition-duration: .25s;
    }

    .menu__btn>span::before {
        content: '';
        top: -8px;
    }

    .menu__btn>span::after {
        content: '';
        top: 8px;
        z-index: 1;
    }

    .menu__box {
        display: block;
        position: fixed;
        top: 0;
        left: -100%;
        width: 250px;
        height: 100%;
        margin: 0;
        padding: 80px 0;
        list-style: none;
        background-color: #222629;
        box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.4);
        transition-duration: .25s;
        z-index: 1;
    }

    .menu__item {
        display: block;
        letter-spacing: 1px;
        padding: 12px 24px;
        color: rgb(158, 149, 149);
        font-family: 'old standard TT', sans-serif;
        font-size: 25px;
        font-weight: 600;
        text-decoration: none;
        transition-duration: .25s;
    }

    .menu__item:hover {
        background-color: #CFD8DC;
    }
    </style>
</head>

<body>

    <div class="nav-bar" style="background-color: #0e212f;">
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
                <li>
                    <a class="menu__item" href="login.php" style="color: rgb(0, 164, 0);">
                        <?php session_start(); if(isset($_SESSION["username"])){echo'Welcome '. $_SESSION["name"];}else{echo"Login";} ?>
                    </a>
                </li>
                <li><a class="menu__item" href="Registration.php">Register</a></li>
                <li><a class="menu__item" href="product_airforce.php">Shoes</a></li>
                <li><a class="menu__item" href="clothing.html">Clothing</a></li>
                <li><a class="menu__item" href="./support.html">Support</a></li>
                <a class="nav-link" href="">
                    <?php if(isset($_SESSION["username"])){echo"<a href='index.php?logout'><li><a class='menu__item' href='product_airforce.php?logout' name='logout' style='color: red;' >Log Out</a></li>
                </a>";}else{echo" Welcome Guest";} ?></a>
                </li>
            </ul>
        </div>

        <a class="icon" href="cart.php">
            <i class="fa fa-shopping-cart cart1"
                style="font-size:48px;color:goldenrod; position: fixed; z-index: 1030; right: 50px; top: 20px;">
                <span
                    style="font-size: 14px; position: absolute; top: -8px; left: -8px; background-color: red; color: white; border-radius: 50%; padding: 2px 5px;"><?php echo getCartItemCount(); ?></span>
            </i>
        </a>

        <div class="parallax">
            <div>
                <h1>Welcome to Our Support Center</h1>
            </div>
            <p>Get assistance with your orders and products</p>
        </div>

        <div class="content">
            <h1>Contact Us</h1>
            <p>If you have any questions or issues, feel free to reach out to our support team.</p>

            <h2>Frequently Asked Questions</h2>

            <P>For more detailed assistance, please Contact.</p>
            <br>
            <i class="fa fa-envelope" aria-hidden="true" style="font-size:30px"> langerpereira12@gmail.com<i>
                    <br><br>
                    <i class="fa fa-phone" aria-hidden="true" style="font-size:30px"> 72183839307<i>
        </div>
        <script>
        function updateCartItemCount() {
            $.ajax({
                url: 'get_cart_item_count.php',
                type: 'GET',
                success: function(data) {
                    $('#cartItemCount').text(data);
                },
                error: function() {
                    console.log('Error fetching cart item count');
                }
            });
        }
        $(document).ready(function() {
            updateCartItemCount();
        });
        </script>
</body>

</html>