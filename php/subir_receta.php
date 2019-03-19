<?php
if (isset($_POST['porcion']){
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

    $paso = ( $_POST['paso_1']);
    $porcion = ( $_POST['porcion']);
    $query="INSERT INTO recetas (porciones) values ('$porcion')";
    $registrar=mysqli_query($conexion, $query) or die ('No se pudo registrar <br>'.mysqli_error($conexion));

    mysqli_close ($conexion);
    header ('location: pagina_principal.html');
}else{
    header ('location: subir_receta.html');
}
  



?>