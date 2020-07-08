<?php
require_once('phpmail/class.phpmailer.php');
require_once('phpmail/class.smtp.php');
require_once ('connect.php');
require_once('phpmail/PHPMailerAutoload.php');
if (isset($_POST["submit"])) {
    if (empty($_POST["name"])||empty($_POST["lastname"])||empty($_POST["email"])) {
        header("Location: forgotpass.php?fill=empytspaces");
        exit();
    }
    $name=$_POST["name"];
    $lastname=$_POST["lastname"];
    $email=$_POST["email"];
    $sql="SELECT Email FROM members WHERE Email =$email ";
    $reusult=mysqli_query($baglan,$sql);
    if (mysqli_num_rows($result) ==0){
        header("Location: forgotpass.php?fill=validemail");

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
    $mail->Body="User who name is ".$name." ".$lastname."forgot password. ".$mail;
    $mail->AddAddress("ceng434proje@gmail.com");
    if (!$mail->send()) {
        header("Location: index.php?success=mailsend");
    }
    else
        header("Location: index.php?fail=mailnotsend");
}