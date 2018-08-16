<?php
require_once 'conexao.php';

class Endereco extends DB{

  public function adicionar($cep, $rua, $complemento, $bairro, $cidade, $uf){
    $sql = "INSERT INTO `endereco`(`cep`, `rua`, `complemento`, `bairro`, `cidade`, `uf`)
            VALUES ('$cep', '$rua', '$complemento', '$bairro', '$cidade', $uf)";
    $stm = DB::prepare($sql);
    $r = $stm->execute();
    return $r;
  }
}
 ?>
