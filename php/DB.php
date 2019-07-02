<?php

class DB{

    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __construct(){
        
        $this->host     = 'localhost';
        $this->db       = 'lacousine_bd';
        $this->user     = 'root';
        $this->password = "";
        $this->charset  = 'utf8mb4';
    }

    function connect(){
    

        $conexion = new mysqli($this->host, $this->user, 
        $this->password, $this->db);

        // Check connection
        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        } 

        return $conexion;
    }

    }

//    class DB{

//     private $host;
//     private $db;
//     private $user;
//     private $password;
//     private $charset;

//     public function __construct(){
        
//         $this->host     = 'localhost';
//         $this->db       = 'u655911065_probd';
//         $this->user     = 'u655911065_jd';
//         $this->password = "sWWE4=4Nk3xaBpMHJ0";
//         $this->charset  = 'utf8mb4';
//     }

//     function connect(){
    

//         $conexion = new mysqli($this->host, $this->user, 
//         $this->password, $this->db);

//         // Check connection
//         if ($conexion->connect_error) {
//             die("Conexión fallida: " . $conexion->connect_error);
//         } 

//         return $conexion;
//     }

//     }

?>




