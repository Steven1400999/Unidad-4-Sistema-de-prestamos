<?php
include("db_connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prestamo_id = $_POST["prestamo_id"];

    $sql = "DELETE FROM money_lendings WHERE id = $prestamo_id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Préstamo eliminado correctamente.";
    } else {
        echo "Error al eliminar el préstamo: " . $conn->error;
    }
}
?>
