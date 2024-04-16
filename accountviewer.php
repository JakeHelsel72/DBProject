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

            xhr.open('POST', 'follow.php', true);

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
              <a href="index.php" class="link btn">
                <?php echo $_SESSION["user_username"];  ?>
              </a>
            <?php } ?>
        </ul>
    </nav>
  <?php
  if (isset($userId)) { ?>
    <div class="main">
            <form id="likeForm" action="follow.php" method="POST">
                <input type="hidden" name="followingUserId" value="<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; ?>">
                <input type="hidden" name="followedUserId" value="<?php echo isset($userId) ? $userId : ''; ?>">
                <i  id="likeButton" onclick="submitLikeForm(); toggleLike()" class="fa-regular fa-heart"></i>
            </form>
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
                    <div class="feature-card" onclick="redirectToLink('<?php echo "postviewer.php?postId={$row['PostID']}" ?>')">
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
                    <div class="feature-card" onclick="redirectToLink('<?php echo "postviewer.php?postId={$row['PostID']}" ?>')">
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
