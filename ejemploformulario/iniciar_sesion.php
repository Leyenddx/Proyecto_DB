<?php
session_start();
$nombre = $_POST['nombre'];
$_SESSION['usuario'] = $nombre;

if(isset($_POST['entrar']))
{
    $servidor = "localhost";
    $usuario = "root";
    $contrasenadb = "";
    $base_de_datos = "proyecto_final";

    $conexion = mysqli_connect($servidor,$usuario,$contrasenadb,$base_de_datos);


    $contrasena = $_POST['contrasena'];

    $consulta = "SELECT * FROM usuarios WHERE nombre = '$nombre' AND contrasena = '$contrasena'";
    $resultado = mysqli_query($conexion,$consulta);

    if(mysqli_num_rows($resultado)>0)
    {
        echo "<script>alert('Bienvenido, $nombre!');window.location.href='inicio.php';</script>";
    }else{
        echo"<script>alert('Nombre o contraseña incorrectos.');window.location.href='pagina_inicio_sesion.php';</script>";
    }
}
?>