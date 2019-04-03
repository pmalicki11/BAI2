<?php
  session_start();

  session_decode(file_get_contents("sess.txt"));

  var_dump($_SESSION);
