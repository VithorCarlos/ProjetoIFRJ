<?php
session_start();
// Verifica se existe os dados da sessão de login 
if (!isset($_SESSION["login_adm"]) && !isset($_SESSION["senha_adm"])) {
    // Usuário não logado! Redireciona para a página de login 
    header("Location: acessosistema.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Segunda Igreja Batista em Porto da Pedra</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700|Work+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <div class="site-wrap">

        <div class="site-mobile-menu">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>
        <!-- .site-mobile-menu -->


        <div class="site-navbar-wrap js-site-navbar bg-white">
            <div class="container">
                <div class="site-navbar bg-light">
                    <div class="py-1">
                        <div class="row align-items-center">
                            <div class="col-2">
                                <h2 class="mb-0 site-logo"><a href="index.html">SIBPP</a></h2>
                            </div>
                            <div class="col-10">
                                <nav class="fixed site-navigation text-right" role="navigation">
                                    <div class="container">
                                        <div class="d-inline-block  ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu h3"></span></a></div>

                                        <ul class="site-menu js-clone-nav d-none">
                                            <li><a href="index.html">HOME</a></li>
                                            <li><a href="cadastro_evento.php">Cadastrar Eventos</a></li>
                                            <li><a href="cadastro_membro.php">Cadastrar Membros</a></li>
                                            <li><a href="visualizarOracoesAdm.php">Visualizar Orações</a></li>
                                            <li><a href="visualizarMembros.php">Visualizar Membros</a></li>
                                            <li><a href="logout.php">Sair</a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="slide-one-item home-slider owl-carousel">
            <div class="site-blocks-cover overlay" style="background-image: url(images/administrador.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7 text-center" data-aos="fade">
                            <span class="caption mb-3"></span>
                            <h1 class="mb-4">Área do Administrador</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/mediaelement-and-player.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/main.js"></script>
</body>

</html>