<?php

  abstract class FileData {

    protected $data;
    protected $path;
    protected $file;

    public function load() {
      if(!file_exists($this->path . DS . $this->file)) {
        return false;
      }
      if (!$this->data) {
        $this->data = unserialize(file_get_contents($this->path . DS . $this->file));
      }
      return $this->data;
    }

    public function save() {
      $serialized = serialize($this->data);
      if(!file_exists($this->path . DS)) {
        echo "Folder data does not exist and will be created.";
        mkdir($this->path);
      }
      $fullFileName = $this->path . DS . $this->file;
      if(file_exists($fullFileName)) {
        echo 'File ' . $this->file . ' already exists and will be overwrited.';
      }
      file_put_contents($fullFileName, $serialized);
      echo "Saved!";
    }
  }
