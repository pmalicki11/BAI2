<?php
  //require_once('FileData.php');
  require_once('EmailSender.php');

  class User {

    protected $data;

    public function populate($firstName, $lastName, $email, $password) {
      $this->data = ['firstName' => $firstName,
      'lastName' => $lastName,
      'email' => $email,
      'password' => sha1($password),
      'isActive' => sha1(rand(0, 1000000000))];
    }

    public function addUser() {
      try {
        if($this->loadUser($this->data['email']) != false) {
          return false;
        }
        $pdo = new PDO('mysql:host=localhost;dbname=bai;charset=utf8', 'root', 'root');
        $query = $pdo->prepare("INSERT INTO users SET firstName=?, lastName=?, email=?, password=?, isActive=?");
        if($query->execute(array_values($this->data))) {
          $this->sendEmail('activationLink');
          return true;
        } else {
          throw new Exception("User info not added. Check query.");
        }
      } catch (Exception $e) {
        exit($e->getMessage());
      }
    }

    public function loadUser($email) {
      try {
        $pdo = new PDO('mysql:host=localhost;dbname=bai;charset=utf8', 'root', 'root');
        $query = $pdo->prepare("SELECT firstName, lastName, email, password, isActive FROM users WHERE email=?");
        if($query->execute([$email])) {
          $loadedData = $query->fetchAll();
          if(empty($loadedData)) {
            return false;
          }
          $this->data['firstName'] = $loadedData[0]['firstName'];
          $this->data['lastName'] = $loadedData[0]['lastName'];
          $this->data['email'] = $loadedData[0]['email'];
          $this->data['password'] = $loadedData[0]['password'];
          $this->data['isActive'] = $loadedData[0]['isActive'];
          return true;
        } else {
          return false;
        }
      } catch (Exception $e) {
        exit($e->getMessage());
      }
    }

    public function checkPassword($password) {
      if($this->data && $this->data['password'] == sha1($password)) {
        return true;
      }
      return false;
    }

    public function isActive() {
      if($this->data['isActive'] == 0) {
        return true;
      }
      return false;
    }

    public function activateUser() {
      if(!$this->isActive) {
        $this->data['isActive'] = 0;
        try {
          if($this->loadUser($this->data['email']) != false) {
            return false;
          }
          $pdo = new PDO('mysql:host=localhost;dbname=bai;charset=utf8', 'root', 'root');
          $query = $pdo->prepare("UPDATE users SET isActive=?");
          if($query->execute([0])) {
            $this->sendEmail('activationComplete');
            return true;
          } else {
            throw new Exception("User info not added. Check query.");
          }
        } catch (Exception $e) {
          exit($e->getMessage());
        }
      }
    }

    public function showFullName() {
      if($this->data) {
        return $this->data['firstName'] . ' ' . $this->data['lastName'];
      }
      return false;
    }

    public function sendEmail($type) {
      $mail = new EmailSender(false);
      $emailAddress = $this->data['email'];
      $subject = "Dear {$this->data['firstName']} {$this->data['lastName']}";
      $content = "<h3>Hello {$this->data['firstName']}!</h3><br>";
      switch($type) {
        case 'activationLink':
          $content .= "<p>Thanks for the registration!<br>
          To activate your account please click link below<br>" .
          '<a href="http://localhost/dev1/public/activateAccount.php?activationCode' .
          $this->data['isActive'] . '">Activate</a></p>';
          break;
      }
      $mail->sendEmail($emailAddress, $subject, $content);
    }
  }
