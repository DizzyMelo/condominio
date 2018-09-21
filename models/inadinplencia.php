<?php
require_once 'conexao.php';

class Inadinplencia extends DB {
  public function adicionar($honorario_adivogado, $dias_para_inadinplencia, $dias_para_processar, $condominio){
    $sql = "INSERT INTO `inadinplencia`(`honorario_advogado`, `dias_para_inadinplencia`, `dias_para_processar`, `condominio_id`) VALUES ($honorario_adivogado, $dias_para_inadinplencia, $dias_para_processar, $condominio)";
    $stm = DB::prepare($sql);
    return $stm->execute();
  }
}
 ?>
