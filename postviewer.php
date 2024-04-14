<?php
require_once("includes/database.php");
require_once("includes/config_session.php");
require_once("includes/postviewerutil.php");
$postId = $_GET['postId'];
$title = findTitleByPostID($pdo, $postId);
$username = findUsernameByPostID($pdo, $postId); // this is posting user
$description = findDescriptionByPostID($pdo, $postId);
$link = findLinkByPostID($pdo, $postId);
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
  <?php
  if (isset($postId)) { ?>
    <p> <?php echo $postId ?> </p>
    <img class="post-img" src="./upload/<?php echo $postId .".". findFileExtensionByPostID($pdo, $postId); ?>" alt="FILL IN">
    <p> <?php echo  $username?> </p>
    <p> <?php echo  $title?> </p>
    <p> <?php echo  $description?> </p>
    <p> <?php echo  $link?> </p>

    </div>
    <?php } else { ?>
        <p> postId unset </p>
    <?php } ?>
  </body>
    

</html>
