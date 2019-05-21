<?php

include 'sesion.php';

$userSession = new userSession();
$userSession->closeSession();

header("location: index.php")

?>