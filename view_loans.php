<?php
include("db_connection.php");

// Obtener el ID del usuario seleccionado
$user_id = $_POST['user_id'];

// Obtener préstamos asociados al usuario
$result = $conn->query("SELECT * FROM money_lendings WHERE user_id = $user_id");

// Obtener los préstamos como un array para usar en JavaScript
$loans = [];
while ($row = $result->fetch_assoc()) {
    $loans[] = $row;
}

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Préstamos</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Préstamos</h1>

    <?php
    foreach ($loans as $loan) {
        echo "<div style=\"border: 1px solid #000; padding: 10px; margin-bottom: 20px;\">";
        echo "<p>Id del préstamo: {$loan['id']}</p>";
        echo "<p>Mes: {$loan['month']}</p>";
        echo "<p>Capital: {$loan['capital']}</p>";
        echo "<p>Porcentaje de interés: {$loan['percentage']}%</p>";
        echo "<p>Total: {$loan['total']}</p>";
        echo "<p>Id del usuario: {$loan['user_id']}</p>";

        // Canvas para dibujar el gráfico
        echo "<canvas id='myChart{$loan['id']}' width='200' height='100'></canvas>";
        echo "</div>";

        // Datos para el gráfico
        $months = range(1, $loan['month']); // Generar un rango de meses de 1 a $loan['month']
        $interestCompounded = [];

        // Calcular interés compuesto acumulado para cada mes
        $capital = $loan['capital']; // Capital inicial
        foreach ($months as $month) {
            $capital = $capital + ($capital * ($loan['percentage'] / 100));
            $interestCompounded[] = $capital - $loan['capital']; // Mostrar solo el interés compuesto
        }

        // Configuración del gráfico
        echo "<script>";
        echo "var ctx = document.getElementById('myChart{$loan['id']}').getContext('2d');";
        echo "var myChart = new Chart(ctx, {";
        echo "type: 'bar',";
        echo "data: {";
        echo "labels: " . json_encode($months) . ",";
        echo "datasets: [{";
        echo "label: 'Interés Compuesto',";
        echo "data: " . json_encode($interestCompounded) . ",";
        echo "backgroundColor: 'rgba(75, 192, 192, 0.2)',";
        echo "borderColor: 'rgba(75, 192, 192, 1)',";
        echo "borderWidth: 1";
        echo "}]";
        echo "},";
        echo "options: {";
        echo "scales: {";
        echo "x: {";
        echo "type: 'linear',";
        echo "position: 'bottom'";
        echo "},";
        echo "y: {";
        echo "beginAtZero: true";
        echo "}";
        echo "}";
        echo "}";
        echo "});";
        echo "</script>";
    }
    ?>

</body>
</html>
