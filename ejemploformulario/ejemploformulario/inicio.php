<?php
session_start();
$usuario = $_SESSION['usuario'];

$conexion = mysqli_connect('localhost','root','','dbejemplo');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .contenido {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 40px;
            max-width: 600px;
            width: 100%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        }

        .formulario {
            display: none;
            background-color: rgba(255, 255, 255, 0.15);
            padding: 20px;
            border-radius: 15px;
            margin-top: 20px;
        }

        h4, h5, label {
            color: white;
        }

        input[type="text"], .form-control {
            background-color: rgba(255, 255, 255, 0.9);
        }

        .btn {
            font-size: 1.1rem;
            padding: 10px 20px;
        }

        .acciones input {
            margin-right: 10px;
        }

        hr {
            border-color: rgba(255, 255, 255, 0.3);
        }
    </style>
</head>
<body>
    <div class="contenido text-center">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0">Bienvenido, <?php echo htmlspecialchars($usuario); ?></h4>
            <input type="button" class="btn btn-outline-light" value="Cerrar Sesión" onclick="window.location.href='index.php';">
        </div>

        <div class="mb-4 d-flex justify-content-center gap-3">
            <button class="btn btn-light" onclick="mostrarformulario('formcliente')">Cliente</button>
            <button class="btn btn-light" onclick="mostrarformulario('formparte')">Parte</button>
        </div>

        <!-- Formulario Cliente -->
        <div id="formcliente" class="formulario">
            <h5>Cliente</h5>
            <form action="cliente_parte.php" method="post">
                <input type="hidden" name="tipo_formulario" value="cliente">
                <div class="mb-3 text-start">
                    <label class="form-label">Nombre Cliente</label>
                    <input type="text" name="nombre" class="form-control">
                </div>
                <div class="acciones">
                    <input type="submit" name="accion" value="Guardar" class="btn btn-success">
                    <input type="submit" name="accion" value="Eliminar" class="btn btn-danger">
                </div>
            </form>
        </div>

        <!-- Formulario Parte -->
        <div id="formparte" class="formulario">
            <h5>Parte</h5>
            <form action="cliente_parte.php" method="post">
                <input type="hidden" name="tipo_formulario" value="parte">
                <div class="mb-3 text-start">
                    <label class="form-label">Número de Parte</label>
                    <input type="text" name="nombre" class="form-control">
                </div>
                <div class="acciones">
                    <input type="submit" name="accion" value="Guardar" class="btn btn-success">
                    <input type="submit" name="accion" value="Eliminar" class="btn btn-danger">
                </div>
            </form>
        </div>

        <hr class="my-4">

        <div class="d-flex justify-content-center gap-3">
            <input type="button" value="Inventario" class="btn btn-warning" onclick="window.location.href='pagina_inventario.php'">
            <input type="button" value="Ver Historial" class="btn btn-info" onclick="window.location.href='pagina_historial.php';">
        </div>
    </div>

    <script>
        function mostrarformulario(id) {
            const formularios = document.querySelectorAll('.formulario');
            formularios.forEach(form => form.style.display = 'none');
            const seleccionado = document.getElementById(id);
            if (seleccionado) seleccionado.style.display = 'block';
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
