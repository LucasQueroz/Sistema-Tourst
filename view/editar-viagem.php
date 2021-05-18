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
                        <h3 class="section-title">Edita Viagem</h3>
                        <p>Altere as informações necessárias</p>
                    </div>
                    <div class="card">
                        <h5 class="card-header">Formulário de Edição</h5>
                        <div class="card-body">
                            <?php

                            if (!empty($_GET['viagem_id'])) {
                                $viagem_id = $_GET['viagem_id'];
                                if ($query = mysqli_query($connect, "SELECT * FROM viagens WHERE id='$viagem_id'")) {
                                    $row = mysqli_fetch_assoc($query);
                                }
                            }

                            echo ('<form method="post" action="../controller/edita_viagem.php?viagem_id='.$_GET['viagem_id'].'">
                                <div class="form-group">
                                    <label for="destino" class="col-form-label">Destino</label>
                                    <input value="'.$row['destino'].'"id="destino" type="text" class="form-control" name="destino">
                                </div>
                                <div class="form-group">
                                    <label for="ponto_partida" class="col-form-label">Local de Saída</label>
                                    <input value="'.$row['ponto_partida'].'"id="ponto_partida" type="text" class="form-control" name="ponto_partida">
                                </div>
                                <div class="form-group">
                                    <label for="preco" class="col-form-label">Preço</label>
                                    <input value="'.$row['preco'].'"id="preco" type="text" class="form-control" name="preco">
                                </div>
                                <div class="form-group">
                                    <label for="data_saida" class="col-form-label">Data da Saída</label>
                                    <input value="'.$row['data_saida'].'"id="data_saida" type="date" class="form-control" name="data_saida">
                                </div>
                                <div class="form-group">
                                    <label for="horario_saida" class="col-form-label">Horários da Saída</label>
                                    <input value="'.$row['horario_saida'].'"id="horario_saida" type="time" class="form-control" name="horario_saida">
                                </div>
                                <div class="form-group">
                                    <label for="informacao_adicional" class="col-form-label">Informação Adicional</label>
                                    <input value="'.$row['informacao_adicional'].'"class="form-control" id="informacao_adicional" rows="3" name="informacao_adicional"></input>
                                </div>
                                <!-- Botões do form -->
                                <div class="col-md-8">
                                    <button id="Editar" name="Editar" class="btn btn-success" type="Submit">Editar</button>
                                    <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>
                                </div>
                                <!-- Botões do form -->
                            </form>');
                            ?>
                            <script type="text/javascript">
                                $("#preco").mask("999.999.990,00", {
                                    reverse: true
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