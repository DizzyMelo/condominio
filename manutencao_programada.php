<?php
require_once 'models/manutencao.php';

$m = new Manutencao();
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Condomínio | Manutenção Programada</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <link href="css/plugins/dropzone/basic.css" rel="stylesheet">
    <link href="css/plugins/dropzone/dropzone.css" rel="stylesheet">

    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="css/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
    <link href="css/plugins/fullcalendar/fullcalendar.print.css" rel='stylesheet' media='print'>

    <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

    <script type="text/javascript">

      function adicionarManutencao(form){
        var nome = form.nome.value;
        var periodicidade = form.periodicidade.value;
        var condominio = 4;
        $.post("actions/action_manutencao.php",
        {
          op:1,
          nome:nome,
          periodicidade:periodicidade,
          condominio:condominio
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
                <div class="col-lg-12">
                    <h2>Manutençõs Programadas</h2>
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
                        <h5>Manutenções Programadas</h5>
                        <div class="ibox-tools">

                        </div>
                      </div>
                      <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-4">
                              <form class="" action="" method="post">
                                      <button type="button" name="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_novo_equipamento"> <i class="fa fa-plus"></i> Nova Manutenção </button>
                                      <br>
                                      <br>


                              </form>
                            </div>

                        </div>

                      </div>
                    </div>
                  </div>
                </div>


    <!--Inicio do calendario completo-->
    <div class="row animated fadeInDown">
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Itens que necessitam de manutenção</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>

                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div id='external-events'>
                        <p>Arraste um item para agendar uma manutenção.</p>

                        <?php
                          foreach ($m->listar(4) as $key => $value) {
                        ?>
                        <div class='external-event navy-bg'><?php echo $value->nome ?></div>
                        <?php
                      }
                        ?>
                        <p class="m-t">
                            <input type='checkbox' id='drop-remove' class="i-checks" /> <label for='drop-remove'>Remover depois de arrastar</label>
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <!--Inicio do calendario-->
        <div class="col-lg-9">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Calendário de Manutenção</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>

    <!--Fim do calendario-->

              </div>
            </div>
            <!--Fim da row das tabs-->

            <!--Adicionar Unidade-->
            <div class="modal inmodal" id="modal_novo_equipamento" tabindex="-1" role="dialog" aria-hidden="true">

                <div class="modal-dialog modal-lg">
                  <form class="" action="" method="post" onsubmit="return adicionarManutencao(this)">


                <div class="modal-content animated bounceInRight" id="pwd-container1">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <i class="fa fa-user-plus modal-icon"></i>
                            <h4 class="modal-title">Adicionar Manutenção</h4>
                            <small class="font-bold">Gerencie as manutenções programadas.</small>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-lg-4">
                              <div class="form-group"><label>Nome da Manutenção</label> <input type="text" name="nome" id="nome" class="form-control" required></div>
                            </div>
                            <div class="col-lg-4">
                              <div class="form-group"><label>Periodicidade</label> <input type="text" name="periodicidade" id="periodicidade" class="form-control" required></div>
                            </div>
                          </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            <button type="button" class="btn btn-white" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                  </form>
                </div>

            </div>


        </div>
        </div>
        </div>


    <!-- Mainly scripts -->
    <script src="js/plugins/fullcalendar/moment.min.js"></script>
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

    <!-- jQuery UI  -->
<script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Jquery Validate -->
    <script src="js/plugins/validate/jquery.validate.min.js"></script>

    <!-- Nestable List -->
<script src="js/plugins/nestable/jquery.nestable.js"></script>
<!-- Full Calendar -->
<script src="js/plugins/fullcalendar/fullcalendar.min.js"></script>
<script src='js/plugins/fullcalendar/lang/pt.js'></script>

<script>

    $(document).ready(function() {

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green'
            });

        /* initialize the external events
         -----------------------------------------------------------------*/


        $('#external-events div.external-event').each(function() {

            // store data so the calendar knows to render an event upon drop
            $(this).data('event', {
                title: $.trim($(this).text()), // use the element's text as the event title
                stick: true // maintain when user navigates (see docs on the renderEvent method)
            });

            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 1111999,
                revert: true,      // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
            });

        });


        /* initialize the calendar
         -----------------------------------------------------------------*/
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        $('#calendar').fullCalendar({
          eventClick: function(calEvent, jsEvent, view) {

  alert('Manutenção do ' + calEvent.title + ' concluida');
  //alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
  //alert('View: ' + view.name);

  // change the border color just for fun
  $(this).css('border-color', 'red');

},
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar
            drop: function() {
                // is the "remove after drop" checkbox checked?
                if ($('#drop-remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    $(this).remove();
                }
            },
            events: [
                {
                    title: 'Evento',
                    start: new Date(y, m, 1)
                }

            ]
        });


    });

</script>
<script>
     $(document).ready(function(){

         var updateOutput = function (e) {
             var list = e.length ? e : $(e.target),
                     output = list.data('output');
             if (window.JSON) {
                 output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
             } else {
                 output.val('JSON browser support required for this demo.');
             }
         };
         // activate Nestable for list 1
         $('#nestable').nestable({
             group: 1
         }).on('change', updateOutput);

         // activate Nestable for list 2
         $('#nestable2').nestable({
             group: 1
         }).on('change', updateOutput);

         // output initial serialised data
         updateOutput($('#nestable').data('output', $('#nestable-output')));
         updateOutput($('#nestable2').data('output', $('#nestable2-output')));

         $('#nestable-menu').on('click', function (e) {
             var target = $(e.target),
                     action = target.data('action');
             if (action === 'expand-all') {
                 $('.dd').nestable('expandAll');
             }
             if (action === 'collapse-all') {
                 $('.dd').nestable('collapseAll');
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
</body>

</html>
