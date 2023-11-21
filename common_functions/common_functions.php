<?php
include(__DIR__ . '/../includes/connect.php');
// getting Products
function getProducts()
{
    global $conn;
    $select_query ="select * from `product`";
    $result_query = mysqli_query($conn, $select_query);

    while ($row_data = mysqli_fetch_assoc($result_query)) {
        $product_id = $row_data["p_id"];
        $product_pic = $row_data["p_pic"];
        $product_name = $row_data["p_name"];
        $product_price = $row_data["p_price"];

        echo "
        <div class='pro' style='margin-right: 20px;'> <!-- Add margin for spacing -->
            <img src='./assets/Shoes/$product_pic' />
            <div class='des'>
                <span>$product_name</span>
                <h4 style='color: blanchedalmond'>RS $product_price</h4>
            </div>
            <a href='product_airforce.php?add_to_cart=$product_id'>
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
            
            // Check if the customer ID exists in the customer table
            $check_customer_query = "SELECT * FROM `customer` WHERE c_id = ?";
            $check_stmt = mysqli_prepare($conn, $check_customer_query);
            mysqli_stmt_bind_param($check_stmt, "i", $customer_id);
            mysqli_stmt_execute($check_stmt);
            $result_check = mysqli_stmt_get_result($check_stmt);

            if (mysqli_num_rows($result_check) == 0) {
                echo "<script>alert('Invalid customer ID')</script>";
                echo "<script>window.open('index.php','_self')</script>";
                exit(); // Exit the function or handle the error appropriately
            }

            $product_id = $_GET['add_to_cart'];

            // Use prepared statement to prevent SQL injection
            $select_query = "SELECT * FROM `cart` WHERE c_id = ? AND p_id = ?";
            $stmt = mysqli_prepare($conn, $select_query);
            mysqli_stmt_bind_param($stmt, "ii", $customer_id, $product_id);
            mysqli_stmt_execute($stmt);
            $result_query = mysqli_stmt_get_result($stmt);
            
            if (mysqli_num_rows($result_query) > 0) {
                echo "<script>alert('This item is present inside the cart')</script>";
                echo "<script>window.open('product_airforce.php','_self')</script>";
            } else {
                // Use prepared statement to prevent SQL injection
                $insert_query = "INSERT INTO `cart` (c_id, p_id, buy_qty) VALUES (?, ?, 1)";
                $stmt = mysqli_prepare($conn, $insert_query);
                mysqli_stmt_bind_param($stmt, "ii", $customer_id, $product_id);
                mysqli_stmt_execute($stmt);

                echo "<script>alert('Item added to cart')</script>";
                echo "<script>window.open('product_airforce.php','_self')</script>";
            }
        }
    } else {
        echo "<script>alert('Please Login to add mobile to cart !')</script>";
        echo "<script>window.open('product_airforce.php','_self')</script>";
    }
}


function getCartProducts()
{
    global $conn;

    if (isset($_SESSION['username'])) {
        $c_id = $_SESSION['cid'];
        $select_products_query = "SELECT *
            FROM cart
            INNER JOIN product ON product.p_id = cart.p_id
            WHERE c_id=$c_id;";
        $result_products_query = mysqli_query($conn, $select_products_query);

        while ($cartData = mysqli_fetch_assoc($result_products_query)) {
            $product_id = $cartData['p_id'];
            $product_pic = $cartData['p_pic'];
            $product_name = $cartData['p_name'];
            $buy_quantity = $cartData['buy_qty'];
            $product_price = $cartData['p_price'];

            echo "<tr>
                <td>
                    <div class='cart-info'>
                        <img src='./assets/Shoes/$product_pic'/>
                        <div>
                            <p>$product_name</p>
                            <small>Price: Rs $product_price</small>
                            <br>
                            <a href='cart.php?delete_item_cid=$c_id&delete_item_pid=$product_id' class='remove-button'>REMOVE</a>
                        </div>
                    </div>
                </td>
                <td>
                    <form method='post' action='cart.php?pro_id=$product_id'>
                        <input type='number' name='quantity' value='$buy_quantity' />
                        <button type='submit'>Update</button>
                    </form>
                </td>
                <td>" . ($buy_quantity * $product_price) . "</td>
            </tr>";
        }
    }
}


function cartSummary()
{
    global $conn;
    
    if (isset($_SESSION['username'])) {
        $c_id = $_SESSION['cid'];
        $c_address = $_SESSION['address'];

        $select_products_query = "SELECT * FROM cart 
            INNER JOIN product ON product.p_id = cart.p_id 
            INNER JOIN customer ON customer.c_id = cart.c_id 
            WHERE cart.c_id = ?";

        $stmt = mysqli_prepare($conn, $select_products_query);
        mysqli_stmt_bind_param($stmt, "i", $c_id);
        mysqli_stmt_execute($stmt);
        $result_products_query = mysqli_stmt_get_result($stmt);

        $totalPrice = 0;
        $items = 0;

        while ($cartData = mysqli_fetch_assoc($result_products_query)) {
            $items++;
            $price = $cartData['p_price'];
            $qty = $cartData['buy_qty'];
            $totalPrice = $totalPrice + ($price * $qty);
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

        <a href='payment.php'><button type='button' class='btn btn-dark btn-block btn-lg bg-success
            data-mdb-ripple-color='dark'>Proceed for payment</button></a>";
    }
}




function getCartItemCount() {
  global $conn;

  if (isset($_SESSION['username'])) {
      $c_id = $_SESSION['cid'];
      $count_query = "SELECT COUNT(*) AS count FROM cart WHERE c_id = $c_id";
      $result = mysqli_query($conn, $count_query);
      $row = mysqli_fetch_assoc($result);
      return $row['count'];
  }

  return 0;
}


