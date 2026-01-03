<?php
// modelo de libro

class Libro
{
    private $conn;
    private $table = 'libros';

    public function __construct($conexion)
    {
        $this->conn = $conexion;
    }

    // lista todos los libros
    public function listar()
    {
        $query = "SELECT * FROM " . $this->table . " ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // obtiene un libro por su id
    public function obtenerPorId($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // crea un libro nuevo
    public function crear($titulo, $autor, $anio, $editorial)
    {
        $query = "INSERT INTO " . $this->table . " (titulo, autor, anio, editorial) VALUES (:titulo, :autor, :anio, :editorial)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':autor', $autor);
        $stmt->bindParam(':anio', $anio);
        $stmt->bindParam(':editorial', $editorial);

        return $stmt->execute();
    }

    // edita un libro existente
    public function editar($id, $titulo, $autor, $anio, $editorial)
    {
        $query = "UPDATE " . $this->table . " SET titulo = :titulo, autor = :autor, anio = :anio, editorial = :editorial WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':autor', $autor);
        $stmt->bindParam(':anio', $anio);
        $stmt->bindParam(':editorial', $editorial);

        return $stmt->execute();
    }

    // elimina un libro
    public function eliminar($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
