<!DOCTYPE html>
<?php

//inclui as classes que terão métodos utilizado neste arquivo
require_once 'controllers/user_control.php';

?>

<head>
  <title>Blog - Cadastre-se</title>
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
        <div class="col-md-8 col-md-offset-2 text-center">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Registro de Usuário</strong></div>
                <div class="panel-body text-center">
                    <form class="form-horizontal" role="form" action="" method="POST" id="form_registro" name="registro">

                      <div class="form-group">
                          <div class="col-md-offset-3 col-md-6">
                              <input id="nome" placeholder="Nome" class="form-control" name="nome" maxlenght="60" required autofocus>
                          </div>
                      </div>

                        <div class="form-group">
                            <div class="col-md-offset-3 col-md-6">
                                <input id="email" placeholder="Email" type="email" class="form-control" name="email" maxlenght="60" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-3 col-md-6">
                                <input id="password" placeholder="Senha" type="password" class="form-control" name="password" maxlength="40" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class=col-md-offset-3 "col-md-6">
                                <button type="submit" name="cadastra" id="cadastra" class="btn btn-primary"> Cadastrar </button>
                                <a type="button" href="login.php" name="voltar" id="voltar" class="btn btn-danger"> Voltar </a  >
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

if (isset ( $_POST ["cadastra"] )) { //condição se verifica que o submit "cadastra" foi disparado por POST

// aciona o método registra_usuario na class User que vai ser responsável por inserir os dados do formulário no banco de dados
$result = User::registra_usuario($_POST ["nome"], $_POST ["email"], $_POST ["password"]);
// a variavel $result pode receber como return "sucesso" ou retornar o erro que impossibilita o registro dos dados

if ($result === "sucesso") {
// Sucesso: caso o registra_usuario retorne sucesso o sistema mostra um alert de sucesso no registro do usuário
  echo "
      <div class='container-fluid col-md-6 col-md-offset-3'>
        <div class='alert alert-success text-center alert-dismissible fade-in'>
            <strong>Registrado com Sucesso!</strong>
        </div>
      </div>";

} else {

//Error: em caso de erros que impossibilitem o registro o sistema retorna um alert de erro
  echo "
    <div class='container-fluid col-md-6 col-md-offset-3'>
          <div class='alert alert-danger text-center alert-dismissible fade-in'>
              <strong>Erro!</strong> Por favor, tente novamente.
          </div>
    </div>";
  }
}

 ?>

<script src='js/bootstrap.js'></script>
<script src='js/bootstrap.min.js'></script>
</body>

</html>
