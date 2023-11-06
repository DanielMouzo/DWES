<?php
include "fpdf/fpdf.php";

// Obtén los parámetros de la URL
$name = isset($_GET['name']) ? $_GET['name'] : 'Nombre';
$surname = isset($_GET['surname']) ? $_GET['surname'] : 'Apellido';

// Crea un objeto FPDF
$pdf = new FPDF();
$pdf->AddPage();

// Agrega imágenes al PDF
$pdf->Image('html.png', 10, 20, 50);
$pdf->Image('php.png', 150, 20, 50);

// Configura las fuentes y colores
$pdf->SetFont('Arial', 'B', 16);
$pdf->SetTextColor(0, 0, 0);

// Agrega texto al PDF
$pdf->Cell(0, 10, 'Diploma de Desarrollo Web en Entorno Servidor', 0, 1, 'C');
$pdf->Ln(20);

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 65, "Otorgado a: $name $surname", 0, 1, 'C');

$pdf->Cell(0, -50, 'Fecha del diploma: ' . date('Y-m-d'), 0, 1, 'C');

$pdf->SetFont('Arial', 'I', 12);
$pdf->Cell(0, 65, 'Felicidades', 0, 1, 'C');

// Agrega una línea decorativa
$pdf->Line(20, $pdf->GetY(), $pdf->GetPageWidth()-20, $pdf->GetY());

// Agrega un borde alrededor del diploma
$pdf->Rect(10, 10, $pdf->GetPageWidth()-20, $pdf->GetPageHeight()-20);

$pdf->Output();
?>


