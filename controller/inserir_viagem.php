<?php 
    session_start();
    require_once 'db_connect.php';

    if(isset($_POST['Cadastrar'])){
        $destino = mysqli_escape_string($connect, $_POST['destino']);
        $ponto_partida = mysqli_escape_string($connect, $_POST['ponto_partida']);
        $numero_acentos = mysqli_escape_string($connect, $_POST['numero_acentos']);
        $preco = mysqli_escape_string($connect, $_POST['preco']);
        $data_saida = mysqli_escape_string($connect, $_POST['data_saida']);
        $horario_saida = mysqli_escape_string($connect, $_POST['horario_saida']);
        //$forma_pagamento = mysqli_escape_string($connect, $_POST['forma_pagamento']);
        $informacao_adicional = mysqli_escape_string($connect, $_POST['informacao_adicional']);
        $acentos_vendidos = 0;

        
        // Pegando id do indice que vai ser inserido
        $sql = "SELECT MAX(id) as id FROM viagens";
        $query = mysqli_query($connect, $sql);
        $query = mysqli_fetch_assoc($query);
        $viagens_id = $query['id'];
        $viagens_id++;
        // Pegando id do indice que vai ser inserido
        

        $sql = "INSERT INTO viagens (destino, ponto_partida, numero_acentos, acentos_vendidos, preco, data_saida, horario_saida, informacao_adicional) 
        VALUES ('$destino', '$ponto_partida', '$numero_acentos', '$acentos_vendidos','$preco', '$data_saida', '$horario_saida', '$informacao_adicional')";
        
        if(mysqli_query($connect, $sql)){
            // Inserindo assentos
            //echo("id a serinserido.");
            //echo($viagens_id);
            //echo("numero de assentos");
            //echo($numero_acentos);
            $i = 1;
            //echo("indice i:");
            //echo($i);

            while($i <= $numero_acentos){
                if(!mysqli_query($connect, "INSERT INTO acentos (cadeira, viagens_id) 
                    VALUES ('$i', '$viagens_id')")){
                        exit();
                        $_SESSION['cadastrado'] = "false";
                        header('Location: ../view/cadastrar-viagem.php');
                        //exit();
                }
                $i++;
                //echo('cadeiras sendo inseridas');
                //echo($i);
                
            }

            //exit();

            $_SESSION['cadastrado'] = "true";
            header('Location: ../view/cadastrar-viagem.php');
        } else{
            $_SESSION['cadastrado'] = "false";
            header('Location: ../view/cadastrar-viagem.php');
        }
        
    }

    mysqli_close($connect);
