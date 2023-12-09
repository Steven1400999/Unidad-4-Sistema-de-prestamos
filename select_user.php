<?php
include("db_connection.php");

// Obtener usuarios
$result = $conn->query("SELECT id, username FROM users");

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Usuario</title>
</head>
<body>
    <h1>Seleccionar Usuario</h1>
    <form action="view_loans.php" method="post">
        <label for="user_id">Selecciona un usuario:</label>
        <select name="user_id" id="user_id">
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<option value=\"{$row['id']}\">{$row['username']}</option>";
            }
            ?>
        </select>
        <input type="submit" value="Ver">
    </form>
</body>
</html>
