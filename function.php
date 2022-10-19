<?php
session_start();
include('connect.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
function sendVerificationEmail($username,$email,$token){
    $mail = new PHPMailer(true);
    $mail->isSMTP();    
    $mail->SMTPDebug = 4;                                         //Send using SMTP
    $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'verifemail23@gmail.com';                     //SMTP username
    $mail->Password   = 'binus10122002';                               //SMTP password
    $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->setFrom('verifemail23@gmail.com',$username);
    $mail->addAddress($email);   
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';

    $email_template = "
        <h3>Thankyou for registering Metaforums please verify to use this account </h3>
        <br>
        <a href='http://localhost/Metaforum/verifyemail.php?token=$token'>
    ";
    $mail->Body    = $email_template;
    $mail->send();
    echo 'Message has been sent';
}
?>