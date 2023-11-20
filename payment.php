<?php
include('./includes/connect.php');
include(__DIR__ . '/common_functions/common_functions.php');

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();

// Check if the key exists before accessing it
if (isset($_SESSION['cid'])) {
    $c_id = $_SESSION['cid'];

    // Example query using $conn
    $select_products_query = "SELECT * FROM cart INNER JOIN product ON product.p_id = cart.p_id INNER JOIN customer ON customer.c_id = cart.c_id WHERE cart.c_id = $c_id;";
    
    // Check if $conn is a valid mysqli object
    if ($conn instanceof mysqli) {
        $result_products_query = mysqli_query($conn, $select_products_query);

        // Rest of your code...
    } else {
        die("Invalid database connection");
    }
} else {
    die("Session variable not set");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('https://i.postimg.cc/sx0bjCny/thumbbig-677724.webp');
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        * {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
    }

    .card-img-top {
	width: 100%;
	height: 200px;
	object-fit: contain;
}

        .container {
            width: 700px;
            /* max-width: 600px; */
            margin: auto;
            padding: 20px;
            box-sizing: border-box;
            margin-bottom: 10%;
        }

        .go-back-link {
            text-decoration: none;
            color: #6c757d;
            font-size: 18px;
            margin-bottom: 20px;
        }

        .go-back-link i {
            margin-right: 5px;
        }

        .qr-code {
            width: 100%;
            margin-bottom: 20px;
        }

        h2 {
            margin-top: 0;
            margin-bottom: 20px;
            font-weight: bold;
            font-size: 24px;
            color: #343a40;
        }

        .transaction-details {
            margin-top: 20px;
        }



        h3 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #6c757d;
        }

        h4 {
            font-size: 16px;
            margin-bottom: 10px;
            color: #343a40;
        }

        form {
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
        }

        .form-floating {
            position: relative;
            margin-bottom: 20px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            font-size: 26px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-floating label {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 10px;
            font-size: 16px;
            color: #6c757d;
            pointer-events: none;
            transition: 0.3s;
        }

        .form-floating input:focus + label,
        .form-floating input:not(:placeholder-shown) + label {
            top: 5px;
            font-size: 12px;
            color: #6c757d;
            background: #fff;
            padding: 0 5px;
        }

        .form-check-input {
            margin-right: 5px;
        }

        .btn-success {
            background-color: #28a745;
            color: #fff;
            font-size: 30px;
            cursor: pointer;
            border-radius: 10px;
            transition: background-color 0.3s;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .navTop{
            background-color: #343a40;
            margin-bottom: 8%;
        }

    </style>

    <title>Payment</title>
</head>


<div class="navTop">
        <a href="index.php">
                <img src="./img/bot1.png" alt="">
        </a>
</div>

<body>
    <div class="container" style="background-color: aliceblue;">
        <a class="go-back-link" href="#" onclick="history.back();"><i class="bi bi-arrow-left-square"></i>Go back</a>
        <div class="qr-code">
            <img src="assets/shoes/qr.jpg" alt="qr">
        </div>

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
                    <input type="checkbox" class="form-check-input " id="tandc" name="tandc" required>
                    <label class="form-check-label small" for="tandc">I agree to the terms and conditions and the
                        privacy policy</label>
                </div>
            </div>
            <button class="w-100 btn btn-success mb-3" name='addorder' type="submit">Submit</button>
        </form>
    </div>
</body>

</html>
