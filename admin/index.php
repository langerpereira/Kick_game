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
        <Style>
            #menu__toggle {
  opacity: 0;
}
#menu__toggle:checked + .menu__btn > span {
  transform: rotate(45deg);
}
#menu__toggle:checked + .menu__btn > span::before {
  top: 0;
  transform: rotate(0deg);
}
#menu__toggle:checked + .menu__btn > span::after {
  top: 0;
  transform: rotate(90deg);
}
#menu__toggle:checked ~ .menu__box {
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
.menu__btn > span,
.menu__btn > span::before,
.menu__btn > span::after {
  display: block;
  position: absolute;
  width: 100%;
  height: 2px;
  background-color: goldenrod;
  transition-duration: .25s;
}
.menu__btn > span::before {
  content: '';
  top: -8px;
}
.menu__btn > span::after {
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
  color:  rgb(158, 149, 149);
  font-family: 'old standard TT' ,sans-serif;
  font-size: 25px;
  font-weight: 600;
  text-decoration: none;
  transition-duration: .25s;
}
.menu__item:hover {
  background-color: #CFD8DC;
}
        </Style>
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
                    <button class="bg-secondary text-white"><a href="" class="nav-link text-light bg-secondary text-white p-2 rounded border border-light">View Shoes</a></button>
                    <button class="bg-secondary text-white"><a href="./index.php?add_supplier" class="nav-link text-light bg-secondary text-white p-2 rounded border border-light">Add
                            Seller</a></button>
                    <button class="bg-secondary text-white"><a href="" class="nav-link text-light bg-secondary text-white p-2 rounded border border-light">View Sellers</a></button>
                    <button class="bg-secondary text-white"><a href="./index.php?add_brand" class="nav-link text-light bg-secondary text-white p-2 rounded border border-light">Add Brand</a></button>
                    <button class="bg-secondary text-white"><a href="" class="nav-link text-light bg-secondary text-white p-2 rounded border border-light">View Brands</a></button>
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
