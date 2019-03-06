<?php

if (isset($_POST['usuario']) and isset($_POST['contraseña'])){
    include 'conexion.php';
    $user = mysqli_real_escape_string($conexion, $_POST['usuario']);
    $correo = mysqli_real_escape_string($conexion, $_POST['correo']);
    $password=password hash($_POST["password"], PASSWORD_DEFAULT);
    $registrar=mysqli_query($conexion, 'insert into usuario (nombre, contraseña, correo) values
    ("'.$user.'","' .$password. '","' .$correo.'")') or die ('No se pudo registrar <br>'.mysqli_error($conexion));

    mysqli_close ($conexion);
   
}else{
    header ('location: ./');
}

?>