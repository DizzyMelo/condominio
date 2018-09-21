<?php
require_once '../models/usuario_adicional.php';

$obj = new UsuarioAdicional();
switch ($_POST['op']) {
  case 1:
    $l = $obj->adicionar($_POST['email'],$_POST['nome'],$_POST['senha'],$_POST['condominio'],1);
    echo $l;
    break;

  default:
    // code...
    break;
}

 ?>
