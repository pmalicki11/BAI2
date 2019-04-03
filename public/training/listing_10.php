<?php
  if (!isset($_GET["search"])) {
    echo 'Parametr "search" does not exist!';
	die();
  }
  
  $s = $_GET["search"];
  
  if (strlen($s) != 1) {
    echo 'Parameter "search" must contain one character!';
	die();
  }
  
  $string = "Jakś przykładowy tekst";
  echo $string . "<br>";
  
  if (!($i = strpos($string, $s))) {
    echo "There is no \"{$s}\" character!";
	die();
  }
  
  echo "Character \"{$s}\" is on position [{$i}].";
  