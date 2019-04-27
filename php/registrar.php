<?php

    require 'conexion.php';

    $patron_p = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/";
    $patron_u = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{50}$/";

    $val= mysqli_query($conexion, "SELECT * FROM usuario");

        if(isset($_POST['registrar'])){
            if (mysqli_num_rows($val) > 0) {
                while($row = mysqli_fetch_array($val)){
                
                    $old_user = $row['nombre'];
                    $old_correo = $row ['correo'];
                    
                    
                    if($old_user == $user){
                        echo "<p class = 'error' style = 'color: red'>*El nombre de usuario ya existe. Intente ingresando uno nuevo.</p>";
                    }
                    if($old_correo == $correo){
                        echo "<p class = 'error' style = 'color: red'>*El correo ya existe. Intente ingresando uno nuevo.</p>";
                    }
                    
                    if($pass != $pass_ver){
                        echo "<p class = 'error' style = 'color: red'>*Las contraseñas deben ser iguales.</p>";
                    }

                    if(preg_match($patron_p, $pass) && preg_match($patron_u, $user) && $pass != $user){
        
                        $query="INSERT INTO usuario (nombre,pass,correo,id_nacionalidad,sexo) values ('$user','$pass','$correo','$nacionalidad','$sexo')";
                        $registrar=mysqli_query($conexion, $query) or die ('No se pudo registrar <br>'.mysqli_error($conexion));
                        mysqli_close ($conexion);
        
                        header('location: /Proyecto-de-titulacion/pagina_principal.html');
                    }
                    else{
                        echo "<p class = 'error' style = 'color: red'> *La contraseña debe contener al menos 8 caracteres. Entre ellos 1 letra mayúscula y un caracter numérico. Recuerda que el nombre de usuario y la contraseña deben de ser diferentes</p>";
                    }
                }     
            } 

        }
?>