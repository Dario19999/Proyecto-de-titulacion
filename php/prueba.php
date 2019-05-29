<?php
    include_once 'conexion.php';

    // $query_groseria = "SELECT groseria FROM groseria";
    // $res_groseria = mysqli_query($conexion, $query_groseria);
    // $paso_1="lala puta";
    // $paso_2="hola como estas";
    // $paso_3="leche de";
    // $cant_pasos=3;
    // $p=0;
    
    // while($row = mysqli_fetch_array($res_groseria)){
    //     echo $row['groseria'];
    //     if($p != $cant_pasos){
    //         $p++;
    //         if(strpos($paso_1, $row['groseria']) !== false){
                
    //             $bandera = 0;
    //             $mostrar_paso_error = 1;
    //             echo $bandera;
    //             break;
                
                
    //         }else{    
    //             $bandera = 1; 
    //             $mostrar_paso_error = 0; 
    //             // echo ${"paso_" . $p};
    //             echo $bandera;
    //         }
    //         // echo ${"paso_" . $p};
    //     }else{
    //         break;

    //     }
       
    // }
    $user_correo="jessica@gmail.com";
    $query = ("SELECT correo FROM usuario WHERE correo = '$user_correo'");
    $rs = mysqli_query ($conexion, $query);
    $existe = mysqli_num_rows($rs);
    $asunto="Recuperación de contraseña";
    $cuerpo ="Siga el siguiente link para recuperar su contraseña";
    if($existe !==1){
        echo "<p class = 'error' style = 'color: red'>El nombre de usuario o correo no existe.</p>";

    }else{
        while($row=mysqli_fetch_array($rs)){ 
            echo $correo = $row['correo'];
        }


    }
?>