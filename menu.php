<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="images/icono.png" alt="Logo">
        <span class="logo-text">PrestaMEX</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="home.php">Inicio</a>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item" id="crearPrestamo" style="display: none;" >
            <a class="nav-link active" aria-current="page" href="lend_index.php">Crear prestamo</a>
          </li>
        </ul>
         <ul class="navbar-nav">
         <li class="nav-item" id="revisarPrestamo" style="display: none;" >
            <a class="nav-link active" aria-current="page" href="lend_index.php">Revisar prestamos</a>
          </li>
        </ul>

      </div>
      <button id="cerrarSesionBtn" class="btn btn-outline-info">Cerrar Sesión</button>
      <script>
        document.getElementById("cerrarSesionBtn").addEventListener("click", function () {
          localStorage.clear();

          window.location.href = 'index.php'; 
        });
      </script>
      <script>
    // Realizar una solicitud al servidor para obtener el rol del usuario
    // Puedes utilizar fetch o XMLHttpRequest para esto

    // Simulando el valor del rol obtenido del servidor (reemplaza esto por tu lógica)
    const rol = localStorage.getItem('rol');

    if (rol === '1') {
        // Si el rol es 1, mostramos el enlace para crear préstamo
        document.getElementById('crearPrestamo').style.display = 'block';
        document.getElementById('revisarPrestamo').style.display = 'block';

    }
</script>

    </div>
  </nav>