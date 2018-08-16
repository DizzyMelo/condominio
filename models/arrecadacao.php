<?php
require_once 'conexao.php';

class Arrecadacao extends DB{
  public function adicionar($dia, $competencia, $condominio, $ub){
    $sql = "INSERT INTO `arrecadacoes`(`dia`, `competencia_id`, `condominio_id`, `unico_boleto`) VALUES ($dia, $competencia, $condominio, $ub)";
    $stm = DB::prepare($sql);
    $r = $stm->execute();
    return $r;
  }
}
 ?>
