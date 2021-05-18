<?php

session_start();
require_once 'db_connect.php';

if(isset($_POST['btn-registrar'])):
	$nome = mysqli_real_escape_string($connect, $_POST['username']);
	$email = mysqli_real_escape_string($connect, $_POST['email']);
	$senha = mysqli_real_escape_string($connect, $_POST['password']);
	$telefone = mysqli_real_escape_string($connect, $_POST['telefone']);

	/*********** Verifica se tem email repetido *********************/
	$sql = "SELECT count(*) as t FROM usuarios WHERE email='$email'";
	$sql = mysqli_query($connect, $sql);
    $sql = mysqli_fetch_assoc($sql);

    /************ Verifica se tem email repetido ********************/
    if($sql['t'] == 1){
    	//echo "Email ja existe";
    	//exit();
    	$_SESSION['email_existente'] = 'Esse Email já Existe! Escolha outro Email.';
    	header('Location: ../view/sing-up.php');
    	exit();
    }
	/************ Verifica se tem email repetido ********************/
	
	$sql = "INSERT INTO usuarios (nome, email, senha, telefone) VALUE ('$nome', '$email', md5('$senha'), '$telefone')";

	if(mysqli_query($connect, $sql)):
		$sql = "SELECT id FROM usuarios WHERE email='{$email}' AND senha=md5('$senha')";
		$result_cliente_id = mysqli_query($connect, $sql);
		$row_cliente_id = mysqli_fetch_assoc($result_cliente_id);

		//echo "row_cliente_id:".$row_cliente_id['id'];

		$id_cliente = $row_cliente_id['id'];
		//echo "row_cliente_id: ";
		//echo $id_cliente;
		//exit();

		$slq_item_venda = "INSERT INTO item_venda (quantidade_itens, valor, cliente_id, finalizado) VALUE ('0','0','$id_cliente', '0')";
		if(mysqli_query($connect, $slq_item_venda)):
			$_SESSION['email'] = $email;
			$_SESSION['id_usuario'] = $id_cliente;
    		header('Location: ../view/home.php?subcategorias_id_url=1');
    		exit();
		endif;

		//header('Location: ../view/painel.php');
	else:
		//$_SESSION['mensagem'] = "Erro ao cadastra.";
		header('Location: ../view/sing-up.php');
	endif;

endif;

mysqli_close($connect);