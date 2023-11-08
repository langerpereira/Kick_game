<?php
include('../includes/connect.php');
if (isset($_POST['add_seller'])) {

    $supplier_name = $_POST['sname'];
    $supplier_email = $_POST['semail'];
    $supplier_uname = $_POST['suname'];
    $supplier_pass = $_POST['spass'];
    $supplier_address = $_POST['saddress'];

    $select_query = "select * from `seller` where s_name='$supplier_name'";
    $result_select = mysqli_query($conn, $select_query);
    $numRows = mysqli_num_rows($result_select);
    if ($numRows > 0) {
        echo "<script>alert('Seller already Exists')</script>";
    } 
    else {
        $insert_query = "insert into `seller` (s_name,s_add,s_uname,s_pwd,s_email) values ('$supplier_name','$supplier_address','$supplier_uname','$supplier_pass','$supplier_email')";
        $result = mysqli_query($conn, $insert_query);
        if ($result) {
            echo "<script>alert('Seller Added Successfully')</script>";
        }
    }
}
?>


    <form action="" method="post">
        <h3>Add Seller</h3>
        <div class="mb-3">
            <label for="exampleInputUName1" class="form-label">Name</label>
            <input type="text" class="form-control" id="exampleInputName1" name="sname">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="semail" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputUname1" class="form-label">Username</label>
            <input type="text" class="form-control" id="exampleInputUname1" name="suname">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="spass" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputUaddress1" class="form-label">Address</label>
            <input type="text" class="form-control" name="saddress" id="exampleInputUaddress1">
        </div>
        <button type="submit" class="btn btn-success" name="add_seller">Submit</button>
    </form>