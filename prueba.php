<?php
include 'php/conexion.php';
require_once __DIR__ . '/vendor/autoload.php';




$query="SELECT * FROM receta WHERE id_receta=1";
$rs = mysqli_query ($conexion, $query);
while(($row=mysqli_fetch_assoc($rs))) {

    $nombre_receta=($row['nombre_receta']);
    $html.= 
    '<h1>'.$nombre_receta.'</h1>';
}

$html.='<hr>
        <h2>Ingredientes</h2>';

$query = ("SELECT porciones, cantidad, medida, ingrediente.nombre 
FROM datos_receta, ingrediente WHERE id_receta=3 AND datos_receta.id_ingrediente 
= ingrediente.id_ingrediente");
$rs = mysqli_query ($conexion, $query);

while(($row=mysqli_fetch_assoc($rs))) {

    $cantidad=$row['cantidad'];
    $medida= $row['medida'];

    $html.= 
    '<ul>
        <li >'
            .$row['nombre']."   ".
            '<small>' .$cantidad." ".$medida. '</small>
        </li>
    </ul>';
}

$html.='<hr>
        <h2>Procedimiento</h2>';

$query1 = ("SELECT paso FROM procedimiento WHERE id_receta=3");
$rs1 = mysqli_query ($conexion, $query1);

while(($row=mysqli_fetch_assoc($rs1))) {

$html.= 
    
    '<ul type="square">
        <li>'.$row['paso'].'</li> 
    </ul>';

}

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output();
    

?>