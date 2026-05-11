<?php
include("conexion.php");
$query = "SELECT * FROM productos";
$resultado = mysqli_query($conexion, $query);

while ($row = mysqli_fetch_assoc($resultado)) {
    ?>
    <div class="col-md-4 mb-4">
        <div class="card h-100 kpop-card">
            <img src="img/<?php echo $row['imagen']; ?>" class="card-img-top" alt="Album cover">
            <div class="card-body text-center">
                <h5 class="card-title"><?php echo $row['nombre_album']; ?></h5>
                <p class="card-text text-muted"><?php echo $row['artista']; ?></p>
                <p class="price-tag">$<?php echo $row['precio']; ?> USD</p>
                <a href="carrito.php?id=<?php echo $row['id']; ?>" class="btn btn-kpop">Añadir al carrito</a>
            </div>
        </div>
    </div>
    <?php
}
?>
