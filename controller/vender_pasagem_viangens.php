<?php
    session_start();
    require_once 'db_connect.php';

    $acento = mysqli_escape_string($connect, $_POST['acentos']);
    $forma_pagamento = mysqli_escape_string($connect, $_POST['pagamento']);

    echo('Acento escolhido: '.$acento);
    echo ('Forma de pagamento: '.$forma_pagamento);

    $clientes_id = $_SESSION['passageiro_id'];
    $viagem_id = $_SESSION['viagem_id'];
    $observacao = $_POST['observacao'];

    $query = mysqli_query($connect, "SELECT acentos_vendidos FROM viagens WHERE id='$viagem_id'");
    $row = mysqli_fetch_assoc($query);
    $acentos_vendidos = $row['acentos_vendidos'] + 1;

    if(mysqli_query($connect, "INSERT INTO vendas 
        (clientes_id, viagens_id, acento, forma_pagamento, observacao) VALUES 
        ('$clientes_id', '$viagem_id', '$acento', '$forma_pagamento', '$observacao')")){
        
        if(mysqli_query($connect, "UPDATE acentos SET vendido='1' WHERE viagens_id='$viagem_id' AND cadeira='$acento'")){
            if(mysqli_query($connect, "UPDATE viagens SET acentos_vendidos='$acentos_vendidos' WHERE id='$viagem_id'")){
                unset($_SESSION['passageiro_id']);
                //unset($_SESSION['nome_passageiro']);
                //unset($_SESSION['cpf']);
                unset($_SESSION['viagem_id']);
                //unset($_SESSION['destino']);
                //unset($_SESSION['ponto_partida']);
                //unset($_SESSION['data_saida']);
                //unset($_SESSION['horario_saida']);
                unset($_SESSION['acentos_vendidos']);
                
                header('Location: ../view/imprimir-recibo.php');
            } else {
                echo("ERRO na venda, não foi possível fazer a venda.");
                exit();
            }
            
        } else {
            echo("ERRO na venda, não foi possível fazer a venda.");
            exit();
        }

        
    } else{
        //$_SESSION['cadastrado'] = "false";
        echo("ERRO na venda, não foi possível fazer a venda.");
        exit();
    }
    
    // incrementar os acentos vendidos
    //mysqli_query($connect ,"UPDATE viagens SET ")


    /*$viagem = mysqli_escape_string($connect, $_POST['viagem']);

    echo("Retorno campo viagem: ".$viagem);
    $viagem_id = substr($viagem, 0, 1);

    $query = mysqli_query($connect, "SELECT id, destino, ponto_partida FROM viagens WHERE id='$viagem_id'");
    $row = mysqli_fetch_assoc($query);*/
                                                
    //  echo("\n \\\\\id: ".$row['id']." destino: ".$row['destino']." ponto_partida: ".$row['ponto_partida']);