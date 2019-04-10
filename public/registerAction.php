<?php
  session_start();
  require_once('config.php');
  require_once('User.php');
  $firstNameOk = false;
  $lastNameOk = false;
  $emailOk = false;
  $passwordOk = false;

  if(isset($_POST["firstName"]) && !empty($_POST["firstName"])) {
    $firstName = $_POST["firstName"];
    $firstNameOk = true;
  }
  if(isset($_POST["lastName"]) && !empty($_POST["lastName"])) {
    $lastName = $_POST["lastName"];
    $lastNameOk = true;
  }
  if(isset($_POST["email"]) && !empty($_POST["email"])) {
    $email = $_POST["email"];
    $emailOk = true;
  }
  if(isset($_POST["password"]) && !empty($_POST["password"])) {
    $password = $_POST["password"];
    $passwordOk = true;
  }

  if($firstNameOk && $lastNameOk && $emailOk && $passwordOk) {
    $user = new User();
    $user->populate($firstName, $lastName, $email, $password);
    if($user->addUser()) {
      header('Location: index.php');
    } else {
      $_SESSION['information'] = 'User already exists!';
      header('Location: registerForm.php');
    }
  } else {
    echo "Missing data!";
  }
