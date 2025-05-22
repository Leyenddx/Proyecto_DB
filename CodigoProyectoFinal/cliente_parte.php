<?php
    $conexion = mysqli_connect('localhost','root','','proyecto_final');
    $nombre = $_POST["nombre"];
    $tipo_form = $_POST["tipo_formulario"];

    if ($tipo_form == "cliente") {
        $tabla = "cliente";
        $campo_id = "id_cliente";
    } else {
        $tabla = "parte";
        $campo_id = "id_parte";
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if ($_POST["accion"] == "Eliminar") {

            // Verificar si existen registros en inventario antes de eliminar
            $consulta_verificar = "SELECT COUNT(*) AS total FROM producto WHERE $campo_id IN (SELECT $campo_id FROM $tabla WHERE nombre='$nombre')";
            $resultado_verificacion = mysqli_query($conexion, $consulta_verificar);
            $fila = mysqli_fetch_assoc($resultado_verificacion);

            if ($fila["total"] > 0) {
                // Si hay registros en inventario, mostrar alerta y detener la eliminación
                echo "<script>alert('No se puede eliminar \"$nombre\" porque está registrado en inventario.'); window.location.href='inicio.php';</script>";
            } else {
                // Si no hay registros en inventario, proceder con la eliminación
                $consulta_eliminar = "DELETE FROM $tabla WHERE nombre='$nombre'";
                $ejecutar_consulta = mysqli_query($conexion, $consulta_eliminar);

                if ($ejecutar_consulta) {
                    echo "<script>alert('\"$nombre\" eliminado con éxito!'); window.location.href='inicio.php';</script>";
                } else {
                    echo "<script>alert('Error al eliminar'); window.location.href='inicio.php';</script>";
                }
            }
        } elseif($_POST["accion"]=="Guardar"){
            $consulta = "INSERT INTO $tabla VALUES('','$nombre')";
            $ejecutar_consulta = mysqli_query($conexion,$consulta);
            if($ejecutar_consulta)
            {
               echo "<script>alert('$tabla $nombre almacenado con éxito en la base de datos!');window.location.href='inicio.php';</script>"; 
            }else{
                echo "<script>alert('Error al insertar');window.location.href='inicio.php';</script>";
            }
        
        }
    }




    /*
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        if($_POST["movcliente"]=="Guardar"){
            $consulta = "INSERT INTO cliente VALUES('','$nombre')";
            $ejecutar_consulta = mysqli_query($conexion,$consulta);
            if($ejecutar_consulta)
            {
               echo "<script>alert('Cliente $nombre almacenado con éxito en la base de datos!');window.location.href='inicio.php';</script>"; 
            }else{
                echo "<script>alert('Error al insertar');window.location.href='inicio.php';</script>";
            }
        
        }elseif($_POST["movcliente"]=="Eliminar")
        {
            $consulta = "DELETE FROM cliente WHERE nombre_cliente='$nombre'";
            $ejecutar_consulta = mysqli_query($conexion,$consulta);
            if($ejecutar_consulta)
            {
               echo "<script>alert('Cliente $nombre eliminado con éxito en la base de datos!');window.location.href='inicio.php';</script>"; 
            }else{
                echo "<script>alert('Error al eliminar');window.location.href='inicio.php';</script>";
            }
        }
        
    }   */

?>
