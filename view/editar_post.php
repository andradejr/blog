<?php

require_once '../controllers/functions.php';

//Início do controle de Acessos de Usuário no sistema
// mesmo Controle de Acesso explicado no topo do index.php

if (Login::is_session_started () === FALSE)
	session_start ();

if (!isset ( $_SESSION ["id"] )) {
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../login.php">';
}

//Fim do controle de Acessos de Usuários no sistema

 ?>


<!DOCTYPE html>
<head>
  <title>Blog - Editar Publicação</title>
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
<h3>Editar Publicação</h3>
<hr>

<div class="col-lg-6">
<form class="form-horizontal" action="POST">

  <!-- titulo input-->
  <div class="form-group">
      <input class="form-control input-md" id="titulo" name="titulo" placeholder="Título" type="text">
  </div>

  <!-- autor input-->
  <div class="form-group">
      <input class="form-control input-md" id="autor" name="autor" placeholder="Autor" type="text">
  </div>

  <!-- texto da postagem -->
  <div class="form-group">
      <textarea id="texto" class="form-control" rows="10" name="texto"></textarea>
  </div>

  <!-- input imagem -->
  <div class="form-group">
      <input id="imagem" name="imagem" class="input-file" type="file">
  </div>

  <!-- botões -->
  <div class="form-group">
      <button id="cadastra" name="cadastra" class="btn btn-md btn-info">Editar</button>
      <button id="cancela" name="cancela" class="btn btn-md btn-danger">Voltar</button>
  </div>

  </form>
</div>
</div>
<script src='../js/bootstrap.js'></script>
<script src='../js/bootstrap.min.js'></script>
</body>

</html>
