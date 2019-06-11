<?php
    // echo json_encode("depurador 3000");
    include_once 'conexion.php';
    include_once '../sesion.php';
    include_once '../validar.php';

    $userSession = new userSession();
    $user = new User ();

    if(isset($_SESSION['username'])){
        $usuario = $_SESSION['username'];
    }

    $query_this_user = "SELECT id_usuario FROM usuario WHERE nombre = '$usuario'";
    $res = mysqli_query($conexion, $query_this_user);
    while($row = mysqli_fetch_array($res)){
        $id_usuario=$row['id_usuario'];
    }

    $nombre_receta = filter_var($_POST['nombre_receta'], FILTER_SANITIZE_STRING);
    $categoria = filter_var($_POST['tipo_receta'], FILTER_SANITIZE_STRING);
    $nacionalidad = filter_var($_POST['nacionalidad'], FILTER_SANITIZE_STRING);
    $porciones = filter_var($_POST['porciones'], FILTER_SANITIZE_STRING);
    $cant_ingr = filter_var($_POST['cant_ingr'], FILTER_SANITIZE_NUMBER_INT);
    $cant_pasos = filter_var($_POST['cant_pasos'], FILTER_SANITIZE_NUMBER_INT);
    $cant_crnm = filter_var($_POST['cant_crnm'], FILTER_SANITIZE_NUMBER_INT);

    if($cant_crnm == 0){
 
    }else{
 
        for($c=1; $c<=$cant_crnm; $c++){
            ${"nombre_crnm_" . $c} = filter_var($_POST['nombre_crnm_' .$c], FILTER_SANITIZE_STRING);
            ${"horas_" . $c} = filter_var($_POST['horas_' .$c], FILTER_SANITIZE_STRING);
            ${"minutos_" . $c} = filter_var($_POST['minutos_' .$c], FILTER_SANITIZE_STRING);
            ${"segundos" . $c} = filter_var($_POST['segundos_' .$c], FILTER_SANITIZE_STRING);
        }
    }    
   

   
    for($i=1; $i<=$cant_ingr; $i++){
        ${"cant_" . $i} = filter_var($_POST['cant_' . $i],FILTER_SANITIZE_STRING);
        ${"medida_" . $i} = filter_var($_POST['medida_' . $i],FILTER_SANITIZE_STRING);
        ${"ingr_" . $i} = filter_var($_POST['ingr_' . $i],FILTER_SANITIZE_STRING);
    }

    $pasote = "";
    for($p=1; $p<=$cant_pasos; $p++){
        ${"paso_" . $p} = filter_var($_POST['paso_' . $p],FILTER_SANITIZE_STRING);
        $pasote = $pasote.${"paso_".$p};
    }

    $ingredientote = "";
    for($i=1; $i<=$cant_ingr; $i++){
        ${"ingr_" . $i} = filter_var($_POST['ingr_' . $i],FILTER_SANITIZE_STRING);
        $ingredientote = $ingredientote.${"ingr_".$i};
    }

    $query_groseria = "SELECT groseria FROM groseria";
    $res_groseria = mysqli_query($conexion, $query_groseria);
    $p=0;

    while($row = mysqli_fetch_array($res_groseria)){
   
        if(strpos($nombre_receta, $row['groseria']) !== false){
            $bandera = 0; 
            $mostrar_nombre_error = 1;
            break;
        }else{
            $bandera = 1;
            $mostrar_nombre_error = 0; 
        }

        if(strpos($ingredientote, $row['groseria']) !== false){
            $bandera = 0;
            $mostrar_ingr_error = 1;
            break;
        }else{    
            $bandera = 1; 
            $mostrar_ingr_error = 0; 
        }
        
        if(strpos($pasote, $row['groseria']) !== false){
            $bandera = 0;
            $mostrar_paso_error = 1;
            break;
        }else{    
            $bandera = 1; 
            $mostrar_paso_error = 0; 
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
        try{

            $insert_receta = $conexion->prepare("INSERT INTO receta (id_nacionalidad, id_usuario, id_categorias, nombre_receta, porciones) VALUES (?, ?, ?, ?, ?)");
            $insert_receta->bind_param('iiiss', $nacionalidad, $id_usuario, $categoria, $nombre_receta, $porciones);
            $insert_receta->execute();
            $id_receta = mysqli_insert_id($conexion);
            $insert_receta->close();

            for($j = 1; $j<=$cant_pasos; $j++){
                $insert_paso = $conexion->prepare("INSERT INTO procedimiento (id_receta, paso) VALUES (?, ?)");
                $insert_paso->bind_param('is', $id_receta, ${"paso_" . $j});
                $insert_paso->execute();
            }

            for($j = 1; $j<=$cant_ingr; $j++){
                $insert_ingr = $conexion->prepare("INSERT INTO datos_receta (id_receta, nombre_ingrediente, cantidad, medida) VALUES (?, ?, ?, ?)");
                $insert_ingr->bind_param('isss', $id_receta, ${"ingr_" . $j}, ${"cant_" . $j}, ${"medida_" . $j});
                $insert_ingr->execute();
            }



            if($cant_crnm == 0){

            }else{

                for($c=1; $c<=$cant_crnm; $c++){
                    $insert_crnm = $conexion->prepare("INSERT INTO cronometros (id_receta, nombre, horas, minutos, segundos) VALUES (?, ?, ?, ?, ?)");
                    $insert_crnm->bind_param('isiii', $id_receta, ${"nombre_crnm_" . $c}, ${"hora_" . $c}, ${"minutos_" . $c}, ${"segundos_" . $c});
                    $insert_crnm->excecute();
                }              
            }        
                die();

        }catch(Exception $e){

            $respuesta = array(
                  
                'error' => $e->getMessage()
            );
        }
        
    }

?>