<?php
require_once '../models/conta.php';

$obj = new Conta();

switch ($_POST['op']) {
  case 1:
    $l = $obj->adicionar($_POST['codigo'],$_POST['descricao'],$_POST['id']);
    echo $l;
    break;

  default:

    break;
}
 ?>
