<html>
<link rel="stylesheet" href="css/resultado_busqueda.css">    

<?php

    include '../sesion.php';
    include '../validar.php';
    $userSession = new userSession();
    $user = new User ();
    include '../plantilla.php';
    include 'conexion.php';


    if (isset ($_SESSION ['username'])) {
        $usuario = $_SESSION['username'];
    }

    $query =("SELECT * FROM usuario WHERE nombre = '$usuario'");
    $rs = mysqli_query ($conexion, $query);
    while(($row=mysqli_fetch_array($rs))) {
        $id_usuario=$row['id_usuario'];
    }

// Aquí se establece una serie de condicionales para saber 
// qué campos han sido llenados dentro del formulario en
// la busqueda de recetas. Con isset podemos saber si 
//una variable está definida y no es NULL



if(isset($_POST ['username'])){
    $nombre_usuario = $_POST ['username'];
}else $nombre_usuario = 0;
if(isset($_POST ['genero'])){
    $genero = $_POST ['genero'];
}else $genero=0;
if(isset($_POST ['nacionalidad'])){
    $nacionalidad = $_POST ['nacionalidad'];
}else $nacionalidad=0;
if(isset($_POST ['img_perfil'])){
    $img_perfil = $_POST ['img_perfil'];
}else $img_perfil=0;

echo $nombre_usuario."<br>";
echo $genero."<br>";
echo $nacionalidad."<br>";
echo $img_perfil."<br>";

function is_empty ($query){
    if (strlen($query)==18) {
    return true;
    }else {return false;}
}
// UPDATE `usuario` SET `id_nacionalidad` = '20', `nombre` = 'Pepe', `sexo` = 'M' WHERE `usuario`.`id_usuario` = 15;

$query="UPDATE usuario SET";

if (!empty ($nombre_usuario) && !is_empty ($query)){
    $query.= " , nombre = '$nombre_usuario'";
    $perfil=1;
}else if(!empty ($nombre_usuario) && is_empty ($query)){
    $query.= " nombre = '$nombre_usuario'";
    $perfil=1;
}

if (!empty ($genero) && !is_empty ($query)){
    $query.= " , sexo = '$genero'";
}else if(!empty ($genero) && is_empty ($query)){
    $query.= " sexo = '$genero'";
}

if (!empty ($nacionalidad) && !is_empty ($query)){
    $query.= " , nacionalidad = '$nacionalidad'";
}else if(!empty ($nacionalidad) && is_empty ($query)){
    $query.= " nacionalidad = '$nacionalidad'";
}

is_empty($query);

if (!empty ($img_perfil) && !is_empty ($query)){
    $query.= " , img_perfil = '$img_perfil'";
}else if(!empty ($img_perfil) && is_empty ($query)){
    $query.= "  img_perfil = '$img_perfil'";
}

echo $query.=" WHERE id_usuario=$id_usuario";
$rs = mysqli_query ($conexion, $query);

if ($perfil==1){

    $userSession->setCurrentUser($nombre_usuario);
}

?>

<script>
    
    document.location.href="http://localhost/lacousine.com/perfil.php" ;

</script>


