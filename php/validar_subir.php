<?php

    include_once 'conexion.php';
    include_once 'sesion.php';
    include 'sesion.php';
    include 'validar.php';
    $userSession = new userSession();
    $user = new User ();

    if(isset($_SESSION['username'])){
        $usuario = $_SESSION['username'];
    }

    $nombre_receta = filter_var($_POST['nombre_receta'], FILTER_SANITIZE_STRING);
    $categoria = filter_var($_POST['tipo_receta'], FILTER_SANITIZE_STRING);
    $nacionalidad = filter_var($_POST['nacionalidad'], FILTER_SANITIZE_STRING);
    $porciones = filter_var($_POST['porciones'], FILTER_SANITIZE_STRING);
    $cant_ingr = filter_var($_POST['cant_ingr'], FILTER_SANITIZE_NUMBER_INT);
    $cant_pasos = filter_var($_POST['cant_pasos'], FILTER_SANITIZE_NUMBER_INT);

    for($i=1; $i<=$cant_ingr; $i++){
        ${"cant_" . $i} = filter_var($_POST['cant_' . $i],FILTER_SANITIZE_STRING);
        ${"medida_" . $i} = filter_var($_POST['medidar_' . $i],FILTER_SANITIZE_STRING);
        ${"ingr_" . $i} = filter_var($_POST['ingr_' . $i],FILTER_SANITIZE_STRING);
    }

    for($p=1; $p<=$cant_pasos; $p++){
        ${"paso_" . $p} = filter_var($_POST['paso_' . $p],FILTER_SANITIZE_STRING);
    }

    $query_groseria = "SELECT groseria FROM groseria";
    $res_groseria = mysqli_query($conexion, $query_groseria);

    while($row = mysqli_fetch_array($res_groseria)){
            
        if(strpos($nombre_receta, $row['groseria']) !== false){
            $bandera = 0; 
            $mostrar_nombre_error = 1;
            break;
        }else{
            $bandera = 1;
            $mostrar_nombre_error = 0; 
        }

        for($j = 1; $j<=$cant_pasos; $j++){
            if(strpos(${"paso_" . $j}, $row['groseria']) !== false){
                $bandera = 0;
                $mostrar_paso_error = 1;
                break;
            }else{    
                $bandera = 1; 
                $mostrar_paso_error = 0; 
            }
        }
       
        for($j = 1; $j<=$cant_ingr; $j++){
            if(strpos(${"ingr_" . $j}, $row['groseria']) !== false){
                $bandera = 0;
                $mostrar_ingr_error = 1;
                break;
            }else{
                $bandera = 1;    
                $mostrar_ingr_error = 0;
                    
            }
        }

       
    }
    $respuesta = array(
        "error_nombre" => $mostrar_nombre_error,
        "error_ingr" => $mostrar_ingr_error,
        "error_paso" => $mostrar_paso_error,
        "bandera" => $bandera
    );
    
    echo json_encode($respuesta);
    

    if($bandera == 1){
        // try{

        //     $query_this_user = "SELECT id_usuario FROM usuario WHERE nombre = '$usuario'";
        //     $res = mysqli_query($conexion, $query_this_user);
        //     $id_usuario = mysqli_fetch_array($res);

        //     $insert_receta = $conexion->prepare("INSERT INTO receta VALUES (?, ?, ?, ?)");
        //     $insert_receta->bind_param('iiis', $nacionalidad, $id_usuario, $categoria, $nombre_receta);
        //     $insert_receta->execute();
        //     $id_receta = $conexion->insert_id();
        //     $insert_receta->close();

            
        //     for($j = 1; $j<=$cant_pasos; $j++){
        //         $insert_paso = $conexion->prepare("INSERT INTO procedimiento VALUES (?, ?)");
        //         $insert_paso->bind_param('is', $id_receta, ${"paso_" . $j});
        //         $insert_paso->execute();
        //     }
        //     $insert_paso->close();

        //     for($j = 1; $j<=$cant_ingr; $j++){
        //         $insert_ingr = $conexion->prepare("INSERT INTO datos_receta VALUES (?, ?, ?, ?, ?)");
        //         $insert_ingr->bind_param('isiis', $id_receta, ${"ingr_" . $j}, $porciones, ${"cant_" . $j}, ${"medida_" . $j});
        //         $insert_ingr->execute();
        //     }

        //     $conexion->close();

        // }catch(Exception $e){

        //     $respuesta = array(
                  
        //         'error' => $e->getMessage()
        //     );
        // }

    }

    
?>