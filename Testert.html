<?php
require_once("includes/database.php");
require_once("includes/config_session.php");
$_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; // return url for if someone signs in, they can come back to this page
require_once("includes/accountviewerutil.php");
$userId = $_GET['userId'];
$username = getUsernameByUID($pdo, $userId);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $username ?>'s Profile</title>
    <link rel="stylesheet" href="acountviewer.css">
    <script src="https://kit.fontawesome.com/6443be5758.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <nav class="row">
        <img src="./WebDisplay/Assests/Logo.png" class="logo_img" alt="">
        <ul class="nav_links">
            <li class="link link__hover-effect">Experience</li>
            <li class="link link__hover-effect">Favorite</li>

            <a href="index.php" class="link btn">
                Sign In
            </a>
        </ul>
    </nav>
  <?php
  if (isset($userId)) { ?>
    <div class="main">
        <div class="feature">
            <h1 class="title feature-title"><?php echo $username ?>'s posts</h1>
            <div class="feature-lists">
                <?php
                // Assuming you have a database connection named $pdo
    
                // Query to fetch all user's posts
                $query = "SELECT * FROM post WHERE UID = :UID";
                $stmt = $pdo->prepare($query); // Prevent SQL injection
                $stmt->bindParam(":UID", $userId);
                $stmt->execute();
    
                // Fetch all rows as an associative array
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
                // Output the HTML structure for each post
                foreach ($results as $row) {
                    //$playerNum = $row['player_count'];
                    $imageSrc = './upload/' . $row['PostID'] . "." . $row['FileExt']; // Assuming image_filename column contains the filename
                    // Output the HTML structure for each post
                    ?>
                    <div class="feature-card">
                        <figure class="img-wrapper">
                            <img class="card-img" src="<?php echo $imageSrc; ?>" alt="post image">
                        </figure>
                        <div class="card-info">
                            <h4 class="title-card"><?php echo htmlspecialchars($row['Title']); ?></h4>
                            <div class="player_num">Player(s): 1 </div>
                            <!-- <div class="player_num">Player: <?php echo $playerNum; ?></div> -->
                            <div class="weblink">
                            <a href="<?php echo fix_link($row['Link']); ?>" class="webanchor">Link to game</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="feature">
            <h1 class="title feature-title"><?php echo $username ?>'s likes</h1>
            <div class="feature-lists">
                <?php
                // Assuming you have a database connection named $pdo
    
                // Query to fetch all user's posts
                $query = "SELECT DISTINCT PostID, FileExt, Title, Link FROM post p JOIN likes l WHERE l.UID = :UID";
                $stmt = $pdo->prepare($query); // Prevent SQL injection
                $stmt->bindParam(":UID", $userId);
                $stmt->execute();
    
                // Fetch all rows as an associative array
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
                // Output the HTML structure for each post
                foreach ($results as $row) {
                    //$playerNum = $row['player_count'];
                    $imageSrc = './upload/' . $row['PostID'] . "." . $row['FileExt']; // Assuming image_filename column contains the filename
                    // Output the HTML structure for each post
                    ?>
                    <div class="feature-card">
                        <figure class="img-wrapper">
                            <img class="card-img" src="<?php echo $imageSrc; ?>" alt="post image">
                        </figure>
                        <div class="card-info">
                            <h4 class="title-card"><?php echo htmlspecialchars($row['Title']); ?></h4>
                            <div class="player_num">Player(s): 1 </div>
                            <!-- <div class="player_num">Player: <?php echo $playerNum; ?></div> -->
                            <div class="weblink">
                            <a href="<?php echo fix_link($row['Link']); ?>" class="webanchor">Link to game</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php } else { ?>
        <p> userId not set </p>
    <?php } ?>
  </body>
    

</html>
