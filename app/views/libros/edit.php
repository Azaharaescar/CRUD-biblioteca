<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Libro</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <h1>Editar Libro</h1>

        <?php
        // muestro los errores si existen
        if (isset($errores) && count($errores) > 0) {
            echo '<div class="mensaje error">';
            echo '<ul>';
            $totalErrores = count($errores);
            for ($i = 0; $i < $totalErrores; $i++) {
                echo '<li>' . $errores[$i] . '</li>';
            }
            echo '</ul>';
            echo '</div>';
        }
        ?>

        <form method="POST" action="index.php?action=edit&id=<?php echo $libro['id']; ?>">
            <div class="form-group">
                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" value="<?php echo isset($_POST['titulo']) ? $_POST['titulo'] : $libro['titulo']; ?>" required>
            </div>

            <div class="form-group">
                <label for="autor">Autor:</label>
                <input type="text" id="autor" name="autor" value="<?php echo isset($_POST['autor']) ? $_POST['autor'] : $libro['autor']; ?>" required>
            </div>

            <div class="form-group">
                <label for="anio">Año:</label>
                <input type="number" id="anio" name="anio" value="<?php echo isset($_POST['anio']) ? $_POST['anio'] : $libro['anio']; ?>" required>
            </div>

            <div class="form-group">
                <label for="editorial">Editorial:</label>
                <input type="text" id="editorial" name="editorial" value="<?php echo isset($_POST['editorial']) ? $_POST['editorial'] : $libro['editorial']; ?>" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="index.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</body>

</html>