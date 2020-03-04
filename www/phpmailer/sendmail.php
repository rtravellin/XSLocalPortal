<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

session_start();
$_SESSION['smtp_server']=$_POST['smtp_server'];
$_SESSION['smtp_port']=$_POST['smtp_port'];
$_SESSION['smtp_encryption']=$_POST['smtp_encryption'];
$_SESSION['smtp_authentication']=$_POST['smtp_authentication'];
$_SESSION['smtp_username']=$_POST['smtp_username'];
$_SESSION['smtp_password']=$_POST['smtp_password'];
$_SESSION['from']=$_POST['from'];
$_SESSION['to']=$_POST['to'];
$_SESSION['subject']=$_POST['subject'];
$_SESSION['body']=$_POST['body'];

try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host       = $_POST['smtp_server'];
    if($_POST['smtp_authentication']){
        $mail->SMTPAuth   = true;
        $mail->Username   = $_POST['smtp_username'];
        $mail->Password   = $_POST['smtp_password'];
    }else{
        $mail->SMTPAuth   = false;
    }

    if($_POST['smtp_encryption']==''){

    }else if($_POST['smtp_encryption']=='tls'){
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    }else if($_POST['smtp_encryption']=='ssl'){
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    }
    $mail->Port = (int)$_POST['smtp_port'];

    $mail->setFrom($_POST['from'], 'EMail Tester');
    $mail->addAddress($_POST['to']);
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // $mail->addAttachment('/var/tmp/file.tar.gz');
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');

    $mail->isHTML(true);
    $mail->Subject = $_POST['subject'];
    $mail->Body    = $_POST['body'];
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

    echo 'Mail has been sent';
} catch (Exception $e) {
    echo "Mail could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
