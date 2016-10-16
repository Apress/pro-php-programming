<?php

error_reporting(E_ALL);
require_once('/tcpdf/config/lang/eng.php');
require_once('/tcpdf/tcpdf.php');

$pdf = new TCPDF();     //create TCPDF object
$pdf->AddPage();        //add a new page
$pdf->write2DBarcode( 'Hello world qrcode', 'QRCODE' );
//write 'Hello world qrcode' as a QR Code
$pdf->Output( 'qr_code.pdf', 'I' ); //generate and output the PDF
?>