<?php

include 'php/conexion.php';
require 'sesion.php';
require 'validar.php';

$userSession = new userSession();
$user = new User ();

if(isset($_POST ['sabor'])){
    $sabor = $_POST ['sabor'];
}
if(isset($_POST ['dificultad'])){
    $dificultad = $_POST ['dificultad'];
}
if(isset($_POST ['accesibilidad'])){
    $accesibilidad = $_POST ['accesibilidad'];
}
if(isset($_POST ['tiempo'])){
    $tiempo = $_POST ['tiempo'];
}
if(isset($_POST ['nacionalidad'])){
    $nacionalidad = $_POST ['nacionalidad'];
}



if (isset ($_SESSION ['username'])) {

   // echo "Hay sesion";

    $usuario = $_SESSION['username'];
    echo $usuario;
}

$query="UPDATE 'receta' SET 'cantidad_des' = +1, 'sabor' = '$sabor' WHERE 'id_receta' = 1";
$rs = mysqli_query ($conexion, $query);
echo '<br>'.$query;

while(($row=mysqli_fetch_assoc($rs)))  { 
    echo "Nombre: ".($row['nombre_receta'])."<br>"; 
}

?>
    

