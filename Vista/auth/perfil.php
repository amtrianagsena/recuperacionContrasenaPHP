<?php
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php?c=Auth&a=login");
    exit;
}

$usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Bienvenido, <?= htmlspecialchars($usuario['nombre']) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <span class="navbar-brand">Mi Cuenta</span>
            <div class="d-flex">
                <a href="index.php?c=Auth&a=logout" class="btn btn-outline-light">Cerrar sesión</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="card-title">Bienvenido, <?= htmlspecialchars($usuario['nombre']) ?></h4>
                <p class="card-text"><strong>Correo:</strong> <?= htmlspecialchars($usuario['email']) ?></p>
                <p class="card-text"><strong>Usuario ID:</strong> <?= $usuario['id'] ?></p>
            </div>
        </div>
    </div>

</body>

</html>