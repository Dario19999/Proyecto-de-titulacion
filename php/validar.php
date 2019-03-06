<?php

if (isset($_POST['usuario']) && isset ($_POST ['contraseña'])){
        include ('conexion.php');
        $username = mysqli_real_escape_string ($conexion, $_POST ['usuario']);
        $password = mysqli_real_escape_string ($conexion, $_POST ['contraseña']);
        $comprobar = 'select* from '
}else{
    header ('location: ./');
}

?>