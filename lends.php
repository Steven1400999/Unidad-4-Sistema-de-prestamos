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
       
        echo '<script>';
        echo 'alert("Préstamo creado exitosamente.");';
        echo 'window.location.href = "lend_index.php";'; 
        echo '</script>';
    } else {
        echo "Error al realizar el préstamo: " . $conn->error;
    }
} else {
    
    header("Location: index.html");
    exit();
}
$conn->close();
?>
