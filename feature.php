<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browser Blast</title>
    <link rel="stylesheet" href="feature.css">
    <script src="./script.js" defer></script>
</head>

<body>
    <nav class="row">
        <img src="./WebDisplay/Assests/Logo.png" class="logo_img" alt="">
        <ul class="nav_links">
            <li class="link link__hover-effect">
              <a href="feature.html">Experience</a>
            </li>
            <li class="link link__hover-effect">
              <a href="post.php">Upload Experience</a>
            </li>
            <li class="link link__hover-effect">Favorite</li>
            <?php if (!isset($_SESSION["user_id"])){ ?>
            <a href="index.php" class="link btn">
                Sign In
            </a>
            <?php } else { ?>
              <a href="accountviewer.php?uid=<?php echo $_SESSION["user_id"]?>" class="link btn">
                  <li><?php echo $_SESSION["user_username"];  ?></li>
              </a>
              <li class="link link__hover-effect"></li>
            <?php } ?>
        </ul>
    </nav>
    <div class="feature">
        <h1 class="title feature-title">Feature Experience</h1>
        <div class="feature-lists">
            <div class="feature-card">
                <img class="card-img" src="./upload/2.png" alt="">
                <div class="card-info">
                    <h4 class="title-card">Game name</h4>
                    <div class="player_num">Player: 2</div>
                    <div class="weblink">
                        <a href="#" class="webanchor" >Link to game</a>
                    </div>
                </div>
            </div>
            <div class="feature-card">
                <img class="card-img" src="./WebDisplay/Assests/Game2.png" alt="">
                <div class="card-info">
                    <h4 class="title-card">Game name</h4>
                    <div class="player_num">Player: 2</div>
                    <div class="weblink">
                        <a href="#" class="webanchor" >Link to game</a>
                    </div>
                </div>
            </div>
            <div class="feature-card">
                <img class="card-img" src="./WebDisplay/Assests/Game3.png" alt="">
                <div class="card-info">
                    <h4 class="title-card">Game name</h4>
                    <div class="player_num">Player: 2</div>
                    <div class="weblink">
                        <a href="#" class="webanchor" >Link to game</a>
                    </div>
                </div>
            </div>
            <div class="feature-card">
                <img class="card-img" src="./WebDisplay/Assests/Game4.png" alt="">
                <div class="card-info">
                    <h4 class="title-card">Game name</h4>
                    <div class="player_num">Player: 2</div>
                    <div class="weblink">
                        <a href="#" class="webanchor" >Link to game</a>
                    </div>
                </div>
            </div>
            <div class="feature-card">
                <img class="card-img" src="./WebDisplay/Assests/Game5.png" alt="">
                <div class="card-info">
                    <h4 class="title-card">Game name</h4>
                    <div class="player_num">Player: 3</div>
                    <div class="weblink">
                        <a href="#" class="webanchor" >Link to game</a>
                    </div>
                </div>
            </div>
            <div class="feature-card">
                <img class="card-img" src="./WebDisplay/Assests/Game6.png" alt="">
                <div class="card-info">
                    <h4 class="title-card">Game name</h4>
                    <div class="player_num">Player: solo</div>
                    <div class="weblink">
                        <a href="#" class="webanchor" >Link to game</a>
                    </div>
                </div>
            </div>
            <div class="feature-card">
                <img class="card-img" src="./WebDisplay/Assests/Game7.png" alt="">
                <div class="card-info">
                    <h4 class="title-card">Game name</h4>
                    <div class="player_num">Player:10</div>
                    <div class="weblink">
                        <a href="#" class="webanchor" >Link to game</a>
                    </div>
                </div>
            </div>
            <div class="feature-card">
                <img class="card-img" src="./WebDisplay/Assests/Game8.png" alt="">
                <div class="card-info">
                    <h4 class="title-card">Game name</h4>
                    <div class="player_num">Player: 4</div>
                    <div class="weblink">
                        <a href="#" class="webanchor" >Link to game</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
