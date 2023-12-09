<?php
include("db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $months = $_POST["month"];
    $capital = $_POST["capital"];
    $percentage = $_POST["percentage"];
    $user_id = $_POST["user_id"];
    $porcentajefinal;

    $porcentajefinal = $percentage / 100;

    $sumatoria = $capital;

    for ($i = 1; $i <= $months; $i++) {
        $sumatoria = $sumatoria + ($sumatoria * $porcentajefinal);
    }

    $query = "INSERT INTO `money_lendings`(`month`, `capital`, `percentage`, `total`, `user_id` ) VALUES ('$months', '$capital', '$percentage', '$sumatoria', '$user_id')";
    $result = $conn->query($query);

    if ($result === TRUE) {
        echo "Prestamo creado exitosamente.";
    } else {
        echo "Error al realizar el prestamo: " . $conn->error;
    }
} else {
    // Redireccionar si se intenta acceder directamente a este script sin enviar el formulario
    header("Location: index.html");
    exit();
}
$conn->close();
?>
