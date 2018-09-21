<?php
require_once 'conexao.php';

class UsuarioAdicional extends DB{
  public function adicionar($email,$nome,$senha,$condominio,$sts){
      $sql = "INSERT INTO `usuario_adicional`(`email`, `nome`, `senha`, `condominio_id`, `sts`) VALUES ('$email','$nome','$senha',$condominio,$sts)";
      $stm = DB::prepare($sql);
      $stm->execute();

      $sql = "SELECT * FROM usuario_adicional ORDER BY id DESC LIMIT 1";
      $stm = DB::prepare($sql);
      $stm->execute();
      $r = $stm->fetch();

      return json_encode($r);
  }

  public function listar(){
    $sql = "SELECT * FROM usuario_adicional";
    $stm = DB::prepare($sql);
    $stm->execute();
    return $stm->fetchAll();
  }
}
 ?>
