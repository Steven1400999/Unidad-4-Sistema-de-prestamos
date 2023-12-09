<?php
include("db_connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prestamo_id = $_POST["prestamo_id"];

    $sql = "DELETE FROM money_lendings WHERE id = $prestamo_id";
    
    if ($conn->query($sql) === TRUE) {
         
        echo '<script>';
        echo 'alert("Préstamo eliminado exitosamente.");';
        echo 'window.location.href = "lends_delete.php";'; 
        echo '</script>';
    } else {
        echo "Error al eliminar el préstamo: " . $conn->error;
    }
}
?>
