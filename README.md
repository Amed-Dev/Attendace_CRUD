# <h1 align="center">Attendace CRUD</h1>

## Tecnlogías

**Cliente:** ![HTML](https://img.shields.io/badge/HTML_5-orange?logo=html5&logoColor=white)
![CSS](https://img.shields.io/badge/CSS_3-blue?logo=css3&logoColor=white)
![BOOTSTRAP](https://img.shields.io/badge/Bootstrap_5.3.2-purple?logo=bootstrap&logoColor=white)
![JS](https://img.shields.io/badge/JavaScript-gray?logo=javascript&logoColor=yellow)

**Servidor:** ![PHP](https://img.shields.io/badge/PHP_8.2-gray?logo=php)

**Base de Datos:** ![MySQL](https://img.shields.io/badge/MySQL-gray?logo=mysql&logoColor=white&labelColor=42759c)

## Utilizar y probar el proyecto

Clonar el proyecto

```bash
  git clone https://github.com/Amed-Dev/Attendace_CRUD.git
```

Dirijete al directorio del proyecto

```bash
  cd Attendance_CRUD
```

Instala la base de datos usando el archivo `attendance.sql` que se encuentra en `./app/config/`

Conecta la base de datos con el proyecto, en `./app/config/dataBase.php` editando en la linea `2`

> [!IPORTANT] >**DB** -> BASE DE DATOS

```php
 $conn = new mysqli("127.0.0.1:3306", "root", "contraseña_DB", "attendace");
```

Corre el servidor en el archivo `index.php` y a probar 😎
