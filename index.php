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
    <h3>Signup</h3>
    <form action="includes/formhandler.php" method="post">
      <input type="text" name="username" placeholder="Username"> <br>
      <input type="password" name="pwd" placeholder="Password"> <br>
      <!-- prolly don't need an email but we could add it later -->
      <!-- <input type="text" name="email" placeholder="E-mail"> -->
      <button>Signup</button>
  </body>
</html>