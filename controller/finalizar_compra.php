<?php

session_start();
require_once 'db_connect.php';

$usuario_id = $_SESSION['id_usuario'];
$item_venda_id = $_SESSION['item_venda_id'];

if(isset($_POST['btn-enviar'])){
	$complemento = mysqli_escape_string($connect, $_POST['complemento']);
	$cidade = mysqli_escape_string($connect, $_POST['cidade']);
	$bairro = mysqli_escape_string($connect, $_POST['bairro']);
	$rua = mysqli_escape_string($connect, $_POST['rua']);
	$numero = mysqli_escape_string($connect, $_POST['numero']);

	$usuario_id = $_SESSION['id_usuario'];
	$sql_endereco = "SELECT usuario_id FROM local_entrega WHERE usuario_id='{$usuario_id}'";
	$result = mysqli_query($connect, $sql_endereco);
	$usuario_endereco_cadastrado = mysqli_num_rows($result);

	if($usuario_endereco_cadastrado == 0){
		$sql_local_entrega = "INSERT INTO local_entrega (complemento, cidade, bairro, rua, numero, usuario_id) VALUE ('$complemento', '$cidade', '$bairro', '$rua', '$numero', '$usuario_id')";
		mysqli_query($connect, $sql_local_entrega);
	} 
	else if($usuario_endereco_cadastrado == 1){
		$sql_local_entrega = "UPDATE local_entrega SET complemento='$complemento', cidade='$cidade', bairro='$bairro', rua='$rua', numero='$numero', usuario_id='$usuario_id' WHERE usuario_id='$usuario_id'";
		mysqli_query($connect, $sql_local_entrega);
	}
}

$sql_compra = "INSERT INTO compra (`data`, `usuario_id`, `item_venda_id`) VALUES (now(), '$usuario_id', '$item_venda_id')";

if(mysqli_query($connect, $sql_compra)){
	$sql_item_venda = "UPDATE item_venda SET finalizado='1' WHERE item_venda_id='$item_venda_id'";
	mysqli_query($connect, $sql_item_venda);
	$_SESSION['compra_concluida'] = true;

} else {
	$_SESSION['compra_concluida'] = false;
	
}
header('Location: ../view/ecommerce-product-checkout.php');

mysqli_close($connect);