
<?php

include 'DB.php';


class User extends DB{

    public $username;
    public $id;
    public $correo;

    public function userUnabled ($user){
        //Aquí verifica si la cuenta ha sido deshabilitada
        $query = "SELECT * FROM usuario WHERE nombre = '$user' AND deshabilitada=1 AND
        DATE_ADD( fecha, INTERVAL 10 DAY ) != CURDATE( )";
        $rs = $this->connect() -> query($query);
        while((mysqli_fetch_assoc($rs))){ 
            return true;
        }

        $query = "UPDATE usuario SET deshabilitada = '0', fecha = '0000-00-00' WHERE usuario.nombre = '$user' AND
        DATE_ADD( fecha, INTERVAL 10 DAY ) = CURDATE( )";
        $rs = $this->connect() -> query($query);
            return false;
        
    }


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