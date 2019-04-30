<?php

include 'DB.php';

class User extends DB{

    private $username;
    private $correo;

    public function userExists ($user, $pass){

        $md5pass = md5 ($pass);
        //En este query va a hacer una consulta para saber si coinciden las contraseñas y el usuario

        // $query = "SELECT * FROM usuarios WHERE nombre = '$user' AND pass = '$md5pass'";
        // $res_q = mysqli_query($conexion, $query);

        $query = $this->connect()->prepare('SELECT * FROM usuario WHERE nombre = :user AND pass = :pass');
        $query->execute (['user'=> $user, 'pass'=> $pass]);

        if ($query->rowCount()){
            return true;
        }else{
            return false;
        }

    }

    public function setUser ($user){

        // $query = "SELECT * FROM usuarios WHERE nombre = '$user'";
        // $res_q = mysqli_query($conexion, $query);

        $query = $this->connect()->prepare ('SELECT *FROM usuario WHERE nombre = :user');
        $query->execute (['user'=> $user]);

        foreach ($query as $currentUser){
            $this->username=$currentUser ['nombre'];
            $this->correo=$currentUser['correo'];
        }
    }

    public function getUser (){
        return $this->username;
    }
}

/* if (isset($_POST['usuario']) && isset ($_POST ['contra'])){
        include ('conexion.php');
        $username = ($conexion, $_POST ['usuario']);
        $password = ($conexion, $_POST ['contraseña']);
        $comprobar = 'select* from '
}else{
    header ('location: ./');
}*/

?>