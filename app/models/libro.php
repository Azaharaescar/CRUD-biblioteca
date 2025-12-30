<?php
require_once __DIR__ . '/../../config/database.php';

// modelo para trabajar con libros
class Libro
{
    private $conn;
    private $table_name = "libros";
    public $id;
    public $titulo;
    public $autor;
    public $anio;
    public $editorial;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // obtiene todos los libros ordenados
    public function listar()
    {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id DESC";
        return $this->conn->query($query);
    }

    // busca un libro por su id
    public function obtenerPorId()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':id' => $this->id]);
        return $stmt;
    }

    // inserta un libro nuevo
    public function crear()
    {
        $query = "INSERT INTO " . $this->table_name . " (titulo, autor, anio, editorial) VALUES (:titulo, :autor, :anio, :editorial)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([':titulo' => $this->titulo, ':autor' => $this->autor, ':anio' => $this->anio, ':editorial' => $this->editorial]);
    }

    // actualiza un libro existente
    public function editar()
    {
        $query = "UPDATE " . $this->table_name . " SET titulo=:titulo, autor=:autor, anio=:anio, editorial=:editorial WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([':titulo' => $this->titulo, ':autor' => $this->autor, ':anio' => $this->anio, ':editorial' => $this->editorial, ':id' => $this->id]);
    }

    // borra un libro
    public function eliminar()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([':id' => $this->id]);
    }
}
