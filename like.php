<?php
require_once("includes/database.php");
// Check if the form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve userId and postId from POST data
    $userId = isset($_POST['userId']) ? $_POST['userId'] : null;
    $postId = isset($_POST['postId']) ? $_POST['postId'] : null;

    // Check if both userId and postId are valid
    if ($userId !== null && $postId !== null) {
        // Check if the (UID, PID) pair already exists in the 'likes' table
        $query = "SELECT UID FROM likes WHERE UID = :userId AND PID = :postId";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':postId', $postId, PDO::PARAM_INT);
        $stmt->execute();

        // Fetch the result
        $existingLike = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$existingLike) {
            $query = "INSERT INTO likes (UID, PID) 
                    SELECT :userId, :postId 
                    WHERE NOT EXISTS (
                        SELECT 1 FROM likes 
                        WHERE UID = :userId AND PID = :postId
                    )";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
            $stmt->bindParam(':postId', $postId, PDO::PARAM_INT);
            $stmt->execute();
            echo "added";
        } else {
            $deleteQuery = "DELETE FROM likes WHERE UID = :userId AND PID = :postId";
            $deleteStmt = $pdo->prepare($deleteQuery);
            $deleteStmt->bindParam(':userId', $userId, PDO::PARAM_INT);
            $deleteStmt->bindParam(':postId', $postId, PDO::PARAM_INT);
            $deleteStmt->execute();
            echo "deleted";
        }
    } else {
        // Return an error response if userId or postId is missing
        http_response_code(400); // Bad request
        echo "Invalid userId or postId";
    }
} else {
    // Return an error response if the request method is not POST
    http_response_code(405); // Method Not Allowed
    echo "Method not allowed";
}
?>
