<?php 
    session_start();
    require_once 'db_connect.php';

    if(isset($_POST['Cadastrar'])){
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

        $sql = "INSERT INTO clientes (nome_passageiro, data_nascimento, cpf, identidade, telefone, e_mail, cep, endereco, numero, complemento, bairro, cidade, estado) 
        VALUES ('$nome_passageiro', '$data_nascimento', '$cpf', '$identidade', '$telefone', '$email', '$cep', '$endereco', '$numero', '$complemento', '$bairro', '$cidade', '$estado')";
        
        if(mysqli_query($connect, $sql)){
            $_SESSION['cadastrado'] = "true";
            header('Location: ../view/cadastrar-passageiro.php');
        } else{
            $_SESSION['cadastrado'] = "false";
            header('Location: ../view/cadastrar-passageiro.php');
        }
        
    }

    mysqli_close($connect);
