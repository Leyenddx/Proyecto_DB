<?php
$conexion = mysqli_connect('localhost','root','','dbejemplo');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Historial</title>
    </head>
    <body>
        <input type="button" value="Volver" onclick="window.location.href='inicio.php'"><br>
        <table border="1">
            <tr>
                <td>Id Movimiento</td>
                <td>Nombre</td>
                <td>Tipo</td>
                <td>Id Producto</td>
                <td>Fecha y Hora</td>
            </tr>

            <?php
                // Nueva consulta con JOIN
                $consulta = "SELECT h.id_move, u.nombre, h.tipo, h.id_producto, h.fecha_hora 
                             FROM historial h
                             JOIN tablaejemplo u ON h.id_usuario = u.id";

                $resultado = mysqli_query($conexion, $consulta);

                while ($mostrar = mysqli_fetch_array($resultado)) {
            ?>

            <tr>
                <td><?php echo $mostrar['id_move']  ?></td>
                <td><?php  echo $mostrar['nombre']  ?></td> <!-- Ahora sí se obtiene correctamente -->
                <td><?php   echo $mostrar['tipo'] ?></td>
                <td><?php echo $mostrar['id_producto']  ?></td>
                <td><?php echo $mostrar['fecha_hora']  ?></td>
            </tr>

            <?php
                }
            ?>

        </table>
        <br>
        <form action="vaciar_tabla.php">
            <input type="submit" value="Vaciar Historial">
        </form>
    </body>
</html>
