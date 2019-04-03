<?php
  require_once('config.php');
  require_once('User.php');
  session_start();
  if(isset($_SESSION['auth']) && ($_SESSION['auth']) == 1) {
    header('Location: index.php');
  }
  $emailPresent = false;
  $passwordPresent = false;

  if(isset($_POST["email"]) && !empty($_POST["email"])) {
    $email = $_POST["email"];
    $emailPresent = true;
  }
  if(isset($_POST["password"]) && !empty($_POST["password"])) {
    $password = $_POST["password"];
    $passwordPresent = true;
  }

  if($emailPresent && $passwordPresent) {
    $user = new User();
    if($user->loadUserData($email)) {
      if ($user->checkPassword($password)) {
        $_SESSION['auth'] = 1;
        $_SESSION['user'] = $user;
        header('Location: index.php');
      } else {
        header('Location: loginForm.php'); //wrong password
      }
    } else {
      header('Location: loginForm.php'); //not existing user
    }
  } else {
    echo "Missing data!";
  }
