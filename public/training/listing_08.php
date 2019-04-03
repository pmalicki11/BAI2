<?php
  if (!isset($_GET["liczba"])) {
    echo 'Zmienna "liczba" nie istnieje!';
	die();
  } elseif (!is_numeric($_GET["liczba"])) {
    echo 'Zmienna "liczba" nie jest liczbą';
	die();
  } elseif ( $_GET["liczba"] > 100) {
	echo Zmienna "liczba" jest większa lub równa 100';
	die();
  } else {
	$l = $_GET["liczba"];
	for ($l; $l <= 100; $l++) {
      echo "Iteracja for [{$l}]<br>";
	}
	echo "<br>";
	
	$l = $_GET["liczba"];
	do {
	  echo "Iteracja do [{$l}]<br>";
	  $l++;
	} while ($l <= 100);
	echo "<br>";
	
    $l = $_GET["liczba"];
	while ($l <= 100) {
	  echo "Iteracja while [{$l}]<br>";
	  $l++;
	}
  }
  die();