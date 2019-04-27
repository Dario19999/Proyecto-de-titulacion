<?php

$servername = "localhost";
$username = "root";
$password ="";
$bd="lacousine_bd";

$conexion = new mysqli($servername, $username, $password, $bd);

// Check connection
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
} 

?>