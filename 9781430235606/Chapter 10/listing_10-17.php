<?php
error_reporting(E_ALL);
require("phpmailer/class.phpmailer.php");

$mail = new PHPMailer(); //default is to use the PHP mail function

$mail->From = "from@foobar.com";
$mail->AddAddress("to@foobar.net");

$mail->Subject = "PHPMailer Message";
$mail->Body = "Hello World!\n I hope breakfast is not spam.";

if( !$mail->Send() ) {
    echo 'Message has been sent.';
} else {
    echo 'Message was not sent because of error:<br/>';
    echo $mail->ErrorInfo;
}
?>
    