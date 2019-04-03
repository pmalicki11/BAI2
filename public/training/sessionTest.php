<?php
  session_start();
  $_SESSION["Username"] = "Pawel";
  $_SESSION["Role"] = "Admin";
  file_put_contents("sess.txt", session_encode());



  var_dump($_SESSION);
