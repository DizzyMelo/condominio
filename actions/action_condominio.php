<?php
require_once '../models/condominio.php';
require_once '../models/endereco.php';

$obj = new Condominio();
$obj2 = new Endereco();
switch ($_POST['op']) {
  case 1:
    $resp = $obj->adicionar($_POST['cnpj'],
                            $_POST['identificacao'],
                            $_POST['nome'],
                            $_POST['nome_fantasia'],
                            $_POST['inscricao_estadual'],
                            $_POST['inscricao_municipal'],
                            $_POST['email'],
                            $_POST['telefone'],
                            $_POST['celular'],
                            1,
                            $_POST['usr']);
    $resp2 = $obj2->adicionar($_POST['cep'],$_POST['rua'],$_POST['complemento'],$_POST['bairro'],$_POST['cidade'],$_POST['uf']);

    if($resp && $resp2){
      echo "ok";
    }else{
        echo "erro";
    }

    break;

  default:
    // code...
    break;
}
 ?>
