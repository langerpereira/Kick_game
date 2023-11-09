<?php
include('../includes/connect.php');
if (isset($_POST['add_product'])) {
  $shoename = $_POST['mname'];
  $shoedesc = $_POST['mdesc'];
  $shoeseller = $_POST['sid'];
  $shoebrand = $_POST['bid'];
  $shoeprice = $_POST['mprice'];

    $shoe_pic = $_FILES['mimage']['name'];
    $temp_shoe_pic = $_FILES['mimage']['tmp_name'];

    if($shoe_name=='' or $shoe_desc=='' or $shoe_supplier=='' or $shoe_brand=='' or $shoe_price=='' or $shoe_pic==''){
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    }
    else{
        move_uploaded_file($temp_shoe_pic,"../assets/Shoes/$shoe_pic");
        
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
        <form
          action=""
          method="post"
          enctype="multipart/form-data">
        >
          <h3>add a new product</h3>
          <input
            type="text"
            name="p_name"
            placeholder="enter the product name"
            class="box"
            required
          />
          <label for="bname" class="form-label">Enter Brand</label>
        <select class="form-select mb-3" id="bname" aria-label="Default select example" name="bid">
            <option selected></option>
            <?php
            include('../includes/connect.php');
            $select_query = "select * from `brand`;";
            $result_query = mysqli_query($conn, $select_query);
            while ($row = mysqli_fetch_assoc($result_query)) {
                $brand_id = $row['b_id'];
                $brand_name = $row['b_name'];
                echo "<option value='$brand_id'>$brand_name</option>";
            }
            ?>
    <label for="floatingInputGroup2" class="form-label">Shoe Price</label>
    <div class="input-group mb-3">
        <span class="input-group-text">&#8377;</span>
        <div class="form-floating">
            <input type="text" class="form-control" id="floatingInputGroup2" placeholder="Price" name="mprice">
            <label for="floatingInputGroup2">Price</label>
        </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Shoe Image</label>
        <input class="form-control" type="file" id="formFile" name="mimage">
    </div>
          <input
            type="submit"
            value="add the product"
            name="add_product"
            class="btn"
          />
        </form>