<?php
include('../includes/connect.php');
if (isset($_POST['add_product'])) {
    $shoe_name = $_POST['p_name'];
    $shoe_desc = $_POST['p_desc'];
    $shoe_supplier = $_POST['s_id'];
    $shoe_brand = $_POST['b_id'];
    $shoe_price = $_POST['p_price'];

    $shoe_pic = $_FILES['mimage']['name'];
    $temp_shoe_pic = $_FILES['mimage']['tmp_name'];

    if($shoe_name=='' or $shoe_desc=='' or $shoe_supplier=='' or $shoe_brand=='' or $shoe_price=='' or $shoe_pic==''){
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    }
    else{
        move_uploaded_file($temp_shoe_pic,"../assets/shoe_Images/$shoe_pic");
        
        $insert_query = "insert into `product` (p_name,p_price,p_desc,s_id,p_pic,b_id) values ('$shoe_name','$shoe_price','$shoe_desc',$shoe_supplier,'$shoe_pic',$shoe_brand)";
        $result_query = mysqli_query($conn,$insert_query);
        if($result_query){
            echo "<script>alert('shoe Added Successfully')</script>";
        }
    }

    echo "<script>location.href='./index.php?add_product';</script>";
}
?>
  <?php 
    include("header.php");
    ?>

    <div class="container">
      <section>
        <form
          action=""
          method="post"
          class="add-product-form"
          style="color: rgb(81, 81, 81)"
        >
          <h3>add a new product</h3>
          <input
            type="text"
            name="p_name"
            placeholder="enter the product name"
            class="box"
            required
          />
          <input
            type="number"
            name="p_price"
            min="0"
            placeholder="enter the product price"
            class="box"
            required
          />
          <input
            type="text"
            name="p_desc"
            placeholder="enter the product desc"
            class="box"
            required
          />
          <input
            type="file"
            name="p_image"
            accept="image/png, image/jpg, image/jpeg"
            class="box"
            required
          />
          <input
            type="submit"
            value="add the product"
            name="add_product"
            class="btn"
          />
        </form>