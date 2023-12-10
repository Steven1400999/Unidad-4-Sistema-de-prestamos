
<!DOCTYPE html>
<html lang="es">
<head>
       
<script>
   document.addEventListener('DOMContentLoaded', function() {
    var user_id = localStorage.getItem('user_id');

    if (user_id && !localStorage.getItem('formSubmitted')) {
        var form = document.createElement('form');
        form.method = 'POST';
        form.style.display = 'none';
        document.body.appendChild(form);

        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'user_id';
        input.value = user_id;
        form.appendChild(input);

        form.submit();
        localStorage.setItem('formSubmitted', 'true'); 
    } else {
        console.error('No se encontró user_id en el almacenamiento local o el formulario ya se ha enviado');
    }
});

</script>

<?php
include("db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];

    $result = $conn->query("SELECT * FROM money_lendings WHERE user_id = $user_id");

    $loans = [];
    while ($row = $result->fetch_assoc()) {
        $loans[] = $row;
    }

    $conn->close();

}
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis préstamos</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="icon" href="images/icono.png" type="image/x-icon">
    <link rel="stylesheet" href="styles/home-styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f4f4f4;
            padding-bottom: 20px; 
        }

        h1 {
            color: #333;
            text-align: center; 
            margin-bottom: 30px; 
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            margin: 0 auto;
            max-width: 960px; 
        }
        .loan-container {
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 5px;
            width: calc(50% - 20px); 
            display: inline-block;
            margin-right: 20px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        .loan-container canvas {
            display: block;
            margin-top: 10px;
            margin-bottom: 10px;
            max-width: 100%;
        }
        @media (max-width: 768px) {
            .loan-container {
                width: 100%;
                margin-right: 0;
            }
        }
        .container.only-one-chart {
            justify-content: center;
        }

       
    </style>

</head>
<body>
 
    <?php include 'menu.php'; ?>
    <br>
    <h1>Mis préstamos</h1>
<br>

<div class="container <?php echo count($loans) === 1 ? 'only-one-chart' : ''; ?>"> 
        <br>

        <?php foreach ($loans as $loan): ?>
            <div class="loan-container">
                <p>Id del préstamo: <?php echo $loan['id']; ?></p>
                <p>Mes: <?php echo $loan['month']; ?></p>
                <p>Capital: <?php echo $loan['capital']; ?></p>
                <p>Porcentaje de interés: <?php echo $loan['percentage']; ?>%</p>
                <p>Total: <?php echo $loan['total']; ?></p>
                <p>Id del usuario: <?php echo $loan['user_id']; ?></p>

                <canvas id="myChart<?php echo $loan['id']; ?>" width="10" height="5"></canvas>

                <?php
                $months = range(1, $loan['month']);
                $interestCompounded = [];

                $capital = $loan['capital'];
                foreach ($months as $month) {
                    $capital = $capital + ($capital * ($loan['percentage'] / 100));
                    $interestCompounded[] = $capital - $loan['capital'];
                }
                ?>

                <script>
                    var ctx<?php echo $loan['id']; ?> = document.getElementById('myChart<?php echo $loan['id']; ?>').getContext('2d');
                    var myChart<?php echo $loan['id']; ?> = new Chart(ctx<?php echo $loan['id']; ?>, {
                        type: 'bar',
                        data: {
                            labels: <?php echo json_encode($months); ?>,
                            datasets: [{
                                label: 'Interés Compuesto',
                                data: <?php echo json_encode($interestCompounded); ?>,
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                x: {
                                    type: 'linear',
                                    position: 'bottom'
                                },
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>
            </div>
        <?php endforeach; ?>
    </div> 
</body>
</html>
