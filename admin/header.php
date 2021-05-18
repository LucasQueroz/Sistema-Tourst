<?php /*
	session_start();

	include_once('../controller/db_connect.php');
	
	include_once('../model/verifica_login.php');
	include_once('../view/menu_multinivel.php');

	//include_once('../../model/Produto_Config.php');
	include('class/ClassConexao.php');

	//$conexao = new ClassConexao();
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Painel Administrativo</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/www/ZeroFila/view/_css/estilo.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="/www/ZeroFila/view/_css/menuSubmenu.css">
  	
</head>
<body>

	<nav class="navbar navbar-default">
		 <div class="container-fluid">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="#">Mercado Online</a>
		    </div>
		    <ul class="nav navbar-nav">
		      <li class="active"><a href="view/login_bootstrap.php">Entrar</a></li>
		      <li><a href="../model/logout.php">Sair</a></li>
		      <li><a href="#">Page 2</a></li>
		      <li><a href="#">Page 3</a></li>
		    </ul>
		</div>
	</nav>

	<div class="menu-container">
	    <ul class="menu clearfix">
	        <li><a href="/www/ZeroFila/admin/home.php">Deletar Produto</a></li>
	        <li><a href="/www/ZeroFila/admin/home.php">Atualizar Produto</a>
	        	<!--<ul class="sub-menu clearfix"><?php echo mostrar_menu(CATEGORIA_CAMISAS); ?></ul>-->
	        </li>
	        <li><a href="/www/ZeroFila/admin/home.php">Ver Produtos</a>
	        	<!--<ul class="sub-menu clearfix"><?php echo mostrar_menu(CATEGORIA_CAMISAS); ?></ul>-->
	        </li>
	        <li><a href="/www/ZeroFila/admin/insere_produto.php">Inserir Produto</a>
	        </li>
	    </ul>
	</div>


	