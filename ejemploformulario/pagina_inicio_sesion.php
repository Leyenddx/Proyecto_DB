<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio Sesion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../CSS_Local/sesion.css">
</head>
<body class="bg-light">
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow w-100" style="max-width: 500px;">
        <h2 class="text-center mb-4">Inicio Sesion</h2>
        <form action="iniciar_sesion.php" method="post">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="contrasena" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="contrasena" name="contrasena" required>
            </div>
            <input type="submit" name="entrar" class="btn btn-primary w-100" value="Iniciar Sesion">
        </form>
        <div class="mt-3 text-center">
            <a href="index.php" class="btn btn-link">Volver</a>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
