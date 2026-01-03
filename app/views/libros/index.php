<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca - Listado de Libros</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <h1>Biblioteca - Gestión de Libros</h1>

        <?php
        // muestro el mensaje si existe
        if (isset($_GET['mensaje'])) {
            $mensaje = $_GET['mensaje'];
            if ($mensaje == 'creado') {
                echo '<div class="mensaje exito">Libro creado correctamente</div>';
            }
            if ($mensaje == 'editado') {
                echo '<div class="mensaje exito">Libro editado correctamente</div>';
            }
            if ($mensaje == 'eliminado') {
                echo '<div class="mensaje exito">Libro eliminado correctamente</div>';
            }
            if ($mensaje == 'error') {
                echo '<div class="mensaje error">Error al procesar la solicitud</div>';
            }
        }
        ?>

        <div class="acciones">
            <a href="index.php?action=create" class="btn btn-primary">Agregar Libro</a>
            <a href="index.php?action=exportPdf" class="btn btn-secondary">Exportar a PDF</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>Año</th>
                    <th>Editorial</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // recorro los libros con un for
                $total = count($libros);
                for ($i = 0; $i < $total; $i++) {
                    $libro = $libros[$i];
                    echo '<tr>';
                    echo '<td>' . $libro['id'] . '</td>';
                    echo '<td>' . $libro['titulo'] . '</td>';
                    echo '<td>' . $libro['autor'] . '</td>';
                    echo '<td>' . $libro['anio'] . '</td>';
                    echo '<td>' . $libro['editorial'] . '</td>';
                    echo '<td class="acciones">';
                    echo '<a href="index.php?action=edit&id=' . $libro['id'] . '" class="btn btn-edit">Editar</a> ';
                    echo '<a href="index.php?action=delete&id=' . $libro['id'] . '" class="btn btn-delete" onclick="return confirm(\'¿Seguro que quieres eliminar este libro?\')">Eliminar</a>';
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>