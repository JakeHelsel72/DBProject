<?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["pwd"];

    // Hash the password before storing it in the database
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        require_once("database.php");
        require_once("login_model.php");
        require_once("login_controller.php");

        // check to see if input is full
        $errors = [];

        if (is_input_empty($username, $password)){
            $errors["empty_input"] = "Ensure all fields are filled in.";
        }

        $result = get_user($pdo, $username);
        //print_r();
        if (is_username_wrong($result)){
            $errors["login_incorrect"] = "Incorrect login information.";
        }
        if (!is_username_wrong($result) and is_password_wrong($password, $result['Password'])){
            $errors["login_incorrect"] = "Incorrect login information.";
        }
        require_once("config_session.php");

        if ($errors){
            $_SESSION["errors_signup"] = $errors;
            header("Location: ../index.php");
            die();
        }

        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result["UserID"];
        session_id($sessionId);

        $_SESSION["user_id"] = $result["UserID"];
        $_SESSION["user_username"] = htmlspecialchars($result["Username"]); // sanitize input for XSS
        $_SESSION["last_regen"] = time(); 
        //print_r($result);
        header("Location: ../index.php?login=success");
        $pdo = null;
        $stmt = null;

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    exit();
}
?>