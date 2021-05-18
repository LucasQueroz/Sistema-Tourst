<?php
    include_once 'header.php';
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
                        <h3 class="section-title">Confirmar Venda de Passagem</h3>
                        <p>Verifique se todas as informações estão corretas</p>
                    </div>
                    <div class="card">
                        <h5 class="card-header">Formulário de Confirmação de Venda</h5>
                        <div class="card-body">
                            <form method="post" action="../controller/vender_pasagem_viangens.php">
                                <div class="form-group">
                                    <label for="passageiro" class="col-form-label">Informações do Passageiro</label>
                                    
                                    <?php
                                    
                                    if (empty($_SESSION['passageiro_id'])) {
                                        echo ('<input value="Selecione um passageiro" id="passageiro" type="text" class="form-control" name="passageiro" readonly="readonly">');
                                    } else {
                                        echo ('<input value="Nome do passageiro: '.$_SESSION['nome_passageiro'].' | CPF: '.$_SESSION['cpf'].'" id="passageiro" type="text" class="form-control" name="passageiro" readonly="readonly">');
                                    }
                                    ?>

                                </div>
                                <div class="form-group">
                                    <label for="viagem" class="col-form-label">Informações da Viagem</label>
                                    
                                    <?php
                                    
                                    if (empty($_SESSION['viagem_id'])) {
                                        echo ('<input value="Selecione uma viagem" id="viagem" type="text" class="form-control" name="viagem" readonly="readonly">');
                                    } else {
                                        echo ('<input value="Destino: ' . $_SESSION['destino'] .' | Local de saída: '.$_SESSION['ponto_partida'].
                                        ' | Dia de saída: '.$_SESSION['data_saida'].' | Horário de saída:  '.$_SESSION['horario_saida'].
                                        '| Preço: '.$_SESSION['preco'].'" id="passageiro" type="text" class="form-control" name="passageiro" readonly="readonly">');
                                    }
                                    ?>
                                    
                                </div>
                                <div class="form-group col-md-4">
                                       
                                        <?php
                                            $_SESSION['acento'] = $_POST['acentos'];

                                            echo('<label for="acentos" class="col-form-label">Número do Acento</label>
                                            <input value="'.$_SESSION['acento'].'" id="acentos" type="text" class="form-control" name="acentos" readonly="readonly">');
                                            
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <?php
                                        $pagamento = $_POST['pagamento'];

                                        echo('<label for="pagamento" class="col-form-label">Forma de Pagamento</label>
                                        <input value="'.$pagamento.'" id="pagamento" type="text" class="form-control" name="pagamento" readonly="readonly">');
                                    ?>
                                </div>
                                <div class="form-group">
                                    <!--<label for="inputText3" class="col-form-label">Observação</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="informacao_adicional" readonly="readonly"></textarea>
                                        -->

                                    <?php
                                        $observacao = $_POST['observacao'];

                                        echo('<label for="observacao" class="col-form-label">Observação</label>
                                        <input value="'.$observacao.'"class="form-control" id="observacao" rows="3" name="observacao" readonly="readonly"></input>');
                                    ?>
                                </div>

                                <!-- Botões do form -->
                                <div class="col-md-8">
                                    <a id="voltar" name="voltar" class="btn btn-danger" href="venda-passagem.php">Voltar</a>
                                    <button id="confirmar" name="confirmar" class="btn btn-success" type="Submit">Confirmar Venda</button>
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