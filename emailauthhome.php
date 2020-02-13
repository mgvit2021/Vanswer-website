<?php
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->SMTPDebug = 4;                               // Enable verbose debug output
$mail->isSMTP();                                      // Set mailer to use SMTP  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;
$mail->Host = 'tls://smtp.gmail.com:587';
$mail->SMTPOptions = array(
   'ssl' => array(
     'verify_peer' => false,
     'verify_peer_name' => false,
     'allow_self_signed' => true
    )
);                               // Enable SMTP authentication
$mail->Username = 'guptmridul@gmail.com';                 // SMTP username
$mail->Password = 'Mridul*123';                           // SMTP password
                           // Enable TLS encryption, `ssl` also accepted
//$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('guptmridul@gmail.com', $_POST['name']);
$mail->addAddress('guptmridul@gmail.com');     // Add a recipient             // Name is optional
$mail->addReplyTo('guptmridul@gmail.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Complaint from: '.$_POST['email'];
$mail->Body    = $_POST['comments'];
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    echo '<h1>Try again Later<a href="index.html">Click Here</a></h1>';
} else {
    echo 'Message has been sent';
    echo '<h1>Go back <a href="index.html">Click Here</a></h1>';
}
?>