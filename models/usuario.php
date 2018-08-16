<?php
require_once 'conexao.php';


class Usuario extends DB{
  public function logar($email, $senha){
    $sql = "SELECT * FROM usuario WHERE email = '$email' and senha = '$senha'";
    $stm = DB::prepare($sql);
    $stm->execute();

    return $stm->fetch();
  }
}
 ?>
