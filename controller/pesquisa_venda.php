<?php
session_start();
require_once 'db_connect.php';

$pesquisa = mysqli_escape_string($connect, $_POST['palavra']);

$query = mysqli_query($connect, "SELECT vendas.id, viagens.destino, viagens.ponto_partida, viagens.data_saida, viagens.horario_saida, clientes.nome_passageiro
                                             FROM viagens INNER JOIN clientes INNER JOIN vendas
                                             WHERE (vendas.clientes_id=clientes.id AND vendas.viagens_id=viagens.id) AND
                                             (viagens.destino LIKE '%$pesquisa%' OR viagens.data_saida LIKE '%$pesquisa%' OR clientes.nome_passageiro LIKE '%$pesquisa%')");

if(mysqli_num_rows($query) <= 0){
    echo 'Não foi encontrado registro';
} else {
    while($rows = mysqli_fetch_assoc($query)){
        echo('<tr>');
            echo('<td>'.$rows['destino'].'</td>');
            echo('<td>'.$rows['ponto_partida'].'</td>');
            echo('<td>'.$rows['data_saida'].'</td>');
            echo('<td>'.$rows['horario_saida'].'</td>');
            echo('<td>'.$rows['nome_passageiro'].'</td>');
            echo('<td><a class="btn btn-success" href="../controller/selecionar_venda.php?venda_id='.$rows['id']);
            echo('">Visualizar Recibo</a></td>');
        echo('</tr>');

    }
}
