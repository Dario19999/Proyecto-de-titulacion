<?php   

    include 'conexion.php';
    require '../sesion.php';
    require '../validar.php';

    $userSession = new userSession();
    $user = new User ();

    if(isset($_POST ['termino']) && isset($_POST ['definicion']) && isset ($_SESSION ['username'])){
        $termino = $_POST ['termino'];
        $definicion = $_POST ['definicion'];
        $usuario = $_SESSION['username'];

        $query = "SELECT * FROM usuario WHERE nombre = '$usuario'";
        $rs = mysqli_query ($conexion, $query);

        while(($row=mysqli_fetch_assoc($rs)))  { 
        $id=($row['id_usuario'])."<br>"; 
        }

        $query_groseria = "SELECT groseria FROM groseria";
        $res_groseria = mysqli_query($conexion, $query_groseria);
        $bandera = 1;
        while($row = mysqli_fetch_array($res_groseria)){
            if(strpos($termino, $row['groseria']) !== false){
                echo "<p class = 'error' style = 'color: red'>*El termino contiene una o más palabras altisonantes. Favor de corregir.</p>";
                $bandera = 0;
            }else if(strpos($definicion, $row['groseria']) !== false){
                echo "<p class = 'error' style = 'color: red'>*La definición contiene una o más palabras altisonantes. Favor de corregir.</p>";
                $bandera = 0;
            }
            
        }
        
        if($bandera == 1){

            $query="INSERT INTO `termino` (`id_usuario`, `definicion`, `palabra`) VALUES ('$id', '$definicion', '$termino');";
            $rs = mysqli_query ($conexion, $query);
            $primera = substr($termino, 0, 1);

            header ('Location: ../glosario.php?letra='.$primera.'') ;
        }
    }else{
        header ('Location: ../glosario.php') ;
    }

?>