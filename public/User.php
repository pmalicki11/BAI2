<?php
  require_once('FileData.php');
  class User extends FileData {

    public function populate($firstName, $lastName, $email, $password) {
      $this->data = ['firstName' => $firstName,
      'lastName' => $lastName,
      'email' => $email,
      'password' => $password];

      $this->file = md5($email);
      $this->path = 'data';
    }

    public function loadUserData($email) {
      $this->file = md5($email);
      $this->path = 'data';
      if($this->load()) {
        return true;
      }
      return false;
    }

    public function checkPassword($password) {
      if($this->data && $this->data['password'] == $password) {
        return true;
      }
      return false;
    }

    public function showFullName() {
      if($this->data) {
        return $this->data['firstName'] . ' ' . $this->data['lastName'];
      }
      return false;
    }
  }
