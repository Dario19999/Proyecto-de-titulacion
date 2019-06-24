<?php

include 'conexion.php';

function getIdUsuario($usuario){
    include 'conexion.php';
    $query_this_user = "SELECT id_usuario FROM usuario WHERE nombre = '$usuario'";
    $res = mysqli_query($conexion, $query_this_user);
    while($row = mysqli_fetch_array($res)){
        $id_usuario=$row['id_usuario'];
    }
    return $id_usuario;
}

function getUsuario($usuario){
    include 'conexion.php';
    $query = "SELECT * FROM usuario WHERE nombre = '$usuario'";
    $rs = mysqli_query ($conexion, $query);
    while(($row=mysqli_fetch_assoc($rs))) {
        return $usuario= ($row['nombre']);
    }
}

function getGenero($usuario) {
    include 'conexion.php';
    $query = "SELECT * FROM usuario WHERE nombre = '$usuario'";
    $rs = mysqli_query ($conexion, $query);
    while(($row=mysqli_fetch_assoc($rs))) {
        return $sexo= ($row['sexo']);
    }
}

function getEdad ($usuario){
    include 'conexion.php';
    $query = "SELECT * FROM usuario WHERE nombre = '$usuario'";
    $rs = mysqli_query ($conexion, $query);
    while(($row=mysqli_fetch_assoc($rs))) {
        return $edad = ($row['edad']);
    }
}

function getIdNacionalidad ($usuario){
    include 'conexion.php';
    $query = "SELECT * FROM usuario WHERE nombre = '$usuario'";
    $rs = mysqli_query ($conexion, $query);
    while(($row=mysqli_fetch_assoc($rs))) {
        return $id_nacionalidad = ($row['id_nacionalidad']);
    }
}

function getVotos ($usuario){
    include 'conexion.php';
    $query = "SELECT * FROM usuario WHERE nombre = '$usuario'";
    $rs = mysqli_query ($conexion, $query);
    while(($row=mysqli_fetch_assoc($rs))) {
        return $votos=($row['votos']);
    }
}

function getDescargas ($usuario){
    include 'conexion.php';
    $query = "SELECT * FROM usuario WHERE nombre = '$usuario'";
    $rs = mysqli_query ($conexion, $query);
    while(($row=mysqli_fetch_assoc($rs))) {
        return $descargas=($row['descargas']);
    }
}

function getImgPerfil ($usuario){
    include 'conexion.php';
    $query = "SELECT * FROM usuario WHERE nombre = '$usuario'";
    $rs = mysqli_query ($conexion, $query);
    while(($row=mysqli_fetch_assoc($rs))) {
        return $img_perfil=($row['img_perfil']);
    }
}

function getNacionalidad ($id_nacionalidad){
    include 'conexion.php';
    $nacionalidad="SELECT nombre FROM nacionalidad WHERE id_nacionalidad='$id_nacionalidad'";
    $nac = mysqli_query ($conexion, $nacionalidad);
    while(($row=mysqli_fetch_assoc($nac))) {
        return $R_Nac= ($row['nombre']).'<br>';
    }
}

function getCantRecetas ($id_usuario){
    include 'conexion.php';
    $receta = "SELECT * FROM receta WHERE id_usuario='$id_usuario'";
    $recetas = mysqli_query ($conexion, $receta);
    return $cant_recetas = mysqli_num_rows($recetas);
}

function getRecetas ($id_usuario){
    include 'conexion.php';
    $receta = "SELECT * FROM receta WHERE id_usuario='$id_usuario'";
    return $recetas = mysqli_query ($conexion, $receta);
}


?>