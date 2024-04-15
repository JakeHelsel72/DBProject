<?php
require_once("includes/database.php");
// Check if the form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve userId and postId from POST data
    $userId = isset($_POST['userId']) ? $_POST['userId'] : null;
    $postId = isset($_POST['postId']) ? $_POST['postId'] : null;

    // Check if both userId and postId are valid
    if ($userId !== null && $postId !== null) {
        // Perform your logic here using $userId and $postId
        // Example: Insert data into database table 'likes'
        // Replace this with your specific logic
        // Assuming you have a database connection $pdo
        $query = "INSERT INTO likes (UID, PID) VALUES (:userId, :postId)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':postId', $postId, PDO::PARAM_INT);
        $stmt->execute();
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
