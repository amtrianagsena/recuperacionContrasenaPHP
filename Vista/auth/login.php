<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0 text-center">Iniciar Sesión</h4>
                    </div>
                    <div class="card-body">
                        <?php if (isset($mensaje)) : ?>
                            <div class="alert alert-danger"><?= $mensaje ?></div>
                        <?php endif; ?>

                        <form action="index.php?c=Auth&a=loginPost" method="POST">
                            <div class="mb-3">
                                <label for="correo" class="form-label">Correo electrónico</label>
                                <input type="email" name="correo" id="correo" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="clave" class="form-label">Contraseña</label>
                                <input type="password" name="clave" id="clave" class="form-control" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Ingresar</button>
                            </div>
                        </form>

                        <div class="mt-3 text-center">
                            <a href="index.php?c=Auth&a=registro" class="text-decoration-none">¿No tienes cuenta? Regístrate</a><br>
                            <a href="index.php?c=Auth&a=recuperar" class="text-decoration-none">¿Olvidaste tu contraseña?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>