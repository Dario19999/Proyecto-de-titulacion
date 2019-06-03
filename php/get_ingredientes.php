<?php
    require 'conexion.php';

    $q_ingr = "SELECT nombre FROM ingrediente";
    $res_ingr = mysqli_query($conexion, $q_ingr);
    $ingredientes = array();

    while($row = mysqli_fetch_array($res_ingr)){
        $ingr = $row['nombre'];
        array_push($ingredientes, $ingr);
    }
    
    $ingredientes = json_encode($ingredientes);
    echo $ingredientes;

?>