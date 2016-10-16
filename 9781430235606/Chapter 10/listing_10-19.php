<?php
error_reporting(E_ALL);
require("phpmailer/class.phpmailer.php");

$mail = new PHPMailer(); //default is to use the PHP mail function

$mail->IsSMTP(); //using SMTP
$mail->Host = "smtp.example.com"; // SMTP server

//authenticate on the SMTP server
$mail->SMTPAuth = true;
$mail->Username = "brian";
$mail->Password = "briansPassword";

$mail->From = "from@foobar.com";
$mail->Subject = "PHPMailer Message";

$names = array(
    array( "email" => "foobar1@a.com", "name" => "foo1" ),
    array( "email" => "foobar2@b.com", "name" => "foo2" ),
    array( "email" => "foobar3@c.com", "name" => "foo3" ),
    array( "email" => "foobar4@d.com", "name" => "foo4" )
);

foreach ( $names as $n ) {
    $mail->AddAddress( $n['email'] );
    $mail->Body = "Hi {$n['name']}!\n Do you like my SMTP server?";
    if(! $mail->Send() ) {
        echo 'Message was not sent.<br/>';
        echo 'Mailer error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent.';
    }
    $mail->ClearAddresses();
}
?>