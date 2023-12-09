<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Préstamos del Usuario</title>
    <style>
        .prestamo-box {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h2>Préstamos del Usuario</h2>

    <?php
    include("db_connection.php");
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user_id = $_POST["user_id"];

            $sql = "SELECT id, month, capital, percentage, total FROM money_lendings WHERE user_id = $user_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="prestamo-box">';
                    echo "ID del Préstamo: {$row['id']}<br>";
                    echo "Meses: {$row['month']}<br>";
                    echo "Capital: {$row['capital']}<br>";
                    echo "Porcentaje de Intereses: {$row['percentage']}%<br>";
                    echo "Total: {$row['total']}<br>";
                    echo "<form action='eliminar_prestamo.php' method='post'>";
                    echo "<input type='hidden' name='prestamo_id' value='{$row['id']}'>";
                    echo "<input type='submit' value='Eliminar'>";
                    echo "</form>";
                    echo '</div>';
                }
            } else {
                echo "No se encontraron préstamos para este usuario.";
            }
        }
            $conn->close();
    ?>

</body>
</html>
