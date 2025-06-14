<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Recuperar Contraseña</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS + JS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Opcional: Estilos personalizados -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            max-width: 500px;
            margin: 60px auto;
            border-radius: 1rem;
        }
    </style>
</head>

<body>

    <?php
    $msgs = [
        'correo_enviado' => [
            'text' => '✅ Revisa tu correo para recuperar la contraseña.',
            'class' => 'alert-success'
        ],
        'correo_desconocido' => [
            'text' => '⚠️ El correo no está registrado.',
            'class' => 'alert-warning'
        ],
        'error_correo' => [
            'text' => '❌ No se pudo enviar el correo. Intenta más tarde.',
            'class' => 'alert-danger'
        ]
    ];

    if (isset($_GET['msg']) && isset($msgs[$_GET['msg']])):
    ?>
        <div class="container mt-4">
            <div class="alert <?= $msgs[$_GET['msg']]['class'] ?> alert-dismissible fade show" role="alert">
                <?= $msgs[$_GET['msg']]['text'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        </div>
    <?php endif; ?>

    <div class="container">
        <div class="card shadow">
            <div class="card-body">
                <h3 class="card-title mb-3 text-center">Recuperar Contraseña</h3>
                <form method="POST" action="index.php?c=Auth&a=enviarRecuperacion">
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input id="email" name="email" type="email" class="form-control" placeholder="Ingresa tu correo" required>
                    </div>
                    <button class="btn btn-warning w-100" type="submit">Enviar enlace de recuperación</button>
                </form>
                <div class="mt-3 text-center">
                    <a href="index.php?c=Auth&a=login">← Volver al inicio de sesión</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>