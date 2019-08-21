<?php   

    include 'conexion.php';
    require '../sesion.php';
    require '../validar.php';

    $userSession = new userSession();
    $user = new User ();

    //si el formulario tiene listas las variables POST y el usuario está conectado
    if(isset($_POST ['termino']) && isset($_POST ['definicion']) && isset ($_SESSION ['username'])){
        //se toman las varibles que manda el formulario por post
        $termino = $_POST ['termino'];
        $definicion = $_POST ['definicion'];

        //se toma el username para poder obtener la id del usuario
        $usuario = $_SESSION['username'];
        $query = "SELECT * FROM usuario WHERE nombre = '$usuario'";
        $rs = mysqli_query ($conexion, $query);
        while(($row=mysqli_fetch_assoc($rs)))  { 
            $id=($row['id_usuario'])."<br>"; 
        }

        //se insertan el id del usuario, la palabra y la definición de la misma
        //en la tabla "termino".-
        $query="INSERT INTO 'termino' ('id_usuario', 'definicion', 'palabra') VALUES ('$id', '$definicion', '$termino');";
        $rs = mysqli_query ($conexion, $query);

        //se obtiene la primera letra del término recién insertado
        //y se asigna a la variable $primera
        $primera = substr($termino, 0, 1);

        //se redirige a la página del glosario en la que se encuentra el nuevo término 
        header ('Location: ../glosario.php?letra='.$primera.'') ;
    }else{
        //en caso de no estar listas las variables POST, se queda en la página principal
        //del glosario
        header ('Location: ../glosario.php') ;
    }

?>