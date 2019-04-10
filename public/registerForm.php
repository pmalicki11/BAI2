<?php
  session_start();
  if(isset($_SESSION['information']) && $_SESSION['information'] != '') {
    echo $_SESSION['information'];
    $_SESSION['information'] = '';
  }
?>

<html>
  <head>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <title>Register</title>
  </head>
  <body>
    <p>Register</p>
    <form method="post" action=registerAction.php>
      <table>
        <tr><td>First name</td><td><input type="text" name="firstName"></td></tr>
        <tr><td>Last name</td><td><input type="text" name="lastName"></td></tr>
        <tr><td>Email</td><td><input type="email" name="email"></td></tr>
        <tr><td>Password</td><td><input type="password" name="password"></tr><tr>
        <tr><td>Repeat password</td><td><input type="password" name="rePassword"></tr><tr>
        <tr><td><input type="submit" value="Submit"></td><td><input type="reset" value="Reset"></td></tr>
      </table>
    </form>
  </body>
</html>
