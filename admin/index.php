<?php 
    session_start();

    include_once('../controller/db_connect.php');
    include_once('../model/verifica_admin.php');
    include_once('../view/menu_multinivel.php');

    //include_once('../../model/Produto_Config.php');
    //include('class/ClassConexao.php');
 ?>

<!doctype html>
<html lang="pt-br">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
</head>

<body>
    
        <?php include_once 'menu_horizontal.html'; ?>
        <?php include_once 'menu_vertical.html'; ?>
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
                            <div class="page-header">
                                <h2 class="pageheader-title">E-commerce Dashboard Template </h2>
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">E-Commerce Dashboard Template</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">
                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Comissão mês anterior</h5>
                                        <div class="metric-value d-inline-block">
                                            <?php 
                                                /* Tem que pegar o mes anterior ao mes e nao atual*/
                                                $sql = "SELECT count(*) as t FROM compra WHERE YEAR(data) = YEAR(now()) AND MONTH(data) =  (MONTH(now())-1) AND entregue='1'";
                                                $sql = mysqli_query($connect, $sql);
                                                $sql = mysqli_fetch_assoc($sql);
                                                $numero_venda_mes_atual = $sql['t'];
                                                
                                                echo '<h1 class="mb-1"> R$ ';
                                                echo $numero_venda_mes_atual * 5 + 30;
                                                echo '</h1>';
                                            ?>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                                            <span>N° ven:</span>
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue"></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Comissão mês atual</h5>
                                        <div class="metric-value d-inline-block">
                                            <?php
                                                $sql = "SELECT count(*) as t FROM compra WHERE YEAR(data) = YEAR(now()) AND MONTH(data) =  MONTH(now()) AND entregue='1'";
                                                $sql = mysqli_query($connect, $sql);
                                                $sql = mysqli_fetch_assoc($sql);
                                                $numero_venda_mes_atual = $sql['t'];
                                                
                                                echo '<h1 class="mb-1"> R$ ';
                                                echo $numero_venda_mes_atual * 5 + 30;
                                                echo '</h1>';
                                            ?>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                                            <span>N° ven:</span>
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue2"></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Vendas Total</h5>
                                        <div class="metric-value d-inline-block">
                                            <?php 
                                                $sql = "SELECT count(*) as t FROM compra WHERE entregue='1'";
                                                $sql = mysqli_query($connect, $sql);
                                                $sql = mysqli_fetch_assoc($sql);
                                                $numero_de_vendas = $sql['t'];
                                                echo '<h1 class="mb-1">';
                                                echo $numero_de_vendas;
                                                echo '</h1>';
                                            ?> 
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                                            <span>N/A</span>
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue3"></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Clientes Cadastrados</h5>
                                        <div class="metric-value d-inline-block">
                                            <?php 
                                                $sql = "SELECT count(*) as t FROM usuarios WHERE nivel='1'";
                                                $sql = mysqli_query($connect, $sql);
                                                $sql = mysqli_fetch_assoc($sql);
                                                $total_de_usuarios = $sql['t'];
                                                echo '<h1 class="mb-1">';
                                                echo $total_de_usuarios;
                                                echo '</h1>';
                                            ?>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-secondary font-weight-bold">
                                            <span>0.00</span>
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue4"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- ============================================================== -->
                      
                            <!-- recent orders  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Compras Para Serem Entregues</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">#</th>
                                                        <th class="border-0">Valor da Compra</th>
                                                        <th class="border-0">Número de Itens</th>
                                                        <th class="border-0">Cidade</th>
                                                        <th class="border-0">Bairo</th>
                                                        <th class="border-0">Rua</th>
                                                        <th class="border-0">Data e Hora</th>
                                                        <th class="border-0">Ação</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    $sql_compras = "SELECT item_venda.valor, item_venda.quantidade_itens, local_entrega.local_entrega_id, local_entrega.usuario_id, local_entrega.cidade, local_entrega.bairro, local_entrega.rua, compra.data, compra.compra_id, compra.item_venda_id
                                                    FROM compra
                                                    JOIN item_venda ON item_venda.item_venda_id=compra.item_venda_id AND compra.entregue='0'
                                                    JOIN local_entrega ON compra.usuario_id=local_entrega.usuario_id AND compra.entregue='0'";
                                                     $compras_resul = mysqli_query($connect, $sql_compras);
                                                    $i = 1;
                                                    while ($row_compras =
                                                     mysqli_fetch_array($compras_resul)):
                                                ?>
                                                        <tr>
                                                            <td><?php echo $i++; ?></td>
                                                            <td><?php echo $row_compras['valor']?> </td>
                                                            <td><?php echo $row_compras['quantidade_itens']?> </td>
                                                            <td><?php echo $row_compras['cidade']?> </td>
                                                            <td><?php echo $row_compras['bairro']?></td>
                                                            <td><?php echo  $row_compras['rua']?></td>
                                                            <td><?php echo $row_compras['data']?></td>
                                                            <td>
                                                                <a href="pages/detalhes_entrega.php?usuario_id=<?php echo $row_compras['usuario_id']?>&item_venda_id=<?php echo $row_compras['item_venda_id']?>&compra_id=<?php echo $row_compras['compra_id']?>" class="btn btn-outline-light float-right">Detalhes
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    <?php endwhile; ?>
                                                    <tr>
                                                        <td colspan="9"><a href="#" class="btn btn-outline-light float-right">View Details</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end recent orders  -->


                            <!-- Lista de clientes -->

                            <!-- recent orders  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Lista de clientes da loja</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">#</th>
                                                        <th class="border-0">Nome</th>
                                                        <th class="border-0">Email</th>
                                                        <th class="border-0">Telefone</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    $sql_usuarios = "SELECT nome, email, telefone FROM usuarios WHERE nivel='1'";
                                                     $usuarios_resul = mysqli_query($connect, $sql_usuarios);
                                                    $i = 1;
                                                    while ($row_usuarios =
                                                     mysqli_fetch_array($usuarios_resul)):
                                                ?>
                                                        <tr>
                                                            <td><?php echo $i++; ?></td>
                                                            <td><?php echo $row_usuarios['nome']?> </td>
                                                            <td><?php echo $row_usuarios['email']?> </td>
                                                            <td><?php echo $row_usuarios['telefone']?> 
                                                            </td>
                                                        </tr>
                                                    <?php endwhile; ?>
                                                    <tr>
                                                        <td colspan="9"><a href="#" class="btn btn-outline-light float-right">View Details</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Lista de clientes -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                             Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="assets/libs/js/dashboard-ecommerce.js"></script>
</body>
 
</html>