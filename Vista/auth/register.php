<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-light">

    <?php if (isset($_GET['msg'])): ?>
        <div class="container mt-3">
            <?php if ($_GET['msg'] === 'registro_ok'): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    ✅ Registro exitoso. Ahora puedes iniciar sesión.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                </div>
            <?php elseif ($_GET['msg'] === 'error'): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    ❌ Hubo un error durante el registro.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                </div>
            <?php elseif ($_GET['msg'] === 'correo_existe'): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    ⚠️ El correo ya está registrado.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="card p-4 shadow" style="max-width: 400px; width: 100%;">
            <h3 class="text-center mb-4">Registro</h3>

            <form method="POST" action="index.php?c=Auth&a=registrarUsuario">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre completo</label>
                    <input name="nombre" id="nombre" class="form-control" placeholder="Ej: Juan Pérez" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input name="email" type="email" id="email" class="form-control" placeholder="correo@ejemplo.com" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input name="password" type="password" id="password" class="form-control" placeholder="********" required>
                </div>

                <button class="btn btn-primary w-100" type="submit">Registrarse</button>

                <div class="text-center mt-3">
                    <a href="index.php?c=Auth&a=login" class="text-decoration-none">¿Ya tienes cuenta? Inicia sesión</a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>