<?php
class Database {
    public static function conectar() {
        return new PDO(
            'mysql:host=localhost;dbname=app;charset=utf8',
            'root', '', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        );
    }
}
?>