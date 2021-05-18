<?php
session_start();
require_once 'db_connect.php';

//$pesquisa = $_POST['palavra'];

$pesquisa = mysqli_escape_string($connect, $_POST['palavra']);

$query = mysqli_query($connect, "SELECT id, destino, ponto_partida, data_saida, horario_saida, preco
                                             FROM viagens WHERE acentos_vendidos != numero_acentos
                                             AND destino LIKE '%$pesquisa%'
                                             AND 
                                             (YEAR(data_saida) > YEAR(now()) OR
                                             (YEAR(data_saida) = YEAR(now()) AND MONTH(data_saida) > MONTH(now())) OR
                                             (YEAR(data_saida) = YEAR(now()) AND MONTH(data_saida) = MONTH(now()) AND DAY(data_saida) >= DAY(now())))");

if(mysqli_num_rows($query) <= 0){
    echo 'Não foi encontrado registro';
} else {
    while($rows = mysqli_fetch_assoc($query)){
        echo('<tr>');
            echo('<td>'.$rows['destino'].'</td>');
            echo('<td>'.$rows['ponto_partida'].'</td>');
            echo('<td>'.$rows['data_saida'].'</td>');
            echo('<td>'.$rows['horario_saida'].'</td>');
            echo('<td>'.$rows['preco'].'</td>');
            echo('<td><a class="btn btn-success" href="venda-passagem.php?viagem_id='.$rows['id']);
            echo('">Adicionar</a></td>');
        echo('</tr>');

    }
}
