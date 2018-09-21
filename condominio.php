<?php
session_start();
require_once 'models/uf.php';
require_once 'models/competencia.php';
require_once 'models/usuario_adicional.php';

$usr_ad = new UsuarioAdicional();
$uf = new UF();
$competencia = new Competencia();
 ?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Condomínio | Dados do Condomínio</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/plugins/dropzone/basic.css" rel="stylesheet">
    <link href="css/plugins/dropzone/dropzone.css" rel="stylesheet">

    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <script   src="https://code.jquery.com/jquery-3.3.1.min.js"   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="   crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js"></script>

    <script type="text/javascript">

      function adicionarCobranca(form){
        var dia = form.dia.value;
        var competencia = form.competencia.value;
        var ub = false;

        if(form.unico_boleto.checked){
          ub = true;
        }

        var juro = form.juro.value;
        var prd = false;

        if(form.prd.checked){
          prd = true;
        }

        var taxa = form.taxa.value;
        var uvp = false;

        if (form.uvp.checked) {
          uvp = true;
        }

        var honorario_advogado = form.honorario_advogado.value;
        var dias_para_inadinplencia = form.dias_para_inadinplencia.value;
        var dias_para_processar = form.dias_para_processar.value;

        var eou_inquilino = false;
        var nome_inquilino = false;
        var apenas_nome_inquilino = false;
        var sacador_numero = false;

        if (form.eou_inquilino.checked) {
          eou_inquilino = true;
        }

        if (form.nome_inquilino.checked) {
          nome_inquilino = true;
        }

        if (form.apenas_nome_inquilino.checked) {
          apenas_nome_inquilino = true;
        }

        if (form.sacador_numero.checked) {
          sacador_numero = true;
        }

        var primeira_linha = form.primeira_linha.value;
        var segunda_linha = form.segunda_linha.value;
        var terceira_linha = form.terceira_linha.value;
        var quarta_linha = form.quarta_linha.value;

        var primeira = form.primeira.value;
        var segunda = form.segunda.value;
        var terceira = form.terceira.value;
        var quarta = form.quarta.value;

        $.post("actions/action_arrecadacao.php",
        {
          op:1,
          dia:dia,
          competencia:competencia,
          ub:ub,
          condominio:4,
          juro:juro,
          prd:prd,
          taxa:taxa,
          uvp:uvp,
          honorario_advogado:honorario_advogado,
          dias_para_inadinplencia:dias_para_inadinplencia,
          dias_para_processar:dias_para_processar,
          eou_inquilino:eou_inquilino,
          nome_inquilino:nome_inquilino,
          apenas_nome_inquilino:apenas_nome_inquilino,
          sacador_numero:sacador_numero,
          primeira_linha:primeira_linha,
          segunda_linha:segunda_linha,
          terceira_linha:terceira_linha,
          quarta_linha:quarta_linha,
          primeira:primeira,
          segunda:segunda,
          terceira:terceira,
          quarta:quarta
        },function(data){
          alert(data)
        });

        return false;
      }
      function adicionar(form){


        var cnpj = form.cnpj.value;
        var identificacao = form.identificacao.value;
        var nome = form.nome.value;
        var nome_fantasia = form.nome_fantasia.value;
        var inscricao_estadual = form.inscricao_estadual.value;
        var inscricao_municipal = form.inscricao_municipal.value;
        var email = form.email.value;
        var telefone = form.telefone.value;
        var celular = form.celular.value;
        var cep = form.cep.value;
        var uf = form.uf.value;
        var rua = form.rua.value;
        var complemento = form.complemento.value;
        var bairro = form.bairro.value;
        var cidade = form.cidade.value;

        var usr = document.getElementById('id_usuario').value;

        $.post("actions/action_condominio.php",
        {
          op:1,
          cnpj:cnpj,
          identificacao:identificacao,
          nome:nome,
          nome_fantasia:nome_fantasia,
          inscricao_estadual:inscricao_estadual,
          inscricao_municipal:inscricao_municipal,
          email:email,
          telefone:telefone,
          celular:celular,
          cep:cep,
          uf:uf,
          rua:rua,
          complemento:complemento,
          bairro:bairro,
          cidade:cidade,
          usr:usr
        },function(data){
          if(data == "ok"){

            toastr.success('Cadastro realizado com sucesso!','Notificação');
            form.reset();
          }else{
            toastr.error('Erro ao cadastrar condomínio!','Notificação');
          }
        });

        return false;
      }

      function adicionarUsuario(form){
        var email = form.email_nu.value;
        var nome = form.nome_nu.value;
        var senha = form.password1.value;
        var csenha = form.csenha_nu.value;

        if(senha == csenha){
          $.post("actions/action_usuario_adicional.php",
          {
            op:1,
            email:email,
            nome:nome,
            senha,
            condominio:4
          },function(data){
            alert(data);
          });
        }else{
          alert("DESIGUAL");
        }

        return false;
      }

      function buscarEndereco(str){
        var cep = str.value;
        $.get("https://viacep.com.br/ws/"+cep+"/json/",


        function(data){
          //alert(data.logradouro);
          $("#rua").val(data.logradouro);
          $("#bairro").val(data.bairro);
          $("#cidade").val(data.localidade);
          var textToFind = data.uf;

          var dd = document.getElementById('uf');
          for (var i = 0; i < dd.options.length; i++) {
              if (dd.options[i].text === textToFind) {
                  dd.selectedIndex = i;
                  break;
              }
          }
        });
        return false;
      }
    </script>

    <script type="text/javascript">
    $(document).ready(function($){

      $("#cnpj").mask("999.999.999/9999-99");

    });
    </script>
