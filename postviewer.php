<?php
require_once("includes/database.php");
require_once("includes/config_session.php");
$_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; // return url for if someone signs in, they can come back to this page
require_once("includes/postviewerutil.php");
$postId = $_GET['postId'];
$title = findTitleByPostID($pdo, $postId);
$username = findUsernameByPostID($pdo, $postId); // this is posting user
$description = findDescriptionByPostID($pdo, $postId);
$link = findLinkByPostID($pdo, $postId);
$link = fix_link($link); // adds http:// or https://
$parts = explode('/', trim($_SERVER['PHP_SELF'], '/'));
$baseDir = implode('/', array_slice($parts, 0, -1)); // Assuming the base directory is the first segment
$currentpage = end($parts);
$indexurl = "http://$_SERVER[HTTP_HOST]/{$baseDir}/index.php";
?>

<!DOCTYPE html>
<!-- <script>
    
</script> -->
<script>
  function toggleLike() {
    var likeIcon = document.getElementById('likeButton');

    // Toggle between 'full-heart' and 'empty-heart' classes
    if (likeIcon.classList.contains('fa-regular')) {
        likeIcon.classList.remove('fa-regular');
        likeIcon.classList.add('fa-solid');
    } else {
        likeIcon.classList.remove('fa-solid');
        likeIcon.classList.add('fa-regular');
    }
  }

function submitLikeForm() {
    var formData = new FormData(document.getElementById('likeForm'));
    var xhr = new XMLHttpRequest();

    xhr.open('POST', 'like.php', true);

    // Set up event listener for when the request completes
    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            // Request was successful
            console.log('Like action succeeded:', xhr.responseText);
            // Handle response here (optional)
        } else {
            // Request failed
            console.error('Like action failed:', xhr.statusText);
            // Handle error here (optional)
        }
    };

    // Send the form data asynchronously
    xhr.send(formData);
}
</script>

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
        <a class="homepage" href="homepage.php">
            <img src="./WebDisplay/Assests/Logo.png" class="logo_img" alt="">
        </a>
        <ul class="nav_links">
            <li class="link link__hover-effect">Experience</li>
            <li class="link link__hover-effect">Favorite</li>

            <a href="index.php" class="link btn">Sign In</a>
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
                <i  id="likeButton" onclick="submitLikeForm();toggleLike()" class="fa-regular fa-heart"></i>
            </form>

            <?php } else { ?>
                <!-- User is not logged in -->
                <button class="btn-notLogIn" disabled="disabled">Not logged in</button>
            <?php } ?>

        </div>
    </div>
    <?php } else { ?>
        <p> postId unset </p>
    <?php } ?>
  </body>
    

</html>
