<?php

  class DBWrapper {

    private static $instance = null;
    private $connection;

    public static function getInstance() {
      if(self::$instance == null) {
        self::$instance = new DBWrapper();
        self::$instance->connection = new mysqli('localhost', 'root', 'root', 'bai');
      }
      return self::$instance;
    }

    public function load() {

    }

    public function insert($table, $data) {
      $query = "insert into {$table} set";
      foreach($data as $key => $value) {
        $query = $query . " {$key}='{$value}',";
      }
      $query = rtrim($query,',');

$query = $this->connection->prepare("INSERT INTO user ()");

      if($this->connection->query($query) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $query . "<br>" . $this->connection->connect_error;
      }
    }
  }
