<?php

include 'conexion.php';

function getReceta($id_receta){
    include 'conexion.php';
    $query = ("SELECT * FROM receta WHERE id_receta = $id_receta");
    $rs = mysqli_query ($conexion, $query);
    while(($row=mysqli_fetch_array($rs))){ 
        return $nombre_receta= $row['nombre_receta'];
    }
}

function getAudio($id_receta){
    include 'conexion.php';
    $query = ("SELECT * FROM receta WHERE id_receta=$id_receta");
    $rs = mysqli_query ($conexion, $query);         
    while(($row=mysqli_fetch_assoc($rs))){ 
        return $audio=$row['audio'];              
    }        
}

function getSetAudio($id_receta){
    include 'conexion.php';
    $query = ("SELECT * FROM receta WHERE id_receta=$id_receta");
    $rs = mysqli_query ($conexion, $query);         
    while(($row=mysqli_fetch_assoc($rs))){    
        return $set_audio =$row['audio'];                
    }        
}




?>