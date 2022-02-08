<?php
require('../factuur/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(100,20,'Hello World!', 1, 0, 'c' );
$pdf->Cell(90,20,'Hello World 2', 1, 0, 'c');
$pdf->Output();
?>
