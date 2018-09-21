<?php
require_once 'conexao.php';

class PagadorBoleto extends DB{
  public function adicionar($eou_inquilino,$nome_inquilino,$apenas_nome_inquilino,$sacador_numero, $condominio){
    $sql = "INSERT INTO `pagador_boleros`(`eou_inquilino`, `nome_inquilino`, `apenas_nome_inquilino`, `sacador_numero`, `condominio_id`) VALUES ($eou_inquilino,$nome_inquilino,$apenas_nome_inquilino,$sacador_numero, $condominio)";
    $stm = DB::prepare($sql);
    return $stm->execute();
  }

}
 ?>
