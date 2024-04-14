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



