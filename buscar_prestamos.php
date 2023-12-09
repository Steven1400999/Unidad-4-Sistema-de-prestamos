<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Préstamos del Usuario</title>
    <link rel="icon" href="images/icono.png" type="image/x-icon">
    <link rel="stylesheet" href="styles/home-styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
        }

        h2 {
            margin-bottom: 20px;
        }

        .prestamo-box {
            display: inline-block;
            width: 280px;
            height: 250px; /* Aumenta la altura */
            border: 1px solid #ccc;
            padding: 15px;
            margin-right: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            vertical-align: top;
        }

        .prestamo-box p {
            margin: 5px 0;
        }

        .prestamo-box p span {
            font-weight: bold; /* Estilo en negritas solo para los spans dentro de los párrafos */
        }

        .prestamo-box form {
            display: inline;
        }

        .prestamo-box input[type="submit"] {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 8px 15px;
            border-radius: 3px;
            cursor: pointer;
        }

        .prestamo-box input[type="submit"]:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <?php include 'menu.php'; ?>
<br>
<center>
    <h2>Préstamos del Usuario</h2>
</center>
    <div class="d-flex flex-wrap">
        <?php
        include("db_connection.php");
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user_id = $_POST["user_id"];

            $sql = "SELECT id, month, capital, percentage, total FROM money_lendings WHERE user_id = $user_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="prestamo-box">';
                    echo "<p><span>ID del Préstamo:</span> {$row['id']}</p>";
                    echo "<p><span>Meses:</span> {$row['month']}</p>";
                    echo "<p><span>Capital:</span> {$row['capital']}</p>";
                    echo "<p><span>Porcentaje de Intereses:</span> {$row['percentage']}%</p>";
                    echo "<p><span>Total:</span> {$row['total']}</p>";
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
    </div>

</body>
</html>
