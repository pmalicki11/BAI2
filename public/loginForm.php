<?php
  session_start();
  if(isset($_SESSION['auth']) && ($_SESSION['auth']) == 1) {
    header('Location: index.php');
    die();
  }
?>

<html>
  <head>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <title>Login</title>
  </head>
  <body>
    <p>Login</p>
    <form method="post" action=loginAction.php>
      <table>
        <tr><td>Email</td><td><input type="email" name="email"></td></tr>
        <tr><td>Password</td><td><input type="password" name="password"></tr><tr>
        <tr><td><input type="submit" value="Submit"></td></tr>
      </table>
    </form>
    <br><a href="registerForm.php">Register</a>
  </body>
</html>
