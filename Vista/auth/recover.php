<?php
$msgs = [
    'correo_enviado' => 'Revisa tu correo para recuperar la contraseña.',
    'correo_desconocido' => 'El correo no está registrado.',
    'error_correo' => 'No se pudo enviar el correo.'
];
if (isset($_GET['msg']) && isset($msgs[$_GET['msg']])) {
    echo "<div class='alert alert-info'>{$msgs[$_GET['msg']]}</div>";
}
?>

<form method="POST" action="index.php?c=Auth&a=enviarRecuperacion" class="container mt-4">
    <h2>Recuperar Contraseña</h2>
    <input name="email" type="email" class="form-control mb-2" placeholder="Correo">
    <button class="btn btn-warning">Enviar enlace</button>
</form>
