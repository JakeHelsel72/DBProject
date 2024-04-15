<!DOCTYPE html>
<html lang="en">
<?php
require_once("includes/database.php");
require_once("includes/config_session.php");
require_once("includes/postviewerutil.php");
?>
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
            <?php
            // Assuming you have a database connection named $pdo

            // Query to fetch all rows from the `post` table
            $query = "SELECT * FROM post";
            $stmt = $pdo->query($query);

            // Fetch all rows as an associative array
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Output the HTML structure for each post
            foreach ($results as $row) {
                //$playerNum = $row['player_count'];
                $imageSrc = './upload/' . $row['PostID'] . "." . $row['FileExt']; // Assuming image_filename column contains the filename
                // Output the HTML structure for each post
                ?>
                <div class="feature-card">
                    <img class="card-img" src="<?php echo $imageSrc; ?>" alt="post image">
                    <div class="card-info">
                        <h4 class="title-card"><?php echo htmlspecialchars($row['Title']); ?></h4>
                        <div class="player_num">Player(s): 1 </div>
                        <!-- <div class="player_num">Player: <?php echo $playerNum; ?></div> -->
                        <div class="weblink">
                        <a href="<?php echo fix_link($row['Link']); ?>" class="webanchor">Link to game</a>
                        </div>
                        <div class="weblink">
                            <a href="<?php echo "postviewer.php?postId={$row['PostID']}" ?>" class="webanchor">View Experience</a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>

</body>
</html>
