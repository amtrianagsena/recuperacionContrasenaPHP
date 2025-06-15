<?php
require_once 'Modelo/Usuario.php';
require_once 'config/email.php';

class AuthController
{
    public function login()
    {
        include 'Vista/auth/login.php';
    }

    public function registro()
    {
        include 'Vista/auth/register.php';
    }
    public function registrarUsuario()
    {
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $usuario = new Usuario();
        if ($usuario->existeCorreo($email)) {
            header("Location: index.php?c=Auth&a=registro&msg=correo_existe");
            exit;
        }

        $resultado = $usuario->registrar($nombre, $email, $password);
        if ($resultado) {
            header("Location: index.php?c=Auth&a=registro&msg=registro_ok");
        } else {
            header("Location: index.php?c=Auth&a=registro&msg=error");
        }
    }
    public function recuperar()
    {
        include 'Vista/auth/recover.php';
    }

    public function enviarRecuperacion()
    {
        $usuario = new Usuario();
        $email = $_POST['email'];
        $user = $usuario->obtenerPorEmail($email);

        if ($user) {
            $nombre = $user['nombre'];
            $token = bin2hex(random_bytes(16));
            $expira = date('Y-m-d H:i:s', strtotime('+1 hour'));
            $usuario->guardarToken($email, $token, $expira);

            $link = "http://localhost:8080/recuperacion/index.php?c=Auth&a=reset&token=$token";
            #$html = "<h3>Recupera tu contraseña</h3><p><a href='$link'>$link</a></p>";
            $html = "
            <h3>Hola $nombre,</h3>
            <p>Hemos recibido una solicitud para recuperar tu contraseña.</p>
            <p>Puedes restablecerla haciendo clic en el siguiente enlace:</p>
            <p><a href='$link'>$link</a></p>
            <p>Si no solicitaste esto, puedes ignorar este correo.</p>
            <p>Gracias,<br>Equipo de soporte</p>";

            $res = enviarCorreo($email, "Recuperación de contraseña", $html);

            $msg = $res === true ? 'correo_enviado' : 'error_correo';
        } else {
            $msg = 'correo_desconocido';
        }

        header("Location: index.php?c=Auth&a=recuperar&msg=$msg");
    }

    private $pdo;

    public function obtenerPorEmail($email)
    {
        try {
            $sql = "SELECT * FROM usuarios WHERE email = :email";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['email' => $email]);
            return $stmt->fetch(PDO::FETCH_ASSOC); // Devuelve un array asociativo con los datos del usuario
        } catch (PDOException $e) {
            // Puedes mostrar o registrar el error
            echo "Error al obtener el usuario por email: " . $e->getMessage();
            return false;
        }
    }
    public function reset()
    {
        if (!isset($_GET['token'])) {
            echo "Token no proporcionado.";
            exit;
        }
        $token = $_GET['token'];

        $usuario = new Usuario();
        $user = $usuario->verificarToken($token); // Método que busca el token en la BD y valida expiración

        if ($user) {
            // Si el token es válido, se muestra el formulario
            include 'Vista/auth/reset.php';
        } else {
            // Si no, se muestra mensaje de error
            echo "Token inválido o expirado.";
        }
    }


    public function actualizarPassword()
    {
        $usuario = new Usuario();
        $user = $usuario->verificarToken($_POST['token']);
        if ($user) {
            $usuario->actualizarPassword($user['id'], $_POST['password']);
            header("Location: index.php?c=Auth&a=login&msg=password_actualizada");
        } else {
            echo "Token inválido o expirado.";
        }
    }

    /**nuevo */
    public function loginPost()
    {
        $correo = $_POST['correo'];
        $clave = $_POST['clave'];

        $usuario = new Usuario();
        $user = $usuario->verificarLogin($correo, $clave);

        if ($user) {
            session_start();
            $_SESSION['usuario'] = $user;
            header("Location: index.php?c=Auth&a=perfil");
        } else {
            $mensaje = "Correo o contraseña incorrectos";
            include 'Vista/auth/login.php';
        }
    }

    public function perfil()
    {
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?c=Auth&a=login");
            exit;
        }
        $usuario = $_SESSION['usuario'];
        include 'Vista/auth/perfil.php'; // o como quieras nombrar la vista del usuario
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: index.php?c=Auth&a=login&msg=logout");
    }
}
