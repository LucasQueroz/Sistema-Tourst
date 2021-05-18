<?php
session_start();
require_once 'db_connect.php';

//$pesquisa = $_POST['palavra'];

$pesquisa = mysqli_escape_string($connect, $_POST['palavra']);

$query = mysqli_query($connect, "SELECT id, nome_passageiro, cpf, identidade
                                             FROM clientes WHERE nome_passageiro LIKE '%$pesquisa%'");

if(mysqli_num_rows($query) <= 0){
    echo 'Não foi encontrado registro';
} else {
    while($rows = mysqli_fetch_assoc($query)){
        echo('<tr>');
            echo('<td>'.$rows['nome_passageiro'].'</td>');
            echo('<td>'.$rows['cpf'].'</td>');
            echo('<td>'.$rows['identidade'].'</td>');
            echo('<td><a class="btn btn-success" href="editar-passageiro.php?passageiro_id='.$rows['id']);
            echo('">Editar</a></td>');
        echo('</tr>');

    }
}