<!-- <hr>
<hr>
<hr>  -->
<hr>


<html>
<link rel="stylesheet" href="css/resultado_busqueda.css">    

<?php

include_once 'plantilla.php';
include 'php/conexion.php';


// Aquí se establece una serie de condicionales para saber 
// qué campos han sido llenados dentro del formulario en
// la busqueda de recetas. Con isset podemos saber si 
//una variable está definida y no es NULL



if(isset($_POST ['busqueda'])){
    $busqueda = $_POST ['busqueda'];
}
if(isset($_POST ['tipo'])){
    $tipo = $_POST ['tipo'];
}
if(isset($_POST ['sabor'])){
    $sabor = $_POST ['sabor'];
}else $sabor=0;
if(isset($_POST ['dificultad'])){
    $dificultad = $_POST ['dificultad'];
}else $dificultad=0;
if(isset($_POST ['accesibilidad'])){
    $accesibilidad = $_POST ['accesibilidad'];
}else $accesibilidad=0;
if(isset($_POST ['tiempo'])){
    $tiempo = $_POST ['tiempo'];
}else $tiempo=0;
if(isset($_POST ['nacionalidad'])){
    $nacionalidad = $_POST ['nacionalidad'];
}else $dificultad=0;
if(isset($_POST ['precio'])){
    $precio = $_POST ['precio'];
}else $precio=0;

// echo $busqueda."<br>";
// echo $tipo."<br>";
// echo $sabor."<br>";
// echo $dificultad."<br>";
// echo $accesibilidad."<br>";
// echo $tiempo."<br>";
// echo $nacionalidad."<br>";

function is_empty ($query){
    if (strlen($query)==27) {
    return true;
    }else {return false;}
}

$query="SELECT * FROM receta WHERE ";

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

if (!empty ($nacionalidad) && !is_empty ($query) && $nacionalidad!==0){
    $query.= " AND id_nacionalidad=$nacionalidad";
}else if(!empty ($nacionalidad) && is_empty ($query) && $nacionalidad!==0){
    $query.= "  id_nacionalidad=$nacionalidad";
}
if (!empty ($precio) && !is_empty ($query) && $precio!==0){
    $query.= " AND precio=$precio";
}else if(!empty ($precio) && is_empty ($query) && $precio!==0){
    $query.= "  precio=$precio";
}


$rs = mysqli_query ($conexion, $query);
$cant_recetas = mysqli_num_rows($rs);
?>

<?php while(($row=mysqli_fetch_assoc($rs))) {?>
<hr>
<hr>
<hr>
<div class="card">
    <div class="card-body">
        <a href="receta_lectura.php?id_receta=<?php echo ($row['id_receta'])?>">
        <?php echo ($row['nombre_receta'])?></a>
        <hr>
            <p>Sabor</p>
            <div class="progress"> 
                <div class="progress-bar" role="progressbar" style="width: <?php echo ($row['sabor'])*20?>%" aria-valuenow="<?php echo ($row['sabor'])*20?>" 
                aria-valuemin="0" aria-valuemax="100%"><?php echo ($row['sabor'])?></div>
            </div>
            <p>Dificultad</p>
            <div class="progress"> 
                <div class="progress-bar" role="progressbar" style="width: <?php echo ($row['dificultad'])*20?>%;" aria-valuenow="<?php echo ($row['dificultad'])*20?>" 
                aria-valuemin="0" aria-valuemax="100%"><?php echo ($row['dificultad'])?></div>
            </div>
            <p>Accesibilidad</p>
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: <?php echo ($row['accesibilidad'])*20?>%;" aria-valuenow="<?php echo ($row['accesibilidad'])*20?>" 
                aria-valuemin="0" aria-valuemax="100%"><?php echo ($row['accesibilidad'])?></div>
            </div>
            <p>Tiempo</p>
            <div class="progress"> 
                <div class="progress-bar" role="progressbar" style="width: <?php echo ($row['tiempo'])*20?>%;" aria-valuenow="<?php echo ($row['tiempo'])*20?>" 
                aria-valuemin="0" aria-valuemax="100%"><?php echo ($row['tiempo'])?></div>
            </div>
    </div>

</div>

            <?php }


            if($cant_recetas==0){ ?>
            <hr>
            <hr>
            <hr>
            <h1>No hay resultados</h1>

            <?php } ?>

</html>

