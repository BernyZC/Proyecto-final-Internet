<?php
include("conexion.php");

if (!empty($_POST["btnregistrar"])) {
    $nombre = $_POST["nombre"];
    $email  = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Seguridad ante todo

    $sql = $conexion->query("INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre', '$email', '$password')");

    if ($sql == 1) {
        echo '<div class="alert alert-success">¡Bienvenido al fandom! Usuario registrado.</div>';
    } else {
        echo '<div class="alert alert-danger">Error al registrar.</div>';
    }
}
?>
