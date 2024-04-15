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
$parts = explode('/', trim($_SERVER['PHP_SELF'], '/'));
$baseDir = implode('/', array_slice($parts, 0, -1)); // Assuming the base directory is the first segment
$currentpage = end($parts);
$indexurl = "http://$_SERVER[HTTP_HOST]/{$baseDir}/index.php";
?>

<!DOCTYPE html>
<script>
    function toggleLike(postId) {
        var likeIcon = document.getElementById('likeIcon');
        var likeText = document.getElementById('likeText');

        // Simulate toggling between liked and not liked (for demo purposes)
        if (likeIcon.src.includes('empty_heart.png')) {
            likeIcon.src = 'full_heart.png';
            likeText.innerText = 'Liked';
        } else {
            likeIcon.src = 'empty_heart.png';
            likeText.innerText = 'Like';
        }
    }
</script>

<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Experience <?php echo $title ?></title>
    <link rel="stylesheet" href="postviewer.css">
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
            <li class="link btn" onclick="redirectToIndex(<?php echo $indexurl?>)">Sign In</li>
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
                <a href="<?php echo $finalLink?>" target="_blank"><?php echo findLinkByPostID($pdo, $postId); ?></a>
            </p>

            <?php if (isset($_SESSION["user_id"])) { ?>
            <!-- User is logged in -->
                <button id="likeButton" onclick="toggleLike(<?php echo $postId; ?>)">
                    <img id="likeIcon" src="empty_heart.png" alt="Like">
                    <span id="likeText">Like</span>
                </button>
            <?php } else { ?>
                <!-- User is not logged in -->
                <button disabled="disabled">Not logged in</button>
            <?php } ?>

        </div>
    </div>
    <?php } else { ?>
        <p> postId unset </p>
    <?php } ?>
  </body>
    

</html>
