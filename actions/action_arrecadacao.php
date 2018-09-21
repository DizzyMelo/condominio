<?php
require_once '../models/arrecadacao.php';
require_once '../models/juro.php';
require_once '../models/multa.php';
require_once '../models/inadinplencia.php';
require_once '../models/pagador_boleto.php';
require_once '../models/instrucao_boleto.php';
require_once '../models/instrucao_acordo.php';


$obj = new Arrecadacao();
$juro = new Juro();
$multa = new Multa();
$inadinplencia = new Inadinplencia();
$pagador_boleto = new PagadorBoleto();
$instrucao_boleto = new InstrucaoBoleto();
$instrucao_acordo = new InstrucaoAcordo();

switch ($_POST['op']) {
  case 1:
      $l  = $obj->adicionar($_POST['dia'],$_POST['competencia'],$_POST['condominio'],$_POST['ub']);
      $l1 = $juro->adicionar($_POST['juro'],$_POST['prd'],$_POST['condominio']);
      $l2 = $multa->adicionar($_POST['taxa'],$_POST['uvp'],$_POST['condominio']);
      $l3 = $inadinplencia->adicionar($_POST['honorario_advogado'],$_POST['dias_para_inadinplencia'],$_POST['dias_para_processar'],$_POST['condominio']);
      $l4 = $pagador_boleto->adicionar($_POST['eou_inquilino'],$_POST['nome_inquilino'],$_POST['apenas_nome_inquilino'],$_POST['sacador_numero'],$_POST['condominio']);
      $l5 = $instrucao_boleto->adicionar($_POST['primeira_linha'],$_POST['segunda_linha'],$_POST['terceira_linha'],$_POST['quarta_linha'],$_POST['condominio']);
      $l6 = $instrucao_acordo->adicionar($_POST['primeira'],$_POST['segunda'],$_POST['terceira'],$_POST['quarta'],$_POST['condominio']);
      echo json_encode($l);
    break;

  default:

    break;
}
 ?>
