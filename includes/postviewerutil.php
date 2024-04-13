<?php
declare(strict_types = 1);

function findFileExtensionByPostID(object $pdo, int $postId){
    $query = "SELECT FileExt FROM post WHERE PostID = :postid;";
    $stmt = $pdo->prepare($query); // prevent sql injection
    $stmt->bindParam(":postid", $postId);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}