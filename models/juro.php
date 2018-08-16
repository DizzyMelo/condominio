<?php
require_once 'conexao.php';

class Juro extends DB{
  public function adicionar($juro, $prd, $condominio){
    $sql = "INSERT INTO `juro`(`juro`, `prd`, `condominio_id`) VALUES ($juro, $prd, $condominio)";
    $stm = DB::prepare($sql);
    $r = $stm->execute();
    return $r;
  }
}
 ?>
