<?php
   $servidor = "localhost";
   $usuario = "root";
   $contrasena = "";
   $base_de_datos = "dbejemplo";

   $conexion = mysqli_connect($servidor,$usuario,$contrasena,$base_de_datos);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS_Local/registro.css">
</head>
<body class="bg-light">
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow w-100" style="max-width: 500px;">
        <h2 class="text-center mb-4">Registro</h2>

        <form action="registrar_usuario.php" name="registro_usuario" method="post">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="mb-3">
                <label for="contrasena" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="contrasena" name="contrasena" required>
            </div>

             <div class="mb-3">
                <label for="confirmar_contrasena" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="confirmar_contrasena" name="confirmar_contrasena" required>
            </div>

            <input type="submit" name="registrar" class="btn btn-success w-100" value="Registrar Usuario">

        </form>
        <div class="mt-3 text-center">
            <a href="index.php" name="registrar" class="btn btn-link">Volver</a>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
