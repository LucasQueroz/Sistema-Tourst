<?php

session_start();
include('../controller/db_connect.php');

if(empty($_POST['name']) || empty($_POST['password'])) {
	header('Location: ../index.php');
	exit();
}

$name = mysqli_real_escape_string($connect, $_POST['name']);
$password = mysqli_real_escape_string($connect, $_POST['password']);

$query = "SELECT id, name, password FROM users WHERE name='{$name}' AND password=md5('$password')";

$result = mysqli_query($connect, $query);
$row_cliente = mysqli_fetch_assoc($result);
$row = mysqli_num_rows($result);

if($row == 1){
    //echo("Passei aqui");
    $_SESSION['name'] = $name;
    header('Location: ../view/home.php');




    //$_SESSION['id_usuario'] = $row_cliente['id'];
    //$_SESSION['nivel_altenticacao'] = $row_cliente['nivel'];

    /*if($row_cliente['nivel'] == 1){
    	header('Location: ../view/home.php?subcategorias_id_url=1');
    } else if($row_cliente['nivel'] == 2){
    	header('Location: ../admin/index.php');
    } */   


    exit();
} else {
    $_SESSION['nao_altenticado'] = 'Senha ou Nome Usuário inválido!';
    header('Location: ../index.php');
    exit();
}

mysqli_close($connect);