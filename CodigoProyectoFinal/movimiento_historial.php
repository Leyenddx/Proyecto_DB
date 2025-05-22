<?php

use Dom\Mysql;

session_start();
$usuario = $_SESSION['usuario'];

$conexion = mysqli_connect('localhost','root','','proyecto_final');

$consulta_id = "SELECT id FROM almacenista WHERE nombre = '$usuario';";
$resultado_id = mysqli_query($conexion, $consulta_id);
//mysqli_fetch_assoc convierte un select en un arreglo.
$fila_id = mysqli_fetch_assoc($resultado_id);
//Intval significa que escogemos el valor numerico de ese arreglo
$id_usuario = intval($fila_id['id']);

//Le damos formato a la fecha
$fecha_hora = date('Y-m-d H:i:s');

//Comrueba si se ha usado post, luego verificamos cual post en particular
if($_SERVER['REQUEST_METHOD']== "POST"){
    if($_POST["movimiento"]=="Insertar"){
    $consulta = "INSERT INTO historial VALUES('','$id_usuario','$usuario','Insertar','$fecha_hora','1')";
    $ejecutar_consulta = mysqli_query($conexion,$consulta);

    if($ejecutar_consulta)
    {
        echo "Datos insertados";
    };

    } elseif($_POST["movimiento"] == "Eliminar"){
    $consulta = "INSERT INTO historial VALUES('','$id_usuario','$usuario','Eliminar','$fecha_hora','1')";
    $ejecutar_consulta = mysqli_query($conexion,$consulta);

    }
}



?>