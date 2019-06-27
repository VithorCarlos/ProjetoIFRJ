<?php
if (!isset($_SESSION["login_adm"]) && !isset($_SESSION["senha_adm"])) {
    // Usuário não logado! Redireciona para a página de login 
    header("Location: acessosistema.php");
    exit;
}

include "funcoes.php";
$dados = ListarPedidos();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Página de Consulta</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/tables.css">
    <link rel="stylesheet" type="text/css" href="css/table_util.css">

    <!--===============================================================================================-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <!--a class="navbar-brand btn btn-outline-success" href="#"><i class="fas fa-home"></i> Home</a>-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#NavbarContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="NavbarContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle btn btn-outline-dark" role="button" data-toggle="dropdown" href="#" style="margin-bottom: 2%;"><i class="fas fa-user-circle"></i> Meu Perfil</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="indexAdm.php">Página Inical</a>
                    </div>
                </li>
            </ul>
            <!--<form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Cliente - Erro - Sistema" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
            </form>-->
        </div>

        <a class="btn btn-outline-secondary" href="logout.php" role="button"> Sair <i class="fas fa-sign-out-alt"></i> </a>
    </nav>

    <div class="limiter">
        <div class="container-table100">
            <div class="wrap-table100">
                <div class="table">
                    <!--Cabeçalho-->
                    <div class="row header">
                        <div class="cell">
                            ID
                        </div>
                        <div class="cell">
                            Nome
                        </div>
                        <div class="cell">
                            Telefone
                        </div>
                        <div class="cell">
                            Email
                        </div>
                        <div class="cell">
                            Pedido
                        </div>
                        <div class="cell">
                            Ação
                        </div>
                    </div>

                    <!--Final Cabeçalho-->

                    <!--Conteúdo-->
                    <?php foreach ($dados as $lista) { ?>
                        <div class="row">
                            <div class="cell cell2" data-title="ID">
                                 <?= $lista['cod_pedido'] ?>
                            </div>
                            <div class="cell cell2" data-title="Nome">
                                <?= $lista['nome_pedido'] ?>
                            </div>
                            <div class="cell cell2" data-title="Telefone">
                                <?= $lista['telefone_pedido'] ?>
                            </div>
                            <div class="cell cell2" data-title="Email">
                                <?= $lista['email_pedido'] ?>
                            </div>
                            <div class="cell cell2" data-title="Pedido">
                                <?= $lista['desc_pedido'] ?>
                            </div>
                            <div class="cell cell2" data-title="Excluir">
                                <a class="excluir" href="apagarPedidos.php?cod_pedido=<?= $lista['cod_pedido'] ?>"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </div>
                    <?php } ?>
                    
                    <!--Final Conteúdo-->
                </div>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="js/table_main.js"></script>

</body>

</html>