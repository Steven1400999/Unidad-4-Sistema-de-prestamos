<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Préstamos</title>
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
            max-width: 600px; 
            margin: auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }
    </style>

</head>

<body>
    <?php include 'menu.php'; ?>

    <div class="container mt-5">
        <h2>Ingrese los detalles del préstamo</h2>
        <hr>
        <form action="lends.php" method="post">

        <?php
        include("db_connection.php");

        $sql = "SELECT id, username FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<label for="user_id">Seleccione un usuario:</label>';
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
<hr>
            <div class="mb-3">
                <label for="month" class="form-label">Meses:</label>
                <input type="number" class="form-control" name="month" required>
            </div>

            <div class="mb-3">
                <label for="capital" class="form-label">Capital:</label>
                <input type="number" class="form-control" name="capital" step="0.01" required>
            </div>

            <div class="mb-3">
                <label for="percentage" class="form-label">Porcentaje de intereses:</label>
                <input type="number" class="form-control" name="percentage" step="0.01" required>
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
    <script>
        document.querySelector('form').addEventListener('submit', functi on() {
            const userIdInput = document.querySelector('select[name="user_id"]');
            const selectedUserId = userIdInput.options[userIdInput.selectedIndex].value;

            const hiddenUserIdInput = document.querySelector('input[name="user_id"]');
            if(hiddenUserIdInput) {
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

