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
$finalLink = fix_link($link); // adds http:// or https://
$parts = explode('/', trim($_SERVER['PHP_SELF'], '/'));
$baseDir = implode('/', array_slice($parts, 0, -1)); // Assuming the base directory is the first segment
$currentpage = end($parts);
//$indexurl = "http://$_SERVER[HTTP_HOST]/{$baseDir}/index.php";
$UID = findUIDByPostID($pdo, $postId);
if (isset($_SESSION['user_id'])){
  $liked = liked($pdo, $postId, $_SESSION['user_id']);
} 
?>
<!DOCTYPE html>
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

function redirectToLink(customLink) {
    // Specify the URL you want to redirect to
    var destination = customLink;
    
    // Redirect the user to the specified URL
    window.location.href = destination;
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
              <a href="favorites.php">Favorites</a>
            </li> 
              <a href="index.php" class="link btn">
                <?php echo $_SESSION["user_username"];  ?>
              </a>
              <!-- <a href="index.php" class="link btn">
                <li class="top">
                  <a  class="link" href="#"><?php echo $_SESSION["user_username"];  ?> <i class="fa-solid fa-arrow-down"></i></a>
                  <ul class="dropdown-box">
                    <li class=""><a href="favorites.php">Favorite</a></li>
                    <li class=""><a href="accountviewer.php?userId=<?php echo $_SESSION["user_id"];?>">Personal Page</a></li>
                    <li class=""><a href="index.php">Logout</a></li>
                  </ul>
                </li>
                
              </a> -->
            <?php } ?>

            <!-- DropBar -->
          
              
          
        
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
            <p class="username">
            Post by: <span class="userclick" onclick="redirectToLink('<?php echo "accountviewer.php?userId={$UID}"?>'   )">
                <?php echo findUsernameByPostID($pdo, $postId); ?><?php ?> 
                    </span>
            </p>
            <p class="post-description"><?php echo findDescriptionByPostID($pdo, $postId); ?><?php ?></p>
            <p class="post-link">
                <a class="anchor-link" href="<?php echo $finalLink?>" target="_blank"><?php echo findLinkByPostID($pdo, $postId); ?></a>
            </p>

            <?php if (isset($_SESSION["user_id"])) { ?>
            <!-- User is logged in -->
            <form id="likeForm" action="like.php" method="POST">
                <input type="hidden" name="userId" value="<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; ?>">
                <input type="hidden" name="postId" value="<?php echo $postId; ?>">
                <i  id="likeButton" onclick="submitLikeForm();toggleLike()" class="<?php if (isset($_SESSION['user_id']) && $liked) { echo "fa-solid";} else { echo "fa-regular";}?> fa-heart"></i>
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
