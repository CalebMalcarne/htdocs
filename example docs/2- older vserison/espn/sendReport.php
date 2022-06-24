<?php
include "dbConnect.php";

if (isset($_POST['email'])){
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $phone = mysqli_real_escape_string($mysqli, $_POST['phone']);
    $location = mysqli_real_escape_string($mysqli, $_POST['location']);
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);

    $dateTime = date('Y-m-d H:i:s');

    $finalMessage = "Spanish Class Information Request\n\n name: $name\n\n Phone Number: $phone\n\n Email: $email\n\n Location: $location\n\n Please Reach out within 24 hours of reciving this email";
  
    stripslashes($finalMessage);

    if($location == ''){
        
    }

    require_once('PHPMailer/PHPMailerAutoload.php');

    $mail = new PHPMailer;
    $mail->isSMTP();

    //Enable SMTP debugging
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;

    //Set the hostname of the mail server
    $mail->Host = 'smtp.gmail.com';
    // $mail->Host = gethostbyname('smtp.gmail.com');
    // if your network does not support SMTP over IPv6
    //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = 'scottsdale.mission@gmail.com';
    $mail->Password = 'asmfacebook'; 
    $mail->setFrom('scottsdale.mission@gmail.com', 'Spanish Class Request');
    $mail->addAddress('caleb.malcarne@missionary.org', 'Spanish Class Request');


    $mail->Subject = 'Spanish Class Request';

    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    //$mail->msgHTML(file_get_contents('contents.html'), __DIR__);

    //Replace the plain text body with one created manually
    $mail->Body = $finalMessage;
    

    //send the message, check for errors
    if (!$mail->send()) {
        echo 'Mailer Error: '. $mail->ErrorInfo;
    } else {}
}
?>