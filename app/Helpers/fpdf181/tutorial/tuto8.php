<?php
define('FPDF_FONTPATH','.');
require('../fpdf.php');

$pdf = new FPDF();
$pdf->AddFont('BAUHS93','','BAUHS93.php');
$pdf->AddPage();
$pdf->SetFont('BAUHS93','',35);
$pdf->Cell(0,10,'Hola Buenas tardes!');
$pdf->Output();
?>
