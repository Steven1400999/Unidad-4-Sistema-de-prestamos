<?php
require_once('library/tcpdf.php');
include("db_connection.php");

$loan_id = $_POST['loan_id'];

$result = $conn->query("SELECT m.*, u.username FROM money_lendings m JOIN users u ON m.user_id = u.id WHERE m.id = $loan_id");
$loan = $result->fetch_assoc();

$conn->close();

$pdf = new TCPDF();

// Configurar la fuente
$pdf->SetFont('helvetica', '', 12);

// Agregar contenido al PDF
$pdf->AddPage();

// Encabezado

$pdf->Cell(0, 10, 'Préstamo de ' . $loan['username'], 0, 1, 'C'); // Alineado al centro
$pdf->Ln(5); // Espacio entre el encabezado y el contenido
$pdf->Cell(0, 10, 'Detalles del Préstamo', 0, 1, 'C'); // Alineado al centro

$pdf->Cell(40, 10, 'Id del préstamo: ' . $loan['id']);
$pdf->Ln(8);
$pdf->Cell(40, 10, 'Meses: ' . $loan['month']);
$pdf->Ln(8);
$pdf->Cell(40, 10, 'Capital: ' . $loan['capital']);
$pdf->Ln(8);
$pdf->Cell(40, 10, 'Porcentaje de interés: ' . $loan['percentage'] . '%');
$pdf->Ln(8);
$pdf->Cell(40, 10, 'Total: ' . $loan['total']);
$pdf->Ln(8);
$pdf->Cell(40, 10, 'Id del usuario: ' . $loan['user_id']);

// Agregar gráfica al PDF
$chartImage = 'images/chart' . $loan['id'] . '.png';
$pdf->Image($chartImage, 10, 90, 190); // Ajuste de posición para dar espacio al encabezado

// Generar el archivo PDF
$pdf->Output('detalle_prestamo.pdf', 'I');
?>
