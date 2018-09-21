<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Condomínio | Plano de Contas</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <link href="css/plugins/dropzone/basic.css" rel="stylesheet">
    <link href="css/plugins/dropzone/dropzone.css" rel="stylesheet">

    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

    <script type="text/javascript">
      function adicionarUnidade(form){
        var unidade = form.unidade.value;
        var bloco = form.bloco.value;
        var area = form.area.value;
        var fracao = form.fracao.value;
        var abatimento = form.abatimento.value;

        var proprietario = form.proprietario.value;
        var cpfcnpj = form.cpfcnpj.value;
        var telefone = form.telefone.value;
        var rg = form.rg.value;
        var dtnascimento = form.dtnascimento.value
        var celular = form.celular.value;
        var email = form.email.value;

        $.post("actions/action_unidade.php",
        {
          op:1,
          condominio:4,
          unidade:unidade,
          bloco:bloco,
          area:area,
          fracao:fracao,
          abatimento:abatimento,
          proprietario:proprietario,
          cpfcnpj:cpfcnpj,
          telefone:telefone,
          rg:rg,
          dtnascimento:dtnascimento,
          celular:celular,
          email:email
        },function(data){
          alert(data);
        });
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
</head>

<body class="mini-navbar">

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
                        FC
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
                        <li><a href="conta_bancaria.php">Contas bancárias</a></li>
                        <li><a href="forma_recebimento.php">Formas de Recebimento</a></li>
                        <li><a href="plano_de_contas.php">Plano de Contas</a></li>
                        <li><a href="relatorio.php">Relatórios</a></li>
                        <li><a href="ocorrencia.php">Ocorrências</a></li>
                        <li><a href="manutencao_programada.php">Manutenções Progamadas</a></li>
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
                <div class="col-lg-11">
                    <h2>Plano de Contas</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="condominio.php">Dados do Condomínio</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="unidade.php">Unidade</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="responsavel_legal.php">Resposáveis Legais</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="conta_bancaria.php">Contas bancárias</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="forma_recebimento.php">Formas de Recebimento</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="plano_de_contas.php">Plano de Contas</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="relatorio.php">Relatórios</a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="ocorrencia.php">Ocorrências</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="manutencao_programada.php">Manutenções Progamadas</a>
                        </li>
                    </ol>
                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeIn">

            <!--Inicio da row das tabs-->
            <div class="row">
              <div class="col-lg-12">


                <div class="row">
                  <div class="col-lg-12">
                    <div class="ibox">
                      <div class="ibox-title">
                        <h5>Plano de Contas</h5>
                        <div class="ibox-tools">
                            <a>
                                <i class="fa fa-print fa-2x"></i>
                            </a>
                        </div>
                      </div>
                      <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-4">
                              <form class="" action="index.html" method="post">


                                      <button type="submit" name="button" class="btn btn-primary"> <i class="fa fa-plus"></i> Novo plano de Contas</button>

                                      <br>
                                      <br>
                                      <div class="feed-activity-list">

                                          <div class="feed-element">

                                              <div class="media-body ">
                                                  <small class="float-right"> </small>
                                                  <strong>Plano de Contas </strong>(Padrão)  <br>
                                              </div>
                                          </div>

                                      </div>

                              </form>
                            </div>
                            <div class="col-lg-5"></div>
                            <div class="col-lg-3">
                              <p>2 Condomínios usam este plano de contas <strong>(incluindo este condomínio)</strong></p>

                            </div>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <!--Fim da row das tabs-->

            <!--Adicionar Unidade-->
            <div class="modal inmodal" id="modal_adicionar_responsavel" tabindex="-1" role="dialog" aria-hidden="true">

                <div class="modal-dialog modal-lg">
                <div class="modal-content animated bounceInRight" id="pwd-container1">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <i class="fa fa-user-plus modal-icon"></i>
                            <h4 class="modal-title">Novo Responsavel Legal</h4>
                            <small class="font-bold">Adicione um usuário para ter acesso ao sistema.</small>
                        </div>
                        <div class="modal-body">

                        <form id="form" action="#" class="wizard-big" method="post" onsubmit="return adicionarUnidade(this)">
                            <h1>Pessoal</h1>
                            <fieldset>

                                <div class="row">
                                    <div class="col-lg-12">
                                      <div class="form-group"><label>Nome Completo</label> <input type="text" name="unidade" id="unidade" class="form-control" required></div>
                                    </div>

                                    <div class="col-lg-4">
                                      <div class="form-group"><label>RG</label> <input type="text" name="area" id="area" class="form-control example1"></div>
                                    </div>
                                    <div class="col-lg-4">
                                      <div class="form-group"><label>CPF</label> <input type="text" name="abatimento" id="abatimento" class="form-control"></div>
                                    </div>
                                    <div class="col-lg-4">
                                      <div class="form-group"><label>Data de Nascimento</label> <input type="text" name="bloco" id="bloco" class="form-control"></div>
                                    </div>

                                    <div class="col-lg-12">
                                      <div class="form-group"><label>Cargo</label> <input type="text" name="unidade" id="unidade" class="form-control" required></div>
                                    </div>
                                    <div class="col-lg-4">
                                      <div class="form-group"><label>Telefone</label> <input type="text" name="area" id="area" class="form-control example1"></div>
                                    </div>
                                    <div class="col-lg-4">
                                      <div class="form-group"><label>Celular</label> <input type="text" name="abatimento" id="abatimento" class="form-control"></div>
                                    </div>
                                    <div class="col-lg-4">
                                      <div class="form-group"><label>Email</label> <input type="text" name="bloco" id="bloco" class="form-control"></div>
                                    </div>

                                </div>

                            </fieldset>
                            <h1>Mandato</h1>
                            <fieldset>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Data Inicio</label>
                                            <input id="data_inicio" name="data_inicio" type="date" class="form-control required">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Data Final</label>
                                            <input id="data_final" name="data_final" type="date" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Observação</label>
                                            <textarea id="obs" name="obs" rows="7" class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-sm-10">
                                        <div class="i-checks"><label> <input type="checkbox" name="notificacao_reserva" id="notificacao_reserva" value=""> <i></i> Receber notificação de reserva. </label></div>
                                    </div>


                                </div>
                            </fieldset>

                            <h1>Endereço</h1>
                            <fieldset>

                              <div class="row">
                                  <div class="col-lg-6">
                                      <div class="form-group">
                                          <label>CEP</label>
                                          <input id="cep" name="cep" onblur="buscarEndereco(this)" type="text" class="form-control required">
                                      </div>
                                      <div class="form-group">
                                          <label>Rua</label>
                                          <input id="rua" name="rua" type="text" class="form-control required">
                                      </div>
                                      <div class="form-group">
                                          <label>Complemento</label>
                                          <input id="complemento" name="complemento" type="text" class="form-control">
                                      </div>
                                  </div>
                                  <div class="col-lg-6">
                                      <div class="form-group">
                                          <label>UF</label>
                                          <input id="uf" name="uf" type="text" class="form-control">
                                      </div>
                                      <div class="form-group">
                                          <label>Bairro</label>
                                          <input id="bairro" name="bairro" type="text" class="form-control">
                                      </div>
                                      <div class="form-group">
                                          <label>Cidade</label>
                                          <input id="cidade" name="cidade" type="text" class="form-control">
                                      </div>
                                  </div>

                              </div>
                              <!--
                              <div class="form-group  row">
                                <label class="col-sm-1 col-form-label">CEP</label>
                                  <div class="col-sm-5">
                                    <input type="text" name="cep" id="cep" onblur="buscarEndereco(this)" class="form-control">
                                  </div>

                                  <label class="col-sm-1 col-form-label">UF</label>
                                    <div class="col-sm-5">
                                      <select class="form-control" id="uf" name="uf">
                                          <option value="1">RN</option>
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

                            -->
                            </fieldset>

                            <!--
                            <h1>Finish</h1>
                            <fieldset>
                                <h2>Terms and Conditions</h2>
                                <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms">I agree with the Terms and Conditions.</label>
                            </fieldset>

                          -->
                        </form>

                      </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>

            </div>

            <!--Adicionar Unidade-->
            <div class="modal inmodal" id="modal_responsabilidade" tabindex="-1" role="dialog" aria-hidden="true">

                <div class="modal-dialog modal-lg">
                <div class="modal-content animated bounceInRight" id="pwd-container1">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <i class="fa fa-list modal-icon"></i>
                            <h4 class="modal-title">Permissões</h4>
                            <small class="font-bold">Gerencie as permissões do responsável no sistema.</small>
                        </div>
                        <div class="modal-body">

                        <form id="form2" action="#" class="wizard-big" method="post" onsubmit="return adicionarUnidade(this)">
                            <h1>Grupo 1</h1>
                            <fieldset>

                                <div class="row">

                                    <div class="col-lg-3">
                                      <div class="i-checks"><label> <input type="checkbox" name="" id="" value="" checked=""> <i></i> Permissão 1</label></div>
                                    </div>
                                    <div class="col-lg-3">
                                      <div class="i-checks"><label> <input type="checkbox" name="" id="" value="" checked=""> <i></i> Permissão 2</label></div>
                                    </div>
                                    <div class="col-lg-3">
                                      <div class="i-checks"><label> <input type="checkbox" name="" id="" value="" checked=""> <i></i> Permissão 3</label></div>
                                    </div>
                                    <div class="col-lg-3">
                                      <div class="i-checks"><label> <input type="checkbox" name="" id="" value="" checked=""> <i></i> Permissão 4</label></div>
                                    </div>

                                    <br>
                                    <br>
                                    <br>

                                    <div class="col-lg-3">
                                      <div class="i-checks"><label> <input type="checkbox" name="" id="" value="" checked=""> <i></i> Permissão 1</label></div>
                                    </div>
                                    <div class="col-lg-3">
                                      <div class="i-checks"><label> <input type="checkbox" name="" id="" value="" checked=""> <i></i> Permissão 2</label></div>
                                    </div>
                                    <div class="col-lg-3">
                                      <div class="i-checks"><label> <input type="checkbox" name="" id="" value="" checked=""> <i></i> Permissão 3</label></div>
                                    </div>
                                    <div class="col-lg-3">
                                      <div class="i-checks"><label> <input type="checkbox" name="" id="" value="" checked=""> <i></i> Permissão 4</label></div>
                                    </div>

                                </div>

                            </fieldset>
                            <h1>Grupo 2</h1>
                            <fieldset>
                              <div class="row">

                                  <div class="col-lg-3">
                                    <div class="i-checks"><label> <input type="checkbox" name="" id="" value="" checked=""> <i></i> Permissão 1</label></div>
                                  </div>
                                  <div class="col-lg-3">
                                    <div class="i-checks"><label> <input type="checkbox" name="" id="" value="" checked=""> <i></i> Permissão 2</label></div>
                                  </div>
                                  <div class="col-lg-3">
                                    <div class="i-checks"><label> <input type="checkbox" name="" id="" value="" checked=""> <i></i> Permissão 3</label></div>
                                  </div>
                                  <div class="col-lg-3">
                                    <div class="i-checks"><label> <input type="checkbox" name="" id="" value="" checked=""> <i></i> Permissão 4</label></div>
                                  </div>

                                  <br>
                                  <br>
                                  <br>

                                  <div class="col-lg-3">
                                    <div class="i-checks"><label> <input type="checkbox" name="" id="" value="" checked=""> <i></i> Permissão 1</label></div>
                                  </div>
                                  <div class="col-lg-3">
                                    <div class="i-checks"><label> <input type="checkbox" name="" id="" value="" checked=""> <i></i> Permissão 2</label></div>
                                  </div>
                                  <div class="col-lg-3">
                                    <div class="i-checks"><label> <input type="checkbox" name="" id="" value="" checked=""> <i></i> Permissão 3</label></div>
                                  </div>
                                  <div class="col-lg-3">
                                    <div class="i-checks"><label> <input type="checkbox" name="" id="" value="" checked=""> <i></i> Permissão 4</label></div>
                                  </div>

                              </div>
                            </fieldset>

                            <h1>Grupo 3</h1>
                            <fieldset>

                              <div class="row">

                                  <div class="col-lg-3">
                                    <div class="i-checks"><label> <input type="checkbox" name="" id="" value="" checked=""> <i></i> Permissão 1</label></div>
                                  </div>
                                  <div class="col-lg-3">
                                    <div class="i-checks"><label> <input type="checkbox" name="" id="" value="" checked=""> <i></i> Permissão 2</label></div>
                                  </div>
                                  <div class="col-lg-3">
                                    <div class="i-checks"><label> <input type="checkbox" name="" id="" value="" checked=""> <i></i> Permissão 3</label></div>
                                  </div>
                                  <div class="col-lg-3">
                                    <div class="i-checks"><label> <input type="checkbox" name="" id="" value="" checked=""> <i></i> Permissão 4</label></div>
                                  </div>

                                  <br>
                                  <br>
                                  <br>

                                  <div class="col-lg-3">
                                    <div class="i-checks"><label> <input type="checkbox" name="" id="" value="" checked=""> <i></i> Permissão 1</label></div>
                                  </div>
                                  <div class="col-lg-3">
                                    <div class="i-checks"><label> <input type="checkbox" name="" id="" value="" checked=""> <i></i> Permissão 2</label></div>
                                  </div>
                                  <div class="col-lg-3">
                                    <div class="i-checks"><label> <input type="checkbox" name="" id="" value="" checked=""> <i></i> Permissão 3</label></div>
                                  </div>
                                  <div class="col-lg-3">
                                    <div class="i-checks"><label> <input type="checkbox" name="" id="" value="" checked=""> <i></i> Permissão 4</label></div>
                                  </div>

                              </div>

                            </fieldset>

                            <h1>Grupo 4</h1>
                            <fieldset>

                              <div class="row">

                                  <div class="col-lg-3">
                                    <div class="i-checks"><label> <input type="checkbox" name="" id="" value="" checked=""> <i></i> Permissão 1</label></div>
                                  </div>
                                  <div class="col-lg-3">
                                    <div class="i-checks"><label> <input type="checkbox" name="" id="" value="" checked=""> <i></i> Permissão 2</label></div>
                                  </div>
                                  <div class="col-lg-3">
                                    <div class="i-checks"><label> <input type="checkbox" name="" id="" value="" checked=""> <i></i> Permissão 3</label></div>
                                  </div>
                                  <div class="col-lg-3">
                                    <div class="i-checks"><label> <input type="checkbox" name="" id="" value="" checked=""> <i></i> Permissão 4</label></div>
                                  </div>

                                  <br>
                                  <br>
                                  <br>

                                  <div class="col-lg-3">
                                    <div class="i-checks"><label> <input type="checkbox" name="" id="" value="" checked=""> <i></i> Permissão 1</label></div>
                                  </div>
                                  <div class="col-lg-3">
                                    <div class="i-checks"><label> <input type="checkbox" name="" id="" value="" checked=""> <i></i> Permissão 2</label></div>
                                  </div>
                                  <div class="col-lg-3">
                                    <div class="i-checks"><label> <input type="checkbox" name="" id="" value="" checked=""> <i></i> Permissão 3</label></div>
                                  </div>
                                  <div class="col-lg-3">
                                    <div class="i-checks"><label> <input type="checkbox" name="" id="" value="" checked=""> <i></i> Permissão 4</label></div>
                                  </div>

                              </div>

                            </fieldset>

                            <!--
                            <h1>Finish</h1>
                            <fieldset>
                                <h2>Terms and Conditions</h2>
                                <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms">I agree with the Terms and Conditions.</label>
                            </fieldset>

                          -->
                        </form>

                      </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>

            </div>


        </div>
        </div>
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

    <script src="js/plugins/iCheck/icheck.min.js"></script>
    <script src="js/plugins/dataTables/datatables.min.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>
    <!-- Steps -->
    <script src="js/plugins/steps/jquery.steps.min.js"></script>

    <!-- Jquery Validate -->
    <script src="js/plugins/validate/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function(){
            //$("#wizard").steps();
            $("#form2").steps({
                bodyTag: "fieldset",
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }

                    // Forbid suppressing "Warning" step if the user is to young
                    if (newIndex === 3 && Number($("#age").val()) < 18)
                    {
                        return false;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
                    if (currentIndex < newIndex)
                    {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex)
                {
                    // Suppress (skip) "Warning" step if the user is old enough.
                    if (currentIndex === 2 && Number($("#age").val()) >= 18)
                    {
                        $(this).steps("Próximo");
                    }

                    // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                    if (currentIndex === 2 && priorIndex === 3)
                    {
                        $(this).steps("Anterior");
                    }
                },
                onFinishing: function (event, currentIndex)
                {
                    var form = $(this);

                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    form.validate().settings.ignore = ":disabled";

                    // Start validation; Prevent form submission if false
                    return form.valid();
                },
                onFinished: function (event, currentIndex)
                {
                    var form = $(this);

                    // Submit form input
                    form.submit();
                }
            }).validate({
                        errorPlacement: function (error, element)
                        {
                            element.before(error);
                        },
                        rules: {
                            confirm: {
                                equalTo: "#password"
                            }
                        }
                    });
       });
    </script>

            <script>
                $(document).ready(function(){
                    //$("#wizard").steps();
                    $("#form").steps({
                        bodyTag: "fieldset",
                        onStepChanging: function (event, currentIndex, newIndex)
                        {
                            // Always allow going backward even if the current step contains invalid fields!
                            if (currentIndex > newIndex)
                            {
                                return true;
                            }

                            // Forbid suppressing "Warning" step if the user is to young
                            if (newIndex === 3 && Number($("#age").val()) < 18)
                            {
                                return false;
                            }

                            var form = $(this);

                            // Clean up if user went backward before
                            if (currentIndex < newIndex)
                            {
                                // To remove error styles
                                $(".body:eq(" + newIndex + ") label.error", form).remove();
                                $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                            }

                            // Disable validation on fields that are disabled or hidden.
                            form.validate().settings.ignore = ":disabled,:hidden";

                            // Start validation; Prevent going forward if false
                            return form.valid();
                        },
                        onStepChanged: function (event, currentIndex, priorIndex)
                        {
                            // Suppress (skip) "Warning" step if the user is old enough.
                            if (currentIndex === 2 && Number($("#age").val()) >= 18)
                            {
                                $(this).steps("Próximo");
                            }

                            // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                            if (currentIndex === 2 && priorIndex === 3)
                            {
                                $(this).steps("Anterior");
                            }
                        },
                        onFinishing: function (event, currentIndex)
                        {
                            var form = $(this);

                            // Disable validation on fields that are disabled.
                            // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                            form.validate().settings.ignore = ":disabled";

                            // Start validation; Prevent form submission if false
                            return form.valid();
                        },
                        onFinished: function (event, currentIndex)
                        {
                            var form = $(this);

                            // Submit form input
                            form.submit();
                        }
                    }).validate({
                                errorPlacement: function (error, element)
                                {
                                    element.before(error);
                                },
                                rules: {
                                    confirm: {
                                        equalTo: "#password"
                                    }
                                }
                            });
               });
            </script>

        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>

        <script>
            $(document).ready(function(){
                $('.dataTables-example').DataTable({
                    pageLength: 25,
                    responsive: true,
                    dom: '<"html5buttons"B>lTfgitp',
                    buttons: [

                        {extend: 'excel', title: 'ExampleFile'},
                        {extend: 'pdf', title: 'ExampleFile'},

                        {extend: 'print',
                         customize: function (win){
                                $(win.document.body).addClass('white-bg');
                                $(win.document.body).css('font-size', '10px');

                                $(win.document.body).find('table')
                                        .addClass('compact')
                                        .css('font-size', 'inherit');
                        }
                        }
                    ]

                });

            });

        </script>

</body>

</html>
