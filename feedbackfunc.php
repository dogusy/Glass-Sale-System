<?php
require_once('phpmail/class.phpmailer.php');
require_once('phpmail/class.smtp.php');

require_once('phpmail/PHPMailerAutoload.php');
if (isset($_POST["submit"])) {

    $name=$_POST["name"];
    $lastname=$_POST["lastname"];
    $email=$_POST["email"];
    $message=$_POST["message"];


    if (empty($name)||empty($lastname)||empty($email)||empty($message)) {
      header("Location: feedback.php?fill=empytspaces");
        exit();

    }

$mail= new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth=true;
$mail->SMTPSecure="ssl";
$mail->Host="smtp.gmail.com";
$mail->Port="465";
$mail->isHTML(true);
$mail->Username="ceng434proje@gmail.com";
    $mail->Password="THKU2015";
$mail->SetFrom($email,$name);
$mail->Subject="Feedback";
$mail->Body=$message."sent by ".$email;
$mail->AddAddress("ceng434proje@gmail.com");
if ($mail->send()) {
    header("Location: index.php?success=mailsend");
}
else
header("Location: index.php?fail=mailnotsend");
}   