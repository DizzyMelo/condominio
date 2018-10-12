<?php
require_once 'conexao.php';

class Conta extends DB {
  public function adicionar($conta, $descricao,$grupo){
    $sql = "INSERT INTO `conta`(`conta`, `descricao`, `grupo_conta_id`) VALUES ('$conta', '$descricao',$grupo)";
    $stm = DB::prepare($sql);
    $r = $stm->execute();
    return $r;
  }

  public function listar($grupo){
    $sql = "SELECT `id`, `conta`, `descricao`, `grupo_conta_id` FROM `conta` WHERE grupo_conta_id = $grupo";
    $stm = DB::prepare($sql);
    $stm->execute();
    return $stm->fetchAll();
  }
}
?>
