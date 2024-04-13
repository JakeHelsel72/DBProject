<?php
require_once ("includes/config_session.php");
require_once ("includes/signup_view.php");
require_once ("includes/login_view.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Join Online Experiences</title>
  <link rel="stylesheet" href="login.css">
</head>

<body>
  <?php //print_r($_SESSION);
  output_username(); ?>
  <?php
  if (!isset($_SESSION["user_id"])) { ?>
    <div class="Login-wrapper">
      <form action="includes/login.php" method="post">
        <h1 class="title">LogIn</h1>
        <div class="input-box">
          <input type="text" name="username" placeholder="Username" required>
        </div>
        <div class="input-box">
          <input type="password" name="pwd" placeholder="Password" required>
        </div>
        <button type="submit" class="btn">Login</button>
        <div class="register-link">
          Don't have an account?
          <a href="#">SignUp</a>
        </div>
      </form>
    </div>
  <?php } ?>
  <?php
  check_login_errors();
  ?>
  <?php
  check_signup_errors();
  ?>
  <?php
  if (isset($_SESSION["user_id"])) { ?>
    <div class="Login-wrapper">
        <form action="includes/logout.php" method="post">
          <h1 class="title">SignUp</h1>
          <div class="input-box">
            <input type="text" name="username" placeholder="Username" required>
          </div>
          <div class="input-box">
            <input type="password" name="pwd" placeholder="Password" required>
          </div>
          <button type="submit" class="btn">Sign Up</button>
        </form>
      </div>
  <?php } ?>
</body>

</html>
