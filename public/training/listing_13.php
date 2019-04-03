<?php
  function testAction(string $param, $callback) {
    return $callback($param);
  }

  $x = function($arg) {
    return $arg;
  };

  echo testAction("Test echo", $x);
