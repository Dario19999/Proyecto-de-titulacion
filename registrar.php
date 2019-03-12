<?php

if (isset($_POST['usuario']) && isset($_POST['contra'])){

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
    $password= password_hash ($_POST['contra'], PASSWORD_DEFAULT);
    $query="INSERT INTO usuario (nombre,contrasena,correo) values ('$user','$password','$correo')";
    $registrar=mysqli_query($conexion, $query) or die ('No se pudo registrar <br>'.mysqli_error($conexion));

    mysqli_close ($conexion);
    header ('location: pagina_principal.html');
      
}else{
    
    header ('location: registro.html');
}

?>