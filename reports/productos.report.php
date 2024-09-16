<?php
require('../reports/fpdf.php');
require_once("../models/productos.model.php");

$pdf = new FPDF();
$pdf->AddPage();
$productos = new Productos();
$pdf->SetFont('Arial', 'B', 12);
$pdf->Text(30, 10, 'Report products');
$pdf->SetFont('Arial', '', 12);
$texto = "Reporte  productos";
//$pdf->Cell(40, 10, iconv('UTF-8', 'windows-1252', $texto));
$pdf->MultiCell(0, 5, iconv('UTF-8', 'windows-1252', $texto), 0, 'J');



//uso de POO para reporte
$listaproductos = $productos->todos();
$x = 10;
$y = 35;
/*while ($prod = mysqli_fetch_assoc($listaproductos)) {

    $pdf->Text($x, $y, $prod["Codigo_Barras"]);
    $y += 10;
}*/


$pdf->Cell(10, 10, "#", 1);
$pdf->Cell(40, 10, "Codigo de Barras", 1);
$pdf->Cell(55, 10, "Nombre", 1);
$pdf->Cell(40, 10, "IVA", 1);

//$pdf->Cell(50, 50, $pdf->GetStringWidth("Codigo de Barras"));
$index = 1;
$pdf->Ln();
while ($prod = mysqli_fetch_assoc($listaproductos)) {
    //      Ancho   alto de la celda
    $pdf->Cell(10, 10, $index, 1);
    $pdf->Cell(40, 10, $prod["Codigo_Barras"], 1);
    $pdf->Cell(55, 10, $prod["Nombre_Producto"], 1);
    $pdf->Cell(40, 10, $prod["Graba_IVA"], 1);
    $pdf->Ln();
    $index++;
}




$pdf->Cell(0, 10, 'Page ' . $pdf->PageNo(), 0, 0, 'C');
$pdf->Output();
?>