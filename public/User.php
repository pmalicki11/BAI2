<?php
  //require_once('FileData.php');
  require_once('EmailSender.php');
  require_once('DBWrapper.php');

  class User {

    protected $data;
    private $DB;

    public function __construct() {
       $this->DB = DBWrapper::getInstance();
    }

    public function populate($firstName, $lastName, $email, $password) {
      $this->data = ['firstName' => $firstName,
      'lastName' => $lastName,
      'email' => $email,
      'password' => sha1($password),
      'is_active' => 0];
    }

    public function saveUser() {
      $userData = [
        'firstName' => $this->data['firstName'],
        'lastName' => $this->data['lastName'],
        'email' => $this->data['email'],
        'password' => $this->data['password'],
        'is_active' => $this->data['is_active']
      ];

      $this->DB->insert('users', $userData);
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

    public function notifyOnEmail($notification) {
      $mail = new EmailSender(false);
      $mail->sendEmail($this->data['email'], "Dear {$this->data['firstName']} {$this->data['lastName']}", $notification);
    }
  }
