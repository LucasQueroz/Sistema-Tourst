<?php
include_once 'header.php';

if (!empty($_SESSION['cadastrado']) && ($_SESSION['cadastrado'] == "true")) {
    echo "<script>
                alert('O cadastro foi realizado com sucesso.');
              </script>";
    unset($_SESSION['cadastrado']);
} else if (!empty($_SESSION['cadastrado']) && ($_SESSION['cadastrado'] == "false")) {
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
                        <h3 class="section-title">Inserir Viagem</h3>
                        <p>Preencha as informações necessárias</p>
                    </div>
                    <div class="card">
                        <h5 class="card-header">Formulário de Cadastro</h5>
                        <div class="card-body">
                            <form method="post" action="../controller/inserir_viagem.php">
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Destino</label>
                                    <input id="inputText3" type="text" class="form-control" name="destino">
                                </div>
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Local de Saída</label>
                                    <input id="inputText3" type="text" class="form-control" name="ponto_partida">
                                </div>
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Número de Acentos</label>
                                    <input id="inputText3" type="number" class="form-control" name="numero_acentos" min="0">
                                </div>
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Preço</label>
                                    <input id="preco" type="text" class="form-control" name="preco">
                                </div>
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Data da Saída</label>
                                    <input id="inputText3" type="date" class="form-control" name="data_saida">
                                </div>
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Horários da Saída</label>
                                    <input id="inputText3" type="time" class="form-control" name="horario_saida">
                                </div>
                                <!--<div class="form-group">
                                    <label for="inputText3" class="col-form-label">Forma de Pagamento</label>
                                    <input id="inputText3" type="text" class="form-control" name="forma_pagamento">
                                    <select class="custom-select" id="inputGroupSelect01" name="forma_pagamento">
                                        <option selected>Formas de Pagamento...</option>
                                        <option value="1">Cartão</option>
                                        <option value="2">Dinheiro</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>-->
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Informação Adicional</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="informacao_adicional"></textarea>
                                </div>
                                <!-- Botões do form -->
                                <div class="col-md-8">
                                    <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="Submit">Cadastrar</button>
                                    <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>
                                </div>
                                <!-- Botões do form -->
                            </form>
                            <script type="text/javascript">
                                    $("#preco").mask("999.999.990,00", {reverse: true})
                                    
                            </script>
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