<?php
include('./includes/connect.php');
// getting Products
function getProducts()
{
    global $conn;
    if (!isset($_GET['supplier'])) {
        if (!isset($_GET['brand'])) {
            $select_query = "select * from `product` order by rand() LIMIT 0,9";
            $result_query = mysqli_query($conn, $select_query);
            while ($row_data = mysqli_fetch_assoc($result_query)) {
                $product_pic = $row_data['p_pic'];
                $product_id = $row_data['p_id'];
                $product_name = $row_data['p_name'];
                $product_price = $row_data['p_price'];
                echo "<div class='col-md-4 mb-4 ' style='max-width: 300px;min-width:200px'>
            <div class='card'>
                <a href='product_details.php?product_id=$product_id'>
                <img src='./assets/Shoes/$product_pic' class='card-img-top' alt='...'>
                </a>
                <div class='card-body'>
                    <h5 class='card-title'>$product_name</h5>
                    <h6 class='card-text'>Rs 
                    $product_price
                    </h6>
                
                    <a href='#' class='btn btn-success'>Buy Now</a>
                    <a href='#' class='btn btn-outline-success '>
                        <i class='fa-solid fa-cart-shopping'></i>
                    </a>
                </div>
            </div>
        </div>";
            }
        }
    }
}