<?php

  if(!file_exists("store.txt")) {
    echo "File not exists";
    die();
  }

  $storeFile = file("store.txt");
  showStore($storeFile);

  $changePercent = 10;


  if (!($newStore = changePrices($storeFile, $changePercent))) {
    echo "Discount is 100% or more!";
    die();
  }

  showStore($newStore);

  $newFile = 'Store_' . $changePercent . '_PercentPriceChange.txt';

  if(file_exists($newFile)) {
    echo "File {$newFile} already exists";
  } else {
    file_put_contents($newFile, $newStore);
  }




  function showStore($store) {
    echo "<table>";
    echo "<tr><td><b>Name</b></td><td><b>Price</b></td><td><b>Amount</b></td></tr>";
    foreach ($store as $value) {
      $line = explode(',', $value);
      $name = $line[0];
      $amount = (int)$line[1];
      $price = round(((float)$line[2] + (float)$line[2] * ((float)$line[3] / 100)), 2);
      echo "<tr>";
      echo "<td><b>{$name}</b></td>";
      echo "<td>{$price}</td>";
      echo "<td>{$amount}</td>";
      echo "</tr>";
    }
    echo "</table>";
  }


  function changePrices($store, $changePercent) {
    if($changePercent <= -100) {
      return null ;
    }
    $newStore = [];
    foreach ($store as $value) {
      $line = explode(',', $value);
      $name = $line[0];
      $amount = $line[1];
      $newPrice = round(((float)$line[2] + (float)$line[2] * ($changePercent / 100)), 2);
      $tax = $line[3];
      $newLine = [$name, $amount, $newPrice, $tax];
      array_push($newStore, implode(',', $newLine));
    }
    return $newStore;
  }
