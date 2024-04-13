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
    <link rel="stylesheet" href="post.css">
  </head>
  <body>
    <nav class="row">
        <img src="./WebDisplay/Assests/Logo.png" class="logo_img" alt="">
        <ul class="nav_links">
            <li class="link">Your Experience</li>
            <li class="link">Favorite</li>
            <li class="link">UserName</li>
        </ul>
    </nav>
    <div class="main">
        <img class="post-img" src="./WebDisplay/Assests/Post.png" alt="Image by vectorjuice on Freepik">
        <div class="upload">
            <h1 class="title">Upload your own experiences!</h1>
            <form action = "includes/upload.php" method="POST" enctype="multipart/form-data">
                <input class="input" type="text" name="title" placeholder="Post Title"> <br>
                <input class="input" type="text" name="description" placeholder="Description"> <br>
                <input class="input" type="text" name="link" placeholder="Relevant Link"> <br>
                <input class="input" type="file" name="image"> <br>
                <button type="submit" name="submit">UPLOAD</button>
            </form>
        </div>

    </div>
    <div class="post-list">

    </div>
  </body>
</html>
