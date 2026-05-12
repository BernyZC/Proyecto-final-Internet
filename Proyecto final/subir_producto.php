<?php
include("conexion.php");
if (!empty($_POST["btnsubir"])) {
    $nombre = $_POST["nombre"];
    $artista = $_POST["artista"];
    $precio = $_POST["precio"];
    $directorio_actual = dirname(__FILE__); 
    $nombre_imagen = $_FILES['imagen']['name'];
    $ruta_temporal = $_FILES['imagen']['tmp_name'];
    $carpeta_destino = $directorio_actual . "/img/" . $nombre_imagen;
        $sql = $conexion->query("INSERT INTO productos (nombre_album, artista, precio, imagen) VALUES ('$nombre', '$artista', '$precio', '$nombre_imagen')");

        if ($sql == 1) {
            echo '<div class="alert alert-success">¡Álbum subido con éxito!</div>';
        } else {
            echo '<div class="alert alert-danger">Error al guardar en la base de datos.</div>';
        }
    } else {
        echo '<div class="alert alert-danger">Error al subir la imagen al servidor.</div>';
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Admin - Subir Álbum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-0">
                <div class="card-header btn-kpop text-white text-center py-3">
                    <h4 class="mb-0">Añadir Nuevo Álbum</h4>
                </div>
                <div class="card-body p-4">
                    <form method="POST" enctype="multipart/form-data">
                        
                        <div class="mb-3">
                            <label class="form-label">Nombre del Álbum</label>
                            <input type="text" name="nombre" class="form-control" placeholder="Ej: Proof" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Artista / Grupo</label>
                            <input type="text" name="artista" class="form-control" placeholder="Ej: BTS" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Precio (USD)</label>
                            <input type="number" step="0.01" name="precio" class="form-control" placeholder="0.00" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Portada del Álbum</label>
                            <input type="file" name="imagen" class="form-control" accept="image/*" required>
                            <div class="form-text">Formatos aceptados: JPG, PNG.</div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" name="btnsubir" value="ok" class="btn btn-kpop">Publicar Álbum</button>
                            <a href="productos.php" class="btn btn-outline-secondary">Ver Tienda</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>