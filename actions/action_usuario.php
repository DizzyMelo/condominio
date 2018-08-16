<?php
session_start();
require_once '../models/usuario.php';

$obj = new Usuario();

switch ($_POST['op']) {
  case 1:
    $l = $obj->logar($_POST['email'],md5($_POST['senha']));

    if($l == null){
      echo "false";
    }else{
      $_SESSION['id'] = $l->id;
      $_SESSION['nome'] = $l->nome;
      $_SESSION['email'] = $l->email;
      $_SESSION['img'] = 'img.png';
        echo json_encode($l);
    }

    break;

  default:
    // code...
    break;
}
 ?>
