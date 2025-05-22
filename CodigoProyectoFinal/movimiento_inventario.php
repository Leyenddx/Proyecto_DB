    <?php

use Dom\Mysql;

        $conexion = mysqli_connect('localhost','root','','proyecto_final');
        session_start();
        $usuario = $_SESSION['usuario'];

        $consulta_id_usuario = "SELECT id FROM almacenista WHERE nombre = '$usuario'";
        $resultado_id_usuario = mysqli_query($conexion,$consulta_id_usuario);
        $fila_id_usuario = mysqli_fetch_assoc($resultado_id_usuario);
        $id_usuario = $fila_id_usuario['id'];


    //Validamos si se usa POST, abajo validaremos cual en especifico
        if($_SERVER['REQUEST_METHOD']== "POST")
        {
            if($_POST['movimiento']=="Insertar")
            {
                //Codigo para agregar datos a la base de datos
                $num_parte_seleccionado = $_POST['num_parte'];
                $consulta_id_parte = "SELECT id_parte FROM parte WHERE nombre = '$num_parte_seleccionado'; ";
                $parte = mysqli_query($conexion, $consulta_id_parte);
                //fila_parte es un arreglo
                $fila_parte = mysqli_fetch_assoc($parte);
                $id_parte = intval($fila_parte['id_parte']);

                $cliente_seleccionado = $_POST['cliente'];
                $consulta_cliente = "SELECT id_cliente FROM cliente WHERE nombre = '$cliente_seleccionado';";
                $cliente = mysqli_query($conexion, $consulta_cliente);
                $fila_cliente = mysqli_fetch_assoc($cliente);
                $id_cliente = $fila_cliente['id_cliente'];

                $id_locacion = intval($_POST['locacion']);

                $cantidad = intval($_POST['cantidad']);

                //Antes de enviar, verificaremos que la locacion es libre
                $consulta_estado = "SELECT estado_ocupado FROM locacion WHERE id_locacion = '$id_locacion'";
                $resultado_estado = mysqli_query($conexion, $consulta_estado);
                $fila_estado = mysqli_fetch_assoc($resultado_estado);
                $estado = intval($fila_estado['estado_ocupado']);

                if($estado != 0){
                    echo "<script>alert('Error, locacion ocupada'); window.location.href='pagina_inventario.php';</script>";
                    return;
                }
                else
                {
                    $consulta_enviar = "INSERT INTO producto VALUES('','$id_parte','$id_cliente',$cantidad, $id_locacion);";
                    $consulta_actualizar = "UPDATE locacion SET estado_ocupado = 1 WHERE id_locacion = $id_locacion";
                    $actualizar_entrada = mysqli_query($conexion,$consulta_actualizar);
                }
                
            
               

                if(mysqli_query($conexion, $consulta_enviar))
                {
                    //mysqli_insert_id regresa el ultimo id ingresado en la tabla.
                    $id_producto = intval(mysqli_insert_id($conexion)); 
                    $consulta_historial = "INSERT INTO historial VALUES ('', $id_usuario,'Insertar',NOW(), $id_producto)";
                    mysqli_query($conexion,$consulta_historial);
                    echo "<script>alert('Elemento ingresado en la tabla correctamente'); window.location.href='pagina_inventario.php';</script>";
                }


            }elseif($_POST['movimiento']=="Eliminar")
            {
                $id_eliminar = $_POST['id_eliminar'];
                $id_copia = $id_eliminar;
                if (!empty($id_eliminar)) {

                     // Recuperar la locación asociada al producto
                    $consulta_locacion = "SELECT id_locacion FROM producto WHERE id_producto = $id_eliminar";
                    $resultado_locacion = mysqli_query($conexion, $consulta_locacion);
                    $fila_locacion = mysqli_fetch_assoc($resultado_locacion);
                    $id_locacion = $fila_locacion['id_locacion'];  // Ahora sí tienes la locación

                    $consulta = "DELETE FROM producto WHERE id_producto = $id_eliminar";
                    mysqli_query($conexion, $consulta);
                    $consulta_historial = "INSERT INTO historial VALUES('',$id_usuario,'Eliminar', NOW(),$id_copia);";
                    mysqli_query($conexion, $consulta_historial);
                    echo "<script>alert('Elemento con id $id_eliminar eliminado de la tabla.'); window.location.href='pagina_inventario.php';</script>";
                    $consulta_actualizar_salida = "UPDATE locacion SET estado_ocupado = 0 WHERE id_locacion = $id_locacion";
                    $actualizar_entrada = mysqli_query($conexion,$consulta_actualizar_salida);
                } else {
                    echo "<script>alert('Error: ID no válido.');</script>";
                }
            }
        }

    ?>