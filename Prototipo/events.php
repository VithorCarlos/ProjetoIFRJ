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
    </div> <!-- .site-mobile-menu -->


    <div class="site-navbar-wrap js-site-navbar bg-white">

      <div class="container">
        <div class="site-navbar bg-light">
          <div class="py-1">
            <div class="row align-items-center">
              <div class="col-2">
                <h2 class="mb-0 site-logo"><a href="index.php">SIBPP</a></h2>
              </div>
              <div class="col-10">
                <nav class="site-navigation text-right" role="navigation">
                  <div class="container">
                    <!-- d-lg-none -->
                    <div class="d-inline-block  ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu h3"></span></a></div>
                    <!-- d-lg-block -->
                    <ul class="site-menu js-clone-nav d-none">
                      <li>
                        <a href="index.php">Home</a>
                      </li>
                      <!--<li><a href="sermons.html">Sermons</a></li>-->
                      <li>
                        <a href="beliefs.html">Ministérios</a>
                        <ul class="dropdown arrow-top">
                          <!-- <li><a href="beliefs.html">God</a></li>
                          <li><a href="beliefs.html">Humanity</a></li>
                          <li><a href="beliefs.html">Salvation</a></li>
                          <li class="has-children">
                            <a href="beliefs.html">Churches</a>
                            <ul class="dropdown">
                              <li><a href="beliefs.html">America</a></li>
                              <li><a href="beliefs.html">Europe</a></li>
                              <li><a href="beliefs.html">Asia</a></li>
                              <li><a href="beliefs.html">Africa</a></li>

                            </ul>
                          </li>-->

                        </ul>
                      </li>
                      <li class="active"><a href="events.php">Eventos</a></li>
                      <li><a href="about.html">Sobre-nós</a></li>
                      <li><a href="contact.html">Fale Conosco</a></li>
                      <li><a href="acessosistema.php">Login</a></li>
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

      <div class="site-blocks-cover overlay" style="background-image: url(images/thumbevento.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <span class="caption mb-3">Bem-Vindo ^^</span>
              <h1 class="mb-4">Nossos Eventos :)</h1>
            </div>
          </div>
        </div>
      </div>

    </div>



    <div class="site-section">
      <div class="container">
        <div class="row">

          <?php
          include 'conexao.php';
          $link = conexao();

          $sql = "select *from evento";

          if ($link) {
            if ($result = $link->query($sql)) {
              while ($row = $result->fetch_assoc()) {
                ?>
                <div class="col-md-6 col-lg-4">
                  <div class="church-service text-center">
                    <a class="d-block mb-3 thumbnail"><img src="images/<?= $row['imagem_evento']; ?>" alt="Image" class="img-fluid" /></a>
                    <h3 class="heading"></h3>
                    <p class="mb-3"></p>
                    <p><?= $row['desc_evento']; ?></p>
                  </div>
                </div>
              <?php
              }
            } else {
              echo "Erro ao executar o comando SQL";
            }
          }
          ?>
          <!--<div class="col-md-6 col-lg-4">
            <div class="church-service text-center">
              <a class="d-block mb-3 thumbnail"><img src="images/eventopastel.jpg" alt="Image"
                  class="img-fluid"></a>
              <h3 class="heading"></h3>
              <p class="mb-3"></p>
              <p>Com o sucesso dos nossos festivais de pastel e pizza, por que não repetir a dose de novo? Mais uma vez
                a SIBPP está realizando o famoso Festival de Pastel!! É a partir das 17h, hein? Não percam!</p>
            </div>
          </div>

         <div class="col-md-6 col-lg-4">
            <div class="church-service text-center">
              <a class="d-block mb-3 thumbnail"><img src="images/eventofesta.jpg" alt="Image"
                  class="img-fluid"></a>
              <h3 class="heading"></h3>
              <p class="mb-3"></p>
              <p>Já estamos no mês de Junho e todos pensam na Festa Junina!! E a nossa igreja não ficará de fora! Amanhã
                teremos a nossa Festa da Roça!!! Tragam seus entes queridos, amigos para pular a fogueira e comer milho!
              </p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="church-service text-center">
              <a class="d-block mb-3 thumbnail"><img src="images/eventoluau.jpg" alt="Image"
                  class="img-fluid"></a>
              <h3 class="heading"></h3>
              <p class="mb-3"></p>
              <p>Um dia tranquilo com louvores e bate papo com Deus, vamos aproveitar o nosso pequeno Lual para ficar
                mais próximo do nosso salvador!</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="church-service text-center">
              <a class="d-block mb-3 thumbnail"><img src="images/eventopizza.jpg" alt="Image"
                  class="img-fluid"></a>
              <h3 class="heading"></h3>
              <p class="mb-3"></p>
              <p>O sucesso foi grande com os pastéis e recebemos muitas recomendações pra fazer de pizza!! Oramos e
                oramos e Deus nos permitiu para realizar este evento!! Tragam a família, amigos e conhecidos para
                aproveitar o nosso festival de pizza!</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="church-service text-center">
              <a class="d-block mb-3 thumbnail"><img src="images/eventopastel2.jpeg" alt="Image"
                  class="img-fluid"></a>
              <h3 class="heading"></h3>
              <p class="mb-3"></p>
              <p>Estamos realizando um evento onde podem levar a família para comer pastéis e tomar caldo de cana!
                Gostoso, né? Leva a criançada, os amigos e vamos aproveitar!!!</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="church-service text-center">
              <a class="d-block mb-3 thumbnail"><img src="images/eventoamigo.jpg" alt="Image"
                  class="img-fluid"></a>
              <h3 class="heading"></h3>
              <p class="mb-3"></p>
              <p>Tem um amigo afastado da igreja? Ou um amigo que não conhece a Deus? Que tal trazê-lo e fazer com que o
                Espírito Santo o mostre quem foi que o salvou de todos os pecados?! Neste culto está destinado aos
                amigos, tragam-nos para conhecer a casa do nosso Pai Celestial.</p>
            </div>
          </div>
        </div> -->

          <div class="row mt-5">
            <div class="col-md-12 text-center">
              <div class="site-block-27">
                <!--<ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>-->
              </div>
            </div>
          </div>

        </div>
      </div>



      <!--<div class="py-5 bg-primary upcoming-events">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <span class="caption mb-3 bg-warning px-4">Upcoming Events</span>
            <h2 class="text-white">December Camp Meeting</h2>
          </div>
          <div class="col-md-6">
            <span class="caption">The camp meeting will start in</span>
            <div id="date-countdown"></div>    
          </div>
        </div>
        
      </div>-->
    </div>

    <div class="py-5 quick-contact-info">
      <div class="container">
        <div class="row">
          <div class="col-md-4 text-center">
            <div>
              <span class="icon-room text-white h2 d-block"></span>
              <h2>Localização</h2>
              <p class="mb-0"> Porto da Pedra, São Gonçalo. <br> Rua Bernadino Gonçalvez, nº 51</p>
            </div>
          </div>
          <div class="col-md-4 text-center">
            <div>
              <span class="icon-clock-o text-white h2 d-block"></span>
              <h2>Cultos</h2>
              <p class="mb-0">Quarta - 19h às 20h <br> Domingo: 8h ás 11h <br> Domingo: 19h ás 20:30h</p>
            </div>
          </div>
          <div class="col-md-4 text-center">
            <div>
              <span class="icon-comments text-white h2 d-block"></span>
              <h2>Entre em Contato</h2>
              <p class="mb-0">sibemportodapedra@gmail.com <br> cojasibapp@gmail.com <br> Telefone: 21 98376-3017 </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <footer class="site-footer" style="background-image: url('images/hero_1.jpg');">
      <div class="container">
        <div class="row pt-1 mt-1 text-center">
          <div class="col-md-12">
            <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy; Todos os direitos reservados
            </p>
          </div>
        </div>
      </div>
  </div>
  </footer>
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
  <script src="js/aos.js"></script>


  <script src="js/mediaelement-and-player.min.js"></script>

  <script src="js/main.js"></script>


  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var mediaElements = document.querySelectorAll('video, audio'),
        total = mediaElements.length;

      for (var i = 0; i < total; i++) {
        new MediaElementPlayer(mediaElements[i], {
          pluginPath: 'https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/',
          shimScriptAccess: 'always',
          success: function() {
            var target = document.body.querySelectorAll('.player'),
              targetTotal = target.length;
            for (var j = 0; j < targetTotal; j++) {
              target[j].style.visibility = 'visible';
            }
          }
        });
      }
    });
  </script>

</body>

</html>