<?php
include 'php/conexion.php';
require_once __DIR__ . '/vendor/autoload.php';


if(isset($_GET ['id_receta']) && isset ($_GET ['id_usuario'])) {
    $id_receta = $_GET ['id_receta'];
    $id_usuario = $_GET ['id_usuario'];

    $query="UPDATE usuario SET descargas = descargas+1 WHERE usuario.id_usuario = $id_usuario";
    $rs = mysqli_query ($conexion, $query); 


    $query="SELECT * FROM receta WHERE id_receta=$id_receta";
    $rs = mysqli_query ($conexion, $query);
    while($row=mysqli_fetch_assoc($rs)) {

        $nombre_receta=($row['nombre_receta']);
        $html.= 
        '<h1>'.$nombre_receta.'</h1>';
    }


    $query = "SELECT porciones FROM datos_receta, ingrediente, receta WHERE receta.id_receta=$id_receta
    AND datos_receta.id_receta=$id_receta AND datos_receta.id_ingrediente = ingrediente.id_ingrediente";
    $rs = mysqli_query ($conexion, $query);
    while ($row=mysqli_fetch_assoc($rs)){
        $porcion = $row['porciones'];
    }
    $html.='<hr> <h2> Ingredientes (porción '.$porcion.') </h2>';

    $query = "SELECT porciones, cantidad, medida, nombre_ingrediente 
    FROM datos_receta, receta WHERE receta.id_receta=$id_receta
    AND datos_receta.id_receta=$id_receta";
    $rs = mysqli_query ($conexion, $query);
    while ($row=mysqli_fetch_assoc($rs)){
        $html.=
        '<ul type="square">
            <li>'.$row['nombre_ingrediente']." ".$row['cantidad']." ".$row['medida'].'</li> 
        </ul>';

    }

    $html.='<hr>
            <h2>Procedimiento</h2>';

    $query = ("SELECT paso FROM procedimiento WHERE id_receta=$id_receta");
    $rs1 = mysqli_query ($conexion, $query);

    while(($row=mysqli_fetch_assoc($rs1))) {
        $html.= 
        
        '<ul type="square">
            <li>'.$row['paso'].'</li> 
        </ul>';

    }

    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML($html);
    $mpdf->Output();
    
}
?>