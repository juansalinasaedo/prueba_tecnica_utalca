# Sistema de Login con API en PHP

Este proyecto es un sistema de login básico implementado en PHP utilizando una API externa para gestionar usuarios y autenticación. La API externa es simulada utilizando el servicio de MockAPI. El sistema permite el registro de nuevos usuarios, inicio de sesión, obtención de información del usuario, lista de usuarios y eliminación de cuentas.

## Requisitos previos

Antes de ejecutar la solución, asegúrate de tener lo siguiente instalado en tu entorno:

- **PHP:** Asegúrate de tener PHP instalado en tu computadora. Puedes descargar PHP desde el sitio web oficial: [https://www.php.net/downloads.php](https://www.php.net/downloads.php)

- **Composer:** Composer es una herramienta para gestionar dependencias en PHP. Si no tienes Composer instalado, puedes descargarlo desde: [https://getcomposer.org/download/](https://getcomposer.org/download/)

## Instrucciones de ejecución

Sigue los siguientes pasos para ejecutar la solución:

1. **Clonar el repositorio:**

git clone https://github.com/tu_usuario/tu_repositorio.git


Sustituye `tu_usuario` y `tu_repositorio` con tu nombre de usuario y nombre del repositorio donde clonaste la solución.

2. **Instalar dependencias:**

Navega al directorio del proyecto y ejecuta el siguiente comando para instalar las dependencias (JWT y cURL):

composer install


3. **Configurar la URL de la API externa:**

Abre el archivo `functions.php` y busca la variable `$apiBaseUrl`. Asegúrate de que tenga la URL correcta de la API externa (MockAPI). Por ejemplo:

```php
// functions.php

// URL base de la API externa (MockAPI)
$apiBaseUrl = 'https://64c91dd9b2980cec85c1ef1a.mockapi.io/usuario'; // Reemplaza con tu URL base de MockAPI

Ejecutar el servidor web:

Inicia el servidor web para que puedas acceder a la aplicación. Puedes utilizar el servidor incorporado de PHP para esto. Navega al directorio del proyecto y ejecuta:

php -S localhost:8000

Acceder a la aplicación:

Abre tu navegador web y visita la URL http://localhost:8000 para acceder al sistema de login. Desde aquí, puedes utilizar los siguientes endpoints:

/login: Para iniciar sesión como usuario registrado.
/me: Para obtener información del perfil del usuario autenticado.
/new: Para registrar un nuevo usuario.
/delete: Para eliminar la cuenta del usuario autenticado.
/logout: Para cerrar sesión.
/list: Para ver el listado completo de usuarios.
