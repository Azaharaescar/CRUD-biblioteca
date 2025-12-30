<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Libro - Biblioteca</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <h1>Agregar Libro</h1>

        <?php
        // muestro errores si los hay
        if (isset($errores) && count($errores) > 0) {
        ?>
            <div class="alert alert-error">
                <strong>Errores encontrados:</strong>
                <ul>
                    <?php
                    for ($i = 0; $i < count($errores); $i++) {
                        echo '<li>' . htmlspecialchars($errores[$i]) . '</li>';
                    }
                    ?>
                </ul>
            </div>
        <?php
        }
        ?>

        <div class="form-container">
            <form method="post">
                <div class="form-group">
                    <label for="titulo">Título *</label>
                    <input type="text" id="titulo" name="titulo" required placeholder="Ej: Cien años de soledad">
                </div>

                <div class="form-group">
                    <label for="autor">Autor *</label>
                    <input type="text" id="autor" name="autor" required placeholder="Ej: Gabriel García Márquez">
                </div>

                <div class="form-group">
                    <label for="anio">Año de Publicación *</label>
                    <input type="number" id="anio" name="anio" required placeholder="Ej: 1967" min="1" max="<?php echo date('Y'); ?>">
                </div>

                <div class="form-group">
                    <label for="editorial">Editorial *</label>
                    <input type="text" id="editorial" name="editorial" required placeholder="Ej: Editorial Sudamericana">
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <a href="index.php" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>