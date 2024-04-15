<?php
require_once("includes/config_session.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Browser Blast Home</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>


  <!-- Create a link (anchor tag) with the dynamic URL -->
    
    <nav class="row">
        <img src="./Assests/Logo.png" class="logo_img" alt="">
        <ul class="nav_links">
            <li class="link link__hover-effect">Experience</li>
            <li class="link link__hover-effect">Favorite</li>
            <?php if (!isset($_SESSION["user_id"])){ ?>
            <a href="index.php" class="link btn">
                <li>Sign In</li>
            </a>
            <?php } else { ?>
              <a href="accountviewer.php?uid=<?php echo $_SESSION["user_id"]?>" class="link btn">
                  <li><?php echo $_SESSION["user_username"];  ?></li>
              </a>
              <li class="link link__hover-effect"></li>
            <?php } ?>
        </ul>
    </nav>
    
    <div class="intro row">

        <div class="left">
            <h1 class="title">Discover Your Next Online Adventure with Browser Blast</h1>
            <p class="para">Welcome to Game Gatherer, your ultimate destination for finding the perfect game to play solo or with friends. Dive into a world of endless possibilities where every click brings you closer to your next gaming adventure.</p>
            
            <button><a class="explore-btn" href="<?php echo $url; ?>">Start Explore</a></button>
        </div>

        <div class="right">
            <img class="intro_img" src="./WebDisplay/Assests/intro.png" alt="">
        </div>
    </div>
  </body>
</html>
