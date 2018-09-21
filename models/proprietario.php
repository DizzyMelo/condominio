<?php
require_once 'conexao.php';

class Proprietario extends DB{
  public function adicionar($nome,$rg,$cpf,$dtnascimento,$telefone,$celular,$email,$unidade){
    $sql = "INSERT INTO `proprietario`(`nome`, `rg`, `cpf`, `dtnascimento`, `telefone`, `celular`, `email`, `unidade_id`) VALUES ('$nome','$rg','$cpf','$dtnascimento','$telefone','$celular','$email',$unidade)";
    $stm = DB::prepare($sql);
    return $stm->execute();
  }

  public function listar($id){
    $sql = "SELECT proprietario.id, `nome`, `rg`, `cpf`, `dtnascimento`, `telefone`, `celular`, `email`, `unidade_id` FROM `proprietario` JOIN unidade ON (proprietario.unidade_id = unidade.id) WHERE unidade.condominio_id = $id";
    $stm = DB::prepare($sql);
    $stm->execute();

    return $stm->fetchAll();
  }
}
 ?>
