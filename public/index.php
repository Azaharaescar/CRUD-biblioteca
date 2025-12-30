<?php
// archivo principal que gestiona todas las peticiones

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/controllers/LibroController.php';

// conecto con la base de datos
$database = new Database();
$db = $database->getConnection();
$controller = new LibroController($db);

// recojo la accion que quiere hacer el usuario
$action = 'index';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

// recojo el id si lo hay
$id = null;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

// ejecuto la accion correspondiente
if ($action == 'create') {
    $controller->create();
} else if ($action == 'edit') {
    $controller->edit($id);
} else if ($action == 'delete') {
    $controller->delete($id);
} else if ($action == 'exportPdf') {
    $controller->exportPdf();
} else {
    $controller->index();
}
