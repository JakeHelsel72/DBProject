<?php
      $dsn = "mysql:host=localhost;dbname=onlineexperiences";
      $dbusername = "root";
      $dbpass = "";
      $host = "localhost";

      try {
        $pdo = new PDO($dsn, $dbusername, $dbpass); // login with pdo object
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // when we get an error, throw this as an exception
      } catch (Exception $e) {
        echo "Connection to Database failed: ". $e->getMessage(); //throw error message
      }

  ?>
