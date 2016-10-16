<?php
error_reporting(E_ALL);
require("phpmailer/class.phpmailer.php");
define( 'MAX_SMS_MESSAGE_SIZE', 140 );

$mail = new PHPMailer();

$mail->IsSMTP();
$mail->Host = "smtp.example.com";
$mail->SMTPAuth = true;
$mail->Username = "brian";
$mail->Password = "briansPassword";

$mail->From = "from@foobar.com";
$mail->Subject = "PHPMailer Message";

$phone_number = "z+a 555 kfla555-@#1122";
$clean_phone_number = filter_var( $phone_number, FILTER_SANITIZE_NUMBER_INT );
//+555555-1122
$cleaner_phone_number = str_replace( array( '+' , '-' ), '', $clean_phone_number );
//5555551122

$sms_domain = "@sms.fakeProvider.com";

//5555551122@fake.provider.com
$mail->AddAddress( $cleaner_phone_number . $sms_domain );
$mail->Body = "Hi recipient!\r\n here is a text";
if ( strlen( $mail->Body ) < MAX_SMS_MESSAGE_SIZE ) {
    if ( $mail->Send() ) {
        echo 'Message has been sent.';
    } else {
        echo 'Message was not sent.<br/>';
        echo 'Mailer error: ' . $mail->ErrorInfo;
    }
} else {
    echo "Your message is too long.";
}
?>