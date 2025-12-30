# Instrucciones para Hosting (InfinityFree)

## 📤 Pasos para subir el proyecto a InfinityFree

### 1. Crear cuenta en InfinityFree

-   Visita: https://infinityfree.net/
-   Regístrate gratuitamente
-   Crea un nuevo sitio web

### 2. Obtener credenciales

-   Anota tu **hostname MySQL**
-   Anota tu **nombre de base de datos**
-   Anota tu **usuario** y **contraseña**
-   Anota tu **dominio** (ej: tu-sitio.infinityfreeapp.com)

### 3. Subir archivos por FTP

#### Usando FileZilla:

```
Host: ftpupload.net
Usuario: [tu usuario de InfinityFree]
Contraseña: [tu contraseña de InfinityFree]
Puerto: 21
```

#### Estructura a subir:

-   Sube todo el contenido de la carpeta `public/` a `htdocs/`
-   Sube las carpetas `app/`, `config/`, `vendor/` dentro de `htdocs/`

### 4. Crear base de datos

1. Accede al panel de control de InfinityFree
2. Ve a "MySQL Databases"
3. Crea una nueva base de datos
4. Importa el archivo `database/libros.sql` usando phpMyAdmin

### 5. Configurar credenciales

Edita el archivo `config/database.php` en el servidor:

```php
private $host = "sql123.infinityfree.com"; // Tu host MySQL
private $db_name = "epiz_xxxxx_biblioteca"; // Tu nombre de DB
private $username = "epiz_xxxxx"; // Tu usuario
private $password = "tu_contraseña"; // Tu contraseña
```

### 6. Verificar rutas

Asegúrate de que todas las rutas sean relativas o absolutas correctas.

### 7. Probar el sitio

Accede a: `http://tu-sitio.infinityfreeapp.com/`

## 🔍 Solución de problemas comunes

### Error de conexión a base de datos

-   Verifica las credenciales en `config/database.php`
-   Asegúrate de usar el hostname correcto de MySQL

### Archivos CSS no cargan

-   Verifica que la ruta en las vistas sea correcta: `css/style.css`
-   Asegúrate de que los archivos CSS estén en `htdocs/css/`

### Error 500

-   Verifica los permisos de archivos (755 para carpetas, 644 para archivos)
-   Revisa el archivo `.htaccess` si es necesario

### PDF no se genera

-   Verifica que la librería FPDF esté correctamente subida en `vendor/fpdf/`
-   Asegúrate de que el path sea correcto en LibroController.php

## 📝 Alternativas de Hosting Gratuito

-   **InfinityFree**: https://infinityfree.net/
-   **000webhost**: https://www.000webhost.com/
-   **Vercel** (con PHP): https://vercel.com/
-   **Heroku** (con PHP): https://www.heroku.com/

## 🎯 URL Final

Actualiza el README.md con tu URL final:

```
http://tu-usuario.infinityfreeapp.com/biblioteca
```
