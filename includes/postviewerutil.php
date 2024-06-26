<?php
declare(strict_types = 1);

function findFileExtensionByPostID(object $pdo, int $postId): ?string {
    $query = "SELECT FileExt FROM post WHERE PostID = :postid;";
    $stmt = $pdo->prepare($query); // Prevent SQL injection
    $stmt->bindParam(":postid", $postId);
    $stmt->execute();

    // Fetch the result as an associative array
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if a result was found
    if ($result !== false && isset($result['FileExt'])) {
        // Extract and return the file extension value
        return $result['FileExt'];
    } else {
        // Return null if no result or invalid result
        return null;
    }
}

function findTitleByPostID(object $pdo, int $postId): ?string {
    $query = "SELECT Title FROM post WHERE PostID = :postid;";
    $stmt = $pdo->prepare($query); // Prevent SQL injection
    $stmt->bindParam(":postid", $postId);
    $stmt->execute();

    // Fetch the result as an associative array
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if a result was found
    if ($result !== false && isset($result['Title'])) {
        // Extract and return the file extension value
        return $result['Title'];
    } else {
        // Return null if no result or invalid result
        return null;
    }
}

function findDescriptionByPostID(object $pdo, int $postId): ?string {
    $query = "SELECT Description FROM post WHERE PostID = :postid;";
    $stmt = $pdo->prepare($query); // Prevent SQL injection
    $stmt->bindParam(":postid", $postId);
    $stmt->execute();

    // Fetch the result as an associative array
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if a result was found
    if ($result !== false && isset($result['Description'])) {
        // Extract and return the file extension value
        return $result['Description'];
    } else {
        // Return null if no result or invalid result
        return null;
    }
}
function findLinkByPostID(object $pdo, int $postId): ?string {
    $query = "SELECT Link FROM post WHERE PostID = :postid;";
    $stmt = $pdo->prepare($query); // Prevent SQL injection
    $stmt->bindParam(":postid", $postId);
    $stmt->execute();

    // Fetch the result as an associative array
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if a result was found
    if ($result !== false && isset($result['Link'])) {
        // Extract and return the file extension value
        return $result['Link'];
    } else {
        // Return null if no result or invalid result
        return null;
    }
}
function findUIDByPostID(object $pdo, int $postId): ?int {
    $query = "SELECT UID FROM post WHERE PostID = :postid;";
    $stmt = $pdo->prepare($query); // Prevent SQL injection
    $stmt->bindParam(":postid", $postId);
    $stmt->execute();

    // Fetch the result as an associative array
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if a result was found
    if ($result !== false && isset($result['UID'])) {
        // Extract and return the file extension value
        return $result['UID'];
    } else {
        // Return null if no result or invalid result
        return null;
    }
}

function findUsernameByPostID(object $pdo, int $postId): ?string {
    $query = "
        SELECT u.Username
        FROM post p
        INNER JOIN users u ON p.UID = u.UserID
        WHERE p.PostID = :postid;
    ";

    $stmt = $pdo->prepare($query); // Prevent SQL injection
    $stmt->bindParam(":postid", $postId);
    $stmt->execute();

    // Fetch the result as an associative array
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if a result was found
    if ($result !== false && isset($result['Username'])) {
        // Extract and return the Username
        return $result['Username'];
    } else {
        // Return null if no result or invalid result
        return null;
    }
}

function output_username() {
    if (isset($_SESSION["user_id"])){
        return $_SESSION["user_username"];
    } else {
        return "not logged in";
    }
}

function fix_link(string $link) {
    // Check if $link is an external URL or a relative path
    if (strpos($link, 'http://') === 0 || strpos($link, 'https://') === 0) {
        // $link is already a full URL, use it directly
        $finalLink = $link;
        return $finalLink;
    } else {
        // $link is a relative path, prepend http:// to make it a valid URL
        $finalLink = "http://$link";
        return $finalLink;
    }
}

function liked(object $pdo, int $postId, int $userId){
    // Check if the userId postId pair already exists in the 'likes' table
    $query = "SELECT * FROM likes WHERE UID = :UID AND PID = :PID";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':UID', $userId, PDO::PARAM_INT);
    $stmt->bindParam(':PID', $postId, PDO::PARAM_INT);
    $stmt->execute();

    // Fetch the result
    $existingLike = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return ($existingLike) ? true : false;
}