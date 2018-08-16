<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Falcon | Login </title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <script type="text/javascript">
      function logar(form){

        $.post("actions/action_usuario.php",
        {
          op:1,
          email:form.email.value,
          senha:form.senha.value
        },function(data){
          //alert(data);
          if(data == "false"){
            toastr.error('Login ou senha incorretos!','Erro');
          }else{
            window.open("http://localhost/condominio/index.php","_self");
          }
          /*
          if(data != false){
            window.open("http://localhost/condominio/index.php","_self");
          }else{
            toastr.danger('Login ou senha incorreto!','Erro');
          }
          */
        });


        return false;
      }
    </script>

</head>

<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
                <h2 class="font-bold">Bem Vindo ao Falcon</h2>

                <p>
                    Gerencie seus condominios de um jeito pratico e simples.
                </p>

                <p>
                    Com o sistema de gerenciamento de condominios voce pode fazer de tudo. Cadastre seus condominios e veja como e facil!
                </p>

            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                    <form class="m-t" role="form" action="" method="post" onsubmit="return logar(this)">
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha" required="">
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                        <a href="#">
                            <small>Esqueceu sua senha?</small>
                        </a>

                        <p class="text-muted text-center">
                            <small>Não tem uma conta?</small>
                        </p>
                        <a class="btn btn-sm btn-white btn-block" href="register.html">Crie sua conta</a>
                    </form>
                    <p class="m-t">
                        <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small>
                    </p>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Copyright Example Company
            </div>
            <div class="col-md-6 text-right">
               <small>© 2014-2015</small>
            </div>
        </div>
    </div>

    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>


    <!-- Toastr script -->
    <script src="js/plugins/toastr/toastr.min.js"></script>

</body>

</html>
