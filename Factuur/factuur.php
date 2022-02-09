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



$pdf = new FPDF('P', 'mm', 'A4');

$pdf->AddPage();

// font
$pdf->SetFont('Arial','B',16);

//logo 
$pdf->image( '../img/xlwerkkleding-logo.jpeg', 10, 10, 30);

//eerste lijn
$pdf->line(10, 25, 200, 25);

//Eerste table
$pdf->Ln(20);//line break
$pdf->Cell(55,5,'Naam klant', 0, 0,);
$pdf->Cell(49,5,': ', 0, 0, );

$pdf->Cell(45,5,'Postcode  : ', 0, 0,);
$pdf->Cell(47,5,'7941 LZ Meppel', 0, 1, );

$pdf->Cell(55,5,'Datum', 0, 0,);
$pdf->Cell(49,5,':', 0, 0, );

$pdf->Cell(45,5,'Adres : ', 0, 0,);
$pdf->Cell(49,5,'Synagogestraat 7 ', 0, 1, );


$pdf->Cell(55,5,'Order nummer:', 0, 0, );
$pdf->Cell(49,5,':', 0, 0, );

$pdf->Cell(40,5,'Telefoon  : ', 0, 0,);
$pdf->Cell(49,6,' +31 (0)6 120 55775', 0, 1, );

// tweede table
$pdf->Ln(20);//line break
$pdf->Cell(55, 5, 'Product id', 0, 0);
$pdf->Cell(58, 5, ': 64351-84503', 0, 1);

$pdf->Cell(55, 5, 'Tax Amount', 0, 0);
$pdf->Cell(58, 5, ': 0 ', 0, 1);

$pdf->Cell(55,5,'Product Service', 0, 0, );
$pdf->Cell(58,5,': 0', 0, 1, );

$pdf->Cell(55,5,'Product Delivery', 0, 0, );
$pdf->Cell(58,5,': 0', 0, 1, );

//Tweede lijn
$pdf->line(10, 60, 200, 60);

//derder table
$pdf->Ln(20);//line break
$pdf->Cell(55, 5, 'Product id', 0, 0);
$pdf->Cell(58, 5, ': 64351-84503', 0, 1);

$pdf->Cell(55, 5, 'Tax Amount', 0, 0);
$pdf->Cell(58, 5, ': 0 ', 0, 1);

$pdf->Cell(55,5,'Product Service', 0, 0, );
$pdf->Cell(58,5,': 0', 0, 1, );

$pdf->Cell(55,5,'Product Delivery', 0, 0, );
$pdf->Cell(58,5,': 0', 0, 1, );

//vierde table
$pdf->ln(10); //line break
$pdf->Cell(55, 5, 'paid by:', 0, 0);
$pdf->Cell(58, 5, '$acc_item_1', 0, 1);

//derde lijn
$pdf->line(10, 102, 200, 102);

$pdf->ln(15); //line break
$pdf->Cell(140, 15, '', 0, 0);
$pdf->Cell(50, 5, ': Signature', 0, 1, 'c');



$pdf->Output();


?>
