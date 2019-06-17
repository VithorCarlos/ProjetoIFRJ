<?PHP session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Acesso Administrativo</title>
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Font-->
    <link rel="stylesheet" type="text/css" href="css/sourcesanspro-font.css">
    <!-- Main Style Css -->
    <link rel="stylesheet" type="text/css" href="css/acesso_main.css">
</head>

<body class="form-v8">
    <div class="page-content">
        <div class="form-v8-content">
            <div class="form-left">
                <img src="images/thumadm.jpg" alt="form">
            </div>
            <div class="form-right">
                <div class="tab">
                    <div class="tab-inner">
                        <button class="tablinks" onclick="openCity(event, 'administrador')" id="defaultOpen">ADMINISTRADOR</button>
                    </div>
                    <div class="tab-inner">
                        <button class="tablinks" onclick="openCity(event, 'membros')">MEMBROS</button>
                    </div>
                </div>
                <?php session_destroy(); ?>
                <form class="form-detail" action="loginAdm.php" method="POST">
                    <div class="tabcontent" id="administrador">
                        <div class="form-row">
                            <label class="form-row-inner">
                                <input type="text" name="login_adm" id="login_adm" class="input-text" required>
                                <span class="label"><b>Login</b></span>
                                <span class="border"></span>
                            </label>
                        </div>

                        <div class="form-row">
                            <label class="form-row-inner">
                                <input type="password" name="senha_adm" id="senha_adm" class="input-text" required>
                                <span class="label"><b>Senha</b></span>
                                <span class="border"></span>
                            </label>
                        </div>

                        <?php
                        // verifica se a variavel session['invalido'] existe, se existir mostra o erro
                        if (isset($_SESSION["invalido"])) {
                            $dados_invalidos = $_SESSION["invalido"];
                            echo "<span class='invalido'
                                            style='font-size: 16px; color:#e65e5e; display:block;'>
                                                $dados_invalidos</span>";
                        }
                        ?>

                        <div class="form-row-last">
                            <input type="submit" class="register" value="Entrar">
                        </div>
                    </div>
                </form>

                <form class="form-detail" action="loginMembro.php" method="POST">
                    <div class="tabcontent" id="membros">
                        <div class="form-row">
                            <label class="form-row-inner">
                                <input type="text" name="login_membro" id="login_adm" class="input-text" required>
                                <span class="label"><b>Usuario</b></span>
                                <span class="border"></span>
                            </label>
                        </div>

                        <div class="form-row">
                            <label class="form-row-inner">
                                <input type="password" name="senha_membro" id="senha_adm" class="input-text" required>
                                <span class="label"><b>Senha</b></span>
                                <span class="border"></span>
                            </label>
                        </div>
                        <?php
                        // verifica se a variavel session['invalido'] existe, se existir mostra o erro
                        if (isset($_SESSION["invalido"])) {
                            $dados_invalidos = $_SESSION["invalido"];
                            echo "<span class='invalido'
                                            style='font-size: 16px; color:#e65e5e; display:block;'>
                                                $dados_invalidos</span>";
                        }
                        ?>
                        <div class="form-row-last">
                            <input type="submit" class="register" value="Entrar">
                        </div>
                    </div>
                    <a class="retornar" href="index.html">Retornar</a>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
        document.getElementById("defaultOpen").click();
    </script>
</body>

</html>