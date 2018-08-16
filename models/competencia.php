<?php
require_once 'conexao.php';

class Competencia extends DB{
  public function listar(){
    $sql = "SELECT * FROM competencia";
    $stm = DB::prepare($sql);
    $stm->execute();

    return $stm->fetchAll();
  }
}
 ?>
