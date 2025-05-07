<?php
    $conexion = mysqli_connect('localhost','root','','dbejemplo');

    if(isset($_POST["elemento_busqueda"]))
    {
        $filtro = $_POST["elemento_busqueda"];
    }else{
        $filtro = "";
    }
    //$filtro = isset($_POST["elemento_busqueda"]) ? $_POST["elemento_busqueda"] : "";
    if(isset($_POST["categoria"]))
    {
        $categoria = $_POST["categoria"];
    }else{
        $categoria = "*";
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inventario</title>
        <style>
            .formulario{
                display: none;
            }

        </style>
            
    </head>
    <body>
    <input type="button" value="Volver" onclick="window.location.href='inicio.php';"> <br>
    <div id="filtros">
        <form name="form_filtro" method="post">
        <label>Filtrar por:</label>
        <select name="categoria">
            <option value="*">Todo</option>
            <option value="id_producto">Id Producto</option>
            <option value="num_parte">Numero de parte</option>
            <option value="nombre_cliente">Nombre del cliente</option>
            <option value="locacion">Locacion</option>
            <option value="cantidad">Cantidad</option>
        </select>
        <input type="text" name="elemento_busqueda" placeholder="Ingrese su busqueda">
        <input type="submit" name="buscar" value="buscar">
        </form>
    </div>
    <div id="tabla_inventario">
        <table>
        <tr>
            <td>Id Producto</td>
            <td>Numero de parte</td>
            <td>Nombre del Cliente</td>
            <td>Locacion</td>
            <td>Cantidad</td>
        </tr>
        <?php
                $consulta ="SELECT inventario.id_producto, parte.nombre AS nombre_parte, cliente.nombre AS nombre_cliente, inventario.locacion, inventario.cantidad
                FROM inventario
                INNER JOIN parte ON inventario.id_parte = parte.id_parte
                INNER JOIN cliente ON inventario.id_cliente = cliente.id_cliente";


                // Usamos .= para concatenar a la cadena que ya tenemos
                if($categoria != "*" && !empty($filtro))
                {
                    if($categoria == "num_parte") {
                        $consulta .= " WHERE parte.nombre LIKE '%$filtro%'";
                    } elseif($categoria == "nombre_cliente") {
                        $consulta .= " WHERE cliente.nombre LIKE '%$filtro%'";
                    } else {
                        $consulta .= " WHERE inventario.$categoria LIKE '%$filtro%'";
                    }
                }
                

                $resultado = mysqli_query($conexion, $consulta);

                while($mostrar = mysqli_fetch_array($resultado)){

            ?>

            <tr>
                <td><?php echo $mostrar['id_producto']  ?></td>
                <td><?php  echo $mostrar['nombre_parte']  ?></td>
                <td><?php   echo $mostrar['nombre_cliente'] ?></td>
                <td><?php echo $mostrar['locacion']  ?></td>
                <td><?php echo $mostrar['cantidad']  ?></td>
            </tr>
        
            <?php
                }
            ?>



        </table>
    </div>
            <!-- Botones para ocultar los formularios -->
    <button onclick="mostrarformulario('form_insertar')">Agregar Producto</button>
    <button onclick="mostrarformulario('form_eliminar')">Retirar Producto</button>

    <div id="form_insertar" class="formulario">
        <h3>Insertar</h3>
    
    <form action="movimiento_inventario.php" method="post">
    <label>Seleccione el número de parte:</label>
    <select name="num_parte">
    <?php 
        $consulta1 = "SELECT nombre FROM parte;";
        $resultado1 = mysqli_query($conexion, $consulta1);
        
        while ($mostrar = mysqli_fetch_array($resultado1)) {
            echo "<option value='" . $mostrar['nombre'] . "'>" . $mostrar['nombre'] . "</option>";
        }
    ?>
    </select>
    <br>
    <label>Seleccione el cliente:</label>
    <select name="cliente">
    <?php 
        $consulta1 = "SELECT nombre FROM cliente;";
        $resultado1 = mysqli_query($conexion, $consulta1);
        
        while ($mostrar = mysqli_fetch_array($resultado1)) {
            echo "<option value='" . $mostrar['nombre'] . "'>" . $mostrar['nombre'] . "</option>";
        }
    ?>
    </select>
    <br>
    <label>Ingrese la locacion: </label>
    <input type="text" name="locacion"><br>
    <label>Ingrese la cantidad: </label>
    <input type="text" name="cantidad">
    <br>
    <input type="submit" name="movimiento" value="Insertar">
    </form>
</div>

<div id="form_eliminar" class="formulario">
    <h3>Eliminar</h3>
    <label>Ingrese la ID:</label>
    <form action="movimiento_inventario.php" method="post">
        <input type="text" name="id_eliminar" placeholder="Id a eliminar">
        <input type="submit" name="movimiento" value="Eliminar">
    </form>
</div>



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


