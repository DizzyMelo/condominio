<?php
require_once 'conexao.php';

class InstrucaoBoleto extends DB{

  public function adicionar($primeira_linha,$segunda_linha,$terceira_linha,$quarta_linha,$condominio){
      $sql = "INSERT INTO `instrucao_boleto`(`primeira_linha`, `segunda_linha`, `terceira_linha`, `quarta_linha`, `condominio_id`) VALUES ('$primeira_linha','$segunda_linha','$terceira_linha','$quarta_linha',$condominio)";
      $stm = DB::prepare($sql);
      return $stm->execute();
  }

}


 ?>
