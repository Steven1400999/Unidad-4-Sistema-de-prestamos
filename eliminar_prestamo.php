<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar el ID del préstamo a eliminar
    $prestamo_id = $_POST["prestamo_id"];

    // Coloca aquí la lógica para eliminar el préstamo de la base de datos
    // Puedes utilizar una consulta SQL DELETE para eliminar el registro correspondiente
    // Asegúrate de realizar la conexión a la base de datos y manejar los errores

    // Ejemplo de mensaje de éxito (reemplaza esto con tu lógica de base de datos)
    echo "Préstamo eliminado correctamente.";
} else {
    // Redireccionar si se intenta acceder directamente a este script sin enviar el formulario
    header("Location: buscar_prestamos.html");
    exit();
}
?>
