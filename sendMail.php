<?php 

//Sending Email for the team leader.

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    //set up php mailer settings
    $mail->SMTPDebug = false;
    $mail->isSMTP();
    $mail->Host     = 'smtp.gmail.com;';
    $mail->SMTPAuth = true;
    $mail->Username = 'macathon4.0@gmail.com';
    $mail->Password = 'hqupflszfoaimbob';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // set up sender and receiver
    $mail->setFrom('macathon4.0@gmail.com', 'Macathon4.0');
    $mail->addAddress($email);

    //send email subject and body
    $mail->isHTML(true);
    $mail->Subject = 'Macathon team code';
    $mail->Body = "<h5> Hello " . $userName . " </h5><br> 
    Hope all is well with you. <br>
    Thank you for registration, your team code is <b> " . $teamCode . "</b><br>
    Send form <a href='https://www.w3schools.com'>Link!</a> for your members.<br>
    Have a nice day! ";
    $mail->AltBody = 'Body in plain text for non-HTML mail clients';
    $mail->send();
    echo "Mail has been sent successfully!<br>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>