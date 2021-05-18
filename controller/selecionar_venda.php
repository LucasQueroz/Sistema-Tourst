<?php
session_start();
require_once 'db_connect.php';

$venda_id = $_GET['venda_id'];

$query = mysqli_query($connect, "SELECT clientes_id, viagens_id, acento FROM vendas WHERE id='$venda_id'");
$row = mysqli_fetch_assoc($query);
$_SESSION['acento'] = $row['acento'];

$clientes_id = $row['clientes_id'];
$viagens_id = $row['viagens_id'];

$query_clientes = mysqli_query($connect, "SELECT nome_passageiro, cpf, identidade FROM clientes WHERE id='$clientes_id'");
$row_clientes = mysqli_fetch_assoc($query_clientes);
$_SESSION['nome_passageiro'] = $row_clientes['nome_passageiro'];
$_SESSION['cpf'] = $row_clientes['cpf'];
$_SESSION['identidade'] = $row_clientes['identidade'];

$query_viagens = mysqli_query($connect, "SELECT preco, ponto_partida, destino, data_saida, horario_saida FROM viagens WHERE id='$viagens_id'");
$row_viagens = mysqli_fetch_assoc($query_viagens);
$_SESSION['preco'] = $row_viagens['preco'];
$_SESSION['ponto_partida'] = $row_viagens['ponto_partida'];
$_SESSION['destino'] = $row_viagens['destino'];
$_SESSION['data_saida'] = $row_viagens['data_saida'];
$_SESSION['horario_saida'] = $row_viagens['horario_saida'];

header('Location: ../view/imprimir-recibo.php');
