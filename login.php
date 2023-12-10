<?php
include("db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $hashed_password = md5($password);


    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$hashed_password'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $user_data = $result->fetch_assoc();
        $email = $user_data['email'];
        $rol = $user_data['rol'];
        $user_id = $user_data['id'];

        echo "<script>
                localStorage.setItem('rol', '$rol');
                localStorage.setItem('user_id', '$user_id');
                window.location.href = 'home.php';
              </script>";
        exit();

    } else {
        echo "Usuario o contraseña incorrectos. Inténtalo de nuevo.";
    }
}

$conn->close();
?>
