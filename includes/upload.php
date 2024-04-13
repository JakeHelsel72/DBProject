<?php
if (isset($_POST['submit'])) 
{
    $file = $_FILES["image"];
    //print_r($file);
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
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = '../upload/' . $fileNameNew; // file directory for images
                move_uploaded_file($fileTempName, $fileDestination);
                header("Location: ../index.php?uploadsuccess");
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