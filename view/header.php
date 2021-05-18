<?php
session_start();

include_once('../controller/db_connect.php');

include_once('../model/verifica_login.php');
include_once('menu_multinivel.php');

include_once('../model/Variaveis.php');

$name = $_SESSION['name'];
$usuario_query = mysqli_query($connect, "SELECT nome FROM users WHERE name = '{$name}'");
$row_nome = mysqli_fetch_assoc($usuario_query);
$nome = $row_nome['name'];
?>

<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo RAIZ_PROGETO . 'admin/assets/vendor/bootstrap/css/bootstrap.min.css' ?>">
    <link href="<?php RAIZ_PROGETO . 'admin/assets/vendor/fonts/circular-std/style.css' ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo RAIZ_PROGETO . 'admin/assets/libs/css/style.css' ?>">
    <link rel="stylesheet" href="<?php echo RAIZ_PROGETO . 'admin/assets/vendor/fonts/fontawesome/css/fontawesome-all.css' ?>">

    <script type="text/javascript" src="_javascript/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="_javascript/jquery.mask.min.js"></script>
    <script type="text/javascript" src="_javascript/atauliza_tela.js"></script>
    
    <title>Painel de Controle</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="#">RodoViagens</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                <input class="form-control" type="text" placeholder="Search..">
                            </div>
                        </li>
                        <li class="nav-item">

                        </li>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">Olá, <?php echo $name; ?></h5>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo $nome; ?></h5>
                                    <span class="status"></span><span class="ml-2"><?php echo $_SESSION['name']; ?></span>
                                </div>
                                <a class="dropdown-item" href="../model/logout.php"><i class="fas fa-power-off mr-2"></i>Sair</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider"><i class="fas fa-bars"></i> Menu </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-address-card"></i>Cadastrar <span class="badge badge-success">6</span></a>
                                <div id="submenu-1" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="cadastrar-passageiro.php"> Cadastrar Passageiro</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="cadastrar-viagem.php"> Cadastrar Viagem</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-tags"></i>Vender</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="venda-passagem.php"> Vender Passagem</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fa fa-fw fa-file-alt"></i>Recibos</a>
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="pesquisar-boleto.php"> Procurar Recibos</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fa fa-fw fa-edit"></i>Editar</a>
                                <div id="submenu-4" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="pesquisar-editar-passageiro.php"> Editar Passageiro</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pesquisar-editar-viagem.php"> Editar Viagem</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->