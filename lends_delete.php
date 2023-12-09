<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Préstamos por Usuario</title>
</head>

<body>
    <h2>Buscar Préstamos por Usuario</h2>
    <form action="buscar_prestamos.php" method="post">
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
                    echo "Mes: {$row['month']}<br>";
                    echo "Capital: {$row['capital']}<br>";
                    echo "Porcentaje de Intereses: {$row['percentage']}%<br>";
                    echo "Total: {$row['total']}<br>";
                    echo '</div>';
                }
            } else {
                echo "No se encontraron préstamos para este usuario.";
            }
        }
        $conn->close();
        ?>


        <?php
        include("db_connection.php");

        $sql = "SELECT id, username FROM users";
        $result = $conn->query($sql);

        // Verificar si hay resultados
        if ($result->num_rows > 0) {
            echo '<label for="user_id">Seleccione un usuario:</label>';
            echo '<select name="user_id" required>';
            // Mostrar cada usuario como una opción en el select
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['id']}'>{$row['username']}</option>";
            }
            echo '</select>';
        } else {
            echo "No se encontraron usuarios en la base de datos.";
        }

        // Cerrar conexión a la base de datos
        $conn->close();
        ?>

        <input type="submit" value="Buscar">
    </form>


    <script>
        document.querySelector('form').addEventListener('submit', functi on () {
            const userIdInput = document.querySelector('select[name="user_id"]');
            const selectedUserId = userIdInput.options[userIdInput.selectedIndex].value;

            const hiddenUserIdInput = document.querySelector('input[name="user_id"]');
            if (hiddenUserIdInput) {
                hiddenUserIdInput.value = selectedUserId;
            } else {
                const newHiddenUserIdInput = document.createElement('input');
                newHiddenUserIdInput.type = 'hidden';
                newHiddenUserIdInput.name = 'user_id';
                newHiddenUserIdInput.value = selectedUserId;
                document.querySelector('form').appendChild(newHiddenUserIdInput);
            }
        });
    </script>
</body>

</html>