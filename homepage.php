<?php
require_once("includes/config_session.php");
$_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; // return url for if someone signs in, they can come back to this page
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Browser Blast</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>


  <!-- Create a link (anchor tag) with the dynamic URL -->
    
    <nav class="row">
        <a class="homepage" href="homepage.php">
            <img src="./WebDisplay/Assests/Logo.png" class="logo_img" alt="">
        </a>
        <ul class="nav_links">
            <li class="link link__hover-effect">
              <a href="feature.php">Explore</a>
            </li>
            <li class="link link__hover-effect">
              <a href="post.php">Upload Experience</a>
            </li>
            <li class="link link__hover-effect">Favorites</li> <!-- href="accountviewer.php?uid=<?php echo $_SESSION["user_id"]?>" class="link btn"> -->
            <?php if (!isset($_SESSION["user_id"])){ ?>
            <a href="index.php" class="link btn">
                Sign In
            </a>
            <?php } else { ?>
              <a href="index.php" class="link btn">
                  <li><?php echo $_SESSION["user_username"];  ?></li>
              </a>
              <li class="link link__hover-effect"></li>
            <?php } ?>
        </ul>
    </nav>
    
    <div class="intro row">

        <div class="left">
            <h1 class="title">Discover Your Next Online Adventure with Browser Blast</h1>
            <p class="para">Welcome to Browser Blast! We're the world's best online experience hub. If you're looking to have a good time in your web browser, or to show others how you like to use the web, this is the place to be!</p>
            <button><a class="explore-btn" href="feature.php">Start Exploring</a></button>
        </div>

        <div class="right">
            <img class="intro_img" src="./WebDisplay/Assests/intro.png" alt="">
        </div>
    </div>
  </body>
</html>
