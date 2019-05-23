<?php
    include_once 'autocompletar.php';

    $modelo = new autocompletar();

    $nombre = $_GET['ingr_1'];

    $res = $modelo->search_for_ingredients($nombre);

    echo json_encode($res);

?>