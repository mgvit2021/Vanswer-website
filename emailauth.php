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

$mail->setFrom('guptmridul@gmail.com', 'Team Vanswer');
$mail->addAddress($emai);     // Add a recipient             // Name is optional
$mail->addReplyTo('guptmridul@gmail.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Registration Successful!';
$mail->Body    = 'Hello '.$nam.',<br>Your account has been created successfully.<br>We hope you will find answers to all your problems at one stop!
<br><br>
Your registered email: '.$emai.'<br>
Your password: '.$pass.'<br>
<i style="color:#18b66c">Thanks for believing in us!</i>';
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