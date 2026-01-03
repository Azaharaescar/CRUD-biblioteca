<?php
// configuracion de la base de datos

$host = "localhost";
$db_name = "biblioteca";
$username = "root";
$password = "root";

try {
  $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->exec("set names utf8mb4");
} catch (PDOException $e) {
  die("Error de conexión: " . $e->getMessage());
}
