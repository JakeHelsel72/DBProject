<?php
declare(strict_types = 1);

function getUsernameByUID(object $pdo, int $userId): ?string {
    $query = "
        SELECT Username
        FROM users
        WHERE UserID = :UID;
    ";

    $stmt = $pdo->prepare($query); // Prevent SQL injection
    $stmt->bindParam(":UID", $userId);
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

function followed(object $pdo, int $currentUserId, int $otherUserId){
    // Check if the userId pair already exists in the 'following' table
    $query = "SELECT FollowingUID FROM followers WHERE FollowingUID = :CUID AND FollowedUID = :OUID";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':CUID', $currentUserId, PDO::PARAM_INT);
    $stmt->bindParam(':OUID', $otherUserId, PDO::PARAM_INT);
    $stmt->execute();

    // Fetch the result
    $existingFollow = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return ($existingFollow) ? true : false;
}
