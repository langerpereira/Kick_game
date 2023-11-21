<?php
include("../includes/connect.php");

if (isset($_POST['verify_admin'])) {
    $user_name = $_POST['admuname'];
    $user_pass = $_POST['admpass'];

    $select_user_query = "select * from `employee` where emp_uname='$user_name'";
    $result_user_select = mysqli_query($conn, $select_user_query);
    $numRows = mysqli_num_rows($result_user_select);
    if ($numRows == 0) {
        echo "<script>alert('Employee doesnt Exist')</script>";
    } else {
        $db_data = mysqli_fetch_assoc($result_user_select);
        $db_pass = $db_data['emp_pwd'];
        if($db_pass==$user_pass){
            echo "<script>alert('Login Sucessfull')</script>";
            session_start();
            $_SESSION['emp_uname']=$db_data['emp_uname'];
            $_SESSION['emp_pwd']=$db_data['emp_pwd'];
            $_SESSION['emp_name']=$db_data['emp_name'];
            echo "<script>location.href='index.php';</script>";
        }
        else{
            echo "<script>alert('Incorrect Password')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Admin Login</title>
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
      .Login{
        background-color: rgb(251, 251, 251);
        font-size: 16px;
        color: #000000;
        padding: 10px 20px;
        text-align: center;
        border-radius:8px;
      }

    .Login:hover{
      background-color: rgb(135, 253, 135);
    }

    </style>
  </head>
  <body>
    <div class="bot">
      <a href="index.php"><img src="./img/bot1.png" alt="" /></a>
    </div>
    <form action="" method="post">
      <h1 style="color: rgb(0, 0, 0)">Admin Login</h1>
      <label for="username" style="color: rgb(0, 0, 0)" >Username:</label>
      <input type="text" id="username"  name="admuname" required />
      <label for="password" style="color: rgb(0, 0, 0) ">Password:</label>
      <input type="password" id="password" name="admpass" required />
      <button type="submit" name="verify_admin" class="Login">Login</button>
      <div class="signup">
        <p>Don't have an account? <a href="Registration.php">Sign up</a></p>
      </div>
    </form>
  </body>
</html>
