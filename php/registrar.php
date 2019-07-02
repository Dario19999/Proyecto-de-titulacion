<?php

    require_once 'conexion.php';

    if(isset($_POST['reg'])){

        //Expresión regular para filtrar la contraseña
        $patron_p = "/^(?=.*\d)(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/";

        //Expresión regular para filtrar usuario
        $patron_u = "/^(?=.*[a-z])(?=.*[a-zA-Z]).{1,50}$/";
        
        //Consulta que busca al usuario ingresado
        $query_u = "SELECT * FROM usuario WHERE nombre = '$user'";
        $res_u = mysqli_query($conexion, $query_u);
        $user_exists = mysqli_num_rows($res_u);

        //Consulta que busca al usuario ingresado
        $query_c = "SELECT * FROM usuario WHERE correo = '$correo'";
        $res_c = mysqli_query($conexion,$query_c);
        $correo_exists = mysqli_num_rows($res_c);

        //Consulta que selecciona todas las groserías 
        $query_groseria = "SELECT groseria FROM groseria";
        $res_groseria = mysqli_query($conexion, $query_groseria);

        $bandera = 1;
        
        while($row = mysqli_fetch_array($res_groseria)){
            if(strpos($user, $row['groseria']) !== false){
                $bandera = 0;
                echo "<p class = 'error' style = 'color: red'>*El nombre de usuario contiene
                una o más palabras altisonantes. Favor de corregir.</p>";
                break;
            }
        }

        if(empty($correo)){

        }else{
            if($correo_exists === 1){
                echo "<p class = 'error' style = 'color: red'>*El correo ya está en uso. 
                Pruebe ingresando uno nuevo.</p>";
                $bandera = 0;
            }
        }
        
        if(empty($user)){

        }else{

            if($user_exists === 1){
                echo "<p class = 'error' style = 'color: red'>*El nombre de usuario ya existe. 
                Intente ingresando uno nuevo.</p>";
                $bandera = 0;
            }

            if(!preg_match($patron_u, $user)){
                echo "<p class = 'error' style = 'color: red'>*El nombre de usuario no puede contener más de 50 carácteres. 
                Pruebe ingresando uno nuevo.</p>";
                $bandera = 0;
            }   
        }

        if(empty($pass)){

        }else{
            if(!preg_match($patron_p, $pass)){
                echo "<p class = 'error' style = 'color: red'>*La contraseña debe contener al menos 8 caracteres. 
                Entre ellos 1 letra mayúscula y un carácter numérico. 
                Recuerda que el nombre de usuario y la contraseña deben de ser diferentes.</p>";
                $bandera = 0;
            }
            if($pass_ver != $pass){
                echo "<p class = 'error' style = 'color: red'>*Las contraseñas deben de ser iguales en ambos campos.</p>";
                $bandera = 0;
            }

            if(preg_match($patron_p, $pass) && preg_match($patron_u, $user) && $pass != $user && $bandera == 1){
                
                //Se cifra la contraseña con un algoritmo hash
                $en_pass = password_hash($pass, PASSWORD_DEFAULT);

                //Se ejecuta la consulta como un prepared statement
                $query=$conexion->prepare("INSERT INTO usuario (nombre,pass,correo,id_nacionalidad,sexo, edad) VALUES (?,?,?,?,?,?)");
                //Se eligen los parametros del insert con el tipo de dato
                $query->bind_param('sssisi', $user, $en_pass, $correo, $nacionalidad, $sexo, $edad);
                $query->execute();

                //Seleccion del id insertado más reciente
                $id_new_user = mysqli_insert_id($conexion);

                //Se preparan las variables para poder guardar la imagen y generar una referencia
                //Extensión que debe de tener la imagen insertada
                $tips = "jpg";
                $type = array("image/jpeg" => "jpg");
                
                //Nombre del input file de la imagen
                $img_name = $_FILES["img_perfil"]["name"];

                //Nombre temporal de la imagen
                $ruta = $_FILES["img_perfil"]["tmp_name"];

                //Se genera la referencia como id-usuario.jpg
                $img=$id_new_user.".".$tips;

                //Si la imagen está cargada se guarda en la ruta especificada
                if(is_uploaded_file($ruta)){
                    $save_on = "img_perfiles/".$img;
                    copy($ruta, $save_on);
                }

                //Se actuliza la referencia de la imagen en el usuario registrado
                $query_img="UPDATE usuario SET img_perfil = '$save_on' WHERE id_usuario =$id_new_user";
                $res_img = mysqli_query($conexion, $query_img);
                $conexion->close();

                //Transición a la página de login
                echo "<script type='text/javascript'>window.location.replace('index.php');</script>";
            }
        }
    }
?>