<?php

        include_once 'conexion.php';
        
        if(isset($_POST['subir'])){

                $nombre = $_POST['nombre_receta'];
                $categoria = $_POST['tipo_receta']; 
                $nacionalidad = $_POST['nacionalidad'];
                // $cant = $_POST['cant_1'];
                // $medida = $_POST['medida_1'];
                // $ingr = $_POST['ingr_1'];
                $porciones = $_POST['porciones'];
                // $paso = $_POST['paso_1'];
                
                
                echo json_encode($_POST);

                $bandera = 1;
                $query_groseria = "SELECT groseria FROM groseria";
                $res_groseria = mysqli_query($conexion, $query_groseria);

                if(empty($cant)){

                }else{
                        if(!is_string()){
                                
                        }else{
                                echo "<p style = 'color: red'>*Error: La cantidad de un ingrediente debe ser un número.</p>";
                                $bandera = 0;
                        }
                }
        
                if(empty($ingr)){

                }else{
                        if(is_string()){
                                
                        }else{
                                echo "<p style = 'color: red'>*Error: El ingrediente no puede ser sólo un número.</p>";
                                $bandera = 0;
                        }

                        if(stripos($ingr, $row['groseria']) === FALSE){
                                
                        }else{
                                echo "<p style = 'color: red'>*Error: Se detectó un apalabra altisonante.</p>";
                                $bandera = 0;
                        }
                }

                while($row = mysqli_fetch_array($res_groseria, MYSQLI_ASSOC)){
                        
                        if(empty($nombre_receta)){

                        }else{
                                if(stripos($nombre_receta, $row['groseria']) === FALSE){
                                        
                                }else{
                                        echo "<p style = 'color: red'>*Error: Se detectó una palabra altisonante en el nombre. Favor de corregir.</p>";
                                        $bandera = 0;
                                }

                        }

                        if(empty($paso)){

                        }else{

                                if(stripos($paso, $row['groseria']) === FALSE){
                                        
                                }else{
                                        echo "<p style = 'color: red'>*Error: Se detectó una palabra altisonante en uno de los pasos. Favor de corregir</p>";
                                        $bandera = 0;
                                }


                        }
                }

                if($bandera == 1){
                        $query="INSERT INTO datos_receta (porciones, cantidad, medida) values ('$porcion', '$cant', '$ingr');
                                INSERT INTO procedimiento (paso) values ('$paso');
                                INSERT INTO receta (nombre_receta, nacionalidad, id_categoria) values ('$nombre', '$nacionalidad', '$categoria');";

                        $registrar=mysqli_query($conexion, $query);
                        mysqli_close ($conexion);
                        
                        require '../success.html';

                }
        }
?>