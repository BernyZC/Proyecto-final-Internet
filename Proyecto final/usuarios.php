<?php
include("conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuarios - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header btn-kpop text-white">
            <h3 class="mb-0">Panel de Control: Usuarios Registrados</h3>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo Electrónico</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = $conexion->query("SELECT * FROM usuarios");
                    while($datos = $sql->fetch_object()) { ?>
                        <tr>
                            <td><?= $datos->id ?></td>
                            <td><?= $datos->nombre ?></td>
                            <td><?= $datos->email ?></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-outline-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="mt-3">
                <a href="productos.php" class="btn btn-secondary">Volver a la tienda</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>