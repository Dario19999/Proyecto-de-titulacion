

<?php

include 'php/conexion.php';

function is_empty ($query){

    if (strlen($query)==39) {
    return true;
    }else {return false;}
}

$query="SELECT * FROM receta WHERE nombre_receta='Sopes'";

$rs = mysqli_query ($conexion, $query);
while(($row=mysqli_fetch_assoc($rs))){

echo ($row['sabor'])*20;
}

    

