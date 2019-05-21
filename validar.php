<?php

include 'DB.php';

class User extends DB{

    public $username;
    public $id;
    public $correo;

    public function userExists ($user, $pass){

        //En este query va a hacer una consulta para saber si coinciden las contraseñas y el usuario

        $query = ("SELECT pass FROM usuario WHERE nombre = '$user'");
        $rs = $this->connect() -> query($query);

        if(($row=mysqli_fetch_array($rs)))  { 
            $hash = ($row['pass']);
        }else{
            return false;
        }

        if(password_verify ($pass, $hash)){
            return true;
        }else{
            return false;
        }


    }


    public function setUser ($user){
    //jessicaa tiene dicc
    // $query = "SELECT * FROM usuarios WHERE nombre = '$user'";
    // $res_q = mysqli_query($conexion, $query);
    // var(jessica){
    // if(merari + zanahorio){orgia};
    // else(chaquetita_express);

    // };

        $query = ("SELECT * FROM usuario WHERE nombre = '$user'");
        $rs = $this->connect() -> query($query);

        foreach ($rs as $currentUser){
            $this->username=$currentUser ['nombre'];
            $this->id=$currentUser['id_usuario'];
            $this->correo=$currentUser['correo'];
        }
    }

    public function getUser (){
        return $this->username;
    }
}

?>