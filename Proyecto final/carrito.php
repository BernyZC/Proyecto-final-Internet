<?php
session_start();
include("conexion.php");
if (isset($_GET['vaciar'])) {
    unset($_SESSION['carrito']);
    header("location: carrito.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Carrito K-Pop</title>
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
    <h2 class="mb-4">Tu Carrito de Compras 🛒</h2>
    <div class="card shadow-sm p-4">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Artista</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                if (!empty($_SESSION['carrito'])) {
                    $ids = implode(',', $_SESSION['carrito']);
                    $sql = $conexion->query("SELECT * FROM productos WHERE id IN ($ids)");

                    while ($row = $sql->fetch_object()) {
                        echo "<tr>
                                <td>
                                    <img src='img/{$row->imagen}' width='50' class='rounded me-2'>
                                    {$row->nombre_album}
                                </td>
                                <td>{$row->artista}</td>
                                <td>$<?php echo $row->precio; ?></td>
                              </tr>";
                        $total += $row->precio;
                    }
                } else {
                    echo "<tr><td colspan='3' class='text-center'>Tu carrito está vacío. ¡Ve por unos álbumes!</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="d-flex justify-content-between align-items-center mt-4">
            <h4>Total: <span class="price-tag">$<?php echo number_format($total, 2); ?></span></h4>
            <div>
                <a href="finalizar_compra.php" class="btn btn-kpop">Finalizar Compra y Pagar</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>