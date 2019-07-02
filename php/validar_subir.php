<?php
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
            ${"segundos_" . $c} = filter_var($_POST['segundos_' .$c], FILTER_SANITIZE_STRING);
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
        $ingredientote = $ingredientote.${"ingr_".$i};
    }

    $query_groseria = "SELECT groseria FROM groseria";
    $res_groseria = mysqli_query($conexion, $query_groseria);
    $p=0;

    //Se itera sobre la tabla grosería
    while($row = mysqli_fetch_array($res_groseria)){
        
        //se hace una comparación con el estado de la respuesta
        //de la función strpos
        //la respuesta es un número, si se quiere saber si hay o no
        //una coincidencia, se verifica que la respuesta no sea false
        if(strpos($nombre_receta, $row['groseria']) !== false){

            //se no es false, es decir, hay una coincidencia entre el nombre
            //y la lista de groserías.
            //la bandera se pone en 0 para impedir que los datos se suban
            //a la bd
            $bandera = 0; 

            //se pone la variable $mostrar_nombre_error en 1
            //para mostrar el mensaje de error en la sección de nombre 
            $mostrar_nombre_error = 1;
            //y se rompe el ciclo
            break;
        }else{

            //en caso de no existir una coincidencia, la variable
            //bandera se pone en 1 para subir los datos a la bd
            $bandera = 1;
            //y el mensaje de error no se muestra
            $mostrar_nombre_error = 0; 
        }

        //se realiza la misma comparación con los ingredientes
        if(strpos($ingredientote, $row['groseria']) !== false){
            //si hay coincidencia entre los ingredientes y la lista de groserias
            //se muestra el mensaje de error, la bandera
            //se pone en 0 y se rompe el ciclo
            $bandera = 0;
            $mostrar_ingr_error = 1;
            break;
        }else{    
            //si no hay coincidencia, no se muestra el error y la bandera
            //se pone en 1
            $bandera = 1; 
            $mostrar_ingr_error = 0; 
        }

        //se realiza la misma comparación con los pasos        
        if(strpos($pasote, $row['groseria']) !== false){
            //si hay coincidencia entre los pasos y la lista de groserias
            //se muestra el mensaje de error, la bandera
            //se pone en 0 y se rompe el ciclo            
            $bandera = 0;
            $mostrar_paso_error = 1;
            break;
        }else{    
            //si no hay coincidencia, no se muestra el error y la bandera
            //se pone en 1            
            $bandera = 1; 
            $mostrar_paso_error = 0; 
        }
    }

    $respuesta = array(
        "error_nombre" => $mostrar_nombre_error,
        "error_ingr" => $mostrar_ingr_error,
        "error_paso" => $mostrar_paso_error
    ); 

    echo json_encode($respuesta);
    
    //a continuación se revisa si la vandera es igual a 1
    //para proceder con las consultas e inserciones a la bd
    if($bandera == 1){
        //se utiliza un try catch para identificar erroes
        //de conexión con la bd
        try{

            //la primera insersión se hace a la tabla receta
            //donde se incertan los siguientes valores
            $insert_receta = $conexion->prepare("INSERT INTO receta (id_nacionalidad, id_usuario, id_categorias, nombre_receta, porciones) VALUES (?, ?, ?, ?, ?)");
            //los valores se pasan como parámetros al prepared statement
            $insert_receta->bind_param('iiiss', $nacionalidad, $id_usuario, $categoria, $nombre_receta, $porciones);
            //se ejecuta la consulta
            $insert_receta->execute();
            //se obtiene el id del último insert
            $id_receta = mysqli_insert_id($conexion);

            //para insertar las variables que se crearon dinámicamente
            //para los pasos, se utiliza el siguiente ciclo for
            for($j = 1; $j<=$cant_pasos; $j++){
                //se prepara la query para meter los pasos a la tabla procedimento
                $insert_paso = $conexion->prepare("INSERT INTO procedimiento (id_receta, paso) VALUES (?, ?)");
                //los valores de la insersión se pasan como parámetros
                //estos siendo el id de la receta y el paso_n
                $insert_paso->bind_param('is', $id_receta, ${"paso_" . $j});
                //se ejecuta la consulta
                $insert_paso->execute();
            }
            //para insertar las variables que se crearon dinámicamente
            //para los ingredientes, se utiliza el siguiente ciclo for
            for($j = 1; $j<=$cant_ingr; $j++){
                //se prepara la query para meter los pasos a la tabla datos_receta
                //que es en donde van todos los ingredientes de la receta
                $insert_ingr = $conexion->prepare("INSERT INTO datos_receta (id_receta, nombre_ingrediente, cantidad, medida) VALUES (?, ?, ?, ?)");
                //los valores de la insersión se pasan como parámetros
                //estos siendo todos los datos de un ingrediente y el id de la receta
                $insert_ingr->bind_param('isss', $id_receta, ${"ingr_" . $j}, ${"cant_" . $j}, ${"medida_" . $j});
                //se ejecuta la consulta
                $insert_ingr->execute();
            }

            //para insertar los cronómetros primero hay que verificar la existencia
            //de los mismos
            if($cant_crnm == 0){
                //si no hay cronómetros no se hace nada
            }else{
                //en caso de haber 1 o más  cronómetros se procede
                //a insertarlos con el siguiente ciclo for
                for($c=1; $c<=$cant_crnm; $c++){
                    //se prepara la query para meter los pasos a la tabla cronometros
                    //que es en donde van todos los datos de un cronómetro                   
                    $insert_crnm = $conexion->prepare("INSERT INTO cronometros (id_receta, nombre, horas, minutos, segundos) VALUES (?, ?, ?, ?, ?)");
                    //los valores de la insersión se pasan como parámetros
                    //estos siendo todos los datos de los cronómetros y la id de la receta                    
                    $insert_crnm->bind_param('isiii', $id_receta, ${"nombre_crnm_" . $c}, ${"horas_" . $c}, ${"minutos_" . $c}, ${"segundos_" . $c});
                    //se ejecuta la consulta
                    $insert_crnm->execute();
                }             
            }        

        //en caso de haber un error con las insersiones
        //se tiene la siguiente respuesta Exception
        }catch(Exception $e){
            $respuesta = array(         
                'error' => $e->getMessage()
            );
        }
        
    }

?>