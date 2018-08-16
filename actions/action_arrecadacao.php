<?php
require_once '../models/arrecadacao.php';
require_once '../models/juro.php';
require_once '../models/multa.php';

$obj = new Arrecadacao();
$juro = new Juro();
$multa = new Multa();

switch ($_POST['op']) {
  case 1:
      $l = $obj->adicionar($_POST['dia'],$_POST['competencia'],$_POST['condominio'],$_POST['ub']);
      $l1 = $juro->adicionar($_POST['juro'],$_POST['prd'],$_POST['condominio']);
      $l2 = $multa->adicionar($_POST['taxa'],$_POST['uvp'],$_POST['condominio']);
      echo json_encode($l);
    break;

  default:

    break;
}
 ?>
