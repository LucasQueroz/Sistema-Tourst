<?php 
    session_start();
    require_once 'db_connect.php';

    $viagem_id = $_GET['viagem_id'];

    if(isset($_POST['Editar'])){
        $destino = mysqli_escape_string($connect, $_POST['destino']);
        $ponto_partida = mysqli_escape_string($connect, $_POST['ponto_partida']);
        $preco = mysqli_escape_string($connect, $_POST['preco']);
        $data_saida = mysqli_escape_string($connect, $_POST['data_saida']);
        $horario_saida = mysqli_escape_string($connect, $_POST['horario_saida']);
        $informacao_adicional = mysqli_escape_string($connect, $_POST['informacao_adicional']);
        
        $sql = "UPDATE viagens SET destino='$destino', ponto_partida='$ponto_partida', 
                     preco='$preco', data_saida='$data_saida', horario_saida='$horario_saida',
                      informacao_adicional='$informacao_adicional' WHERE id='$viagem_id'";
        
        if(mysqli_query($connect, $sql)){
            $_SESSION['editado'] = "true";
            header('Location: ../view/pesquisar-editar-viagem.php');
        } else{
            $_SESSION['editado'] = "false";
            header('Location: ../view/pesquisar-editar-viagem.php');
        }
        
    }

    mysqli_close($connect);
