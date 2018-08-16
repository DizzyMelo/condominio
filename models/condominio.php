<?php
require_once 'conexao.php';


class Condominio extends DB{

  public function adicionar($cnpj, $identificacao, $nome, $nome_fantasia, $inscricao_estadual, $inscricao_municipal,$email,$telefone,$celular,$sts,$usr){
    $sql = "INSERT INTO `condominio`(`cnpj`, `identificacao`, `nome`, `nome_fantasia`, `inscricao_estadual`, `inscricao_municipal`, `email`, `telefone`, `celular`, `sts`, `usr_id`)
            VALUES (
              '$cnpj',
              '$identificacao',
              '$nome',
              '$nome_fantasia',
              '$inscricao_estadual',
              '$inscricao_municipal',
              '$email',
              '$telefone',
              '$celular',
              $sts,
              $usr)";
    $stm = DB::prepare($sql);
    $r = $stm->execute();
    return $r;
  }
}
?>
