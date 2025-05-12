<?php
$conexion = mysqli_connect("localhost", "root", "", "proyecto_final");

$num_rack = $_GET["num_rack"];

$consulta = "SELECT id_locacion, nombre_locacion FROM locacion WHERE num_rack = '$num_rack'";
$resultado = mysqli_query($conexion, $consulta);

$locaciones = [];

while ($fila = mysqli_fetch_assoc($resultado)) {
    $locaciones[] = $fila;
}

echo json_encode($locaciones);
?>
