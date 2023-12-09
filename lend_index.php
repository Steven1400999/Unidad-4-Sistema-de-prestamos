<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Préstamos</title>
</head>

<body>
    <h2>Ingrese los detalles del préstamo</h2>
    <form action="lends.php" method="post">

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

        <label for="month">Meses:</label>
        <input type="number" name="month" required>

        <label for="capital">Capital:</label>
        <input type="number" name="capital" step="0.01" required>

        <label for="percentage">Porcentaje de intereses:</label>
        <input type="number" name="percentage" step="0.01" required>

        <input type="submit" value="Enviar">
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