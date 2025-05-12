<?php
    $conexion = mysqli_connect('localhost','root','','dbejemplo');

    $consulta = "TRUNCATE TABLE historial;";
    mysqli_query($conexion, $consulta);
    echo"<script>window.location.href='pagina_historial.php'</script>";
?>