<?php
include('validarMembro.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Cadastro de Membros</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/membro.css">
    <link rel="stylesheet" type="text/css" href="css/membro_util.css">
    <!--===============================================================================================-->
</head>

<body>
    <div class="container-contact100">
        <div class="wrap-contact100">

            <form class="contact100-form validate-form" action="cadastro_membro.php" method="POST">
                <?php session_destroy(); ?>

                <span class="contact100-form-title">
                    CADASTRO DE MEMBROS
                </span>
                <div class="wrap-input100 validate-input" data-validate="Campo Obrigatório">
                    <label class="label-input100" for="nome_membro">Nome</label>
                    <input id="nome_membro" class="input100" type="text" name="nome_membro" placeholder="Digite seu nome...">
                    <span class="focus-input100"></span>
                </div>

                <?php if (isset($_SESSION["login_existente"])) : ?>
                    <?php $login_cadastrado = $_SESSION["login_existente"]; ?>
                    <span style="margin-left: 5%;
                                margin-bottom: 2%;
                                color: red;
                                font-family: Poppins-Medium;
                                font-size: 15px;
                                display: block;">
                        <?php echo $login_cadastrado ?>
                    </span>
                <?php endif ?>

                <div class="wrap-input100 validate-input" data-validate="Campo Obrigatório">
                    <label class="label-input100" for="cpf_membro">CPF</label>
                    <input id="cpf_membro" class="input100" type="text" name="cpf_membro" placeholder="Digite seu CPF...">
                    <span class="focus-input100"></span>
                </div>

                <?php if (isset($_SESSION["cpf_existente"])) : ?>
                    <?php $cpf_cadastrado = $_SESSION["cpf_existente"]; ?>
                    <span style="margin-left: 5%;
                                        margin-bottom: 2%;
                                        color: red;
                                        font-family: Poppins-Medium;
                                        font-size: 15px;
                                        display: block;">
                        <?php echo $cpf_cadastrado ?>
                    </span>
                <?php endif ?>

                <div class="wrap-input100 validate-input" data-validate="Campo Obrigatório">
                    <label class="label-input100" for="senha_membro">Senha</label>
                    <input id="senha_membro" class="input100" type="password" name="senha_membro" placeholder="Digite sua senha...">
                    <span class="focus-input100"></span>
                </div>


                <div class="wrap-input100 validate-input" data-validate="Campo Obrigatório">
                    <label class="label-input100" for="senha_membro2">Confirmação de senha</label>
                    <input id="senha_membro2" class="input100" type="password" name="senha_membro2" placeholder="Confirme sua senha...">
                    <span class="focus-input100"></span>
                </div>

                <?php if (isset($_SESSION["senhas_diferentes"])) : ?>
                    <?php $senhas_diferentes = $_SESSION["senhas_diferentes"]; ?>
                    <span style="margin-left: 5%;
                                    margin-bottom: 2%;
                                    color: red;
                                    font-family: Poppins-Medium;
                                    font-size: 15px;
                                    display: block;">
                        <?php echo $senhas_diferentes ?>
                    </span>
                <?php endif ?>

                <div class="wrap-input100 validate-input" data-validate="Email válido requirido: ex@abc.xyz">
                    <label class="label-input100" for="email_membro">Email</label>
                    <input id="email_membro" class="input100" type="text" name="email_membro" placeholder="Digite seu email...">
                    <span class="focus-input100"></span>
                </div>

                <?php if (isset($_SESSION["email_existente"])) : ?>
                    <?php $email_cadastrado = $_SESSION["email_existente"]; ?>
                    <span style="margin-left: 5%;
                                    margin-bottom: 2%;
                                    color: red;
                                    font-family: Poppins-Medium;
                                    font-size: 15px;
                                    display: block;">
                        <?php echo $email_cadastrado ?>
                    </span>
                <?php endif ?>

                <div class="wrap-input100 validate-input" data-validate="Email válido requirido: ex@abc.xyz">
                    <label class="label-input100" for="telefone_membro">Telefone</label>
                    <input id="telefone_membro" class="input100" type="text" name="telefone_membro" placeholder="Digite seu telefone...">
                    <span class="focus-input100"></span>
                </div>

                <?php if (isset($_SESSION["telefone_existente"])) : ?>
                    <?php $telefone_cadastrado = $_SESSION["telefone_existente"]; ?>
                    <span style="margin-left: 5%;
                                    margin-bottom: 2%;
                                    color: red;
                                    font-family: Poppins-Medium;
                                    font-size: 15px;
                                    display: block;">
                        <?php echo $telefone_cadastrado ?>
                    </span>
                <?php endif ?>

                <div class="container-contact100-form-btn">
                    <button class="contact100-form-btn" name="registrar_membro" type="submit">
                        Cadastrar
                    </button>
                </div>
                <span><a class="spanclass" href="indexAdm.php">Cancelar Cadastro</a></span>


                <!--<div class="contact100-form-social flex-c-m">
                    <a href="#" class="contact100-form-social-item flex-c-m bg1 m-r-5">
                        <i class="fa fa-facebook-f" aria-hidden="true"></i>
                    </a>

                    <a href="#" class="contact100-form-social-item flex-c-m bg2 m-r-5">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>

                    <a href="#" class="contact100-form-social-item flex-c-m bg3">
                        <i class="fa fa-youtube-play" aria-hidden="true"></i>
                    </a>
                </div>-->
            </form>

            <div class="contact100-more flex-col-c-m" style="background-image: url('images/thumbmembro.jpg');">
            </div>
        </div>
    </div>





    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <script>
        $(".js-select2").each(function() {
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        })
        $(".js-select2").each(function() {
            $(this).on('select2:open', function(e) {
                $(this).parent().next().addClass('eff-focus-selection');
            });
        });
        $(".js-select2").each(function() {
            $(this).on('select2:close', function(e) {
                $(this).parent().next().removeClass('eff-focus-selection');
            });
        });
    </script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/membro_main.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
</body>

</html>