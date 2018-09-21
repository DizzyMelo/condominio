<?php
require_once '../models/endereco.php';
require_once '../models/unidade.php';
require_once '../models/proprietario.php';

$endereco = new Endereco();
$unidade = new Unidade();
$proprietario = new Proprietario();


switch ($_POST['op']) {
  case 1:
    $l = $unidade->adicionar($_POST['unidade'],$_POST['bloco'],$_POST['area'],$_POST['fracao'],$_POST['abatimento'],$_POST['condominio']);
    //$l1 = $endereco->adicionar();
    $l2 = $proprietario->adicionar($_POST['proprietario'],$_POST['rg'],$_POST['cpfcnpj'],$_POST['dtnascimento'],$_POST['telefone'],$_POST['celular'],$_POST['email'],1);
    break;

  default:

    break;
}
 ?>
