<?php
require_once 'conexao.php';

class InstrucaoAcordo extends DB{

  public function adicionar($primeira_linha,$segunda_linha,$terceira_linha,$quarta_linha,$condominio){
      $sql = "INSERT INTO `instrucao_acordo`(`primeira_linha`, `segunda_linha`, `terceira_linha`, `quarta_linha`, `condominio_id`) VALUES ('$primeira_linha','$segunda_linha','$terceira_linha','$quarta_linha',$condominio)";
      $stm = DB::prepare($sql);
      return $stm->execute();
  }

}

 ?>
