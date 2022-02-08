<?php
require('../factuur/fpdf.php');

$pdf = new FPDF();

$pdf->AddPage();

$pdf->SetFont('Arial','B',16);

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

$pdf->line(10, 30, 200, 30);

$pdf->Ln(10);
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
$pdf->Cell(55, 5, 'paid by', 0, 0);
$pdf->Cell(58, 5, ': Name', 0, 1);

$pdf->line(155, 75, 195, 75);

$pdf->ln(5); //line break
$pdf->Cell(140, 5, '', 0, 0);
$pdf->Cell(50, 5, ': Signature', 0, 1, 'c');


$pdf->Output();


?>
