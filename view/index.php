<?php

require_once '../controllers/functions.php';

//Início do controle de Acessos de Usuário no sistema

if (Login::is_session_started () === FALSE) //verifica se a function retorna FALSE para iniciar a sessão
	session_start ();  // caso seja FALSE, então iniciamos a sessão que foi aberta

if (!isset ( $_SESSION ["id"] )) {
	//se o ID da sessão não for definido ele chama a tag META para retornar o usuário para a tela de login
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../login.php">';
	// essa condição é importante em todas as telas em que o usuário obrigatóriamente precisa estar logado para acessar
	// ela bloqueia o acesso de usuários que não iniciarem sessão do sistema, caso o mesmo tente acessar os arquivos pelo navegador
}

//Fim do controle de Acessos de Usuários no sistema


if(isset($_GET["logout"])) {
	//condição que verifica se a variável GET foi acionado para Logout
	Login::sair(); //chama a function Sair da Class Login
}



?>

<!DOCTYPE html>
<head>
  <title>Blog</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
   <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

  <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
  <link rel="stylesheet" href="../css/bootstrap-responsive.css" type="text/css">
  <link rel="stylesheet" href="../css/bootstrap-responsive.css" type="text/css">

</head>
<body>

<div class="container-fluid">

<h3 class="text-center">Blog: Gerenciador de Postagens</h3>
<hr>
<div class="container-fluid">
<a id="cadastrar" href="cadastra_post.php" name="cadastrar" class="btn btn-md btn-success pull-left">Nova Postagem</a>
<a id="logout" name="logout" href='index.php?logout' class="btn btn-md btn-danger pull-right"><i class="glyphicon glyphicon-log-out"></i> Sair</a>
</div>
<hr>

<div class="table-responsive">
    <table class="table table-hover">
      <thead>
      <tr>
        <th>Título</th>
        <th>Autor</th>
        <th>Texto</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Título da Notícia 1</td>
        <td>Marcos Pereira</td>
        <td>tra la la la la la la ... </td>
        <th>
        <button id="ler" name="ler" class="btn btn-md btn-warning">Visualizar</button>
        <button id="editar" name="editar" class="btn btn-md btn-info">Editar</button>
        <button id="excluir" name="excluir" class="btn btn-md btn-danger">Remover</button>
        </th>
      </tr>
      <tr>
        <td>Título da Notícia 2</td>
        <td>Marcos Pereira</td>
        <td>tra la la la la la la ... </td>
        <th>
          <button id="ler" name="ler" class="btn btn-md btn-warning">Visualizar</button>
        <button id="editar" name="editar" class="btn btn-md btn-info">Editar</button>
        <button id="excluir" name="excluir" class="btn btn-md btn-danger">Remover</button>
        </th>
      </tr>
      <tr>
        <td>Título da Notícia 3</td>
        <td>Marcos Pereira</td>
        <td>tra la la la la la la ... </td>
        <th>
          <button id="ler" name="ler" class="btn btn-md btn-warning">Visualizar</button>
        <button id="editar" name="editar" class="btn btn-md btn-info">Editar</button>
        <button id="excluir" name="excluir" class="btn btn-md btn-danger">Remover</button>
        </th>
      </tr>
    </tbody>
    </table>
</div>
</div>

<script src='../js/bootstrap.js'></script>
<script src='../js/bootstrap.min.js'></script>
</body>

</html>
