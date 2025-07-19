<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader (created by composer, not included with PHPMailer)
include 'index.php'; 
require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings          
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'utkarshpratap03@gmail.com';            //SMTP username
    $mail->Password   = 'upqq hdnm ahsa dkuu';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('utkarshpratap03@gmail.com', 'contact Form');
    $mail->addAddress('harshikarora22@gmail.com', 'Our Website');           //Add a recipient
  

 
    //Content
    $mail->isHTML(true);                                       //Set email format to HTML
    $mail->Subject = 'Contact Form';
    $mail->Body    = "Sender Name - $name <br> Sender Email - $email <br> Subject - $sub <br> message - $msg";


    $mail->send();
    echo 'Thanks For Contacting';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>