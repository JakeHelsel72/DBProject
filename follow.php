<?php
require_once("includes/database.php");
// Check if the form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve followingUserId and followedUserId from POST data
    $followingUserId = isset($_POST['followingUserId']) ? $_POST['followingUserId'] : null;
    $followedUserId = isset($_POST['followedUserId']) ? $_POST['followedUserId'] : null;
    print_r($_POST);
    // Check if both followingUserId and followedUserId are valid
    if ($followingUserId !== null && $followedUserId !== null) {
        // Check if the (UID, PID) pair already exists in the 'likes' table
        $query = "SELECT FollowingUID FROM followers WHERE FollowingUID = :followingUserId AND FollowedUID = :followedUserId";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':followingUserId', $followingUserId, PDO::PARAM_INT);
        $stmt->bindParam(':followedUserId', $followedUserId, PDO::PARAM_INT);
        $stmt->execute();

        // Fetch the result
        $existingLike = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$existingLike) {
            $query = "INSERT INTO followers (FollowingUID, FollowedUID) 
                    SELECT :followingUserId, :followedUserId 
                    WHERE NOT EXISTS (
                        SELECT 1 FROM followers 
                        WHERE FollowingUID = :followingUserId AND FollowedUID = :followedUserId
                    )";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':followingUserId', $followingUserId, PDO::PARAM_INT);
            $stmt->bindParam(':followedUserId', $followedUserId, PDO::PARAM_INT);
            $stmt->execute();
            echo "added";
        } else {
            $deleteQuery = "DELETE FROM followers WHERE FollowingUID = :followingUserId AND FollowedUID = :followedUserId";
            $deleteStmt = $pdo->prepare($deleteQuery);
            $deleteStmt->bindParam(':followingUserId', $followingUserId, PDO::PARAM_INT);
            $deleteStmt->bindParam(':followedUserId', $followedUserId, PDO::PARAM_INT);
            $deleteStmt->execute();
            echo "deleted";
        }
    } else {
        // Return an error response if userId or followedUserId is missing
        http_response_code(400); // Bad request
        echo "Invalid userId or followedUserId";
    }
} else {
    // Return an error response if the request method is not POST
    http_response_code(405); // Method Not Allowed
    echo "Method not allowed";
}
?>
