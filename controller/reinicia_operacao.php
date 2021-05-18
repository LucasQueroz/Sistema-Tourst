<?php
    session_start();
    require_once 'db_connect.php';

    unset($_SESSION['passageiro_id']);
    unset($_SESSION['nome_passageiro']);
    unset($_SESSION['cpf']);
    unset($_SESSION['viagem_id']);
    unset($_SESSION['destino']);
    unset($_SESSION['ponto_partida']);
    unset($_SESSION['data_saida']);
    unset($_SESSION['horario_saida']);
    unset($_SESSION['acentos_vendidos']);
    unset($_SESSION['preco']);
    unset($_SESSION['acento']);

    header('Location: ../view/home.php');
