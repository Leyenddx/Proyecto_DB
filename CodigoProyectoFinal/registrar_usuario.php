<?php
  if(isset($_POST['registrar'])){
   $servidor = "localhost";
   $usuario = "root";
   $contrasenadb = "";
   $base_de_datos = "proyecto_final";

   $conexion = mysqli_connect($servidor,$usuario,$contrasenadb,$base_de_datos);
  


        $nombre = $_POST['nombre'];
        $contrasena = $_POST['contrasena'];
        $confirmar_contrasena = $_POST['confirmar_contrasena'];


        if ($contrasena != $confirmar_contrasena) {
            echo "<script>alert('Las contraseñas no coinciden.'); window.location.href='pagina_registro.php';</script>";
            exit();
        }
    
        $insertar_datos = "INSERT INTO almacenista VALUES('$nombre','$contrasena','')";
        $ejecutar_insertar = mysqli_query($conexion, $insertar_datos);
    
        if ($ejecutar_insertar) {
            echo "<script>alert('Usuario registrado correctamente'); window.location.href='pagina_registro.php';</script>";
        } else {
            echo "<script>alert('Error al registrar'); window.location.href='pagina_registro.php';</script>";
        }
    
        mysqli_close($conexion);
    }
    ?>