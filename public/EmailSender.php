<?php

  namespace mailer;

  use PHPMailer\PHPMailer\PHPMailer;

  require_once '..\vendor\autoload.php';

  $mail = new PHPMailer;

  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  //$mail->Username = 'postmaster@sandboxf0e3545257ee4e09a173080fbd7bea2d.mailgun.org';
  //$mail->Password = '0e3ff2d67ba63a5d710ab5d847a89ff4-2416cf28-756d7ef9';
  $mail->Username = 'malicki.bai@gmail.com';
  $mail->Password = '?tDt8tGQp^#reUTS';
  $mail->SMTPSecure = 'tls';
  $mail->Port = 587;
  //$mail->SMTPDebug = 4;

  $mail->setFrom('malicki.bai@gmail.com');
  $mail->Subject = 'Test email';
  $mail->Body = 'This is test email message';
  $mail->addAddress('manyat5pol@gmail.com');

  if(!$mail->send()) {
    echo 'Email has not been sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
  } else {
    echo 'Email sent!';
  }
