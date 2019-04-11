<?php

  session_start();
  require_once('config.php');
  require_once('User.php');

  $activationCodePresent = false;
  $emailPresent = false;

  if(isset($_POST['activationCode']) && !empty($_POST['activationCode'])) {
    $activationCode = $_POST['activationCode'];
    $activationCodePresent = true;
  }
  if(isset($_POST['email']) && !empty($_POST['email'])) {
    $email = $_POST['email'];
    $emailPresent = true;
  }

  if($activationCodePresent && $emailPresent) {
    $user = new User();
    if($user->loadUser($email)) {
      if($user->activationCode() == $activationCode) {
        if($user->activateUser()) {
          echo "Codes matched";
          echo '<br><a href="loginForm.php">Login</a>';
        }
      } else {
        echo "Wrong activation link.";
      }
    } else {
      echo "User does not exists.";
    }
  }
