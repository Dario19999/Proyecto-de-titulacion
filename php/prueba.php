<?php
    include_once 'conexion.php';

    $cant_pasos = 1;

    $paso_1="Cortar con la mano las medialunas a la mitad y sumergirlas en la mezcla de huevos y leche.";

    $query_groseria = "SELECT groseria FROM groseria";
    $res_groseria = mysqli_query($conexion, $query_groseria);
    while($row = mysqli_fetch_array($res_groseria)){
        
        if(strpos($paso_1, $row['groseria']) !== false){
            echo  $bandera = 0;
            $mostrar_paso_error = 1;
            break;
        }else{    
            echo $bandera = 1; 
            $mostrar_paso_error = 0; 
        }
       
    }
?>