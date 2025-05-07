<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Iniciar Sesion</title>
    </head>
    <body>
    <input type="button" value="Volver" onclick="window.location.href='index.php';">
    <h1>Iniciar Sesion</h1>

    <form action="iniciar_sesion.php" method="post">
        <input type="text" placeholder="Nombre" name="nombre"><br>
        <input type="text" placeholder="Contraseña", name="contrasena"><br>
        <input type="submit" name="entrar">
    </form>

    </body>
</html>