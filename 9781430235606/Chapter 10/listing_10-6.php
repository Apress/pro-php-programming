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
$pdf->SetSubject( 'TCPDF Example 2' );
$pdf->SetKeywords( 'TCPDF, PDF, PHP' );

//set font
$pdf->SetFont( 'times', '', 20 );

//add a page
$pdf->AddPage();
$txt = <<<HDOC
Pro PHP Programming:
Chapter 10: TCPDF Example 2
An Image:
HDOC;
$pdf->Write( 0, $txt );

//image scale factor
$pdf->setImageScale( PDF_IMAGE_SCALE_RATIO );

//JPEG quality
$pdf->setJPEGQuality( 90 );

//a sample image
$pdf->Image( "bw.jpg" );

$txt = "Above: an image<h2>Embedded HTML</h2>
This text should have some <em>italic</em> and some <strong>bold</strong>
and the caption should be an &lt;h2&gt;.";

$pdf->WriteHTML( $txt );

//save the PDF
$pdf->Output( 'image_and_html.pdf', 'I' );
?>
