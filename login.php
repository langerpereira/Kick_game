<?php
include ("./includes/connect.php");
if (isset($_POST['verify_user'])) {
global $conn;
$user_name = $_POST['cuname'];
$user_pass = $_POST['upass'];

// $conn = new mysqli("localhost","root","","kick_game");
// if($con->connect_error){
//   die("failed to connect : ". $con->connect_error);
// }else{

  $select_user_query = "select * from `customer` where c_uname='$user_name'";
  $result_user_select = mysqli_query($conn, $select_user_query);
  $numRows = mysqli_num_rows($result_user_select);
  if ($numRows == 0) {
      echo "<script>alert('User doesnt Exist')</script>";
  } else {
      $db_data = mysqli_fetch_assoc($result_user_select);
      $db_pass = $db_data['c_pwd'];
      if($db_pass==$user_pass){
      echo "<script>alert('Login Sucessfull')</script>";
      session_start();
      $_SESSION['username']=$db_data['c_uname'];
      $_SESSION['password']=$db_data['c_pwd'];
      $_SESSION['name']=$db_data['c_fname'];
      $_SESSION['address']=$db_data['c_add'];
      $_SESSION['cid']=$db_data['c_id'];
      $_SESSION['email']=$db_data['c_email'];
      echo "<script>location.href='./product_airforce.php';</script>";
      // echo "<script>location.href='./product_airforce.html';</script>";
    }else{
      echo "<script>alert('Invalid Email or password')</script>";
    }
// }else{
//   echo "<h2>Invalid Email or password</h2>";
}
}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Login Page</title>
    <style>
      body {
        color: black;
        background-image: url("https://i.postimg.cc/8z7f5VcM/1621057.jpg");
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        background-position: 200%;
      }
      form {
        background-color: rgba(255, 255, 255, 0.486);
        width: 400px;
        margin: 100px auto;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 10px 10px 10px rgba(244, 0, 0, 0.3);
      }
      input[type="text"],
      input[type="password"] {
        width: 90%;
        padding: 10px;
        margin-bottom: 20px;
        border: none;
        border-radius: 5px;
        box-shadow: 0px 0px 5px rgba(255, 255, 255, 0.3);
      }
      input[type="submit"] {
        background-color: #000000;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
      }
      input[type="submit"]:hover {
        background-color: #c60000;
      }
      .signup {
        color: white;
        font-size: 14px;
        text-align: center;
        margin-top: 20px;
      }
    </style>
  </head>
  <body>
    <div class="bot">
      <a href="product_airforce.php"><img src="./img/bot1.png" alt="" /></a>
    </div>
    <form action="" method="post">
      <h1 style="color: rgb(0, 0, 0)">Login</h1>
      <label for="username" style="color: rgb(0, 0, 0)" >Username:</label>
      <input type="text" id="username"  name="cuname" required />
      <label for="password" style="color: rgb(0, 0, 0) ">Password:</label>
      <input type="password" id="password" name="upass" required />
      <button type="submit" name="verify_user">Login</button>
      <div class="signup">
        <p>Don't have an account? <a href="Registration.php">Sign up</a></p>
      </div>
    </form>
  </body>
</html>
