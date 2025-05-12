<?php
    $conexion = mysqli_connect('localhost','root','','proyecto_final');

    $consulta = "TRUNCATE TABLE historial;";
    mysqli_query($conexion, $consulta);
    echo"<script>window.location.href='pagina_historial.php'</script>";
?>