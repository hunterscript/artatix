<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';
// require("/srv/http/public_html/vendor/phpmailer/phpmailer/src/PHPMailer.php");
// echo "Message has been sent successfully";
// require("/srv/http/public_html/vendor/phpmailer/phpmailer/src/SMTP.php");

$mail = new PHPMailer();
//Enable SMTP debugging.
$mail->SMTPDebug = 3;
//Set PHPMailer to use SMTP.
$mail->isSMTP();
//Set SMTP host name                      
$mail->Host = "smtp.mailtrap.io";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;
//Provide username and password
$mail->Username = "7d59474b9fb52a";
$mail->Password = "bc8cf486f755b6";
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";
//Set TCP port to connect to
$mail->Port = 2525;
$mail->From = "name@gmail.com";
$mail->FromName = "Full Name";
$mail->addAddress("name@example.com", "Recepient Name");
$mail->isHTML(true);
$mail->Subject = "Subject Text";
$mail->Body = "<i>Mail body in HTML</i>";
$mail->AltBody = "This is the plain text version of the email content";
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message has been sent successfully";
}

echo "Message has been sent successfully";
