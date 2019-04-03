<?php

  $tab = [];

  for ($i = 0; $i <= 5; $i++) {
    $tab[$i] = "item {$i}";
  }
  var_dump($tab);
  array_shift($tab);
  var_dump($tab);
