<?php
require_once("includes/config_session.php");
require_once("includes/signup_view.php");
require_once("includes/login_view.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Join Online Experiences</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php //print_r($_SESSION);
    output_username(); ?>
    <?php
    if (!isset($_SESSION["user_id"])) { ?>
  <h3>Login</h3>
    <form action="includes/login.php" method="post">
      <input type="text" name="username" placeholder="Username"> <br>
      <input type="password" name="pwd" placeholder="Password"> <br>
      <button>Login</button>
    </form>   
    <?php } ?>   

    <?php
      check_login_errors();
    ?>
    <h3>Signup</h3>
    <form action="includes/signup.php" method="post">
      <input type="text" name="username" placeholder="Username"> <br>
      <input type="password" name="pwd" placeholder="Password"> <br>
      <!-- prolly don't need an email but we could add it later -->
      <!-- <input type="text" name="email" placeholder="E-mail"> -->
      <button>Signup</button>
      </form>
      <?php
        check_signup_errors();
      ?>
    <?php
    if (isset($_SESSION["user_id"])) { ?>
    <h3>Logout</h3>
    <form action="includes/logout.php" method="post">
      <button>Logout</button>
    </form>    
    <?php } ?>   
  </body>
</html>