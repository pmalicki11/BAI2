<?php
  session_start();
  if(isset($_GET['activationCode']) && !empty($_GET['activationCode'])) {
    $activationCode = $_GET['activationCode'];
  } else {
    echo 'No activation code!';
    die();
  }
?>

<html>
  <head>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <title>Activate account</title>
  </head>
  <body>
    <p>Activate account</p>
    <form method="post" action=activateAction.php>
      <table>
        <tr><td><input type="text" name="activationCode" value="<?=$activationCode?>" hidden></td></tr>
        <tr><td>Email</td><td><input type="email" name="email"></td></tr>
        <tr><td><input type="submit" value="Submit"></td></tr>
      </table>
    </form>
  </body>
</html>
