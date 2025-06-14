<?php
require_once 'config/database.php';

class Usuario {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::conectar();
    }

    public function registrar($nombre, $email, $password) {
        $sql = "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nombre, $email, password_hash($password, PASSWORD_DEFAULT)]);
    }

    public function obtenerPorEmail($email) {
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function guardarToken($email, $token, $expira) {
        $sql = "UPDATE usuarios SET token = ?, token_expira = ? WHERE email = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$token, $expira, $email]);
    }

    public function verificarToken($token) {
        $sql = "SELECT * FROM usuarios WHERE token = ? AND token_expira > NOW()";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$token]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizarPassword($id, $password) {
        $sql = "UPDATE usuarios SET password = ?, token = NULL, token_expira = NULL WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([password_hash($password, PASSWORD_DEFAULT), $id]);
    }

    /**nuevo */
    public function verificarLogin($correo, $clave) {
    $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$correo]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($user && password_verify($clave, $user['password'])) {
        return $user;
    }
    return false;
}
public function existeCorreo($email)
{
    $sql = "SELECT COUNT(*) FROM usuarios WHERE email = :email";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute(['email' => $email]);
    $count = $stmt->fetchColumn();

    return $count > 0;
}


}
?>