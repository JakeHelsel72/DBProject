<?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["pwd"];

    // Hash the password before storing it in the database
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        require_once("database.php");
        require_once("signup_model.php");
        require_once("signup_controller.php");

        // check to see if input is full
        $errors = [];

        if (is_input_empty($username, $password)){
            $errors["empty_input"] = "Ensure all fields are filled in.";
        }
        if (is_username_taken($pdo, $username)){
            $errors["username_taken"] = "Username taken.";
        }
        require_once("config_session.php");

        if ($errors){
            $_SESSION["errors_signup"] = $errors;
            header("Location: ../index.php");
            die();
        }

        $query = "INSERT INTO users (Username, Password) VALUES (:username, :password)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $hashedPassword); // Store hashed password
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Registration successful
            //get user info and login
            $result = get_user($pdo, $username);
            $newSessionId = session_create_id();
            $sessionId = $newSessionId . "_" . $result["UserID"];
            session_id($sessionId);
    
            $_SESSION["user_id"] = $result["UserID"];
            $_SESSION["user_username"] = htmlspecialchars($result["Username"]); // sanitize input for XSS
            $_SESSION["last_regen"] = time(); 
            $redirect_url = $_SESSION['redirect_url'];
            header("Location: $redirect_url");
            $pdo = null;
            $stmt = null;
            die();
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
