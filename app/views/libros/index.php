<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca - Lista de Libros</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <h1>Gestión de Libros</h1>

        <?php
        // muestro mensajes si hay
        if (isset($_GET['msg'])) {
            $msg = $_GET['msg'];

            if ($msg == 'created') {
                echo '<div class="alert alert-success">Libro creado correctamente</div>';
            } else if ($msg == 'updated') {
                echo '<div class="alert alert-success">Libro actualizado</div>';
            } else if ($msg == 'deleted') {
                echo '<div class="alert alert-success">Libro eliminado</div>';
            } else if ($msg == 'error') {
                echo '<div class="alert alert-error">Error al procesar</div>';
            } else if ($msg == 'notfound') {
                echo '<div class="alert alert-error">Libro no encontrado</div>';
            }
        }
        ?>

        <div class="header-actions">
            <a href="index.php?action=create" class="btn btn-primary">Nuevo Libro</a>
            <a href="index.php?action=exportPdf" class="btn btn-success">Exportar PDF</a>
        </div>

        <?php
        $libros = $result->fetchAll(PDO::FETCH_ASSOC);
        $totalLibros = count($libros);

        if ($totalLibros > 0) {
        ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Año</th>
                        <th>Editorial</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < $totalLibros; $i++) {
                        $libro = $libros[$i];
                    ?>
                        <tr>
                            <td><?php echo htmlspecialchars($libro['id']); ?></td>
                            <td><?php echo htmlspecialchars($libro['titulo']); ?></td>
                            <td><?php echo htmlspecialchars($libro['autor']); ?></td>
                            <td><?php echo htmlspecialchars($libro['anio']); ?></td>
                            <td><?php echo htmlspecialchars($libro['editorial']); ?></td>
                            <td>
                                <div class="actions">
                                    <a href="index.php?action=edit&id=<?php echo $libro['id']; ?>"
                                        class="btn btn-warning btn-small">Editar</a>
                                    <a href="index.php?action=delete&id=<?php echo $libros[$i]['id']; ?>"
                                        class="btn btn-danger btn-small"
                                        onclick="return confirm('¿Seguro que quieres borrarlo?')">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        <?php
        } else {
        ?>
            <div class="empty-state">
                <p>No hay libros todavía</p>
                <a href="index.php?action=create" class="btn btn-primary">Añadir el primero</a>
            </div>
        <?php
        }
        ?>
    </div>
</body>

</html>