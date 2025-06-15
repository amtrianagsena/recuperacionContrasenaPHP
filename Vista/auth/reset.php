<!DOCTYPE html>
<html>

<head>
    <title>Restablecer Contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
    <h2>Restablecer Contraseña</h2>
    <form method="POST" action="index.php?c=Auth&a=actualizarPassword">
        <input type="hidden" name="token" value="<?= htmlspecialchars($_GET['token']) ?>">
        <div class="mb-3">
            <label for="password">Nueva Contraseña</label>
            <input type="password" class="form-control" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</body>

</html>