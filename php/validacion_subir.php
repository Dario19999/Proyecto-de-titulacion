<?php

        include_once 'conexion.php';

        $nombre_receta = filter_var($_POST['nombre_receta'], FILTER_SANITIZE_STRING);
        $categoria = filter_var($_POST['tipo_receta'], FILTER_SANITIZE_STRING);
        $nacionalidad = filter_var($_POST['nacionalidad'], FILTER_SANITIZE_STRING);
        $porciones = filter_var($_POST['porciones'], FILTER_SANITIZE_STRING);
        $cant_ingr = filter_var($_POST['cant_ingr'], FILTER_SANITIZE_NUMBER_INT);
        $cant_pasos = filter_var($_POST['cant_pasos'], FILTER_SANITIZE_NUMBER_INT);

        for($i=1; $i<=$cant_ingr; $i++){
                ${"ingr_".$i} = filter_var($_POST['ingr_'.$i],FILTER_SANITIZE_STRING);
        }

        for($p=1; $p<=$cant_pasos; $p++){
                 ${"paso_".$i} = filter_var($_POST['paso_'.$i],FILTER_SANITIZE_STRING);
        }



        // if(isset($_POST['subir'])){

               

                $bandera = 1;
                $query_groseria = "SELECT groseria FROM groseria";
                $res_groseria = mysqli_query($conexion, $query_groseria);

                $j=0;
                while($row = mysqli_fetch_array($res_groseria)){
                        
                        $j++;

                        if(stripos($nombre_receta, $row['groseria']) === FALSE){
                                
                        }else{
                                $respuesta_nombre = array(
                                        "resultado" => "exitont"
                                );
                                echo json_encode($respuesta_nombre);
                                $bandera = 0;
                        }

                        if(stripos(${"paso_".$j}, $row['groseria']) == FALSE){

                        }else{
                                echo "<p style = 'color: red'>*Error: Se detectó una palabra altisonante en uno de los pasos. Favor de corregir.</p>";
                                $bandera = 0;
                        }

  
                }

                if($bandera == 1){
                        try{
                        


                        }catch(Exception $e){

                                $respuesta = array(
                                        'error' => $e->getMessage()
                                );
                        }

                        require '../success.html';

                }
        // }
?>