<?php
  if (!isset($_GET["liczba"])) {
    echo 'Zmienna "liczba" nie istnieje!';
  } elseif (!is_numeric($_GET["liczba"])) {
    echo 'Zmienna "liczba" nie jest liczbą';
  } else {
    if ($_GET["liczba"] == 10) {
	  echo 'Zmienna "liczba" jest równa 10';
	} elseif ($_GET["liczba"] < 10) {
      echo 'Zmienna "liczba" jest mniejsza od 10';
	} else {
      echo 'Zmienna "liczba" jest większa od 10';
	}
  }