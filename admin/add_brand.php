<?php
    include('../includes/connect.php');
    if(isset($_POST['add_brand'])){
        $brand_name = $_POST['bname'];
        $select_query = "select * from `brand` where b_name='$brand_name'";
        $result_select = mysqli_query($conn,$select_query);
        $numRows = mysqli_num_rows($result_select);
        if($numRows>0){
            echo "<script>alert('Brand already Exists')</script>";
        }
        else{
            $insert_query = "insert into `brand` (b_name) values ('$brand_name')";
            $result = mysqli_query($conn, $insert_query);
            if ($result) {
                echo "<script>alert('Brand Added Successfully')</script>";
            }
        }
        echo "<script>location.href='./index.php?add_brand';</script>";
    }
?>

<form action="" method="post" style="background-image: url('https://i.postimg.cc/W41D8j0x/66372.jpg');">
    <h3>Add Brand</h3>
    <div class=" mb-3">
        <label for="exampleInputUBname1" class="form-label " >Brand Name</label>
        <input type="text" class="form-control" id="exampleInputBname1" name="bname">
    </div>
    <button type="submit" class="btn btn-success" name="add_brand">Submit</button>
</form>