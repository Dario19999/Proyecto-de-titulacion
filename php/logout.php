<?php

include 'sesion.php';

$userSession = new userSession();
$userSession->closeSession();

header("location: ../login.php")

?>