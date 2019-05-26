<?php   

include 'conexion.php';
require '../sesion.php';
require '../validar.php';

$userSession = new userSession();
$user = new User ();

if(isset($_POST ['termino']) && isset($_POST ['definicion']) && isset ($_SESSION ['username'])){
    $termino = $_POST ['termino'];
    $definicion = $_POST ['definicion'];
    $usuario = $_SESSION['username'];

$query = "SELECT * FROM usuario WHERE nombre = '$usuario'";
$rs = mysqli_query ($conexion, $query);

while(($row=mysqli_fetch_assoc($rs)))  { 
   $id=($row['id_usuario'])."<br>"; 
}

$query="INSERT INTO `termino` (`id_usuario`, `definicion`, `palabra`) VALUES ('$id', '$definicion', '$termino');";
$rs = mysqli_query ($conexion, $query);
$primera = substr($termino, 0, 1);

header ('Location: ../glosario.php?letra='.$primera.'') ;

}else{
    header ('Location: ../glosario.php') ;
}

?>