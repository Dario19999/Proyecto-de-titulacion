<?php

    require 'conexion.php';

    if(isset($_POST['reg'])){

        echo '<hr>';
        $patron_p = "/^(?=.*\d)(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/";
        $patron_u = "/^(?=.*[a-z])(?=.*[a-zA-Z]).{1,50}$/";

        $query_u = "SELECT * FROM usuario WHERE nombre = '$user'";
        $query_c = "SELECT * FROM usuario WHERE correo = '$correo'";
        $res_u = mysqli_query($conexion, $query_u);
        $res_c = mysqli_query($conexion,$query_c);

        $query_groseria = "SELECT groseria FROM groseria";
        $res_groseria = mysqli_query($conexion, $query_groseria);

        $user_exists = mysqli_num_rows($res_u);
        $correo_exists = mysqli_num_rows($res_c);
        $bandera = 1;
        
        while($row = mysqli_fetch_array($res_groseria)){
            if(strpos($user, $row['groseria']) !== false){
                $bandera = 0;
                echo "<p class = 'error' style = 'color: red'>*El nombre de usuario contiene una o más palabras altisonantes. Favor de corregir.</p>";
                break;
            }
        }

        if(empty($correo)){

        }else{
            if($correo_exists === 1){
                echo "<p class = 'error' style = 'color: red'>*El correo ya está en uso. Pruebe ingresando uno nuevo.</p>";
                $bandera = 0;
            }
        }
        
        if(empty($user)){

        }else{

            if($user_exists === 1){
                echo "<p class = 'error' style = 'color: red'>*El nombre de usuario ya existe. Intente ingresando uno nuevo.</p>";
                $bandera = 0;
            }

            if(!preg_match($patron_u, $user)){
                echo "<p class = 'error' style = 'color: red'>*El nombre de usuario no puede contener más de 50 caracteres. Pruebe ingresando uno nuevo.</p>";
                $bandera = 0;
            }   
        }
        if(empty($pass_ver)){
            echo "<p class = 'error' style = 'color: red'>*Reingrese su contraseña para poder registrarse.</p>";
            $bandera = 0;
        }else{
            if(!preg_match($patron_p, $pass)){
                echo "<p class = 'error' style = 'color: red'>*La contraseña debe contener al menos 8 caracteres. Entre ellos 1 letra mayúscula y un caracter numérico. 
                Recuerda que el nombre de usuario y la contraseña deben de ser diferentes.</p>";
                $bandera = 0;
            }
            if($pass_ver != $pass){
                echo "<p class = 'error' style = 'color: red'>*Las contraseñas deben de ser iguales en ambos campos.</p>";
                $bandera = 0;
            }
            if(preg_match($patron_p, $pass) && preg_match($patron_u, $user) && $pass != $user && $bandera == 1){

                $en_pass = password_hash($pass, PASSWORD_DEFAULT);

                $query=$conexion->prepare("INSERT INTO usuario (nombre,pass,correo,id_nacionalidad,sexo, edad) values (?,?,?,?,?,?)");
                $query->bind_param('sssisi', $user, $en_pass, $correo, $nacionalidad, $sexo, $edad);
                $query->execute();
                $id_new_user = mysqli_insert_id($conexion);
                $query->close();

                $tips = "jpg";
                $type = array("image/jpeg" => "jpg");
                $img_name = $_FILES["img_perfil"]["name"];
                $ruta = $_FILES["img_perfil"]["tmp_name"];
                $img=$id_new_user.".".$tips;

                if(is_uploaded_file($ruta)){
                    $save_on = "img_perfiles/".$img;
                    copy($ruta, $save_on);
                }
                $query_img="UPDATE usuario SET img_perfil = '$save_on' WHERE id_usuario =$id_new_user";
                $res_img = mysqli_query($conexion, $query_img);

                $conexion->close();

                echo "<script type='text/javascript'>window.location.replace('index.php');</script>";
            }
        }
    }
?>