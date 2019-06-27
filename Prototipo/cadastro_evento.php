<?php 
include ('validarEvento.php'); 
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Cadastro de Eventos</title>
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
    <link rel="stylesheet" type="text/css" href="css/evento.css">
    <link rel="stylesheet" type="text/css" href="css/membro_util.css">
    <!--===============================================================================================-->
</head>

<body>
    <div class="container-contact100">
        <div class="wrap-contact100">
            <form class="contact100-form validate-form" action="cadastro_evento.php" method="POST">
               
                <span class="contact100-form-title">
					CADASTRO DE EVENTOS
				</span>


                <div class="wrap-input100 validate-input" data-validate="Campo Obrigatório">
                    <label class="label-input100" for="nome_evento">Nome do Evento</label>
                    <input id="nome_evento" class="input100" type="text" name="nome_evento" maxlength="50" placeholder="Nome do evento...">
                    <span class="focus-input100"></span>
                </div>

                <?php if (isset($_SESSION["evento_existente"])) : ?>
                    <?php $evento_cadastrado = $_SESSION["evento_existente"]; ?>
                    <span style="margin-left: 5%;
                                margin-bottom: 2%;
                                color: red;
                                font-family: Poppins-Medium;
                                font-size: 15px;
                                display: block;">
                        <?php echo $evento_cadastrado ?>
                    </span>
                <?php endif ?>

                <div class="wrap-input100 validate-input" data-validate="Campo Obrigatório">
                    <label class="label-input100" for="data_evento">Data do Evento</label>
                    <input id="data_evento" class="input100" type="date" name="data_evento" placeholder="Data do evento...">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Campo Obrigatório">
                    <label class="label-input100" for="hora_evento">Hora do Evento</label>
                    <input id="hora_evento" class="input100" type="time" name="hora_evento" placeholder="Hora do evento...">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input200 validate-input" data-validate="Campo Obrigatório">
                    <label class="label-input200">ENDEREÇO</label>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Campo Obrigatório">
                    <label class="label-input100" for="text">CEP</label>
                    <input id="cep_evento" class="input100" type="text" name="cep_evento" required pattern="\d{5}-?\d{3}" placeholder="CEP do evento...">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100">
                    <div class="label-input100">Estado</div>
                    <div>
                        <select class="js-select2" name="estado_evento">
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                            <option value="ES">Estrangeiro</option>
						</select>
                        <div class="dropDownSelect2"></div>
                    </div>
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Campo Obrigatório">
                    <label class="label-input100" for="cidade_evento">Cidade</label>
                    <input id="cidade_evento" class="input100" type="text" name="cidade_evento" maxlength="50" placeholder="Cidade do evento...">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Campo Obrigatório">
                    <label class="label-input100" for="bairro_evento">Bairro</label>
                    <input id="bairro_evento" class="input100" type="text" name="bairro_evento" maxlength="25" placeholder="Bairro do evento...">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Campo Obrigatório">
                    <label class="label-input100" for="rua_evento">Rua</label>
                    <input id="rua_evento" class="input100" type="text" name="rua_evento" maxlength="100" placeholder="Rua do evento...">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Campo Obrigatório">
                    <label class="label-input100" for="complemento_evento">Complemento</label>
                    <input id="complemento_evento" class="input100" type="text" name="complemento_evento" maxlength="50" placeholder="Complemento do evento...">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Message is required">
                    <label class="label-input100" for="desc_evento">Descrição</label>
                    <textarea id="desc_evento" class="input100" name="desc_evento" placeholder="O que irá ocorrer neste evento?" maxlength="400"></textarea>
                    <span class="focus-input100"></span>
                </div>

                <?php if (isset($_SESSION["descricao_existente"])) : ?>
                    <?php $descricao_cadastrado = $_SESSION["descricao_existente"]; ?>
                    <span style="margin-left: 5%;
                                margin-bottom: 2%;
                                color: red;
                                font-family: Poppins-Medium;
                                font-size: 15px;
                                display: block;">
                        <?php echo $descricao_cadastrado ?>
                    </span>
                <?php endif ?>

                <!--<div class="wrap-input100 validate-input" data-validate="Campo Obrigatório">
                    <label class="label-input100" for="name">Endereço</label>
                    <input id="nome" class="input100" type="text" name="nome" placeholder="Digite seu nome...">
                    <span class="focus-input100"></span>
                </div>-->

                <div class="container-contact100-form-btn">
                    <button class="contact100-form-btn" name="registrar_evento">
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

            <div class="contact100-more flex-col-c-m" style="background-image: url('images/cadastroevento.jpg');">
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