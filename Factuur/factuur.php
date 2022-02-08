<?php

//Include Files
if (file_exists('../config.php')) {
    include('../config.php');
  } else {
    $errorMessage = "";
    $errorMessage .= "PHP ERROR: ../../config.php does not exist.";
    echo $errorMessage;
    exit;
  }

if (file_exists('../functions.php')) {
    include('../functions.php');
  } else {
    $errorMessage = "";
    $errorMessage .= "PHP ERROR: ../../functions.php does not exist.";
    echo $errorMessage;
    exit;
  }
  
if (file_exists('../library/db.class.php')) {
    include('../library/db.class.php');
  } else {
    $errorMessage = "";
    $errorMessage .= "PHP ERROR: ../../library/db.class.php does not exist.";
    echo $errorMessage;
    exit;
  }


require('../factuur/fpdf.php');

$pdf = new FPDF();

$pdf->AddPage();

$pdf->SetFont('Arial','B',16);

$pdf->image( '../img/xlwerkkleding-logo.jpeg', 10, 10, 30);
$pdf->line(10, 25, 200, 25);

$pdf->Ln(20);
$pdf->Cell(55,5,'Reference code', 0, 0,);
$pdf->Cell(58,5,': 026ETY', 0, 0, );
$pdf->Cell(30,5,': Date', 0, 0, );
$pdf->Cell(52,5,': time ', 0, 1, );

$pdf->Cell(55,5,'Amount', 0, 0,);
$pdf->Cell(58,5,'2674', 0, 0, );
$pdf->Cell(30,5,': Channel', 0, 0, );
$pdf->Cell(52,5,': Web ', 0, 1, );

$pdf->Cell(55,5,'Status', 0, 0, );
$pdf->Cell(58,5,'Complete', 0, 1, );


$pdf->Ln(20);
$pdf->Cell(55, 5, 'Product id', 0, 0);
$pdf->Cell(58, 5, ': 64351-84503', 0, 1);

$pdf->Cell(55, 5, 'Tax Amount', 0, 0);
$pdf->Cell(58, 5, ': 0 ', 0, 1);

$pdf->Cell(55,5,'Product Service', 0, 0, );
$pdf->Cell(58,5,': 0', 0, 1, );

$pdf->Cell(55,5,'Product Delivery', 0, 0, );
$pdf->Cell(58,5,': 0', 0, 1, );

$pdf->line(10, 60, 200, 60);

$pdf->ln(10); //line break
$pdf->Cell(55, 5, 'paid by:', 0, 0);
$pdf->Cell(58, 5, '$acc_item_1', 0, 1);

$pdf->line(10, 102, 200, 102);

$pdf->ln(15); //line break
$pdf->Cell(140, 15, '', 0, 0);
$pdf->Cell(50, 5, ': Signature', 0, 1, 'c');



$pdf->Output();


?>
