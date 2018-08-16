<?php
require_once 'models/categoria.php';

$c = new Categoria();

  $arquivo = $_FILES['file'];
  $templocation = $arquivo["tmp_name"];
  $name = $arquivo['name'];

  if (!$templocation) {
    die("Nenhum arquivo selecionados");
  }

  if (move_uploaded_file($templocation, "img_categoria/$name")) {
    $c->editarImg($_POST['id'], $name);
    echo "Arquivo enviado corretamente";
  }else{
    echo "Arquivo nao enviado";
  }

 ?>
