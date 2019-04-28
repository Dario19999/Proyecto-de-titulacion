<?php

include 'php/conexion.php';

class User extends conexion{

    private $username;
    private $correo;

    public function userExists ($user, $pass){

        $md5pass = md5 ($pass);
        //En este query va a hacer una consulta para saber si coinciden las contraseñas y el usuario
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE nombre = :user AND pass = :pass');
        $query->execute (['user'=> $user, 'pass'=> $md5pass]);

        if ($query->rowCount()){
            return true;
        }else{
            return false;
        }

    }

    public function setUser ($user){
        $query = $this->connect()->prepare ('SELECT *FROM usuarios WHERE nombre = :user');
        $query->execute (['user'=> $user]);

        foreach ($query as $currentUser){
            $this->username=$currentUser ['nombre'];
            $this->correo=$currentUser['correo'];
        }
    }

    public function getUser (){
        return $this->correo;
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