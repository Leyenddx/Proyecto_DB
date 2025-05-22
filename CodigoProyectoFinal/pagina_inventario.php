<?php
        $conexion = mysqli_connect('localhost','root','','proyecto_final');

        if(isset($_POST["elemento_busqueda"])) {
            $filtro = $_POST["elemento_busqueda"];
        } else {
            $filtro = "";
        }

        if(isset($_POST["categoria"])) {
            $categoria = $_POST["categoria"];
        } else {
            $categoria = "*";
        }
    ?>

    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Inventario</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../CSS_Local/inventario.css">
        <style>
            .formulario {
                display: none;
            }
        </style>
    </head>
    <body class="bg-light">

        <div class="container py-4">
            <div class="mb-3">
                <input type="button" value="Volver" class="btn btn-secondary" onclick="window.location.href='inicio.php';">
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <form name="form_filtro" method="post" class="row g-3">
                        <div class="col-md-3">
                            <label for="categoria" class="form-label">Filtrar por:</label>
                            <select name="categoria" id="categoria" class="form-select">
                                <option value="*">Todo</option>
                                <option value="id_producto">Id Producto</option>
                                <option value="num_parte">Numero de parte</option>
                                <option value="nombre_cliente">Nombre del cliente</option>
                                <option value="locacion">Locacion</option>
                                <option value="cantidad">Cantidad</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="elemento_busqueda" class="form-label">Búsqueda:</label>
                            <input type="text" name="elemento_busqueda" id="elemento_busqueda" class="form-control" placeholder="Ingrese su búsqueda">
                        </div>
                        <div class="col-md-3 align-self-end">
                            <input type="submit" name="buscar" value="Buscar" class="btn btn-primary w-100">
                        </div>
                    </form>
                </div>
            </div>

            <div class="table-responsive mb-4">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Id Producto</th>
                            <th>Numero de parte</th>
                            <th>Nombre del Cliente</th>
                            <th>Locacion</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //Esta tabla funciona correctamente
                            $consulta = "SELECT producto.id_producto, parte.nombre AS nombre_parte, cliente.nombre AS nombre_cliente, locacion.nombre_locacion AS nombre_locacion, producto.cantidad
                                        FROM producto
                                        INNER JOIN parte ON producto.id_parte = parte.id_parte
                                        INNER JOIN cliente ON producto.id_cliente = cliente.id_cliente
                                        INNER JOIN locacion ON producto.id_locacion = locacion.id_locacion";

            //El filtro funciona correctamente
    if($categoria != "*" && !empty($filtro)) {
        if($categoria == "num_parte") {
            $consulta .= " WHERE parte.nombre LIKE '%$filtro%'";
        } elseif($categoria == "nombre_cliente") {
            $consulta .= " WHERE cliente.nombre LIKE '%$filtro%'";
        } elseif($categoria == "locacion") {
            $consulta .= " WHERE locacion.nombre_locacion LIKE '%$filtro%'"; // Filtrar por nombre_locacion en lugar de id_locacion
        } else {
            $consulta .= " WHERE producto.$categoria LIKE '%$filtro%'";
        }
    }


                            $resultado = mysqli_query($conexion, $consulta);
                            while($mostrar = mysqli_fetch_array($resultado)) {
                        ?>
                            <tr>
                                <td><?php echo $mostrar['id_producto'] ?></td>
                                <td><?php echo $mostrar['nombre_parte'] ?></td>
                                <td><?php echo $mostrar['nombre_cliente'] ?></td>
                                <td><?php echo $mostrar['nombre_locacion'] ?></td>
                                <td><?php echo $mostrar['cantidad'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <div class="mb-4">
                <input type="button" value="Agregar Producto" class="btn btn-success me-2" onclick="mostrarformulario('form_insertar')">
                <input type="button" value="Retirar Producto" class="btn btn-danger" onclick="mostrarformulario('form_eliminar')">
            </div>

                            <!--Este formulario es el que esta dando problemas -->
            <div id="form_insertar" class="formulario card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Insertar Producto</h5>
                    <form action="movimiento_inventario.php" method="post" class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Número de parte:</label>
                            <select name="num_parte" class="form-select">
                                <?php 
                                    //Muestra el numero de parte en forma de lista
                                    $consulta1 = "SELECT nombre FROM parte;";
                                    $resultado1 = mysqli_query($conexion, $consulta1);
                                    while ($mostrar = mysqli_fetch_array($resultado1)) {
                                        echo "<option value='" . $mostrar['nombre'] . "'>" . $mostrar['nombre'] . "</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Cliente:</label>
                            <select name="cliente" class="form-select">
                                <?php 
                                //Muestra el cliente en forma de lista
                                    $consulta1 = "SELECT nombre FROM cliente;";
                                    $resultado1 = mysqli_query($conexion, $consulta1);
                                    while ($mostrar = mysqli_fetch_array($resultado1)) {
                                        echo "<option value='" . $mostrar['nombre'] . "'>" . $mostrar['nombre'] . "</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                        
                            <label for="num_rack">Selecciona el rack:</label>
                                <select id="num_rack" name="num_rack" onchange="cargarLocaciones(this.value)">
                                    <option value="">Selecciona</option>
                                    <option value="1">Rack 1</option>
                                    <option value="2">Rack 2</option>
                                    <option value="3">Rack 3</option>
                                </select>

                            <label for="locacion">Selecciona la locación:</label>
                            <select id="locacion" name="locacion">
                            <option value="">Primero elige un rack</option>
                            </select>
                        

                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Cantidad:</label>
                            <input type="text" name="cantidad" class="form-control">
                        </div>
                        <div class="col-12">
                            <input type="submit" name="movimiento" value="Insertar" class="btn btn-primary w-100">
                        </div>
                    </form>
                </div>
            </div>

            <div id="form_eliminar" class="formulario card">
                <div class="card-body">
                    <h5 class="card-title">Eliminar Producto</h5>
                    <form action="movimiento_inventario.php" method="post" class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label">Ingrese la ID:</label>
                            <input type="text" name="id_eliminar" class="form-control" placeholder="Id a eliminar">
                        </div>
                        <div class="col-12">
                            <input type="submit" name="movimiento" value="Eliminar" class="btn btn-danger w-100">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            function mostrarformulario(id) {
                var formulario = document.getElementById(id);
                formulario.style.display = (formulario.style.display === "none" || formulario.style.display === "") ? "block" : "none";
            }
        </script>

    <script>
    function cargarLocaciones(numRack) {
        let locacionSelect = document.getElementById("locacion");
        locacionSelect.innerHTML = ""; // Limpiar opciones previas

        if (numRack === "") {
            locacionSelect.innerHTML = '<option value="">Primero elige un rack</option>';
            return;
        }

        fetch("obtener_locaciones.php?num_rack=" + numRack)
            .then(response => response.json())
            .then(data => {
                data.forEach(loc => {
                    let option = document.createElement("option");
                    option.value = loc.id_locacion;
                    option.textContent = loc.nombre_locacion;
                    locacionSelect.appendChild(option);
                });
            });
    }
    </script>

    </body>
    </html>