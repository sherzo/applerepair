<?php
$receiver = 'saulflorez.backend@gmail.com';

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';

$name = $_POST['name'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$message = $_POST['message'];

$mail = new PHPMailer(true);                    // Passing `true` enables exceptions
try {
    $mail->IsSMTP();
    $mail->Host = "ssl://smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
    $mail->Username = $receiver;
    $mail->Password = "sherzo1607";
    $mail->Port = "465";                                  // TCP port to connect to

    //Recipients
    $mail->setFrom($email, 'Okeyapple');
    $mail->addAddress($receiver, $name);

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Contacto';
    $mail->Body    = '<b>Nombre:</b> '.$name.' </br> 
        <b>Apellido: </b> '.$lastname.' </br> <br>
        <b>Email: </b> '. $email .'<br>
        <b>Mensaje:</b> '.$message.' ';

    $mail->send();

    echo 'Message has been sent';

} catch (Exception $e) {

    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;

}