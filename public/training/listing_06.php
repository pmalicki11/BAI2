<?php
  $kot = "filemon";
  $kot .= " jest niebieski";
  $wiek = 0;
  $wiek = ($wiek + 10) * 2;
  $wiekS = (string)$wiek;
  $kot .= " i ma {$wiekS} lat.";
  
  $kot[0] = 'F';
  echo $kot;
  echo "</br>";
  //echo ucfirst($kot);
  
  //google toilet on youtube
  
  echo "Witaj " . $_GET["fName"] . " " . $_GET["lName"] . "!";