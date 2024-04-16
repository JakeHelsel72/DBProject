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
    <title>Online Experiences</title>
    <link rel="stylesheet" href="post.css">
    <script>
        function autoResize(textarea) {
            textarea.style.height = 'auto'; 
            textarea.style.height = textarea.scrollHeight + 'px';
        }
        </script>
  </head>
  <body>
  
  <?php if (isset($_SESSION["user_id"])) { ?>
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
            <?php if (!isset($_SESSION["user_id"])){ ?>
            

            <a href="index.php" class="link btn">
                Sign In
            </a>
            <?php } else { ?>
              <li class="link link__hover-effect">
              <a href="accountviewer.php?userId=<?php echo $_SESSION["user_id"];?>">Favorites</a>
            </li> 
              <a href="index.php" class="link btn">
                <?php echo $_SESSION["user_username"];  ?>
              </a>
            <?php } ?>
        </ul>
    </nav>
  <?php } else { ?>
      <nav class="row">
        <a class="homepage" href="homepage.php">
            <img src="./WebDisplay/Assests/Logo.png" class="logo_img" alt="">
        </a>
        <ul class="nav_links">
            <li class="link link__hover-effect">
              <a href="feature.php">Experience</a>
            </li>
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
  <?php } ?>
  <div class="main">
    <figure class="img-wrapper">
        <img class="post-img" src="./WebDisplay/Assests/Post.png" alt="Image by vectorjuice on Freepik">
    </figure>
        <div class="upload">
      <?php if (isset($_SESSION["user_id"])) { ?>
          <h1 class="title">Upload your own experiences!</h1>
          <form action = "includes/upload.php" method="POST" enctype="multipart/form-data">
              <input class="input" type="text" name="title" placeholder="Post Title"> <br>
              <textarea id="input" type="text" name="description" placeholder="Description"  oninput="autoResize(this)"></textarea>
              <input class="input" type="text" name="link" placeholder="Relevant Link"> <br>
              <input class="input" type="number" name="players" placeholder="Number of Players" value="1" min="1"><br> <!-- New input for number of players -->
              <input class="input" type="file" name="image"> <br>
              <button class="update-btn" type="submit" name="submit">UPLOAD</button>
              <?php } else { ?>
                <h1 class="title">User must be logged in to upload an Experience!</h1>
              <?php } ?>
          </form>
        </div>

  </div>
  <div class="post-list">

  </div>
  </body>
</html>
