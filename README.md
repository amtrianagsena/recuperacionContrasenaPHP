## Vista previa
https://www.loom.com/share/93ff53dff5314f2dbc8e30a251ee5cda?sid=967d7f8c-7aef-4ce1-aa29-3d5ca93abaea 

## Configuración de PHPMailer con Gmail

## Instalación con Composer

En la terminal, ejecuta: composer require phpmailer/phpmailer

Esto generará los siguientes archivos:

composer.json

composer.lock

Carpeta vendor/

## Configuración del controlador

En tu archivo AuthController.php, asegúrate de que la variable $link apunte correctamente a tu carpeta de proyecto.

Por ejemplo, si tu carpeta se llama recuperacion y está dentro de htdocs, entonces el link debe ser:

php
$link = "http://localhost/recuperacion/index.php?c=Auth&a=reset&token=$token";

## Configurar acceso desde Gmail

El archivo email.php usa una contraseña de aplicaciones de Gmail. Para crearla, sigue esta guía oficial de Google:

https://support.google.com/mail/answer/185833?hl=es

Importante: Debido a que el uso de PHPMailer con Gmail no es considerado un estándar moderno de seguridad, debes activar la verificación en dos pasos en tu cuenta de Gmail para poder generar una contraseña de aplicación válida.

Recomendaciones:

Usa una cuenta de Gmail dedicada solo para el proyecto.

No publiques tus contraseñas ni las subas a repositorios.




