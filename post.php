<?php
require_once("includes/config_session.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Experiences</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <form action = "includes/upload.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Post Title"> <br>
        <input type="text" name="description" placeholder="Description"> <br>
        <input type="text" name="link" placeholder="Relevant Link"> <br>
        <input type="file" name="image"> <br>
        <button type="submit" name="submit">UPLOAD</button>
  </body>
</html>