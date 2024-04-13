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
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
  <h1>Click the link below to go to experience.php</h1>

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
  <a href="<?php echo $url; ?>">Go to experience.php</a>
    
  </body>
</html>