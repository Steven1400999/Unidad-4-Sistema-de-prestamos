<?php
$host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "sistemaprestamos";

$conn = new mysqli($host, $db_user, $db_password, $db_name);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}
?>