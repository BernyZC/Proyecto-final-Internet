<?php
session_start();
include("conexion.php");
if (!empty($_SESSION['carrito']) && isset($_SESSION['id'])) {
    $id_usuario = $_SESSION['id'];
    $ids = implode(',', $_SESSION['carrito']);
    $query = $conexion->query("SELECT nombre_album, precio FROM productos WHERE id IN ($ids)");
    while ($row = $query->fetch_object()) {
        $nombre = $row->nombre_album;
        $precio = $row->precio;
        $conexion->query("INSERT INTO historial (id_usuario, nombre_album, precio) VALUES ('$id_usuario', '$nombre', '$precio')");
    }
    unset($_SESSION['carrito']);
    header("location: historial.php?pago=exitoso");
} else {
    header("location: productos.php");
}
?>