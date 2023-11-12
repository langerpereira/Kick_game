<?php
include('./includes/connect.php');
// getting Products
function getProducts()
{
    global $conn;
    $select_query ="select * from `product`";
    $result_query = mysqli_query($conn, $select_query);
    while($row_data = mysqli_fetch_assoc($result_query)){
        $product_pic = $row_data["p_pic"];
        $product_name = $row_data["p_name"];
        $product_price = $row_data["p_price"];
        echo "
        <div class='pro'>
        <img
          src='./assets/Shoes/$product_pic'
        />
        <div class='des'>
          <span>$product_name</span>
          <h4 style='color: blanchedalmond'>RS $product_price</h4>
        </div>
        <a href='../cart.php'>
          <i class='fa fa-shopping-cart cart' style='font-size: 24px'></i>
        </a>
      </div>
        ";
    }
}

// cart
function cartFunction()
{
    global $conn;
    session_start();
    if (isset($_SESSION['username'])) {
        if (isset($_GET['add_to_cart'])) {
            $customer_id = $_SESSION['cid'];
            $product_id = $_GET['add_to_cart'];
            $select_query = "select * from `cart` where c_id=$customer_id AND p_id=$product_id";
            $result_query = mysqli_query($conn, $select_query);
            $num_of_rows = mysqli_num_rows($result_query);
            if ($num_of_rows > 0) {
                echo "<script>alert('This item is present inside the cart')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            } else {
                $insert_query = "insert into `cart` (c_id,p_id,buy_qty) values($customer_id,$product_id,1);";
                mysqli_query($conn, $insert_query);
                echo "<script>alert('Item added to cart')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
        }
    } else {
        echo "<script>alert('Please Login to add mobile to cart !')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}


function getCartProducts()
{
    global $conn;
    if (isset($_SESSION['username'])) {
        $c_id = $_SESSION['cid'];
        $select_products_query = "SELECT *
        FROM cart
        INNER JOIN product ON Product.p_id = cart.p_id
        WHERE c_id=$c_id;";
        $result_products_query = mysqli_query($conn, $select_products_query);
        while ($cartData = mysqli_fetch_assoc($result_products_query)) {
            $product_id = $cartData['p_id'];
            $product_pic = $cartData['p_pic'];
            $product_name = $cartData['p_name'];
            $buy_quantity = $cartData['buy_qty'];
            $product_price = $cartData['p_price'];
            echo "<div class='row mb-4 d-flex justify-content-between align-items-center'>
            <div class='col-md-2 col-lg-2 col-xl-2'>
              <img
                src='./assets/Mobile_Images/$product_pic'
                class='img-fluid rounded-3' alt='$product_name'>
            </div>
            <div class='col-md-3 col-lg-3 col-xl-3'>
              <h6 class='text-black mb-0'>$product_name</h6>
            </div>
            <div class='col-md-3 col-lg-3 col-xl-3 d-flex'>

              <form action='cart.php?pro_id=$product_id' method='post' class='d-flex gap-1'>
              <input id='form1' min='0' name='quantity' value='$buy_quantity' type='number'
                class='form-control form-control-sm' />

              <button class='btn btn-dark px-2' name='update_quantity'>Update</button>
              </form>

            </div>
            <div class='col-md-3 col-lg-2 col-xl-2 '>
              <h6 class='mb-0'>Rs $product_price</h6>
            </div>
            <div class='col-md-1 col-lg-1 col-xl-1 '>
              <a href='cart.php?delete_item_cid=$c_id&delete_item_pid=$product_id' class='text-muted'><i class='fas fa-times'></i></a>
            </div>
          </div>

          <hr class='my-4'>";
        }
    }
}


function cartSummary()
{
    global $conn;
    if (isset($_SESSION['username'])) {
        $c_id = $_SESSION['cid'];
        $c_address = $_SESSION['address'];
        $select_products_query = "SELECT * FROM cart INNER JOIN product ON product.p_id = cart.p_id INNER JOIN customer ON customer.c_id = cart.c_id WHERE cart.c_id = $c_id;";
        $result_products_query = mysqli_query($conn, $select_products_query);
        $totalPrice = 0;
        $items = 0;
        while ($cartData = mysqli_fetch_assoc($result_products_query)) {
            $items++;
            $price = $cartData['p_price'];
            $qty = $cartData['buy_qty'];
            $totalPrice = $totalPrice+($price*$qty);
        }
        echo "<div class='d-flex justify-content-between mb-4'>
    <h5>Total Items </h5>
    <h5>$items</h5>
  </div>
  <h5 class='mb-3'>Shipping Address</h5>
  <h6>$c_address</h6>
  <hr class='my-4'>

  <div class='d-flex justify-content-between mb-5'>
    <h5 class='text-uppercase'>Total price</h5>
    <h5>Rs $totalPrice</h5>
  </div>

  <a href='payment.php'><button type='button' class='btn btn-success btn-block btn-lg'
    data-mdb-ripple-color='dark'>Proceed for payment</button></a>";
    }
}