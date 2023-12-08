<?php
include("db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = "INSERT INTO `users`(`username`, `password`, `email`, `rol`) VALUES ('$username', '$password', '$email', '2')";
    $result = $conn->query($query);

    if ($result === TRUE) {
        echo "Usuario creado exitosamente.";
    } else {
        echo "Error al crear usuario: " . $conn->error;
    }
}

$conn->close();
?>