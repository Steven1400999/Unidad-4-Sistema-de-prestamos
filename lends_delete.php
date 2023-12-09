<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Préstamos por Usuario</title>
    <link rel="icon" href="images/icono.png" type="image/x-icon">
    <link rel="stylesheet" href="styles/home-styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 400px;
            margin: auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }

        .prestamo-box {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }
        
    </style>
</head>

<body>
<?php include 'menu.php'; ?>
<br>
<center>
    <h2>Buscar Préstamos por Usuario</h2>
    </center>
    <br>
    <div class="container">
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

            if ($result->num_rows > 0) {
                echo '<label for="user_id">Seleccione un usuario:  </label>';
                echo '<select name="user_id" required>';
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['username']}</option>";
                }
                echo '</select>';
            } else {
                echo "No se encontraron usuarios en la base de datos.";
            }

            $conn->close();
            ?>

            <input type="submit" class="btn btn-primary" value="Buscar">
        </form>
    </div>

    <script>
        document.querySelector('form').addEventListener('submit', function () {
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
