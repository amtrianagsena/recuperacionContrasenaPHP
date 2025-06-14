<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'vendor/autoload.php';

function enviarCorreo($destino, $asunto, $mensaje)
{
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'amtrianasena@gmail.com'; // tu correo
        $mail->Password   = 'oyjq ozpg obib qdxt'; // contraseña o App Password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;
        $mail->CharSet = 'UTF-8';         // Soporte de ñ y tildes
        $mail->Encoding = 'base64';       // Opcional, mejora soporte de caracteres especiales

        $mail->setFrom('amtrianasena@gmail.com', 'Sistema recuperación');
        $mail->addAddress($destino);
        $mail->isHTML(true);
        $mail->Subject = $asunto;
        $mail->Body    = $mensaje;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return "Error: {$mail->ErrorInfo}";
    }
}
