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
                        <h3 class="section-title">Inserir Passageiro</h3>
                        <p>Preencha as informações necessárias</p>
                    </div>
                    <div class="card">
                        <h5 class="card-header">Formulário de Cadastro</h5>
                        <div class="card-body">
                            <form method="post" action="../controller/inserir_cliente.php">
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Nome do Passageiro</label>
                                    <input id="inputText3" type="text" class="form-control" name="nome_passageiro">
                                </div>
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Data de Nascimento</label>
                                    <input id="inputText3" type="date" class="form-control" name="data_nascimento">
                                </div>
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">CPF</label>
                                    <input id="cpf" type="text" class="form-control" name="cpf">
                                </div>
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">RG</label>
                                    <input id="rg" type="text" class="form-control" name="identidade">
                                </div>
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Telefone</label>
                                    <input id="telefone" type="text" class="form-control" name="telefone">
                                </div>
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">E-mail</label>
                                    <input id="inputText3" type="email" class="form-control" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">CEP</label>
                                    <input id="cep" type="text" class="form-control" name="cep">
                                </div>
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Endereço</label>
                                    <input id="inputText3" type="text" class="form-control" name="endereco">
                                </div>
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Número</label>
                                    <input id="inputText3" type="text" class="form-control" name="numero">
                                </div>
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Complemento</label>
                                    <input id="inputText3" type="text" class="form-control" name="complemento">
                                </div>
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Bairro</label>
                                    <input id="inputText3" type="text" class="form-control" name="bairro">
                                </div>
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Cidade</label>
                                    <input id="inputText3" type="text" class="form-control" name="cidade">
                                </div>
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Estado</label>
                                    <input id="inputText3" type="text" class="form-control" name="estado">
                                </div>
                                <!-- Botões do form -->
                                <div class="col-md-8">
                                    <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="Submit">Cadastrar</button>
                                    <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>
                                </div>
                                <!-- Botões do form -->
                            </form>
                            <script type="text/javascript">
                                    $("#cpf").mask("000.000.000-00")
                                    $("#cep").mask("00.000-000")
                                    $("#rg").mask("999.999.999-w", {
                                        translation: {
                                            'w': {
                                                pattern: /[xX0-9]/
                                            }
                                        },
                                        reverse: true
                                    })
                                    $("#telefone").mask("(00) 0000-00009")
                                    $("#telefone").blur(function(event){
                                        if($(this).val().lenght == 15){
                                            $("#telefone").mask("(00) 00000-0009")
                                        }else{
                                            $("#telefone").mask("(00) 0000-00009")
                                        }
                                    })
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