</head>

<body>

  <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $_SESSION['id'] ?>">

    <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <!--<img alt="image" class="rounded-circle" src="img/profile_small.jpg"/>-->
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="block m-t-xs font-bold">Daniel Melo</span>
                            <span class="text-muted text-xs block">Síndico <b class="caret"></b></span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                            <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                            <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li>
                            <li class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="login.html">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>

                <li class="">
                    <a href="index.php"><i class="fa fa-home"></i> <span class="nav-label">Inicio</span> </a>
                </li>
                <li class="">
                    <a href="condominio.php"><i class="fa fa-building"></i> <span class="nav-label">Condomínio</span> </a>
                    <ul class="nav nav-second-level">
                        <li class=""><a href="condominio.php">Dados do Condomínio</a></li>
                        <li><a href="unidade.php">Unidade</a></li>
                        <li><a href="responsavel_legal.php">Responsáveis legais</a></li>
                        <li><a href="dashboard_4_1.html">Contas bancárias</a></li>
                        <li><a href="dashboard_5.html">Formas de Recebimento</a></li>
                        <li><a href="dashboard_5.html">Plano de Contas</a></li>
                        <li><a href="dashboard_5.html">Relatórios</a></li>
                        <li><a href="dashboard_5.html">Ocorrências</a></li>
                        <li><a href="dashboard_5.html">Manutenções Progamadas</a></li>
                    </ul>
                </li>

                <li class="">
                    <a href="index.php"><i class="fa fa-user-circle"></i> <span class="nav-label">Área do condômino</span> </a>
                    <ul class="nav nav-second-level">
                        <li class=""><a href="index.html">Área do condômino</a></li>
                        <li><a href="dashboard_2.html">Documentos</a></li>
                        <li><a href="dashboard_3.html">Comunicados</a></li>
                        <li><a href="dashboard_4_1.html">Site Institucional</a></li>
                        <li><a href="dashboard_5.html">Reservas on-line</a></li>

                    </ul>
                </li>

            </ul>

        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                <form role="search" class="navbar-form-custom" action="search_results.html">
                    <div class="form-group">
                        <input type="text" placeholder="Procurar..." class="form-control" name="top-search" id="top-search">
                    </div>
                </form>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Bem vindo ao Falcon</span>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <div class="dropdown-messages-box">
                                <a class="dropdown-item float-left" href="profile.html">
                                    <img alt="image" class="rounded-circle" src="img/a7.jpg">
                                </a>
                                <div class="media-body">
                                    <small class="float-right">46h ago</small>
                                    <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a class="dropdown-item float-left" href="profile.html">
                                    <img alt="image" class="rounded-circle" src="img/a4.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="float-right text-navy">5h ago</small>
                                    <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a class="dropdown-item float-left" href="profile.html">
                                    <img alt="image" class="rounded-circle" src="img/profile.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="float-right">23h ago</small>
                                    <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                    <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="mailbox.html" class="dropdown-item">
                                    <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="mailbox.html" class="dropdown-item">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                    <span class="float-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <a href="profile.html" class="dropdown-item">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="float-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <a href="grid_options.html" class="dropdown-item">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="float-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="notifications.html" class="dropdown-item">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="login.html">
                        <i class="fa fa-sign-out"></i> Sair
                    </a>
                </li>
            </ul>

        </nav>
        </div>

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Condomínio</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Dados do Condomínio</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>Unidade</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="responsavel_legal.php">Resposáveis Legais</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>Contas bancárias</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>Formas de Recebimento</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>Plano de Contas</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>Relatórios</a>
                        </li>

                        <li class="breadcrumb-item">
                            <a>Ocorrências</a>
                        </li>
                        <!--<li class="breadcrumb-item">
                            <a>Manutenções Progamadas</a>
                        </li>-->
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeIn">

            <div class="row">
                <div class="col-lg-8">
                    <div class="tabs-container">
                        <ul class="nav nav-tabs" role="tablist">
                            <li><a class="nav-link active" data-toggle="tab" href="#tab-1"> Cadastro do Condomínio</a></li>
                            <li><a class="nav-link" data-toggle="tab" href="#tab-2">Cobranças</a></li>
                            <li><a class="nav-link" data-toggle="tab" href="#tab-3">Usuários</a></li>
                            <li><a class="nav-link" data-toggle="tab" href="#tab-4">Patrimônios</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" id="tab-1" class="tab-pane active">
                                <div class="panel-body">
                                  <div class="row">
                                    <div class="col-lg-12">
                                        <div class="ibox ">

                                            <div class="ibox-content">
                                                <form method="post" onsubmit="return adicionar(this)">
                                                  <h3>Dados Cadastrais</h3>
                                                  <hr>
                                                    <div class="form-group  row">
                                                      <label class="col-sm-1 col-form-label">CNPJ</label>
                                                        <div class="col-sm-5">
                                                          <input type="text" name="cnoj" id="cnpj" class="form-control" required>
                                                        </div>

                                                        <label class="col-sm-1 col-form-label">Ident.</label>
                                                          <div class="col-sm-5">
                                                            <input type="text" name="identificacao" id="identificacao" class="form-control">
                                                          </div>
                                                    </div>

                                                    <div class="form-group  row"><label class="col-sm-1 col-form-label">Nome</label>
                                                        <div class="col-sm-11"><input type="text" name="nome" id="nome" class="form-control"></div>
                                                    </div>

                                                    <div class="form-group  row"><label class="col-sm-1 col-form-label">Nome Fantasia</label>
                                                        <div class="col-sm-11"><input type="text" name="nome_fantasia" id="nome_fantasia" class="form-control"></div>
                                                    </div>

                                                    <div class="form-group  row">
                                                      <label class="col-sm-1 col-form-label">Inscricao Estadual</label>
                                                        <div class="col-sm-5">
                                                          <input type="text" name="inscricao_estadual" id="inscricao_estadual" class="form-control">
                                                        </div>

                                                        <label class="col-sm-1 col-form-label">Inscricao Municipal</label>
                                                          <div class="col-sm-5">
                                                            <input type="text" name="inscricao_municipal" id="inscricao_municipal" class="form-control">
                                                          </div>
                                                    </div>

                                                    <div class="form-group  row"><label class="col-sm-1 col-form-label">Email</label>
                                                        <div class="col-sm-11"><input type="email" name="email" id="email" class="form-control"></div>
                                                    </div>

                                                    <div class="form-group  row">
                                                      <label class="col-sm-1 col-form-label">Telefone</label>
                                                        <div class="col-sm-5">
                                                          <input type="text" name="telefone" id="telefone" class="form-control">
                                                        </div>

                                                        <label class="col-sm-1 col-form-label">Celular</label>
                                                          <div class="col-sm-5">
                                                            <input type="text" name="celular" id="celular" class="form-control">
                                                          </div>
                                                    </div>

                                                    <h3>Endereço</h3>
                                                    <hr>

                                                    <div class="form-group  row">
                                                      <label class="col-sm-1 col-form-label">CEP</label>
                                                        <div class="col-sm-5">
                                                          <input type="text" name="cep" id="cep" onblur="buscarEndereco(this)" class="form-control">
                                                        </div>

                                                        <label class="col-sm-1 col-form-label">UF</label>
                                                          <div class="col-sm-5">
                                                            <select class="form-control" id="uf" name="uf">
                                                              <?php
                                                                foreach ($uf->listar() as $key => $value) {

                                                               ?>
                                                                <option value="<?php echo $value->id ?>"><?php echo $value->uf ?></option>
                                                               <?php
                                                             }
                                                                ?>
                                                            </select>
                                                          </div>
                                                    </div>

                                                    <div class="form-group  row">
                                                      <label class="col-sm-1 col-form-label">Rua</label>
                                                        <div class="col-sm-5">
                                                          <input type="text" class="form-control"  name="rua" id="rua">
                                                        </div>

                                                        <label class="col-sm-1 col-form-label">Comp.</label>
                                                          <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="complemento" id="complemento">
                                                          </div>
                                                    </div>

                                                    <div class="form-group  row">
                                                      <label class="col-sm-1 col-form-label">Bairro</label>
                                                        <div class="col-sm-5">
                                                          <input type="text" class="form-control" name="bairro" id="bairro">
                                                        </div>

                                                        <label class="col-sm-1 col-form-label">Cidade</label>
                                                          <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="cidade" id="cidade">
                                                          </div>
                                                    </div>

                                                    <div class="hr-line-dashed"></div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-4 col-sm-offset-2">
                                                            <button class="btn btn-danger btn-md" type="reset"> Cancelar</button>
                                                            <button class="btn btn-primary btn-md" type="submit">Salvar</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div role="tabpanel" id="tab-2" class="tab-pane">
                              <div class="panel-body">
                                <div class="row">
                                  <div class="col-lg-12">
                                      <div class="ibox ">

                                        <!--Inicio do conteudo-->
                                          <div class="ibox-content">
                                              <form method="post" onsubmit="return adicionarCobranca(this)">
                                                <h3>Arrecadações</h3>
                                                <hr>

                                                  <div class="form-group  row"><label class="col-form-label">Dia de vencimento das arrecadações.</label>
                                                      <div class="col-sm-11"><input type="text" name="dia" id="dia" class="form-control" placeholder="Ex.: 10"></div>
                                                  </div>

                                                  <div class="form-group  row"><label class="col-form-label">Competência das arrecadações</label>
                                                      <div class="col-sm-11">
                                                        <select class="form-control" name="competencia" id="competencia">

                                                          <?php
                                                            foreach ($competencia->listar() as $key => $value) {
                                                           ?>
                                                              <option value="<?php echo $value->id ?>"><?php echo $value->competencia ?></option>

                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                      </div>
                                                  </div>

                                                      <div class="col-sm-10">
                                                          <div class="i-checks"><label> <input type="checkbox" name="unico_boleto" id="unico_boleto" value=""> <i></i> Gerar um único boleto sempre que possível </label></div>

                                                      </div>
                                                      <br>
                                                      <h3>Juros</h3>
                                                      <hr>

                                                        <div class="form-group  row"><label class="col-form-label">Taxa de juros mensal (%)</label>
                                                            <div class="col-sm-11"><input type="text" class="form-control" name="juro" id="juro" placeholder="4,00"></div>
                                                        </div>


                                                            <div class="col-sm-10">
                                                                <div class="i-checks"><label> <input type="checkbox" name="prd" id="prd" value="" checked=""> <i></i> Pro rata dia </label></div>

                                                            </div>
                                                      <br>
                                                      <h3>Multas</h3>
                                                      <hr>

                                                        <div class="form-group  row"><label class="col-form-label">Taxa de multa (%)</label>
                                                            <div class="col-sm-11"><input type="text" name="taxa" id="taxa" class="form-control"></div>
                                                        </div>


                                                            <div class="col-sm-10">
                                                                <div class="i-checks"><label> <input type="checkbox" name="uvp" id="uvp" value="" checked=""> <i></i> Calcular usando valor principal + juros </label></div>
                                                            </div>
                                                      <br>
                                                      <h3>Inadinplência</h3>
                                                      <hr>

                                                        <div class="form-group  row"><label class="col-form-label">Honorários do advogado (%)</label>
                                                            <div class="col-sm-11"><input type="text" name="honorario_advogado" id="honorario_advogado" class="form-control"></div>
                                                        </div>
                                                        <div class="form-group  row"><label class="col-form-label">Dias para inadimplência</label>
                                                            <div class="col-sm-11"><input type="text" name="dias_para_inadinplencia" id="dias_para_inadinplencia" class="form-control"></div>
                                                        </div>
                                                        <div class="form-group  row"><label class="col-form-label">Processar atualização monetária, após(dias)</label>
                                                            <div class="col-sm-11"><input type="text" name="dias_para_processar" id="dias_para_processar" class="form-control"></div>
                                                        </div>

                                                        <br>
                                                        <h3>Pagador nos boletos</h3>
                                                        <hr>

                                                        <div class="col-sm-10">
                                                            <div class="i-checks"><label> <input type="checkbox" name="eou_inquilino" id="eou_inquilino" value="" > <i></i>Incluir "E/OU Inquilino" no pagador dos boletos</label></div>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <div class="i-checks"><label> <input type="checkbox" name="nome_inquilino" id="nome_inquilino" value="" > <i></i>Nome do inquilino no pagador dos boletos</label></div>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <div class="i-checks"><label> <input type="checkbox" name="apenas_nome_inquilino" id="apenas_nome_inquilino" value="" > <i></i>Apenas o nome do inquilino no pagador dos boletos (não recomendado)</label></div>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <div class="i-checks"><label> <input type="checkbox" name="sacador_numero" id="sacador_numero" value="" > <i></i>Sacador do boleto é o número da unidade</label></div>
                                                        </div>

                                                        <br>
                                                        <h3>Instuções adicionas para boletos</h3>
                                                        <hr>

                                                          <div class="form-group  row"><label class="col-form-label">Primeira Linha</label>
                                                              <div class="col-sm-11"><input type="text" name="primeira_linha" id="primeira_linha" class="form-control"></div>
                                                          </div>
                                                          <div class="form-group  row"><label class="col-form-label">Segunda Linha</label>
                                                              <div class="col-sm-11"><input type="text" name="segunda_linha" id="segunda_linha" class="form-control"></div>
                                                          </div>
                                                          <div class="form-group  row"><label class="col-form-label">Terceira Linha</label>
                                                              <div class="col-sm-11"><input type="text" name="terceira_linha" id="terceira_linha" class="form-control"></div>
                                                          </div>
                                                          <div class="form-group  row"><label class="col-form-label">Quarta Linha</label>
                                                              <div class="col-sm-11"><input type="text" name="quarta_linha" id="quarta_linha" class="form-control"></div>
                                                          </div>

                                                          <br>
                                                          <h3>Instuções para acordos</h3>
                                                          <hr>

                                                            <div class="form-group  row"><label class="col-form-label">Primeira Linha</label>
                                                                <div class="col-sm-11"><input type="text" name="primeira" id="primeira" class="form-control"></div>
                                                            </div>
                                                            <div class="form-group  row"><label class="col-form-label">Segunda Linha</label>
                                                                <div class="col-sm-11"><input type="text" name="segunda" id="segunda" class="form-control"></div>
                                                            </div>
                                                            <div class="form-group  row"><label class="col-form-label">Terceira Linha</label>
                                                                <div class="col-sm-11"><input type="text" name="terceira" id="terceira" class="form-control"></div>
                                                            </div>
                                                            <div class="form-group  row"><label class="col-form-label">Quarta Linha</label>
                                                                <div class="col-sm-11"><input type="text" name="quarta" id="quarta" class="form-control"></div>
                                                            </div>

                                                            <h3>Descontos para pagamentos antecipados</h3>
                                                            <hr>

                                                              <div class="form-group  row">
                                                                  <div class="col-sm-11"> <button type="button" class="btn btn-primary" name="button">Configurações de descontos</button> </div>
                                                              </div>

                                                              <br>
                                                              <h3>Acordos</h3>
                                                              <hr>

                                                              <div class="col-sm-10">
                                                                  <div class="i-checks"><label> <input type="checkbox" value="" checked=""> <i></i> Calcular usando valor principal + juros </label></div>
                                                              </div>


                                                  </div>

                                                    </div>

                                                  <div class="hr-line-dashed"></div>
                                                  <div class="form-group row">
                                                      <div class="col-sm-4 col-sm-offset-2">
                                                          <button class="btn btn-danger btn-md" type="reset"> Cancelar</button>
                                                          <button class="btn btn-primary btn-md" type="submit">Salvar</button>
                                                      </div>
                                                  </div>
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                                </div>

                                <div role="tabpanel" id="tab-3" class="tab-pane">
                                  <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                          <div class="ibox ">
                                            <div class="ibox-content">
                                                <div class="table-responsive">
                                                  <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                  <thead>
                                                  <tr>
                                                      <th>Usuario</th>
                                                      <th>Email</th>
                                                      <th>#</th>
                                                  </tr>
                                                  </thead>
                                                  <tbody>
                                                    <?php foreach ($usr_ad->listar() as $key => $value) {
                                                      ?>
                                                        <tr>
                                                          <td><?php echo $value->nome ?></td>
                                                          <td><?php echo $value->email ?></td>
                                                          <td>Editar</td>
                                                        </tr>
                                                      <?php
                                                    } ?>
                                                  </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">

                                    </div>

                                    <div class="col-md-3">
                                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_adicionar_usuario" name="button">Adicionar Usuário</button>
                                    </div>
                                    </div>
                                  </div>
                                </div>

                                <div role="tabpanel" id="tab-4" class="tab-pane">
                                  <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                        <div class="ibox ">

                                            <div class="ibox-content">

                                                <div class="table-responsive">
                                                  <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                  <thead>
                                                  <tr>
                                                      <th>Patrimonio</th>
                                                      <th>Status</th>
                                                      <th>#</th>

                                                  </tr>
                                                  </thead>
                                                  <tbody>
                                                    <tr>
                                                      <td>Edificio Belas Artes</td>
                                                      <td>Liberado em todos os condominios</td>
                                                      <td>Editar</td>
                                                    </tr>
                                                  </table>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-9">

                                    </div>

                                    <div class="col-md-3">
                                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_adicionar_patrimonio" name="button">Adicionar Patrimônio</button>
                                    </div>
                                    </div>
                                  </div>
                                </div>


                              </div>
                            </div>
                        </div>



                <div class="col-lg-4">
                    <div class="tabs-container">
                        <ul class="nav nav-tabs" role="tablist">
                            <li><a class="nav-link active" data-toggle="tab" href="#tab2-1"> Logo</a></li>
                            <li><a class="nav-link" data-toggle="tab" href="#tab2-2">Rodapé</a></li>

                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" id="tab2-1" class="tab-pane active">
                                <div class="panel-body">
                                  <div class="row">
                                    <div class="col-lg-12">
                                        <div class="ibox ">
                                            <div class="ibox-content">
                                                <p>
                                                    <strong>Logo do condomínio</strong>
                                                </p>

                                                <form action="#" class="dropzone" id="dropzoneForm">
                                                    <div class="fallback">
                                                        <input name="file" type="file" multiple />
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div role="tabpanel" id="tab2-2" class="tab-pane">
                                <div class="panel-body">
                                    <strong>Donec quam felis</strong>

                                    <p>Thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects
                                        and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath </p>

                                    <p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite
                                        sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet.</p>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>



        </div>


        </div>
        </div>
        <!--Adicionar Usuario-->
        <div class="modal inmodal" id="modal_adicionar_usuario" tabindex="-1" role="dialog" aria-hidden="true">
          <form class="" action="" method="post" onsubmit="return adicionarUsuario(this)">
            <div class="modal-dialog">
            <div class="modal-content animated bounceInRight" id="pwd-container1">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <i class="fa fa-user modal-icon"></i>
                        <h4 class="modal-title">Novo Usuário</h4>
                        <small class="font-bold">Adicione um usuário para ter acesso ao sistema.</small>
                    </div>
                    <div class="modal-body">
                        <div class="form-group"><label>Email</label> <input type="email" name="email_nu" id="email_nu" placeholder="Adicione o email" class="form-control" required></div>
                        <div class="form-group"><label>Nome</label> <input type="text" name="nome_nu" id="nome_nu" placeholder="Nome" class="form-control " required></div>
                        <div class="form-group"><label for="password1">Senha</label> <input type="password" name="senha_nu" id="password1" placeholder="Senha" class="form-control example1" required></div>
                        <div class="form-group">
                            <div class="pwstrength_viewport_progress"></div>
                        </div>
                        <div class="form-group"><label>Confirmar senha</label> <input type="password" name="csenha_nu" id="csenha_nu" placeholder="Confirmar senha" required class="form-control"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Fechar</button>
                        <button type="submit" id="enviar_usuario" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </div>
          </form>
        </div>

        <!--Adicionar Patrimonio-->
        <div class="modal inmodal" id="modal_adicionar_patrimonio" tabindex="-1" role="dialog" aria-hidden="true">
          <form class="" action="" method="post" onsubmit="return adicionarPatrimonio(this)">
            <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <i class="fa fa-building modal-icon"></i>
                        <h4 class="modal-title">Novo Patrimônio</h4>
                        <small class="font-bold">Adicione um patrimônio.</small>
                    </div>
                    <div class="modal-body">
                      <div class="row">

                        <div class="col-md-6">
                            <div class="form-group"><label>Quantidade</label> <input type="text" name="pat_qtd" id="pat_qtd" placeholder="Quantidade de itens" class="form-control"></div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group"><label>Código</label> <input type="text" name="pat_codigo" id="pat_codigo" placeholder="Código" class="form-control"></div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group"><label>Nome de Referência</label> <input type="text" name="nome_referencia" id="nome_referencia" placeholder="Nome de Referência" class="form-control"></div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group"><label>Data de Aquisição</label> <input type="date" name="data_aquisicao" id="data_aquisicao" class="form-control"></div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group"><label>Valor pago por Unidade</label> <input type="text" name="valor_pago" id="valor_pago" class="form-control"></div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group"><label>Taxa de depreciação</label> <input type="text" name="taxa_depreciacao" id="taxa_depreciacao" class="form-control"></div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group"><label>Valor atual</label> <input type="text" name="valor_atual" id="valor_atual" disable class="form-control"></div>
                        </div>
                      </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </div>
          </form>
        </div>


    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- DROPZONE -->
    <script src="js/plugins/dropzone/dropzone.js"></script>

    <!-- Toastr script -->
    <script src="js/plugins/toastr/toastr.min.js"></script>

    <script src="js/plugins/iCheck/icheck.min.js"></script>

    <!-- Password meter -->
    <script src="js/plugins/pwstrength/pwstrength-bootstrap.min.js"></script>
    <script src="js/plugins/pwstrength/zxcvbn.js"></script>
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>

    <script type="text/javascript">
      var id = document.getElementById("id_categoria_img");
      var dropzone = new Dropzone("#arquivos",{url:"subir.php", id:id});
   </script>

<script>
  /*
  $(document).ready(function(){
    $('#modal_adicionar_usuario').children('.modal-content').toggleClass('sk-loading');
  })
  $(function(){
    $('#enviar_usuario').on('click', function(){
        $('#modal_adicionar_usuario').children('.modal-content').toggleClass('sk-loading');
    })
  })
  */
</script>


    <script>

        $(document).ready(function(){


            // Example 1
            var options1 = {};
            options1.ui = {
                container: "#pwd-container1",
                showVerdictsInsideProgressBar: true,
                viewports: {
                    progress: ".pwstrength_viewport_progress"
                }
            };
            options1.common = {
                debug: false,
            };
            $('.example1').pwstrength(options1);
          })
    </script>


</body>

</html>
