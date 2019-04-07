<?php

  require_once('config.php');
  require_once('User.php');
  session_start();

  if(isset($_SESSION['auth']) && ($_SESSION['auth']) == 1) {
    $user = $_SESSION['user'];
    echo 'Hello ' . $user->showFullName();
  } else {
    header('Location: loginForm.php');
    die();
  }
?>
<br><a href="logoutAction.php">Logout</a>
