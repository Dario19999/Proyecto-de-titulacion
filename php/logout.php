<?php

include 'php/sesion.php';

$ession = new userSession();
$userSession -> closeSession();

header("location: .pagina_principal.html")

?>