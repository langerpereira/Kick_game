<?php
function getProduct(){
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
        <a href='#'>
          <i class='fa fa-shopping-cart cart' style='font-size: 24px'></i>
        </a>
      </div>
        ";
    }
}
?>