<?php
include_once 'header.php';

if (!empty($_SESSION['cadastrado']) && ($_SESSION['cadastrado'] == true)) {
    echo "<script>
                alert('O cadastro foi realizado com sucesso.');
              </script>";
    unset($_SESSION['cadastrado']);
} else if (!empty($_SESSION['cadastrado']) && ($_SESSION['cadastrado'] == false)) {
    echo "<script>
                alert('Não foi possivel fazer o cadastro.');
              </script>";
    unset($_SESSION['cadastrado']);
}
?>

<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section-block" id="basicform">
                        <h3 class="section-title">Vender Passagem</h3>
                        <p>Preencha as informações necessárias</p>
                    </div>
                    <div class="card">
                        <h5 class="card-header">Formulário de Venda</h5>
                        <div class="card-body">
                            <form method="post" action="confirma-venda-passagem.php">
                                <div class="form-group">
                                    <label for="passageiro" class="col-form-label">Selecionar Passageiro</label>
                                    <a class="btn btn-secondary btn-sm" href="pesquisar-passageiro.php">
                                    <i class="fas fa-search"></i> Pesquisar</a>

                                    <?php
                                    if (!empty($_GET['passageiro_id'])) {
                                        $passageiro_id = $_GET['passageiro_id'];
                                        $_SESSION['passageiro_id'] = $_GET['passageiro_id'];

                                        $query = mysqli_query($connect, "SELECT nome_passageiro, cpf
                                             FROM clientes WHERE id='$passageiro_id'");
                                        $row = mysqli_fetch_assoc($query);

                                        $_SESSION['nome_passageiro'] = $row['nome_passageiro'];
                                        $_SESSION['cpf'] = $row['cpf'];
                                    }

                                    if (empty($_SESSION['passageiro_id'])) {
                                        echo ('<input value="Selecione um passageiro" id="passageiro" type="text" class="form-control" name="passageiro" readonly="readonly">');
                                    } else {
                                        echo ('<input value="Nome do passageiro: '.$_SESSION['nome_passageiro'].' | CPF: '.$_SESSION['cpf'].'" id="passageiro" type="text" class="form-control" name="passageiro" readonly="readonly">');
                                    }
                                    ?>

                                </div>
                                <div class="form-group">
                                    <label for="viagem" class="col-form-label">Selecionar Viagem</label>
                                    <a class="btn btn-secondary btn-sm" href="pesquisar-viagem.php">
                                    <i class="fas fa-search"></i> Pesquisar</a>
                                    
                                    <?php
                                    if (!empty($_GET['viagem_id'])) {
                                        $viagem_id = $_GET['viagem_id'];
                                        $_SESSION['viagem_id'] = $_GET['viagem_id'];

                                        $query = mysqli_query($connect, "SELECT destino, preco, ponto_partida, data_saida, horario_saida, acentos_vendidos
                                             FROM viagens WHERE id='$viagem_id'");
                                        $row = mysqli_fetch_assoc($query);

                                        $_SESSION['destino'] = $row['destino'];
                                        $_SESSION['ponto_partida'] = $row['ponto_partida'];
                                        $_SESSION['data_saida'] = $row['data_saida'];
                                        $_SESSION['horario_saida'] = $row['horario_saida'];
                                        $_SESSION['preco'] = $row['preco'];
                                        //$_SESSION['acentos_vendidos'] = $row['acentos_vendidos'];
                                    }

                                    if (empty($_SESSION['viagem_id'])) {
                                        echo ('<input value="Selecione uma viagem" id="viagem" type="text" class="form-control" name="viagem" readonly="readonly">');
                                    } else {
                                        echo ('<input value="Destino: ' . $_SESSION['destino'] .' | Local de saída: '.$_SESSION['ponto_partida'].
                                        ' | Dia de saída: '.$_SESSION['data_saida'].' | Horário de saída:  '.$_SESSION['horario_saida'].
                                        ' | Preço: '.$_SESSION['preco']. '" id="passageiro" type="text" class="form-control" name="passageiro" readonly="readonly">');
                                    }
                                    ?>
                                    
                                </div>
                                <div class="form-group col-md-4">
                                       
                                        <?php
                                            if (!empty($_SESSION['viagem_id'])) {
                                                $viagens_id = $_SESSION['viagem_id'];
                                                $query = mysqli_query($connect, "SELECT cadeira FROM acentos 
                                                    WHERE viagens_id='$viagens_id' AND vendido='0'");

                                                echo('<label for="acentos" class="col-form-label">Ecolha um dos Acentos Disponíveis</label>
                                                     <select name="acentos" id="acentos" class="form-control">');
 
                                                while($rows = mysqli_fetch_assoc($query)){
                                                    echo('<option value="'.$rows['cadeira'].'">');
                                                    echo('Acento número: '.$rows['cadeira']);
                                                    echo('</option>');
                                                }
                                            }

                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="pagamento" class="col-form-label">Forma de Pagamento</label>
                                    <select name="pagamento" id="pagamento" class="form-control">
                                        <option value="Dinheiro">Dinheiro</option>
                                        <option value="Cartão de Crédito">Cartão de Crédito</option>
                                        <option value="Cheque">Cheque</option>
                                        <option value="Deposito bancário">Deposito bancário</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="observacao" class="col-form-label">Observação</label>
                                    <textarea class="form-control" id="observacao" rows="3" name="observacao"></textarea>
                                </div>

                                <!-- Botões do form -->
                                <div class="col-md-8">
                                    <button id="proximo" name="proximo" class="btn btn-success" type="Submit">Próximo</button>
                                    <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>
                                </div>
                                <!-- Botões do form -->
                            </form>

                        </div>

                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader  -->
            <!-- ============================================================== -->



            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <?php
            include_once '../footer.php';
            ?>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->

        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
</div>
<!-- ============================================================== -->
<!-- end main wrapper  -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->
<!-- jquery 3.3.1 -->
<script src="../admin/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<!-- bootstap bundle js -->
<script src="../admin/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<!-- slimscroll js -->
<script src="../admin/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
<!-- main js -->
<script src="../admin/assets/libs/js/main-js.js"></script>
</body>

</html>