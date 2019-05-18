<html>

<?php

include 'php/conexion.php';

if(isset($_POST ['busqueda'])){
    $busqueda = $_POST ['busqueda'];
}
if(isset($_POST ['tipo'])){
    $tipo = $_POST ['tipo'];
}
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


// echo $busqueda."<br>";
// echo $tipo."<br>";
// echo $sabor."<br>";
// echo $dificultad."<br>";
// echo $accesibilidad."<br>";
// echo $tiempo."<br>";
// echo $nacionalidad."<br>";

function is_empty ($query){

    if (strlen($query)==39) {
    return true;
    }else {return false;}
}

$query="SELECT nombre_receta FROM receta WHERE ";

if (!empty ($busqueda) && !is_empty ($query)){
    $query.= " AND nombre_receta = %$busqueda%";
}else if(!empty ($busqueda) && is_empty ($query)){
    $query.= " nombre_receta LIKE '%$busqueda%'";
}

if (!empty ($tipo) && !is_empty ($query)){
    $query.= " AND id_categorias=$tipo";
}else if(!empty ($tipo) && is_empty ($query)){
    $query.= "  id_categorias=$tipo";
}

if (!empty ($sabor) && !is_empty ($query)){
    $query.= " AND sabor=$sabor";
}else if(!empty ($sabor) && is_empty ($query)){
    $query.= "  sabor=$sabor";
}

is_empty($query);

if (!empty ($dificultad) && !is_empty ($query)){
    $query.= " AND dificultad=$dificultad";
}else if(!empty ($dificultad) && is_empty ($query)){
    $query.= "  dificultad=$dificultad";
}

is_empty($query);

if (!empty ($accesibilidad) && !is_empty ($query)){
    $query.= " AND accesibilidad=$accesibilidad";
}else if(!empty ($accesibilidad) && is_empty ($query)){
    $query.= "  accesibilidad=$accesibilidad";
}

is_empty($query);

if (!empty ($tiempo) && !is_empty ($query)){
    $query.= " AND tiempo=$tiempo";
}else if(!empty ($tiempo) && is_empty ($query)){
    $query.= "  tiempo=$tiempo";
}

is_empty($query);

if (!empty ($nacionalidad) && !is_empty ($query)){
    $query.= " AND id_nacionalidad=$nacionalidad";
}else if(!empty ($nacionalidad) && is_empty ($query)){
    $query.= "  id_nacionalidad=$nacionalidad";
}

$rs = mysqli_query ($conexion, $query);
echo '<br>'.$query;

while(($row=mysqli_fetch_assoc($rs)))  { 
    echo "Nombre: ".($row['nombre_receta'])."<br>"; 
}

?>




</html>

