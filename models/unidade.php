<?php
require_once 'conexao.php';

class Unidade extends DB{
  public function adicionar($unidade,$bloco,$area,$fracao,$abatimento,$condominio){
    $sql = "INSERT INTO `unidade`(`unidade`, `bloco`, `area`, `fracao`, `abatimento`, `condominio_id`) VALUES ('$unidade','$bloco',$area,$fracao,$abatimento,$condominio)";
    $stm = DB::prepare($sql);
    return $stm->execute();
  }
}
 ?>
