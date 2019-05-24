<?php

require 'sesion.php';
require 'validar.php';


$userSession = new userSession();
$user = new User ();


if (isset ($_SESSION ['username'])) {

   // echo "Hay sesion";

    $user->setUser($userSession->getCurrentUser());

    include_once 'pagina_principal.php';
    

    }else if (isset ($_POST ['username']) && isset ($_POST ['pass'])){

    //echo "Validacion de login";

    $userForm = $_POST ['username'];
    $passForm = $_POST ['pass'];

    $user = new User();

    if ($user->userUnabled($userForm)){
        $errorLogin = "Cuenta deshabilitada".'<br>';
        include_once 'login.php';
        
    }else if ($user->userExists($userForm, $passForm)){

        //echo "Usuario valido";

        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);

        include_once 'pagina_principal.php';
       

    }else{

       // echo "Usuario y/o contraseña incorrectos".'<br>';
        $errorLogin = "Usuario y/o contraseña incorrectos".'<br>';
        include_once 'login.php';
       
    }
    }else{
       // echo "Login";
        include_once 'login.php';
    
    }

?>