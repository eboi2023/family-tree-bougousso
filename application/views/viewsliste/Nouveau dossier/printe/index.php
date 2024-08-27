<?php
//============================================================+
// File name   : example_064.php
// Begin       : 2010-10-13
// Last Update : 2013-05-14
//
// Description : Example 064 for TCPDF class
//               No-write page regions
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: No-write page regions
 * @author Nicola Asuni
 * @since 2010-10-14
 */

// Include the main TCPDF library (search for installation path).
//require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('MUDESB');
$pdf->SetTitle($valeur_titre);
$pdf->SetSubject($valeur_titre);
$pdf->SetKeywords('TCPDF, PDF, exampl, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "MUDESB",'Titre: '.$valeur_titre." \n".$date_titre);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 8);


// define some html content for testing
$txt = $sssss;


// add a page
$pdf->AddPage();





// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


// define no-write page regions to avoid text overlapping images
/*
	'page' => page number or empy for current page
	'xt' => X top
	'yt' => Y top
	'yb' => Y bottom
	'side' => page side ('L' = left or 'R' = right)
*/


// write html text
$pdf->writeHTML($txt, true, false, true, false, '');


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -



// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output($pages_titre, 'I');

//============================================================+
// END OF FILE
//============================================================+
