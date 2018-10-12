<?php
require_once 'conexao.php';

class GrupoConta extends DB {
  public function adicionar($conta, $descricao,$condominio){
    $sql = "INSERT INTO `grupo_conta`(`conta`, `descricao`, `condominio_id`)
            VALUES ('$conta','$descricao',$condominio)";
    $stm = DB::prepare($sql);
    $r = $stm->execute();
    return $r;
  }

  public function listar($condominio){
    $sql = "SELECT `id`, `conta`, `descricao`, `condominio_id` FROM `grupo_conta` WHERE condominio_id = $condominio";
    $stm = DB::prepare($sql);
    $stm->execute();
    return $stm->fetchAll();
  }
}
?>
