<?php
require_once 'conexao.php';

class UF extends DB{

  public function listar(){
    $sql = "SELECT * FROM uf";
    $stm = DB::prepare($sql);
    $stm->execute();
    return $stm->fetchAll();
  }
}
 ?>
