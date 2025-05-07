<?php
session_start();
$usuario = $_SESSION['usuario'];

$conexion = mysqli_connect('localhost','root','','dbejemplo');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inicio</title>
        <style>
            .formulario{
                display: none;
                border: 1px solid #ccc;
                background-color: #f9f9f9;
                width: 300px;
            }
        </style>
    </head>
    <body>
        <input type="button" value="Cerrar Sesión" onclick="window.location.href='index.php';"> <br>
        <label>Bienvenido, <?php echo"$usuario"; ?></label>
    <br>

    <button onclick="mostrarformulario('formcliente')">Cliente</button>
    <button onclick="mostrarformulario('formparte')">Parte</button>

    <!-- Formulario Cliente -->
    <!-- Llamamos a un objeto en css por su . -->
    <div id="formcliente" class="formulario">
    <h3>Cliente</h3>
    <form action="cliente_parte.php" method="post">
        <input type="hidden" name="tipo_formulario" value="cliente">
        <label>Nombre Cliente</label>
        <input type="text" name="nombre">
        <br><br>
        <input type="submit" name="accion" value="Guardar">
        <input type="submit" name="accion" value="Eliminar">
    </form>
    </div>

        <!-- Formulario Parte -->
    <!-- Llamamos a un objeto en css por su . -->
    <div id="formparte" class="formulario">
    <h3>Parte</h3>
    <form action="cliente_parte.php" method="post">
    <input type="hidden" name="tipo_formulario" value="parte">
        <label>Numero de Parte</label>
        <input type="text" name="nombre">
        <br><br>
        <input type="submit" name="accion" value="Guardar">
        <input type="submit" name="accion" value="Eliminar">
    </form>
    </div>

 <!-- Prueba de inter relacion tablas movimiento y usuario -->
    <!--
    <form action="movimiento.php" method="post">
    <input type="submit" name="movimiento" value="Insertar">
    <input type="submit" name="movimiento" value="Eliminar">
    </form>
    -->
    <br>
    <input type="button" value="Inventario" onclick="window.location.href='pagina_inventario.php'">
    <input type="button" value="Ver Historial" onclick="window.location.href='pagina_historial.php';">


    <script>
        function mostrarformulario(id) {
            var formulario = document.getElementById(id)
            if (!formulario.style.display || formulario.style.display === "") {
                formulario.style.display = "none";
            }

            // Alternar entre ocultar/mostrar
            formulario.style.display = (formulario.style.display === "none") ? "block" : "none";
        }


    </script>
    </body>

</html>