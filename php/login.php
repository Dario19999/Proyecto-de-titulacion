<?php

require 'sesion.php';
require 'validar.php';

$userSession = new userSession();
$user = new User ();

if (isset ($_SESSION ['user'])) {

    //echo "Hay sesion";

    $user->setUser($userSession->getCurrentUser());
    include_once '../pagina_principal.php';
    

    }else if (isset ($_POST ['username']) && isset ($_POST ['pass'])){

    //echo "Validacion de login";

    $userForm = $_POST ['username'];
    $passForm = $_POST ['pass'];

    $user = new User();

    if ($user->userExists($userForm, $passForm)){

        //echo "Usuario valido";

        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);

        include_once '../pagina_principal.php';
       

    }else{

        //echo "Usuario y/o contraseña incorrectos";
        $errorLogin = "Nombre de usuario y/o contraseña incorrectos";
        include_once '../login.php';
       
    }
}else{
    //echo "Login";
    include_once '../login.php';
   
}

?>