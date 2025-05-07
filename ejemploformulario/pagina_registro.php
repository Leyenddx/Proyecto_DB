<?php
   $servidor = "localhost";
   $usuario = "root";
   $contrasena = "";
   $base_de_datos = "dbejemplo";

   $conexion = mysqli_connect($servidor,$usuario,$contrasena,$base_de_datos);
?>


<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejemplo de Formulario</title>
    </head>
    <body>
        <input type="button" value="Volver" onclick="window.location.href='index.php';">
        <h1>Ejemplo de Formulario</h1>
        <form action="registrar_usuario.php" name="registro_usuario" method="post">
            <input type="text" name="nombre" placeholder="Nombre"><br>
            <input type="text" name="contrasena" placeholder="Contraseña"><br>
            <input type="text" name="confirmar_contrasena" placeholder="Confirmar Contraseña"><br>
            <input type="submit" name="registrar" value="Registrar Usuario">

        </form>

    </body>
</html>
