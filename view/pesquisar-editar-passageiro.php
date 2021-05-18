<?php
include_once 'header.php';

if (!empty($_SESSION['editado']) && ($_SESSION['editado'] == true)) {
    echo "<script>
                alert('A edição foi realizado com sucesso.');
              </script>";
    unset($_SESSION['editado']);
} else if (!empty($_SESSION['editado']) && ($_SESSION['editado'] == false)) {
    echo "<script>
                alert('Não foi possivel fazer a edição.');
              </script>";
    unset($_SESSION['editado']);
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

                $.post('/www/rodoviagens/controller/pesquisa_editar_cliente.php', dados, function(retorna) {
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
                        <h3 class="section-title">Pesquisa de Passageiro</h3>
                        <p>Escolha o passageiro</p>
                        <button><a href="home.php" style="color: blue">Voltar</a></button>
                    </div>
                    <div class="card">
                        <h5 class="card-header">Formulário Pesquisa</h5>
                        <div class="card-body">
                            <form action="" method="post">

                                <label for="pesquisa">Digite o nome do passageiro </label>
                                <input class="form-control" name="pesquisa" id="pesquisa" placeholder="Digite aqui o nome do passageiro...">

                                <!--<ul class="resultados"></ul>-->
                                <!-- Botões do form -->
                            </form>

                            </br></br></br>
                            <table class="table">
                                <thead class="bg-light">
                                    <tr class="border-0">
                                        <th class="border-0">Nome do Passageiro</th>
                                        <th class="border-0">CPF</th>
                                        <th class="border-0">RG</th>
                                        <th class="border-0">Editar</th>
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