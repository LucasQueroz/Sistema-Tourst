<?php 
    session_start();
    require_once 'db_connect.php';

    $passageiro_id = $_GET['passageiro_id'];

    if(isset($_POST['Editar'])){
        $nome_passageiro = mysqli_escape_string($connect, $_POST['nome_passageiro']);
        $data_nascimento = mysqli_escape_string($connect, $_POST['data_nascimento']);
        $cpf = mysqli_escape_string($connect, $_POST['cpf']);
        $identidade = mysqli_escape_string($connect, $_POST['identidade']);
        $telefone = mysqli_escape_string($connect, $_POST['telefone']);
        $email = mysqli_escape_string($connect, $_POST['email']);
        $cep = mysqli_escape_string($connect, $_POST['cep']);
        $endereco = mysqli_escape_string($connect, $_POST['endereco']);
        $numero = mysqli_escape_string($connect, $_POST['numero']);
        $complemento = mysqli_escape_string($connect, $_POST['complemento']);
        $bairro = mysqli_escape_string($connect, $_POST['bairro']);
        $cidade = mysqli_escape_string($connect, $_POST['cidade']);
        $estado = mysqli_escape_string($connect, $_POST['estado']);

        $sql = "UPDATE clientes SET nome_passageiro='$nome_passageiro', data_nascimento='$data_nascimento', cpf='$cpf',
         identidade='$identidade', telefone='$telefone', e_mail='$email', cep='$cep', endereco='$endereco',
          numero='$numero', complemento='$complemento', bairro='$bairro', cidade='$cidade', estado='$estado'
          WHERE id='$passageiro_id'";
        
        if(mysqli_query($connect, $sql)){
            $_SESSION['editado'] = "true";
            header('Location: ../view/pesquisar-editar-passageiro.php');
        } else{
            $_SESSION['editado'] = "false";
            header('Location: ../view/pesquisar-editar-passageiro.php');
        }
        
    }

    mysqli_close($connect);
