<?php
include('../includes/connect.php');
if (isset($_POST['add_product'])) {
  $shoe_name = $_POST['mname'];
  $shoe_seller = $_POST['sid'];
  $shoe_brand = $_POST['bid'];
  $shoe_price = $_POST['mprice'];

    $shoe_pic = $_FILES['mimage']['name'];
    $temp_shoe_pic = $_FILES['mimage']['tmp_name'];

    if($shoe_name==''  or $shoe_seller=='' or $shoe_brand=='' or $shoe_price=='' or $shoe_pic==''){
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    }
    else{
        move_uploaded_file($temp_shoe_pic,"../assets/Shoes/$shoe_pic");
        
        $insert_query = "insert into `product`(p_name,p_price,s_id,p_pic,b_id) values ('$shoe_name','$shoe_price',$shoe_seller,'$shoe_pic',$shoe_brand)";              
        $result_query = mysqli_query($conn,$insert_query);
        if($result_query){
            echo "<script>alert('shoe Added Successfully')</script>";
        }
    }

    echo "<script>location.href='./index.php?add_product';</script>";
}
?>
<style>
body{
  background-color: rgb(104, 15, 15);
}

  .form1{
    background-repeat: no-repeat;
    height: 100%;
    width: 100%;
  }
</style>
<form action="" method="post" class="form1" enctype="multipart/form-data" style="background-image: url('https://i.postimg.cc/W41D8j0x/66372.jpg');">
    <h3>Add shoes</h3>
    <div class="mb-3">
        <label for="InputUMname1" class="form-label ">shoe Name</label>
        <input type="text" class="form-control" id="InputMname1" name="mname" autocomplete="off" required>
    </div>

    <div>
        <label for="sname" class="form-label">Enter Seller</label>
        <select class="form-select mb-3" id="sname" aria-label="Default select example" name="sid">
            <option selected></option>
            <?php
            include('../includes/connect.php');
            $select_query = "select * from `supplier`;";
            $result_query = mysqli_query($conn, $select_query);
            while ($row = mysqli_fetch_assoc($result_query)) {
                $seller_id = $row['s_id'];
                $seller_name = $row['s_name'];
                echo "<option value='$seller_id'>$seller_name</option>";
            }
            ?>
        </select>
    </div>
    <div>
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
        </select>
    </div>
    <label for="floatingInputGroup2" class="form-label">shoe Price</label>
    <div class="input-group mb-3">
        <span class="input-group-text">&#8377;</span>
        <div class="form-floating">
            <input type="text" class="form-control" id="floatingInputGroup2" placeholder="Price" name="mprice">
            <label for="floatingInputGroup2">Price</label>
        </div>
    </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">shoe Image</label>
        <input class="form-control" type="file" id="formFile" name="mimage">
    </div>

    <button type="submit" class="btn btn-success" name="add_product">Submit</button>
</form>