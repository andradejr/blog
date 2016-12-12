<!DOCTYPE html>
<?php

//inclui as classes que terão métodos utilizado neste arquivo
require_once 'controllers/functions.php';

?>

<head>
  <title>Blog - Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
   <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
  <link rel="stylesheet" href="css/bootstrap-responsive.css" type="text/css">
  <link rel="stylesheet" href="css/bootstrap-responsive.css" type="text/css">

</head>
<body>
<hr>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Administrativo</strong></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" action="" method="POST" id="form_login" name="login">
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-mail:</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" maxlenght="60" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Senha:</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" maxlength="40" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-4 col-md-4">
                                <button type="submit" name="entrar" id="entrar" class="btn btn-primary"> Entrar </button>
                            </div>
                            <div class="col-md-4" style="margin-top: +5px;">
                              <a href="user.php" >Cadastrar-se</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
	if (isset ( $_POST ["entrar"] )) {  //condição se verifica que o submit "entrar" foi disparado por POST

    //aciona o método get_autenticacao na class Querys passando os dados do inputs como parâmetros
		$result = Querys::get_autenticacao ( $_POST ["email"], $_POST ["password"] );
    //a variavel $result pode receber como return "sucesso" ou "error" durante a consulta de autenticação

  	if ($result === "sucesso") {
      //Sucesso: script que redireciona o usuário para o index.php (tela principal)
			echo "<script>window.location.href='view/index.php';</script>";

		} else if ($result === "error"){
      //Erro: imprime um alert de erro para o usuário caso o email ou senha esteja incorreta
      echo "<div class='container-fluid col-md-6 col-md-offset-3'>
    							<div class='alert alert-danger text-center alert-dismissible fade-in'>
      								<strong>Email ou Senha Inválidos!</strong> Por favor, verifique e tente novamente.
    							</div>
    				</div>";
		}
	}
	?>

<script src='js/bootstrap.js'></script>
<script src='js/bootstrap.min.js'></script>
</body>

</html>
