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
  <?php
  if (isset($postId)) { ?>
    <p> <?php echo $postId ?> </p>
    <img class="post-img" src="./upload/<?php echo $postId .".". findFileExtensionByPostID($pdo, $postId); ?>" alt="FILL IN">
    <p> <?php echo  $username?> </p>
    <p> <?php echo  $title?> </p>
    <p> <?php echo  $description?> </p>
    <a href="<?php echo $finalLink; ?>"><?php echo $link; ?></a>


    </div>
    <?php } else { ?>
        <p> postId unset </p>
    <?php } ?>
  </body>
    

</html>
