<?php
require('../factuur/fpdf.php');

$pdf = new FPDF();

$pdf->AddPage();

$pdf->SetFont('Arial','B',16);

$pdf->Cell(55,5,'Reference code', 1, 0,);
$pdf->Cell(58,5,': 026ETY', 1, 0, );
$pdf->Cell(30,5,': Date', 1, 0, );
$pdf->Cell(52,5,': time ', 1, 1, );

$pdf->Cell(55,5,'Amount', 1, 0,);
$pdf->Cell(58,5,'2674', 1, 0, );
$pdf->Cell(30,5,': Channel', 1, 0, );
$pdf->Cell(52,5,': Web ', 1, 1, );

$pdf->Cell(55,5,'Status', 1, 0, );
$pdf->Cell(58,5,'Complete', 1, 1, );

$pdf->line(10, 30, 200, 30);

$pdf->Ln(10);
$pdf->Cell(55, 5, 'Product id', 1, 0);
$pdf->Cell(58, 5, ': 64351-84503', 1, 1);

$pdf->Cell(55, 5, 'Tax Amount', 1, 0);
$pdf->Cell(58, 5, ': 0 ', 1, 1);

$pdf->Cell(55,5,'Product Service', 1, 0, );
$pdf->Cell(58,5,': 0', 1, 1, );

$pdf->Cell(55,5,'Product Delivery', 1, 0, );
$pdf->Cell(58,5,': 0', 1, 1, );

$pdf->line(10, 60, 200, 60);

$pdf->ln(10); //line break

$pdf->Output();
?>
