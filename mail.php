<?php

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

$email = $_POST['email'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$subject = $_POST['subject'];
$message = $_POST['message'];


require 'phpmailer/class.phpmailer.php';

//Create a new PHPMailer instance
$mail = new PHPMailer();
//Tell PHPMailer to use SMTP
$mail->IsSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug  = 2;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host       = "smtp.gmail.com";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port       = 587;
//Whether to use SMTP authentication
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth   = true;
//Username to use for SMTP authentication
$mail->Username   = "r.alfaddaghi@gmail.com";
//Password to use for SMTP authentication
$mail->Password   = "428107666qQ";
//Set who the message is to be sent to
$mail->AddAddress('r.alfaddaghi@gmail.com', 'Ryan Alfaddaghi');
//Set who the message is to be sent from
$mail->SetFrom($email, $firstname . ' ' . $lastname);
//Set an alternative reply-to address
$mail->AddReplyTo($email, $firstname . ' ' . $lastname);
//Set the subject line
$mail->Subject = $subject;
//Set the body of the message
$mail->Body = $message;


//Send the message, check for errors
if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
}
