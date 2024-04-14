<?php
require_once("includes/database.php");
require_once("includes/config_session.php");
require_once("includes/postviewerutil.php");
$postId = $_GET['postId'];
$title = findTitleByPostID($pdo, $postId);
$username = findUsernameByPostID($pdo, $postId); // this is posting user
$description = findDescriptionByPostID($pdo, $postId);
$link = findLinkByPostID($pdo, $postId);
// Check if $link is an external URL or a relative path
if (strpos($link, 'http://') === 0 || strpos($link, 'https://') === 0) {
    // $link is already a full URL, use it directly
    $finalLink = $link;
} else {
    // $link is a relative path, prepend http:// to make it a valid URL
    $finalLink = "http://$link";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Experience <?php echo $title ?></title>
    <link rel="stylesheet" href="post.css">
  </head>
  <?php
  output_username(); // this is the viewing user
  ?>
  <body>
    <nav class="row">
        <img src="./WebDisplay/Assests/Logo.png" class="logo_img" alt="">
        <ul class="nav_links">
            <li class="link link__hover-effect">Experience</li>
            <li class="link link__hover-effect">Favorite</li>
            <li class="link btn">Sign In</li>
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
            <p class="postid">ID number: <?php echo $postId ?><?php ?></p>
            <p class="username">Post by: <?php echo findUsernameByPostID($pdo, $postId); ?><?php ?></p>
            <p class="post-description"><?php echo findDescriptionByPostID($pdo, $postId); ?><?php ?></p>
            <p class="post-link"><?php echo findLinkByPostID($pdo, $postId); ?><?php ?></p>
        </div>
    </div>
    <?php } else { ?>
        <p> postId unset </p>
    <?php } ?>


<div class="feature">
        <h1 class="title feature-title">Feature Experience</h1>
        <div class="feature-lists">
            <div class="feature-card">
                <img class="card-img" src="/WebDisplay/Assests/Game1.png" alt="">
                <div class="card-info">
                    <h4 class="title-card">Game name</h4>
                    <div class="player_num">Player: 2o</div>
                    <div class="description">Description: Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, soluta.</div>
                    <div class="weblink">Link to game</div>
                </div>
            </div>
            <div class="feature-card">
                <img class="card-img" src="/WebDisplay/Assests/Game2.png" alt="">
                <div class="card-info">
                    <h4 class="title-card">Title experience</h4>
                    <div class="player_num">Player: 2</div>
                    <div class="description">Description: Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, soluta.</div>
                    <div class="weblink">Link to game</div>
                </div>
            </div>
            <div class="feature-card">
                <img class="card-img" src="/WebDisplay/Assests/Game3.png" alt="">
                <div class="card-info">
                    <h4 class="title-card">Game name</h4>
                    <div class="player_num">Player: 5</div>
                    <div class="description">Description: Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, soluta.</div>
                    <div class="weblink">Link to game</div>
                </div>
            </div>
            <div class="feature-card">
                <img class="card-img" src="/WebDisplay/Assests/Game4.png" alt="">
                <div class="card-info">
                    <h4 class="title-card">Game name</h4>
                    <div class="player_num">Player: Solo</div>
                    <div class="description">Description: Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, soluta.</div>
                    <div class="weblink">Link to game</div>
                </div>
            </div>
            <div class="feature-card">
                <img class="card-img" src="/WebDisplay/Assests/Game5.png" alt="">
                <div class="card-info">
                    <h4 class="title-card">Game name</h4>
                    <div class="player_num">Player: Solo</div>
                    <div class="description">Description: Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, soluta.</div>
                    <div class="weblink">Link to game</div>
                </div>
            </div>
            <div class="feature-card">
                <img class="card-img" src="/WebDisplay/Assests/Game6.png" alt="">
                <div class="card-info">
                    <h4 class="title-card">Game name</h4>
                    <div class="player_num">Player: 3</div>
                    <div class="description">Description: Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, soluta.</div>
                    <div class="weblink">Link to game</div>
                </div>
            </div>
            <div class="feature-card">
                <img class="card-img" src="/WebDisplay/Assests/Game7.png" alt="">
                <div class="card-info">
                    <h4 class="title-card">Game name</h4>
                    <div class="player_num">Solo</div>
                    <div class="description">Description: Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, soluta.</div>
                    <div class="weblink">Link to game</div>
                </div>
            </div>
            <div class="feature-card">
                <img class="card-img" src="/WebDisplay/Assests/Game8.png" alt="">
                <div class="card-info">
                    <h4 class="title-card">Game name</h4>
                    <div class="player_num">Solo</div>
                    <div class="description">Description: Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, soluta.</div>
                    <div class="weblink">Link to game</div>
                </div>
            </div>
            
        </div>
    </div>
  </body>
    

</html>
