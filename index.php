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
  <link rel="stylesheet" href="login.css">
  <script>
    // JavaScript function to toggle visibility of login and sign-up forms
    function toggleForms(formToShow) {
      var loginForm = document.getElementById("login-form");
      var signUpForm = document.getElementById("signup-form");

      // Determine which form to show based on input parameter
      if (formToShow === 'login') {
        loginForm.style.display = "block";
        signUpForm.style.display = "none";
      } else if (formToShow === 'signup') {
        loginForm.style.display = "none";
        signUpForm.style.display = "block";
      }
    }
  </script>
</head>

<body>
  <?php
  output_username();

  // Check if user is not logged in (guest)
  if (!isset($_SESSION["user_id"])) { ?>
    <div class="Login-wrapper">
      <!-- Login Form -->
      <form id="login-form" action="includes/login.php" method="post">
        <h1 class="title">LogIn</h1>
        <div class="input-box">
          <input type="text" name="username" placeholder="Username" required>
        </div>
        <div class="input-box">
          <input type="password" name="pwd" placeholder="Password" required>
        </div>
        <button type="submit" class="btn">Login</button>
        <!-- Call JavaScript function to toggle sign-up form visibility -->
        <div class="register-link">
          Don't have an account?
          <a href="#" onclick="toggleForms('signup');">SignUp</a>
        </div>
        <?php
        check_login_errors();
        ?>
        

      </form>

      <!-- SignUp Form (initially hidden) -->
      <form id="signup-form" style="display: none;" action="includes/signup.php" method="post">
        <h1 class="title">SignUp</h1>
        <div class="input-box">
          <input type="text" name="username" placeholder="Username" required>
        </div>
        <div class="input-box">
          <input type="password" name="pwd" placeholder="Password" required>
        </div>
        <button type="submit" class="btn">Sign Up</button>
        <!-- Call JavaScript function to toggle login form visibility -->
        <div class="register-link">
          Already have an account?
          <a href="#" onclick="toggleForms('login');">Login</a>
        </div>
        <?php
        check_signup_errors();
        ?>
      </form>
    </div>
  <?php }
  // Check if user is logged in
  if (isset($_SESSION["user_id"])) { ?>
    <!-- Display logout form for logged-in user -->
    <div class="Login-wrapper">
      <form action="includes/logout.php" method="post">
        <h1 class="title">Logout</h1>
        <button type="submit" class="btn">Logout</button>
      </form>
    </div>
  <?php } ?>
</body>

</html>
