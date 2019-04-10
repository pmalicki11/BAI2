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
      $values = array_values($this->data);
      try {
        $pdo = new PDO('mysql:host=localhost;dbname=bai;charset=utf8', 'root', 'root');
        $query = $pdo->prepare("INSERT INTO users SET firstName=?, lastName=?, email=?, password=?, isActive=?");
        if($query->execute(array_values($this->data))) {
          $this->sendEmail('activationLink');
        } else {
          throw new Exception("User info not added");
        }
      } catch (Exception $e) {
        exit("Something weird happened\n" . $e->getMessage());
      }
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
