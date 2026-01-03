<?php
// controlador de libros
require_once __DIR__ . '/../models/libro.php';

class LibroController
{
  private $libroModel;

  public function __construct($conexion)
  {
    $this->libroModel = new Libro($conexion);
  }

  // muestra todos los libros
  public function index()
  {
    $libros = $this->libroModel->listar();
    require_once __DIR__ . '/../views/libros/index.php';
  }

  // muestra formulario para crear libro
  public function create()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // recojo los datos del formulario
      $titulo = $_POST['titulo'];
      $autor = $_POST['autor'];
      $anio = $_POST['anio'];
      $editorial = $_POST['editorial'];

      // valido los campos
      $errores = array();

      if (empty($titulo)) {
        $errores[] = 'El titulo es obligatorio';
      }
      if (empty($autor)) {
        $errores[] = 'El autor es obligatorio';
      }
      if (empty($anio) || !is_numeric($anio)) {
        $errores[] = 'El año debe ser un numero valido';
      }
      if (empty($editorial)) {
        $errores[] = 'La editorial es obligatoria';
      }

      // si no hay errores guardo el libro
      if (count($errores) == 0) {
        $resultado = $this->libroModel->crear($titulo, $autor, $anio, $editorial);

        if ($resultado) {
          header('Location: index.php?mensaje=creado');
          exit();
        } else {
          $errores[] = 'Error al guardar el libro';
        }
      }

      require_once __DIR__ . '/../views/libros/create.php';
    } else {
      require_once __DIR__ . '/../views/libros/create.php';
    }
  }

  // muestra formulario para editar libro
  public function edit()
  {
    $id = $_GET['id'];
    $libro = $this->libroModel->obtenerPorId($id);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // recojo los datos del formulario
      $titulo = $_POST['titulo'];
      $autor = $_POST['autor'];
      $anio = $_POST['anio'];
      $editorial = $_POST['editorial'];

      // valido los campos
      $errores = array();

      if (empty($titulo)) {
        $errores[] = 'El titulo es obligatorio';
      }
      if (empty($autor)) {
        $errores[] = 'El autor es obligatorio';
      }
      if (empty($anio) || !is_numeric($anio)) {
        $errores[] = 'El año debe ser un numero valido';
      }
      if (empty($editorial)) {
        $errores[] = 'La editorial es obligatoria';
      }

      // si no hay errores actualizo el libro
      if (count($errores) == 0) {
        $resultado = $this->libroModel->editar($id, $titulo, $autor, $anio, $editorial);

        if ($resultado) {
          header('Location: index.php?mensaje=editado');
          exit();
        } else {
          $errores[] = 'Error al actualizar el libro';
        }
      }

      require_once __DIR__ . '/../views/libros/edit.php';
    } else {
      require_once __DIR__ . '/../views/libros/edit.php';
    }
  }

  // elimina un libro
  public function delete()
  {
    $id = $_GET['id'];
    $resultado = $this->libroModel->eliminar($id);

    if ($resultado) {
      header('Location: index.php?mensaje=eliminado');
    } else {
      header('Location: index.php?mensaje=error');
    }
    exit();
  }

  // exporta los libros a PDF
  public function exportPdf()
  {
    // traigo todos los libros de la base de datos
    $libros = $this->libroModel->listar();

    // incluyo la libreria de fpdf
    require_once __DIR__ . '/../../vendor/fpdf/fpdf.php';

    // creo el pdf
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);

    // titulo del documento
    $pdf->Cell(0, 10, 'Listado de Libros', 0, 1, 'C');
    $pdf->Ln(5);

    // encabezados de la tabla
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->SetFillColor(200, 220, 255);
    $pdf->Cell(10, 10, 'ID', 1, 0, 'C', true);
    $pdf->Cell(70, 10, 'Titulo', 1, 0, 'C', true);
    $pdf->Cell(50, 10, 'Autor', 1, 0, 'C', true);
    $pdf->Cell(20, 10, 'Año', 1, 0, 'C', true);
    $pdf->Cell(40, 10, 'Editorial', 1, 1, 'C', true);

    // datos de los libros
    $pdf->SetFont('Arial', '', 10);

    // recorro todos los libros con un for
    $totalLibros = count($libros);
    for ($i = 0; $i < $totalLibros; $i++) {
      $libro = $libros[$i];
      $pdf->Cell(10, 10, $libro['id'], 1, 0, 'C');
      $pdf->Cell(70, 10, substr($libro['titulo'], 0, 35), 1, 0);
      $pdf->Cell(50, 10, substr($libro['autor'], 0, 25), 1, 0);
      $pdf->Cell(20, 10, $libro['anio'], 1, 0, 'C');
      $pdf->Cell(40, 10, substr($libro['editorial'], 0, 20), 1, 1);
    }

    // mando el pdf al navegador
    $pdf->Output('D', 'libros.pdf');
    exit();
  }
}
