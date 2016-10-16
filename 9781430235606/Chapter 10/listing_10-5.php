<?php
error_reporting(E_ALL);
require_once('/tcpdf/config/lang/eng.php');
require_once('/tcpdf/tcpdf.php');

//Construct a new TCPDF object
$pdf = new TCPDF();

//add a page
$pdf->AddPage();

//assign text
$txt = "Pro PHP Programming - Chapter 10: TCPDF Minimal Example";

//print the text block
$pdf->Write( 20, $txt );

//save the PDF
$pdf->Output( 'minimal.pdf', 'I' );
?>