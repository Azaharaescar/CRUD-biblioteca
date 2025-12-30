<?php
require_once __DIR__ . '/../models/Libro.php';

// controlador principal para gestionar los libros
class LibroController
{
  private $libro;

  public function __construct($db)
  {
    $this->libro = new Libro($db);
  }

  // muestra la lista de todos los libros
  public function index()
  {
    $result = $this->libro->listar();
    include __DIR__ . '/../views/libros/index.php';
  }

  // crea un nuevo libro
  public function create()
  {
    $errores = array();

    // compruebo si se ha enviado el formulario
    if (isset($_POST['titulo'])) {
      // recojo los datos del formulario
      $titulo = trim($_POST['titulo']);
      $autor = trim($_POST['autor']);
      $anio = $_POST['anio'];
      $editorial = trim($_POST['editorial']);

      // validaciones basicas
      if (empty($titulo)) {
        $errores[] = "El título es obligatorio";
      }
      if (empty($autor)) {
        $errores[] = "El autor es obligatorio";
      }
      if (empty($anio)) {
        $errores[] = "El año es obligatorio";
      }
      if (empty($editorial)) {
        $errores[] = "La editorial es obligatoria";
      }

      // si no hay errores guardo el libro
      if (count($errores) == 0) {
        $this->libro->titulo = htmlspecialchars($titulo);
        $this->libro->autor = htmlspecialchars($autor);
        $this->libro->anio = $anio;
        $this->libro->editorial = htmlspecialchars($editorial);

        $resultado = $this->libro->crear();
        if ($resultado) {
          header("Location: index.php?msg=created");
          exit;
        } else {
          $errores[] = "Error al crear el libro";
        }
      }
    }
    include __DIR__ . '/../views/libros/create.php';
  }

  // edita un libro existente
  public function edit($id)
  {
    $this->libro->id = $id;
    $stmt = $this->libro->obtenerPorId();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $errores = array();

    // si no existe el libro redirijo con error
    if ($row == false) {
      header("Location: index.php?msg=notfound");
      exit;
    }

    // si se envio el formulario proceso los datos
    if (isset($_POST['titulo'])) {
      $titulo = trim($_POST['titulo']);
      $autor = trim($_POST['autor']);
      $anio = $_POST['anio'];
      $editorial = trim($_POST['editorial']);

      // valido que no esten vacios
      if (empty($titulo)) {
        $errores[] = "El título es obligatorio";
      }
      if (empty($autor)) {
        $errores[] = "El autor es obligatorio";
      }
      if (empty($anio)) {
        $errores[] = "El año es obligatorio";
      }
      if (empty($editorial)) {
        $errores[] = "La editorial es obligatoria";
      }

      // actualizo si todo esta bien
      if (count($errores) == 0) {
        $this->libro->titulo = htmlspecialchars($titulo);
        $this->libro->autor = htmlspecialchars($autor);
        $this->libro->anio = $anio;
        $this->libro->editorial = htmlspecialchars($editorial);

        $resultado = $this->libro->editar();
        if ($resultado) {
          header("Location: index.php?msg=updated");
          exit;
        } else {
          $errores[] = "Error al actualizar el libro";
        }
      }
    }
    include __DIR__ . '/../views/libros/edit.php';
  }

  // borra un libro de la base de datos
  public function delete($id)
  {
    $this->libro->id = $id;
    $resultado = $this->libro->eliminar();

    if ($resultado) {
      header("Location: index.php?msg=deleted");
    } else {
      header("Location: index.php?msg=error");
    }
    exit;
  }

  // genera el pdf con todos los libros
  public function exportPdf()
  {
    $result = $this->libro->listar();
    require_once __DIR__ . '/../../vendor/fpdf/fpdf.php';

    // creo el pdf
    $pdf = new FPDF('P', 'mm', 'A4');
    $pdf->AddPage();
    $pdf->SetMargins(15, 15, 15);

    // titulo del documento
    $pdf->SetFont('Arial', 'B', 20);
    $pdf->SetTextColor(102, 126, 234);
    $pdf->Cell(0, 15, 'CATALOGO DE LIBROS', 0, 1, 'C');
    $pdf->Ln(5);

    // fecha de generacion
    $pdf->SetFont('Arial', 'I', 10);
    $pdf->SetTextColor(100, 100, 100);
    $fechaActual = date('d/m/Y H:i:s');
    $pdf->Cell(0, 6, 'Generado: ' . $fechaActual, 0, 1, 'C');
    $pdf->Ln(10);

    // cabecera de la tabla
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->SetFillColor(102, 126, 234);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->SetDrawColor(102, 126, 234);

    $pdf->Cell(15, 10, 'ID', 1, 0, 'C', true);
    $pdf->Cell(70, 10, 'TITULO', 1, 0, 'C', true);
    $pdf->Cell(50, 10, 'AUTOR', 1, 0, 'C', true);
    $pdf->Cell(20, 10, 'ANO', 1, 0, 'C', true);
    $pdf->Cell(25, 10, 'EDITORIAL', 1, 1, 'C', true);

    // datos de los libros
    $pdf->SetFont('Arial', '', 9);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFillColor(240, 240, 240);

    $colorFila = false;
    $contador = 0;
    $libros = $result->fetchAll(PDO::FETCH_ASSOC);
    $totalLibros = count($libros);

    // recorro todos los libros y los meto en la tabla
    for ($i = 0; $i < $totalLibros; $i++) {
      $libro = $libros[$i];

      $pdf->Cell(15, 8, $libro['id'], 1, 0, 'C', $colorFila);
      $pdf->Cell(70, 8, utf8_decode($libro['titulo']), 1, 0, 'L', $colorFila);
      $pdf->Cell(50, 8, utf8_decode($libro['autor']), 1, 0, 'L', $colorFila);
      $pdf->Cell(20, 8, $libro['anio'], 1, 0, 'C', $colorFila);

      // acorto la editorial si es muy larga
      $edit = $libro['editorial'];
      if (strlen($edit) > 15) {
        $edit = substr($edit, 0, 15);
      }
      $pdf->Cell(25, 8, utf8_decode($edit), 1, 1, 'L', $colorFila);

      // alterno el color de las filas
      if ($colorFila == false) {
        $colorFila = true;
      } else {
        $colorFila = false;
      }
      $contador = $contador + 1;
    }

    // pie con el total
    $pdf->Ln(5);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetTextColor(102, 126, 234);
    $pdf->Cell(0, 8, 'Total de libros: ' . $contador, 0, 1, 'R');

    $pdf->Output('D', 'catalogo_libros_' . date('Y-m-d') . '.pdf');
  }
}
