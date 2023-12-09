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
        <label for="month">Meses:</label>
        <input type="number" name="month" required>

        <label for="capital">Capital:</label>
        <input type="number" name="capital" step="0.01" required>

        <label for="percentage">Porcentaje de intereses:</label>
        <input type="number" name="percentage" step="0.01" required>

        <input type="submit" value="Enviar">
    </form>
    <script>
        // Suponiendo que ya tienes el user_id almacenado en el Local Storage
        const userId = localStorage.getItem('rol');
        if (userId) {
            // Agregar un campo oculto al formulario para enviar user_id al servidor
            const userIdInput = document.createElement('input');
            userIdInput.type = 'hidden';
            userIdInput.name = 'user_id';
            userIdInput.value = userId;
            document.querySelector('form').appendChild(userIdInput);
        } else {
            alert('Error: user_id no encontrado en el Local Storage');
        }
    </script>
</body>
</html>
