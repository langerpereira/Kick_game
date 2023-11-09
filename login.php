<?php
if (isset($_POST['add_user'])) {
$user_name = $_POST['cuname'];
$user_pass = $_POST['upass'];

$con = new mysqli("localhost","root","","kick_game");
if($con->connect_error){
  die("failed to connect : ". $con->connect_error);
}else{

  $stmt = $con->prepare("select * from `customer` where c_uname=?");

 
  $stmt->bind_param("s", $user_name);
  $stmt->execute();
  $stmt_result = $stmt->get_result();
  if($stmt_result->num_rows > 0){
    $data = $stmt_result->fetch_assoc();

    if($data["c_pwd"] === $user_pass){


      echo "<h2>Login Sucessfull</h2>";
      echo "<script>location.href='./index.html';</script>";
    }else{
      echo "<h2>Invalid Email or password</h2>";
    }
}else{
  echo "<h2>Invalid Email or password</h2>";
}
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
      <a href="index.html"><img src="./img/bot1.png" alt="" /></a>
    </div>
    <form action="login.php" method="post">
      <h1 style="color: rgb(0, 0, 0)">Login</h1>
      <label for="username" style="color: rgb(0, 0, 0)" >Username:</label>
      <input type="text" id="username"  name="cuname" required />
      <label for="password" style="color: rgb(0, 0, 0) ">Password:</label>
      <input type="password" id="password" name="upass" required />
      <input type="submit" value="Login" name="add_user"/>
      <div class="signup">
        <p>Don't have an account? <a href="Registration.php">Sign up</a></p>
      </div>
    </form>
  </body>
</html>
