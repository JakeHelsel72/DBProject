<?php
require_once("includes/database.php");
require_once("includes/config_session.php");
$_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; // return url for if someone signs in, they can come back to this page
require_once("includes/accountviewerutil.php");
$userId = $_GET['userId'];
$user = 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Experience <?php echo $title ?></title>
    <link rel="stylesheet" href="postviewer.css">
    <script src="https://kit.fontawesome.com/6443be5758.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <nav class="row">
        <img src="./WebDisplay/Assests/Logo.png" class="logo_img" alt="">
        <ul class="nav_links">
            <li class="link link__hover-effect">Experience</li>
            <li class="link link__hover-effect">Favorite</li>

            <a href="index.php" class="link btn">
                <li>Sign In</li>
            </a>
        </ul>
    </nav>
  <?php
        output_username();
    ?>
  <?php
  if (isset($postId)) { ?>
    <div class="mainpost-wrapper">
        <img src="./upload/<?php echo $postId .".". findFileExtensionByPostID($pdo, $postId); ?>" alt="FILL IN" class="post-img">
        <div class="post-info">
            <p class="post-title"> <?php echo findTitleByPostID($pdo, $postId); ?><?php ?></p>
            <!-- <p class="postid">ID number: <?php echo $postId ?><?php ?></p> --> 
            <p class="username">Post by: <?php echo findUsernameByPostID($pdo, $postId); ?><?php ?></p>
            <p class="post-description"><?php echo findDescriptionByPostID($pdo, $postId); ?><?php ?></p>
            <p class="post-link">
                <a class="anchor-link" href="<?php echo $finalLink?>" target="_blank"><?php echo findLinkByPostID($pdo, $postId); ?></a>
            </p>

            <?php if (isset($_SESSION["user_id"])) { ?>
            <!-- User is logged in -->
            <form id="likeForm" action="like.php" method="POST">
                <input type="hidden" name="userId" value="<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; ?>">
                <input type="hidden" name="postId" value="<?php echo $postId; ?>">
                <button id="likeButton" type="button" onclick="submitLikeForm()">Like</button>
            </form>

            <?php } else { ?>
                <!-- User is not logged in -->
                <button class="btn-notLogIn" disabled="disabled">Not logged in</button>
            <?php } ?>

        </div>
    </div>
    <?php } else { ?>
        <p> userId not set </p>
    <?php } ?>
  </body>
    

</html>
