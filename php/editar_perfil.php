<html>
<link rel="stylesheet" href="css/resultado_busqueda.css">    

<?php

    include '../sesion.php';
    include '../validar.php';
    $userSession = new userSession();
    $user = new User ();
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


$flag = false;
if(isset($_POST ['username'])){
    $nombre_usuario = $_POST ['username'];
}else $nombre_usuario = 0;
if(isset($_POST ['genero'])){
    $genero = $_POST ['genero'];
}else $genero=0;
if(isset($_POST ['edad'])){
    $edad = $_POST ['edad'];
}else $edad=0;
if(isset($_POST ['nacionalidad'])){
    $nacionalidad = $_POST ['nacionalidad'];
}else $nacionalidad=0;
if(isset($_POST ['save'])){
    $flag = true;
    $type = $_FILES["img_perfil"]["type"];
    if($type == "image/png" || $type =="imagge/jpg" || $type=="image/jpeg")
    {
        $flag = true;
        $img_name = $_FILES['img_perfil']['name'];
        $ruta = $_FILES['img_perfil']['tmp_name'];
    }
    else 
    {
        echo '<script>alert("Formato de imagen incorrecto")</script>';
    }
}else $img_perfil=0;

$tips = "jpg";
$type = array("image/jpeg" => "jpg");
$img=$id_usuario.".".$tips;

if(is_uploaded_file($ruta)){
    $save_bd = "img_perfiles/".$img;
    $save_on = "../img_perfiles/".$img;
    copy($ruta, $save_on);
}  
echo $nombre_usuario."<br>";
echo $genero."<br>";
echo $nacionalidad."<br>";
echo $save_on."<br>";

function is_empty ($query){
    if (strlen($query)==18) {
    return true;
    }else {return false;}
}
// UPDATE `usuario` SET `id_nacionalidad` = '20', `nombre` = 'Pepe', `sexo` = 'M' WHERE `usuario`.`id_usuario` = 15;

$query_groseria = "SELECT groseria FROM groseria";
$res_groseria = mysqli_query($conexion, $query_groseria);

while($row = mysqli_fetch_array($res_groseria)){
    if(strpos($nombre_usuario, $row['groseria']) !== false){
        $bandera = 0;
        echo '<script>alert("No se permiten groserias en el username.")</script>';
        echo "<script type='text/javascript'>window.location.replace('../editar_perfil.php')</script>";
        break;
    }else{
        $bandera = 1;
    }
}
$perfil=0;
$query="UPDATE usuario SET";
if($bandera == 1){
    if (!empty ($nombre_usuario) && !is_empty ($query)){
        $query.= " , nombre = '$nombre_usuario'";
        $perfil=1;
    }else if(!empty ($nombre_usuario) && is_empty ($query)){
        $query.= " nombre = '$nombre_usuario'";
        $perfil=1;
    }
}

if (!empty ($genero) && !is_empty ($query)){
    $query.= " , sexo = '$genero'";
}else if(!empty ($genero) && is_empty ($query)){
    $query.= " sexo = '$genero'";
}

if (!empty ($edad) && !is_empty ($query)){
    $query.= " , edad = '$edad'";
}else if(!empty ($edad) && is_empty ($query)){
    $query.= " edad = '$edad'";
}

if (!empty ($nacionalidad) && !is_empty ($query)){
    $query.= " , nacionalidad = '$nacionalidad'";
}else if(!empty ($nacionalidad) && is_empty ($query)){
    $query.= " nacionalidad = '$nacionalidad'";
}

is_empty($query);

if($flag)
{
 if (!empty ($save_on) && !is_empty ($query)){
    $query.= " , img_perfil = '$save_bd'";
}else if(!empty ($save_on) && is_empty ($query)){
    $query.= "  img_perfil = '$save_bd'";
}   
}

echo $query.=" WHERE id_usuario=$id_usuario";
$rs = mysqli_query ($conexion, $query);

if ($perfil==1){
    $userSession->setCurrentUser($nombre_usuario);
}

?>

<script>
    window.location.replace("../perfil.php");
</script>


