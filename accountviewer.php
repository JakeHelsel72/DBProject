<?php
require_once("includes/database.php");
require_once("includes/config_session.php");
require_once("includes/postviewerutil.php");
$userId = $_GET['userId'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $teststr ?></title>
    <link rel="stylesheet" href="post.css">
  </head>
  <body>
  <?php
        if $_SESSION["user_id"] == )
    ?>
  <?php
  if (isset($postId)) { ?>
    <p> <?php echo $postId ?><?php ?> </p>
    <img class="post-img" src="./upload/<?php echo $postId .".". findFileExtensionByPostID($pdo, $postId); ?>" alt="FILL IN">
    <p> <?php echo findTitleByPostID($pdo, $postId); ?><?php ?> </p>
    <p> <?php echo findUsernameByPostID($pdo, $postId); ?><?php ?> </p>
    <p> <?php echo findDescriptionByPostID($pdo, $postId); ?><?php ?> </p>
    <p> <?php echo findLinkByPostID($pdo, $postId); ?><?php ?> </p>

    </div>
    <?php } else { ?>
        <p> postId unset </p>
    <?php } ?>
  </body>
    

</html>
