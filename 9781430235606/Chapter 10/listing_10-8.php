<?php

error_reporting ( E_ALL );
require_once ('/tcpdf/config/lang/eng.php');
require_once ('/tcpdf/tcpdf.php');

//Contruct a new TCPDF object
$pdf = new TCPDF();

//set document meta information
$pdf->SetCreator( PDF_CREATOR );
$pdf->SetAuthor( 'Brian Danchilla' );
$pdf->SetTitle( 'Pro PHP Programming - Chapter 10' );
$pdf->SetSubject( 'TCPDF Example 3 - Barcode & Gradient' );
$pdf->SetKeywords( 'TCPDF, PDF, PHP' );

//set font
$pdf->SetFont( 'times', '', 20 );

//set margins
$pdf->SetMargins( PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT );

//add a page
$pdf->AddPage();
$txt = <<<HDOC
Chapter 10: TCPDF Example 3 - Barcode & Gradients
HDOC;
$pdf->Write( 20, $txt );

$pdf->Ln();

$pdf->write1DBarcode( '101101101', 'C39+' );

$pdf->Ln();

$txt = "Above: a generated barcode. Below, a generated gradient image";

$pdf->WriteHTML( $txt );

$pdf->Ln();

$blue = array (0, 0, 200 );
$yellow = array (255, 255, 0 );
$coords = array (0, 0, 1, 1 );

//paint a linear gradient
$pdf->LinearGradient( PDF_MARGIN_LEFT, 90, 20, 20, $blue, $yellow, $coords );
$pdf->Text( PDF_MARGIN_LEFT, 111, 'Gradient cell' ); //label


//save the PDF
$pdf->Output( 'barcode_and_gradient.pdf', 'I' );
?>
