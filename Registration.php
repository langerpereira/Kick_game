<?php
include("./includes/connect.php");
if (isset($_POST['add_user'])) {
    $full_name = $_POST['fname'];
    $user_name = $_POST['cuname'];
    $user_email = $_POST['uemail'];
    $user_pass = $_POST['upass'];
    $user_address = $_POST['uaddress'];

    $select_query = "select * from `customer` where c_uname='$user_name' OR c_email='$user_email'";
    $result_select = mysqli_query($conn, $select_query);
    $numRows = mysqli_num_rows($result_select);
    if ($numRows > 0) {
        echo "<script>alert('User already Exists')</script>";
    } else {
        $insert_query = "insert into `customer`(c_fname,c_add,c_uname,c_pwd,c_email) values ('$full_name','$user_address','$user_name','$user_pass','$user_email');";
        $result_query = mysqli_query($conn, $insert_query);
        if ($result_query) {
            echo "<script>alert('Registration Successful')</script>";
            echo "<script>location.href='./login.php';</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration </title>
    <link rel="stylesheet" href="registration.css" />
  </head>
  <body>
    <a href="index.php"><img src="./img/bot1.png" alt=""></a>

    <div class="wrapper">
      <h2 style="color: aliceblue">Registration</h2>
      <form style="background-color: transparent" method="post";>
        <div class="input-box">
          <input type="text" placeholder="Enter your username" required name="cuname" />
        </div>
        <div class="input-box">
          <input type="text" placeholder="Enter your first name" required name="fname"/>
        </div>
        <div class="input-box">
          <input type="text" placeholder="Enter your Address" required name="uaddress"/>
        </div>
        <div class="input-box">
          <input type="text" placeholder="Enter your email" required name="uemail"/>
        </div>
        <div class="input-box">
          <input type="password" placeholder="Create password" required name="upass"/>
        </div>
        <div class="policy">
          <input type="checkbox" />
          <h3 style="color: aliceblue">I accept all terms & condition</h3>
        </div>
        <div class="input-box button">
          <input type="Submit" value="Register Now" name="add_user"/>
        </div>
        <div class="text">
          <h3>
            Already have an account? <b><a href="login.php">Login now</a></b>
          </h3>
        </div>
      </form>
    </div>
  </body>
</html>
