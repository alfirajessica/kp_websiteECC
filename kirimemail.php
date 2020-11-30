<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 function kirimemail($body,$sendto,$namauser){
  
    //$body="'This is the HTML message body <b>in bold!</b>'";
    // $body=$_POST['isi'];
    // $sendto=$_POST['to'];
    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function

    // Load Composer's autoloader
    require 'mailvendor/autoload.php';

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    $kal="";
    $err="";
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'orientherbalnusantara@gmail.com';      // SMTP username
        $mail->Password   = 'Orientnusantara88';                    // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('orientherbalnusantara@gmail.com', 'Orient Herbal');
        $mail->addAddress($sendto,$namauser);     // Add a recipient
        //$mail->addAddress('ellen@example.com');               // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        // // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = $body;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        $kal= 'Message has been sent';
    } catch (Exception $e) {
        $err= "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    if ($err=="") {
        echo $kal;
    }else{
        echo $err;
    }
 }

?>