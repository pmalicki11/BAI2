<?php

  use PHPMailer\PHPMailer\PHPMailer;
  require_once '..\vendor\autoload.php';

  class EmailSender {

    private $mail;

    public function __construct($debug) {
      $this->mail = new PHPMailer;
      $this->mail->isSMTP();
      $this->mail->Host = 'smtp.gmail.com';
      $this->mail->SMTPAuth = true;
      //$mail->Username = 'postmaster@sandboxf0e3545257ee4e09a173080fbd7bea2d.mailgun.org';
      //$mail->Password = '0e3ff2d67ba63a5d710ab5d847a89ff4-2416cf28-756d7ef9';
      $this->mail->Username = 'malicki.bai@gmail.com';
      $this->mail->Password = '?tDt8tGQp^#reUTS';
      $this->mail->SMTPSecure = 'tls';
      $this->mail->Port = 587;
      $this->mail->SMTPDebug = $debug;
      $this->mail->CharSet = "utf-8";
      $this->mail->IsHTML(true);
    }

    public function sendEmail($email, $subject, $message) {
      $this->mail->setFrom('malicki.bai@gmail.com');
      $this->mail->Subject = $subject;
      $this->mail->Body = $message;
      $this->mail->addAddress($email);

      if(!$this->mail->send()) {
        echo 'Email has not been sent.';
        echo 'Mailer Error: ' . $this->mail->ErrorInfo;
      } else {
        echo 'Email sent!';
      }
    }
  }
