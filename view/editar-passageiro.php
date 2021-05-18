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
                        <h3 class="section-title">Editar Passageiro</h3>
                        <p>Altere as informações necessárias</p>
                    </div>
                    <div class="card">
                        <h5 class="card-header">Formulário de Edição</h5>
                        <div class="card-body">
                        <?php
                            echo('<form method="post" action="../controller/editar_cliente.php?passageiro_id='.$_GET['passageiro_id'].'">');
                                
                                if (!empty($_GET['passageiro_id'])) {
                                    $passageiro_id = $_GET['passageiro_id'];
                                    if ($query = mysqli_query($connect, "SELECT * FROM clientes WHERE id='$passageiro_id'")) {
                                        $row = mysqli_fetch_assoc($query);
                                    }
                                }
                                echo ('<div class="form-group">
                                    <label for="nome_passageiro" class="col-form-label">Nome do Passageiro</label>
                                    <input value="'.$row['nome_passageiro'].'" id="nome_passageiro" type="text" class="form-control" name="nome_passageiro">
                                </div>
                                <div class="form-group">
                                    <label for="data_nascimento" class="col-form-label">Data de Nascimento</label>
                                    <input value="'.$row['data_nascimento'].'" id="data_nascimento" type="date" class="form-control" name="data_nascimento">
                                </div>
                                <div class="form-group">
                                    <label for="cpf" class="col-form-label">CPF</label>
                                    <input value="'.$row['cpf'].'" id="cpf" type="text" class="form-control" name="cpf">
                                </div>
                                <div class="form-group">
                                    <label for="identidade" class="col-form-label">RG</label>
                                    <input value="'.$row['identidade'].'" id="identidade" type="text" class="form-control" name="identidade">
                                </div>
                                <div class="form-group">
                                    <label for="telefone" class="col-form-label">Telefone</label>
                                    <input value="'.$row['telefone'].'" id="telefone" type="text" class="form-control" name="telefone">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-form-label">E-mail</label>
                                    <input value="'.$row['e_mail'].'" id="email" type="email" class="form-control" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="cep" class="col-form-label">CEP</label>
                                    <input value="'.$row['cep'].'" id="cep" type="text" class="form-control" name="cep">
                                </div>
                                <div class="form-group">
                                    <label for="endereco" class="col-form-label">Endereço</label>
                                    <input value="'.$row['endereco'].'" id="endereco" type="text" class="form-control" name="endereco">
                                </div>
                                <div class="form-group">
                                    <label for="numero" class="col-form-label">Número</label>
                                    <input value="'.$row['numero'].'" id="numero" type="text" class="form-control" name="numero">
                                </div>
                                <div class="form-group">
                                    <label for="complemento" class="col-form-label">Complemento</label>
                                    <input value="'.$row['complemento'].'" id="complemento" type="text" class="form-control" name="complemento">
                                </div>
                                <div class="form-group">
                                    <label for="bairro" class="col-form-label">Bairro</label>
                                    <input value="'.$row['bairro'].'" id="bairro" type="text" class="form-control" name="bairro">
                                </div>
                                <div class="form-group">
                                    <label for="cidade" class="col-form-label">Cidade</label>
                                    <input value="'.$row['cidade'].'" id="cidade" type="text" class="form-control" name="cidade">
                                </div>
                                <div class="form-group">
                                    <label for="estado" class="col-form-label">Estado</label>
                                    <input value="'.$row['estado'].'" id="estado" type="text" class="form-control" name="estado">
                                </div>');
                                ?>
                                <!-- Botões do form -->
                                <div class="col-md-8">
                                    <button id="Editar" name="Editar" class="btn btn-success" type="Submit">Editar</button>
                                    <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>
                                </div>
                                <!-- Botões do form -->

                            </form>
                            <script type="text/javascript">
                                $("#cpf").mask("000.000.000-00")
                                $("#cep").mask("00.000-000")
                                $("#identidade").mask("999.999.999-w", {
                                    translation: {
                                        'w': {
                                            pattern: /[xX0-9]/
                                        }
                                    },
                                    reverse: true
                                })
                                $("#telefone").mask("(00) 0000-00009")
                                $("#telefone").blur(function(event) {
                                    if ($(this).val().lenght == 15) {
                                        $("#telefone").mask("(00) 00000-0009")
                                    } else {
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