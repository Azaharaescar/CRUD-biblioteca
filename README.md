# CRUD Biblioteca

Sistema de gestion de libros con PHP y MySQL usando el patron MVC.

## Caracteristicas

-   Crear, leer, actualizar y eliminar libros
-   Exportar listado a PDF
-   Validacion de formularios
-   Interfaz responsive

## Requisitos

-   PHP 7.4 o superior
-   MySQL o MariaDB
-   Apache (XAMPP o WAMP)

## Instalacion

1. Clonar el repositorio
2. Importar database/libros.sql en phpMyAdmin
3. Configurar config/database.php con tus credenciales
4. Acceder a http://localhost/tu-proyecto/public/

## Estructura del proyecto

```
proyecto/
├── app/
│   ├── controllers/
│   ├── models/
│   └── views/
├── config/
├── database/
├── public/
└── vendor/
```

## Tecnologias utilizadas

-   PHP
-   MySQL
-   PDO
-   FPDF
-   HTML5
-   CSS3

## Uso

-   La pagina principal muestra todos los libros
-   Click en "Agregar Libro" para crear uno nuevo
-   Click en "Editar" para modificar un libro
-   Click en "Eliminar" para borrar un libro
-   Click en "Exportar a PDF" para descargar el listado
