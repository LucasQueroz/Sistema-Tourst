<?php

session_start();

require_once '../../controller/db_connect.php';

if(isset($_POST['Cadastrar'])):
	$nome_produto = mysqli_escape_string($connect, $_POST['nome']);
	$descricao_produto = mysqli_escape_string($connect, $_POST['descricao']);
	$nome_imagem = mysqli_escape_string($connect, $_POST['imagem']);
	$valor_produto = mysqli_escape_string($connect, $_POST['valor']);

	$sql = "INSERT INTO produtos (descricao, nome, img_endereco, preco, subcategoria_id) VALUE ('$descricao_produto', '$nome_produto', '$nome_imagem', '$valor_produto', '6')";

	echo 'nome_produto: '.$nome_produto;
	echo 'descricao_produto: '.$descricao_produto;
	echo 'nome_imagem: '.$nome_imagem;
	echo 'valor_produto: '.$valor_produto;

	if(mysqli_query($connect, $sql)):
		echo " /n/n cadastrado";
	else:
		echo " /n/n não cadastrado";
	endif;

	/*if(mysqli_query($connect, $sql)):
		//$_SESSION['mensagem'] = "Cadastrado com sucesso!";
		header('Location: ../view/painel.php');
	else:
		//$_SESSION['mensagem'] = "Erro ao cadastra.";
		header('Location: ../view/login_bootstrap.php');
	endif;*/

endif;

mysqli_close($connect);