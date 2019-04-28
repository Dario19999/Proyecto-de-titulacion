<?php

include 'php/sesion.php';
include 'php/validar.php';

$session = new userSession();
$user = new user ();

if ((isset $_SESSION ['user'])) {
    echo "Hay sesion";

    $user->setUser($userSession->getCurrentUser());
    include_once 'pagina_principal.html';
}else if (isset ($_POST ['username']) && isset ($_POST ['pass'])){
    echo "Validacion de login";
    $userForm = $_POST ['username'];
    $passForm = $_POST ['pass'];

    if ($user->userExists($userForm, $passForm)){
        echo "usuario valido";

        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);

        include_once 'pagina_principal.html';

    }else{
        echo "Usuario y/o contraseña incorrectos";
        $errorLogin = "Nombre de usuario y/o contraseña incorrectos";
        include_once 'login.html';
    }
}else{
    echo "Login";
}

?>