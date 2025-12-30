# 📚 Biblioteca - CRUD de Libros

Sistema de gestión de biblioteca desarrollado con **PHP OOP** y el patrón de diseño **MVC** (Model-View-Controller).

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)

## 🚀 Características

-   ✅ **CRUD Completo**: Crear, Leer, Actualizar y Eliminar libros
-   🎨 **Diseño Moderno**: Interfaz responsiva con gradientes y animaciones
-   📄 **Exportar a PDF**: Genera catálogo profesional de libros en PDF
-   🔒 **Seguridad**: Validaciones del lado del servidor y protección XSS
-   🏗️ **Arquitectura MVC**: Código organizado y mantenible
-   💾 **Base de datos**: MySQL con datos de ejemplo de Mockaroo
-   ✨ **UX Mejorada**: Mensajes de confirmación y alertas visuales

## 📋 Requisitos

-   PHP >= 7.4
-   MySQL >= 5.7
-   Apache/Nginx
-   FPDF Library (incluida en `vendor/`)

## 🛠️ Instalación

### 1. Clonar el repositorio

```bash
git clone https://github.com/tu-usuario/biblioteca-crud.git
cd biblioteca-crud
```

### 2. Configurar la base de datos

```bash
# Crear la base de datos e importar el script
mysql -u root -p < database/libros.sql
```

### 3. Configurar credenciales de base de datos

Editar el archivo `config/database.php` con tus credenciales:

```php
private $host = "localhost";
private $db_name = "biblioteca";
private $username = "root";
private $password = "";
```

### 4. Configurar servidor web

#### Con XAMPP:

-   Copiar el proyecto a `c:\xampp\htdocs\biblioteca`
-   Acceder a: `http://localhost/biblioteca/public/`

#### Con PHP Built-in Server:

```bash
cd public
php -S localhost:8000
```

## 📁 Estructura del Proyecto

```
biblioteca/
├── app/
│   ├── controllers/
│   │   └── LibroController.php    # Controlador principal
│   ├── models/
│   │   └── Libro.php              # Modelo de datos
│   └── views/
│       └── libros/
│           ├── index.php          # Lista de libros
│           ├── create.php         # Formulario crear
│           └── edit.php           # Formulario editar
├── config/
│   └── database.php               # Configuración DB
├── database/
│   └── libros.sql                 # Script SQL con datos
├── public/
│   ├── css/
│   │   └── style.css              # Estilos CSS
│   └── index.php                  # Punto de entrada
├── vendor/
│   └── fpdf/                      # Librería PDF
├── .gitignore
└── README.md
```

## 🎯 Uso

### Listar Libros

Accede a la página principal para ver todos los libros registrados.

### Agregar Libro

1. Click en "➕ Nuevo Libro"
2. Completa el formulario
3. Click en "💾 Guardar Libro"

### Editar Libro

1. Click en "✏️ Editar" en cualquier libro
2. Modifica los campos necesarios
3. Click en "💾 Actualizar Libro"

### Eliminar Libro

Click en "🗑️ Eliminar" y confirma la acción

### Exportar a PDF

Click en "📄 Exportar a PDF" para generar un catálogo profesional en PDF

## 🌐 Demo en Vivo

**URL del proyecto:** [http://dwes.infinityfreeapp.com/biblioteca](http://dwes.infinityfreeapp.com/biblioteca)

_(Reemplaza con tu URL una vez subido al hosting)_

## 💻 Tecnologías Utilizadas

-   **Backend**: PHP 7.4+ con POO
-   **Patrón de diseño**: MVC (Model-View-Controller)
-   **Base de datos**: MySQL con PDO
-   **Frontend**: HTML5, CSS3 (Gradientes, Flexbox, Responsive)
-   **PDF**: FPDF Library
-   **Datos de prueba**: Mockaroo

## 🔐 Seguridad

-   ✅ Prepared Statements (PDO) para prevenir SQL Injection
-   ✅ Validación de datos del lado del servidor
-   ✅ Sanitización con `htmlspecialchars()`
-   ✅ Validación de tipos de datos
-   ✅ Confirmaciones para acciones destructivas

## 🎨 Capturas de Pantalla

### Lista de Libros

![Lista de libros](screenshots/lista.png)

### Formulario Crear/Editar

![Formulario](screenshots/formulario.png)

### PDF Generado

![PDF](screenshots/pdf.png)

## 📝 Características Adicionales Implementadas

-   🎨 Diseño con gradientes modernos
-   📱 Diseño completamente responsivo
-   ⚡ Transiciones y animaciones CSS
-   🔔 Sistema de notificaciones visuales
-   ✅ Validaciones en tiempo real
-   📊 Ordenamiento de libros por ID descendente
-   🎯 Confirmación antes de eliminar
-   📄 PDF con formato profesional y diseño tabular

## 🤝 Contribuciones

Las contribuciones son bienvenidas. Para cambios importantes:

1. Fork el proyecto
2. Crea una rama (`git checkout -b feature/mejora`)
3. Commit tus cambios (`git commit -m 'Agregar nueva característica'`)
4. Push a la rama (`git push origin feature/mejora`)
5. Abre un Pull Request

## 📄 Licencia

Este proyecto está bajo la Licencia MIT. Ver el archivo `LICENSE` para más detalles.

## 👩‍💻 Autor

**Azahara**

-   GitHub: [@tu-usuario](https://github.com/tu-usuario)
-   Proyecto: Desarrollo de Aplicaciones Web - DWES

## 📚 Referencias

-   [PHP Official Documentation](https://www.php.net/manual/es/)
-   [FPDF Library](http://www.fpdf.org/)
-   [Mockaroo - Data Generator](https://www.mockaroo.com/)
-   [MDN Web Docs](https://developer.mozilla.org/)

---

⭐ **¡Dale una estrella si te gustó el proyecto!** ⭐
