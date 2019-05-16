<html>

<?php

include 'php/conexion.php';

$busqueda = $_POST ['busqueda']; // receta nombre_receta 
if(isset($tipo)){
$tipo = $_POST['tipo']; // receta id_categoria
}else{
    $tipo = 0;
}

$sabor = $_POST["cat_sabor"]; // from clasificacion where id_puntajes == value $sabor
$dificultad = $_POST["cat_dificultad"]; // id_puntajes
$accesibilidad = $_POST["cat_accesibilidad"]; // id_puntajes
$tiempo = $_POST["cat_tiempo"]; // id_puntajes
$nacionalidad = $_POST["nacionalidad"]; // receta id_nacionalidad

echo $busqueda."<br>";
echo $tipo."<br>";
echo $sabor."<br>";
echo $dificultad."<br>";
echo $accesibilidad."<br>";
echo $tiempo."<br>";
echo $nacionalidad."<br>";

// if(!empty($busqueda) && empty($tipo) && empty($tipo) && empty($sabor) && empty($dificultad) 
// && empty($tipo) ){

//     $query = "SELECT nombre_receta FROM receta WHERE nombre_receta LIKE '%$busqueda%'";
//     $rs = mysqli_query ($conexion, $query);
// }

// $row = mysqli_fetch_assoc($rs);

while(($row=mysqli_fetch_assoc($rs)))  { 
    echo "Nombre: ".($row['nombre_receta'])."<br>"; 
}

?>

</html>

