<?php
require_once '../models/manutencao.php';

$obj = new Manutencao();

switch ($_POST['op']) {
  case 1:
    $l = $obj->adicionar($_POST['nome'],$_POST['periodicidade'],$_POST['condominio']);

    echo $l;
    break;

  default:
    // code...
    break;
}

 ?>
