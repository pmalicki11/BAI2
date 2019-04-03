<?php

  if (!isset($_GET["Action"]) || count(($_GET["Action"])) == 0) {
    echo "Action not set! Default action is adding. <br>";
    $_GET["Action"] = "add";
  }

  if (!getParameter("A") || !getParameter("B")) {
    die();
  }

  switch($_GET["Action"]) {
    case "add":
      echo add($_GET["A"], $_GET["B"]);
      break;
    case "substract":
      echo substract($_GET["A"], $_GET["B"]);
      break;
    case "multiply":
      echo substract($_GET["A"], $_GET["B"]);
      break;
    case "divide":
      echo substract($_GET["A"], $_GET["B"]);
      break;
  }

  function getParameter(string $name) {
    if (!isset($_GET[$name])) {
      echo "Parameter {$name} not set! Default value is 10 <br>";
      $_GET[$name] = 10;
    } else if (!is_numeric($_GET[$name])) {
      echo "Parameter {$name} must be numeric <br>";
      return false;
    }
    return $_GET[$name];
  }

  function add(float $a, float $b) : float {
    return $a + $b;
  }


  function substract(float $a, float $b) : float {
    return $a - $b;
  }


  function multiply(float $a, float $b) : float {
    return $a * $b;
  }


  function divide(float $a, float $b) : float {
    return $b == 0 ? 0 : $a / $b;
  }
