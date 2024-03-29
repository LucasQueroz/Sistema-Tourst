<?php 
    session_start();
?>

<!doctype html>
<html lang="pt-br">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="admin/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="admin/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="admin/assets/libs/css/style.css">
    <link rel="stylesheet" href="admin/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a class="navbar-brand" href="index.html">rodoviagens</a><span class="splash-description">Por favor, digite suas informações.</span></div>
            <div class="card-body">
                <form role="form" method="post" action="model/login.php">
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="name" id="name" type="text" placeholder="Nome de Usuário" autocomplete="on">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="password" id="password" type="password" placeholder="Senha">
                    </div>
                    <div class="form-group">
                        <?php 
                            if (!empty($_SESSION['nao_altenticado'])) {
                                echo "<span class='badge badge-warning'>";
                                echo $_SESSION['nao_altenticado'];
                                echo "</span>";
                                session_destroy();
                            }
                        ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Entrar</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    
                <div class="card-footer-item card-footer-item-bordered">
                    
                </div>
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="admin/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="admin/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>