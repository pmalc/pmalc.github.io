<?php

require __DIR__.'../../vendor/autoload.php';

header('Content-type: application/json');
header('Access-Control-Allow-Headers: Content-Type');
header("Access-Control-Allow-Origin: *");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'sandbox.smtp.mailtrap.io';
$mail->SMTPAuth = true;
$mail->Port = 2525;
$mail->Username = 'bf4498e1e0e2e1';
$mail->Password = 'cc4662948f28eb';
$mail->SMTPDebug = 2;

try {                     
    //Recipients
    $mail->setFrom('info@mailtrap.io');
    $mail->addAddress('info@mailtrap.io');     

    //Content
    $mail->isHTML(true);                            
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if($mail->send()){
        $message = 'Message has been sent.';
    }else{
        $message = 'Message has not been sent.';
    }
} catch (Exception $e) {
    $message = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

echo json_encode(array('message' => $message));
