<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="images/icono.png" type="image/x-icon">
  <link rel="stylesheet" href="styles/home-styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>


  <title>PrestaMEX</title>
</head>

<body>
<?php include 'menu.php'; ?>

  <section class="how-it-works">
    <div class="container">
      <h2>¿Cómo funcionan los préstamos con interés compuesto?</h2>
      <p>En nuestros préstamos utilizamos el interés compuesto, que es una forma de calcular los intereses sobre el
        monto original más los intereses acumulados. Esto significa que los intereses se suman al saldo pendiente, y en
        cada período, se aplican los intereses al nuevo saldo.</p>
      <p>El interés compuesto permite que el saldo del préstamo crezca más rápidamente en comparación con el interés
        simple, ya que los intereses se calculan sobre un saldo que aumenta con el tiempo.</p>
      <p>Con nuestro sistema de préstamos, puedes ver cómo tu deuda aumenta o disminuye con cada período de pago y cómo
        los intereses se acumulan de manera exponencial.</p>

    </div>
  </section>

  <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/carousel/1.png" class="d-block img-fluid" alt="...">
      </div>

      <div class="carousel-item ">
        <img src="images/carousel/4.png" class="d-block img-fluid" alt="...">
      </div>
      <div class="carousel-item ">
        <img src="images/carousel/5.png" class="d-block img-fluid" alt="...">
      </div>
      <div class="carousel-item ">
        <img src="images/carousel/6.png" class="d-block img-fluid" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
      data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
      data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

</body>

</html>