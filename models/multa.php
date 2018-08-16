<?php
require_once 'conexao.php';

class Multa extends DB{
  public function adicionar($taxa, $uvp, $condominio){
    $sql = "INSERT INTO `multa`(`taxa`, `condominio_id`, `uvp`) VALUES ($taxa, $condominio, $uvp)";
    $stm = DB::prepare($sql);
    $r = $stm->execute();
    return $r;
  }
}
 ?>
