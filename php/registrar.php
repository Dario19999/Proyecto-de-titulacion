<?php

if (isset($_POST['usuario']) && isset($_POST['contra']) && isset($_POST['correo']) && isset($_POST['genero'])){

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

    $user = ( $_POST['usuario']);
    $correo = ( $_POST['correo']);
    $sexo = ($_POST['genero']);
    $pass= password_hash ($_POST['contra'], PASSWORD_DEFAULT);
    $query="INSERT INTO usuario (nombre,pass,correo,sexo) values ('$user','$pass','$correo','$sexo')";
    $registrar=mysqli_query($conexion, $query) or die ('No se pudo registrar <br>'.mysqli_error($conexion));

    mysqli_close ($conexion);
    header ('location: /Proyecto-de-titulacion/pagina_principal.html');
      
}else{
    
    header ('location: /Proyecto-de-titulacion/registro.html');
}

?>