<?php
require_once '../models/inadinplencia.php';

$obj = new Inadinplencia();
switch ($_POST['op']) {
  case 1:
    $l = $obj->adicionar($_POST[''],$_POST[''],$_POST[''],$_POST['']);
    echo $l;
    break;

  default:
    // code...
    break;
}
 ?>
