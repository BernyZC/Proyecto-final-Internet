<?php
session_start();
include("conexion.php");

if (!empty($_POST["btningresar"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = $conexion->query("SELECT * FROM usuarios WHERE email='$email'");
    if ($datos = $sql->fetch_object()) {
        if (password_verify($password, $datos->password)) {
            $_SESSION["id"] = $datos->id;
            $_SESSION["nombre"] = $datos->nombre;
            header("location: inicio.php");
        } else {
            echo "<div class='alert alert-danger'>Contraseña incorrecta</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>El usuario no existe</div>";
    }
}
?>
