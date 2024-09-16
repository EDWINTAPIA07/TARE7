<?php
require('../reports/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Image('../public/images/saludos.png', 10, 20, 100);
$pdf->Cell(40,10,'Hola amigos como estan, este es mi primer pdf');
$pdf->Output();
?>