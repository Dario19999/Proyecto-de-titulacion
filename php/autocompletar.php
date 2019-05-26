<?php
  include_once '../DB.php';

  class autocompletar extends DB{
    function search_for_ingredients($nombre){
      $res = array();

      $query = $this->connect()->prepare("SELECT nombre FROM ingrediente WHERE nombre LIKE :incoming_nombre");
      $query->execute(array('incoming_nombre' => $nombre.'%'));

      if($query->rowCount()){
        while($r = mysqli_fetch_array($query)){
          array_push($res, $r['nombre']);
        }
      }
      return $res;
    }
  }

?>