<?php
error_reporting(E_ALL);
require("phpmailer/class.phpmailer.php");

$mail = new PHPMailer(); //default is to use the PHP mail function

$mail->From = "from@foobar.com";
$mail->AddAddress("to@foobar.net");

$mail->Subject = "PHPMailer Message";

$mail->IsHTML(); //tell PHPMailer that we are sending HTML
$mail->Body = "<strong>Hello World!</strong><br/> I hope breakfast is not spam.";

//fallback message in case their mail client does not accept HTML
$mail->AltBody = "Hello World!\n I hope breakfast is not spam.";
//adding an attachment
$mail->AddAttachment( "document.txt" );

if( $mail->Send() ) {
    echo 'Message has been sent.';
} else {
    echo 'Message was not sent because of error:<br/>';
    echo $mail->ErrorInfo;
}
?>