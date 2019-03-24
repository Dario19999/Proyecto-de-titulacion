<?php

//if (isset($_GET['porcion'])){
    $servername = "localhost";
    $username = "root";
    $password ="";
    $bd="lacousine_bd";
    
    $conexion = new mysqli($servername, $username, $password, $bd);
    
    // Check connection
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    } 
    echo "Conexión exitosa<br>";

    $paso = ( $_GET['paso_1']);
    $porcion = ( $_GET['porcion']);
    $nombre = ($_GET['nombre_receta']);
    $query="INSERT INTO datos_receta (porciones) values ('$porcion');
            INSERT INTO procedimiento (paso) values ('$paso');
            INSERT INTO receta (nombre_receta) values ('$nombre');";
    $registrar=mysqli_query($conexion, $query) or die ('No se pudo registrar <br>'.mysqli_error($conexion));
    echo "Registrado<br>";
    mysqli_close ($conexion);
    //header ('location: /Proyecto-de-titulacion/pagina_principal.html');
    //}else{
    //header ('location: subir_receta.html');
    //}
  



?>