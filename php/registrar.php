<?php

    require 'conexion.php';

    if(isset($_POST['correo']) && isset($_POST['usuario']) && isset($_POST['contra']) && isset($_POST['contra2']) &&
    isset($_POST['genero']) && isset($_POST['nacionalidad'])){
        $user = ( $_POST['usuario']);
        $correo = ( $_POST['correo']);
        $sexo = ($_POST['genero']);
        $pass= ($_POST['contra']);
        $pass_ver =($_POST['contra2']);
        $nacionalidad=($_POST['nacionalidad']);
    }

    $patron_p = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/";
    $patron_u = "/^(?=.*[a-z])(?=.*[a-zA-Z]).{1,50}$/";

    $query_u = "SELECT * FROM usuario WHERE nombre = '$user'";
    $query_c = "SELECT * FROM usuario WHERE correo = '$correo'";
    $res_u = mysqli_query($conexion, $query_u);
    $res_c = mysqli_query($conexion,$query_c);

    $user_exists = mysqli_num_rows($res_u);
    $correo_exists = mysqli_num_rows($res_c);
    $indicator = 1;
    
    if(isset($_POST['registrar'])){
        
        if($correo_exists === 1){
            echo "<p class = 'error' style = 'color: red'>*El correo ya está en uso. Pruebe ingresando uno nuevo.</p>";
            $indicator = 0;
        }

        if($user_exists == 1){

            echo "<p class = 'error' style = 'color: red'>*El nombre de usuario ya existe. Intente ingresando uno nuevo.</p>";
            $indicator = 0;
           
        }else{
            if(!preg_match($patron_u, $user)){
                echo "<p class = 'error' style = 'color: red'>*El nombre de usuario no puede contener más de 50 caracteres. Pruebe ingresando uno nuevo.</p>";
                $indicator = 0;
            }
        }

        if(empty($pass_ver)){
            echo "<p class = 'error' style = 'color: red'>*Reingrese su contraseña para poder registrarse.</p>";
            $indicator = 0;
        }else{
            if($pass_ver != $pass){
                echo "<p class = 'error' style = 'color: red'>*Las contraseñas deben de ser iguales en ambos campos.</p>";
                $indicator = 0;
            }
            if(preg_match($patron_p, $pass) && preg_match($patron_u, $user) && $pass != $user && $indicator == 1){

                $query="INSERT INTO usuario (nombre,pass,correo,id_nacionalidad,sexo) values ('$user','$pass','$correo','$nacionalidad','$sexo')";
                $registrar=mysqli_query($conexion, $query) or die ('No se pudo registrar <br>'.mysqli_error($conexion));
                mysqli_close ($conexion);
    
                $correo = "";
                $user = "";
                $pass = "";
                $pass_ver = "";
    
                header('location: /Proyecto-de-titulacion/pagina_principal.html');
            }
            else{
                echo "<p class = 'error' style = 'color: red'>*La contraseña debe contener al menos 8 caracteres. Entre ellos 1 letra mayúscula y un caracter numérico. 
                Recuerda que el nombre de usuario y la contraseña deben de ser diferentes.</p>";
            }     
        }
    }
?>