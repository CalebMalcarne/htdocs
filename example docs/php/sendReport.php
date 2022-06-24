<?php
$_SESSION['database'] = $_SESSION['zone'];
include "dbConnect.php";

if (isset($_POST["email"])) {
    $main_report = $mysqli->real_escape_string($_POST["report"]);
    $email = $mysqli->real_escape_string($_POST["email"]);
    $subject = $mysqli->real_escape_string($_POST["type"]);

    date_default_timezone_set("America/Phoenix");
    $dateTime = date("Y-m-d H:i:s");
  
    $finalMessage = "Report Type: $subject \n\nSubmission time: $dateTime \n\nMessage:\n $main_report \n\nSender Email: $email";

    stripslashes($finalMessage);

    require_once("../PHPMailer/PHPMailerAutoload.php");


    $mail = new PHPMailer;
    $mail->isSMTP();

    //Enable SMTP debugging
    //SMTP::DEBUG_OFF = off (for production use)
    // SMTP::DEBUG_CLIENT = client messages
    // SMTP::DEBUG_SERVER = client and server messages
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;

    //Set the hostname of the mail server
    //$mail->Host = "smtp.gmail.com";
     $mail->Host = gethostbyname('smtp.gmail.com');
    // if your network does not support SMTP over IPv6
    //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = 587;
    $mail->SMTPSecure = "tls";
    $mail->SMTPAuth = true;
    $mail->Username = "scottsdale.mission@gmail.com";
    $mail->Password = "asmfacebook"; 
    $mail->setFrom("scottsdale.mission@gmail.com", "Web Report");
    $mail->addAddress("caleb.malcarne@missionary.org", "Web Error/Idea Report");


    $mail->Subject = "Test email";

    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    //$mail->msgHTML(file_get_contents('contents.html'), __DIR__);

    //Replace the plain text body with one created manually
    $mail->Body = $finalMessage;
    
    //Attach an image file
    //$mail->addAttachment('images/phpmailer_mini.png');

    //send the message, check for errors
    if (!$mail->send()) {
        echo "Mailer Error: ". $mail->ErrorInfo;
    } else {
    }
}
?>
