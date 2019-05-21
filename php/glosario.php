<?php   


include 'php/conexion.php';
require 'sesion.php';
require 'validar.php';

$userSession = new userSession();
$user = new User ();

if(isset($_POST ['termino'])){
    $termino = $_POST ['termino'];
}
if(isset($_POST ['defincion'])){
    $definicion = $_POST ['definicion'];
}


if (isset ($_SESSION ['username'])) {

   // echo "Hay sesion";

    $usuario = $_SESSION['username'];
}

$query = "SELECT id_usuario FROM usuario WHERE nombre = '$usuario'";
$rs = mysqli_query ($conexion, $query);
echo '<br>'.$query;

while(($row=mysqli_fetch_assoc($rs)))  { 
    $id=($row['id_usuario'])."<br>"; 
}

$query="INSERT INTO 'termino' ('id_termino', 'id_usuario', 'definicion', 'palabra') VALUES (NULL, '$id', 'asd', 'asd')";
$rs = mysqli_query ($conexion, $query);
echo '<br>'.$query;

while(($row=mysqli_fetch_assoc($rs)))  { 
    echo "Nombre: ".($row['nombre_receta'])."<br>"; 
}



?>