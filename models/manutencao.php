<?php
require_once 'conexao.php';

class Manutencao extends DB{

  public function adicionar($nome,$periodicidade,$condominio){
      $sql = "INSERT INTO `manutencao`(`nome`, `periodicidade`, `condominio_id`) VALUES ('$nome',$periodicidade,$condominio)";
      $stm = DB::prepare($sql);
      return $stm->execute();
  }

  public function listar($condominio){
      $sql = "SELECT * FROM `manutencao` WHERE condominio_id = $condominio";
      $stm = DB::prepare($sql);
      $stm->execute();
      return $stm->fetchAll();
  }
}


?>
