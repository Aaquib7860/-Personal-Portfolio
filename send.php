<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'phpForm/Exception.php';
require 'phpForm/PHPMailer.php';
require 'phpForm/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $message = $_POST['message'];
   // echo($email);

    // $to = "aaquibbadarpura780@gmail.com"; // Replace with your email address
    // $subject = "New Contact Form Submission";
    // $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

    // $headers = "From: $email";

    

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'aaquibbadarpura780@gmail.com';                     //SMTP username
    $mail->Password   = 'ttdj ptuk ivwr clrc';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;   
    $mail->Port       = 587 ;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($email, $name);
    $mail->addAddress('aaquibbadarpura780@gmail.com', 'MyPortFolio');     //Add a recipient
 

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = "Sender Name- $name <br> Sender Email- $email <br> $message ";
   

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}