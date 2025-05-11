<?php
$conexion = mysqli_connect('localhost','root','','dbejemplo');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Historial</title>
    <!-- Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../CSS_Local/historial.css">
</head>
<body class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 style="color: #fff;">Historial de Movimientos</h3>
        <input type="button" value="Volver" class="btn btn-primary" onclick="window.location.href='inicio.php'">
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID Movimiento</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>ID Producto</th>
                    <th>Fecha y Hora</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $consulta = "SELECT h.id_move, u.nombre, h.tipo, h.id_producto, h.fecha_hora 
                             FROM historial h
                             JOIN tablaejemplo u ON h.id_usuario = u.id";
                $resultado = mysqli_query($conexion, $consulta);

                while ($mostrar = mysqli_fetch_array($resultado)) {
            ?>
                <tr>
                    <td><?php echo $mostrar['id_move']; ?></td>
                    <td><?php echo $mostrar['nombre']; ?></td>
                    <td><?php echo $mostrar['tipo']; ?></td>
                    <td><?php echo $mostrar['id_producto']; ?></td>
                    <td><?php echo $mostrar['fecha_hora']; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

    <form action="vaciar_tabla.php" class="mt-3">
        <input type="submit" value="Vaciar Historial" class="btn btn-danger">
    </form>

    <!-- Bootstrap JS (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
