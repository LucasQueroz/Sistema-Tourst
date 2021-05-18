<?php

use Dompdf\Dompdf;

include_once '../dompdf/autoload.inc.php';

include_once('../controller/db_connect.php');

session_start();

$dompdf = new DOMPDF();

$nome_passageiro = $_SESSION['nome_passageiro'];

$query_clientes = mysqli_query($connect, "SELECT nome_usuario, rua, numero, cidade, sigla_estado, cep, cpf_cnpj, telefone
         FROM users WHERE id='1'");
$row = mysqli_fetch_assoc($query_clientes);

$data = new DateTime();
$data_saida = new DateTime($_SESSION['data_saida']);
//$data_saida = $_SESSION['data_saida'];

$dompdf->load_html('
    <form>
        <h2>1ª Via</h2>
        <h1 style="text-align: center">RECIBO</h1>    
        <p>Recebemos de ' . $_SESSION['nome_passageiro'] . ' - CPF: ' . $_SESSION['cpf'] . ' - RG: ' . $_SESSION['identidade'] . '</p>
        <p>a importancia de ________________________________________________ (R$ ' . $_SESSION['preco'] . ')</p>
        <p>Referênte compra de passagem de ' . $_SESSION['ponto_partida'] . ' para ' . $_SESSION['destino'] . '</p>
        <p>Com saída no dia ' . $data_saida->format('d/m/Y') . ' às ' . $_SESSION['horario_saida'] . ' no acento de nº ' . $_SESSION['acento'] . '</p>
        <p style="text-align:right">' . $row['cidade'] . ', ' . $row['sigla_estado'] . ', ' . $data->format('d/m/Y') . '</p>
        <p>Assinarura do emitente: ________________________________________________________________</p>
        <p>Emitente: ' . $row['nome_usuario'] . '</p>
        <p>Endereço: Rua ' . $row['rua'] . ', ' . $row['numero'] . ' - ' . $row['cidade'] . ' - ' . $row['sigla_estado'] . ', CEP  ' . $row['cep'] . '</p>
        <p>CPF/CNPJ: ' . $row['cpf_cnpj'] . ' Telefone: ' . $row['telefone'] . '</p>
    </form>
        
    <br><hr size="1" style="border:1px dashed green;"><br>

    <form>
        <h2>2ª Via</h2>
        <h1 style="text-align: center">RECIBO</h1>    
        <p>Recebemos de ' . $_SESSION['nome_passageiro'] . ' - CPF: ' . $_SESSION['cpf'] . ' - RG: ' . $_SESSION['identidade'] . '</p>
        <p>a importancia de ________________________________________________ (R$ ' . $_SESSION['preco'] . ')</p>
        <p>Referênte compra de passagem de ' . $_SESSION['ponto_partida'] . ' para ' . $_SESSION['destino'] . '</p>
        <p>Com saída no dia ' . $data_saida->format('d/m/Y') . ' às ' . $_SESSION['horario_saida'] . ' no acento de nº ' . $_SESSION['acento'] . '</p>
        <p style="text-align:right">' . $row['cidade'] . ', ' . $row['sigla_estado'] . ', ' . $data->format('d/m/Y') . '</p>
        <p>Assinarura do emitente: ________________________________________________________________</p>
        <p>Emitente: ' . $row['nome_usuario'] . '</p>
        <p>Endereço: Rua ' . $row['rua'] . ', ' . $row['numero'] . ' - ' . $row['cidade'] . ' - ' . $row['sigla_estado'] . ', CEP  ' . $row['cep'] . '</p>
        <p>CPF/CNPJ: ' . $row['cpf_cnpj'] . ' Telefone: ' . $row['telefone'] . '</p>
    </form>
');

// Renderisar o html
$dompdf->render();

// Exibir a página
$dompdf->stream(
    "recibo_venda.pdf",
    array(
        "Attachment" => false // Se for true, quando a página carregar, baixa automaticamento o pdf.
    )
);
