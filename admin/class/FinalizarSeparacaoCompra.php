<?php 
session_start();

require_once '../../controller/db_connect.php';

$compra_id = $_GET['compra_id'];

echo "id compra:";
echo $compra_id;

$sql_compra = "UPDATE compra SET entregue='1'WHERE compra_id='$compra_id'";
if(mysqli_query($connect, $sql_compra)) {
	header('Location: ../index.php');
} else {
	echo " /n/n não atualizado";
}

mysqli_close($connect);