<?php   

include 'conexion.php';
require '../sesion.php';
require '../validar.php';

$userSession = new userSession();
$user = new User ();

if(isset($_POST ['termino'])){
    echo $termino = $_POST ['termino'];
}
if(isset($_POST ['definicion'])){
   echo $definicion = $_POST ['definicion'];
}


if (isset ($_SESSION ['username'])) {

    $usuario = $_SESSION['username'];
}

$query = "SELECT id_usuario FROM usuario WHERE nombre = '$usuario'";
$rs = mysqli_query ($conexion, $query);

while(($row=mysqli_fetch_assoc($rs)))  { 
   $id=($row['id_usuario'])."<br>"; 
}

$query="INSERT INTO `termino` (`id_usuario`, `definicion`, `palabra`) VALUES ('$id', '$definicion', '$termino');";
$rs = mysqli_query ($conexion, $query);

header ('Location: ../glosario.php') ;


?>