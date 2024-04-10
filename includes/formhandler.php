<?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["pwd"];

    // Hash the password before storing it in the database
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        require_once("database.php");
        $query = "INSERT INTO users (Username, Password) VALUES (:username, :password)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $hashedPassword); // Store hashed password
        $stmt->execute();

        // Optional: You may want to handle successful registration differently
        if ($stmt->rowCount() > 0) {
            // Registration successful
            header("Location: ../index.php?registration=success");
            exit();
        } else {
            // Registration failed
            header("Location: ../index.php?registration=failed");
            exit();
        }
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    exit();
}
?>
