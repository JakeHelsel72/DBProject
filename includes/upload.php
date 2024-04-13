<?php
if (isset($_POST['submit'])) 
{
    require_once("database.php"); // get pdo
    require_once("config_session.php"); // get session data
    //grab form stuff
    $title = $_POST['title'];
    $description = $_POST['description'];
    $link = $_POST['link'];
    $file = $_FILES["image"];
    //print_r($file); // debug line
    // file attributes for error checking (do we want to keep the file)
    $fileName = $_FILES["image"]['name'];
    $fileTempName = $_FILES["image"]['tmp_name'];
    $fileSize = $_FILES["image"]['size'];
    $fileError = $_FILES["image"]['error'];
    $fileType = $_FILES["image"]['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt= strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError == 0) {
            if ($fileSize < 500000) // file less than 500mB
            { 
                // Insert post data into database
                $query = "INSERT INTO post (UID, Title, Description, Link) VALUES (:userid, :title, :description, :link)";
                $stmt = $pdo->prepare($query);
                $stmt->bindParam(':userid', $_SESSION['user_id']);
                $stmt->bindParam(':title', $title);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':link', $link);
                $stmt->execute();

                // Get the auto-incremented post ID
                $postId = $pdo->lastInsertId();

                // Rename and move uploaded file to destination directory
                $fileNameNew = $postId . '.' . $fileActualExt; //'postid.fileextension'
                $fileDestination = '../upload/' . $fileNameNew; 
                move_uploaded_file($fileTempName, $fileDestination);// place ^ into upload folder

                // Redirect with success message
                header("Location: ../index.php?uploadsuccess");
                exit();
            } else {
                echo "File over 500mB";
            }
        } else {
            echo "There was an error uploading your file";
        }
    } else {
        echo "You cannot upload files of this type.";
    }
}