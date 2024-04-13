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

  <?php
  // Assume $postid is the variable containing the post ID
  $postid = 1; // Example post ID, replace with your actual post ID

  // Build the URL with the query parameter
  http://localhost:8080/DBProject/index.php?uploadsuccess
  $url = "http://$_SERVER[HTTP_HOST]" . "/DBProject/experience.php?postid=" . $postid; 
    $currentURL = $_SERVER['REQUEST_URI'];
    echo "Current URL: http://$_SERVER[HTTP_HOST]". " and " . "$currentURL";
  ?>

  <!-- Create a link (anchor tag) with the dynamic URL -->
    
    <nav class="row">
        <img src="./Assests/Logo.png" class="logo_img" alt="">
        <ul class="nav_links">
            <li class="link link__hover-effect">Experience</li>
            <li class="link link__hover-effect">Favorite</li>
            <li class="link btn">Sign In</li>
        </ul>
    </nav>
    
    <div class="intro row">

        <div class="left">
            <h1 class="title">Discover Your Next Online Adventure with Browser Blast</h1>
            <p class="para">Welcome to Game Gatherer, your ultimate destination for finding the perfect game to play solo or with friends. Dive into a world of endless possibilities where every click brings you closer to your next gaming adventure.</p>
            
            <button><a class="explore-btn" href="<?php echo $url; ?>">Start Explore</a></button>
        </div>

        <div class="right">
            <img class="intro_img" src="./Assests/intro.png" alt="">
        </div>
    </div>
  </body>
</html>
