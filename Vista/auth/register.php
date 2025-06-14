<?php if (isset($_GET['msg']) && $_GET['msg'] === 'registro_ok'): ?>
<div class="alert alert-success">Registro exitoso</div>
<?php endif; ?>

<form method="POST" action="index.php?c=Auth&a=registrarUsuario" class="container mt-4">
    <h2>Registro</h2>
    <input name="nombre" class="form-control mb-2" placeholder="Nombre">
    <input name="email" type="email" class="form-control mb-2" placeholder="Correo">
    <input name="password" type="password" class="form-control mb-2" placeholder="Contraseña">
    <button class="btn btn-primary">Registrarse</button>
</form>
