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
<script type="text/javascript">
    $(function() {
        $("#pesquisa").keyup(function() {
            var pesquisa = $(this).val();

            if (pesquisa != '') {
                var dados = {
                    palavra: pesquisa
                }

                $.post('/www/rodoviagens/controller/pesquisa_viagem.php', dados, function(retorna) {
                    $(".resultados").html(retorna);
                });
            }
        });
    });
</script>


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
                        <h3 class="section-title">Pesquisa de Viagens</h3>
                        <p>Escolha a viagem</p>
                        <button><a href="venda-passagem.php" style="color: blue">Voltar</a></button>
                    </div>
                    <div class="card">
                        <h5 class="card-header">Formulário Pesquisa</h5>
                        <div class="card-body">
                            <form action="" method="post">

                                <label for="pesquisa">Digite o nome do destino a ser escolhido </label>
                                <input class="form-control" name="pesquisa" id="pesquisa" placeholder="Digite o nome do destino aqui..">

                                <!--<ul class="resultados"></ul>-->
                                <!-- Botões do form -->
                            </form>

                            </br></br></br>
                            <table class="table">
                                <thead class="bg-light">
                                    <tr class="border-0">
                                        <th class="border-0">Destino</th>
                                        <th class="border-0">Local de Saída</th>
                                        <th class="border-0">Dia da Saída</th>
                                        <th class="border-0">Hora da Saída</th>
                                        <th class="border-0">Valor</th>
                                        <th class="border-0">Adicionar</th>
                                    </tr>
                                </thead>
                                <tbody class="resultados">

                                </tbody>
                            </table>

                        </div>
                    </div>
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