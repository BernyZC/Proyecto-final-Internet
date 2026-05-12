<?php
session_start();
include("conexion.php");
if (empty($_SESSION['id'])) {
    header("location: login.php");
}
$id_usuario = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Historial de Compras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="navbar navbar-dark mb-5">
    <div class="container">
        <a class="navbar-brand" href="productos.php">← Volver a la Tienda</a>
    </div>
</nav>
<div class="container">
    <h2 class="mb-4 text-center">Mis Compras Realizadas 🎶</h2>
    <?php if(isset($_GET['pago'])) echo '<div class="alert alert-success">¡Gracias por tu compra! Tu pedido ha sido registrado.</div>'; ?>
    <div class="card shadow-sm p-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Álbum</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = $conexion->query("SELECT * FROM historial WHERE id_usuario = '$id_usuario' ORDER BY fecha DESC");
                if ($sql->num_rows > 0) {
                    while ($datos = $sql->fetch_object()) { ?>
                        <tr>
                            <td><?= date("d/m/Y H:i", strtotime($datos->fecha)) ?></td>
                            <td><?= $datos->nombre_album ?></td>
                            <td class="fw-bold text-danger">$<?= $datos->precio ?></td>
                        </tr>
                    <?php }
                } else {
                    echo "<tr><td colspan='3' class='text-center'>Aún no has realizado compras.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>