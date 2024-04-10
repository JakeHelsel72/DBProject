<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HTML 5 Boilerplate</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
	<?php
        $dsn = "mysql:host=localhost;dbname=onlineexperience";
        $dbusername = "root";
        $dbpass = "";
        try {
          $pdo = new PDO($dsn, $dbusername, $dbpass); // login with pdo object
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // when we get an error, throw this as an exception
        } catch (Exception $e) {
          echo "Connection to Database failed: ". $e->getMessage(); //throw error message
        }

    ?>
  </body>
</html>