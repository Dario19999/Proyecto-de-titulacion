<?php

$servername = "localhost";
$username = "root";
$password ="";
$bd="lacousine_bd";


$conexion = new mysqli($servername, $username, $password, $bd);
mysqli_set_charset($conexion,'utf8');

// Check connection
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
} 

// $servername = "localhost";
// $username = "u655911065_jd";
// $password ="sWWE4=4Nk3xaBpMHJ0";
// $bd="u655911065_probd";


// $conexion = new mysqli($servername, $username, $password, $bd);
// mysqli_set_charset($conexion,'utf8');

// // Check connection
// if ($conexion->connect_error) {
//     die("Conexión fallida: " . $conexion->connect_error);
// } 

?>