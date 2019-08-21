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
$save_on ="";

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

//se revisa que el botón submit haya sido pulsado
if(isset($_POST ['save'])){

    //la variable flag va a servir para identificar si la validación se ha pasado correctamente
    //se crea una variable que contendrá el formato de imagen
    $type = $_FILES["img_perfil"]["type"];
    //y se hace una comparación para revisar si $type es alguno de los formatos de imagen aceptados
    if($type == "image/png" || $type =="image/jpg" || $type=="image/jpeg" || $_FILES['img_perfil']['size'] == 0)
    {
        //en caso de que sí lo sea, la bandera se pone en true
        $flag = true;

        //y se crean los nombres de imagen 
        $img_name = $_FILES['img_perfil']['name'];
        $ruta = $_FILES['img_perfil']['tmp_name'];
    }
    else 
    {
        //en caso de no ser un formato de imagen soportado se muestra el mensaje de error
        echo '<script>alert("Formato de imagen incorrecto")</script>';
    }
//finalmente, si no hay ninguna imagen de perfil para actualizar los datos
//se pone la variable en 0
}else $img_perfil=0;

//Se preparan las variables para poder guardar la imagen y generar una referencia
//Extensión que debe de tener la imagen insertada
$tips = "jpg";
$type = array("image/jpeg" => "jpg");

//Se genera la referencia como id-usuario.jpg
$img=$id_usuario.".".$tips;

//Si la imagen está cargada se guarda en la ruta especificada
if(is_uploaded_file($ruta)){
    $save_bd = "img_perfiles/".$img;
    $save_on = "../img_perfiles/".$img;
    copy($ruta, $save_on);
}

function is_empty ($query){
    if (strlen($query)==18) {
    return true;
    }else {return false;}
}

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
    $query.= " , edad = $edad";
}else if(!empty ($edad) && is_empty ($query)){
    $query.= " edad = $edad";
}

if (!empty ($nacionalidad) && !is_empty ($query)){
    $query.= " , id_nacionalidad = '$nacionalidad'";
}else if(!empty ($nacionalidad) && is_empty ($query)){
    $query.= " id_nacionalidad = '$nacionalidad'";
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


