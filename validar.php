<?php

if (isset($_POST['usuario']) && isset ($_POST ['contra'])){
        include ('conexion.php');
        $username = ($conexion, $_POST ['usuario']);
        $password = ($conexion, $_POST ['contraseña']);
        $comprobar = 'select* from '
}else{
    header ('location: ./');
}

?>