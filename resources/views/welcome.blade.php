<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="img/favicon.png">
  <title>Rifas Jr</title>
  <link rel="stylesheet" href="{{asset('css/plugins.css')}}">
  <link rel="stylesheet" href="{{asset('css/theme/blue.css')}}">
  <link rel="preload" href="{{asset('css/font/dm.css')}}" as="style" onload="this.rel='stylesheet'">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>

<body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v11.0&appId=3486713101388523&autoLogAppEvents=1" nonce="fcfPVicu"></script>
  <div class="content-wrapper">
    @include("partials.navbar")

    <section class="wrapper bg-light">
        <div class="container py-14 py-md-16">
          <h2 class="display-5 mb-7 text-center">Clients Carousel</h2>
          <div class="carousel owl-carousel clients" data-margin="30" data-loop="true" data-dots="false" data-autoplay="true" data-autoplay-timeout="3000" data-responsive='{"0":{"items": "2"}, "768":{"items": "4"}, "992":{"items": "5"}, "1200":{"items": "6"}, "1400":{"items": "7"}}'>
            @include('home.item-carousel')
          </div>
          <!-- /.owl-carousel -->
        </div>
        <!-- /.container -->
      </section>

      <section class="wrapper bg-light wrapper-border">
        <div class="container py-14 py-md-16">
            <h2 class="display-4 mb-5 text-center" id="preguntas">PREGUNTAS FRECUENTES</h2>
                <div class="row gx-md-8 gx-xl-12 gy-10">
                    <div class="col-lg-6">
                      <div class="d-flex flex-row">
                        <div>
                          <span class="icon btn btn-sm btn-circle btn-primary disabled me-5"><i class="uil uil-comment-exclamation"></i></span>
                        </div>
                        <div>
                          <h4>¿CÓMO SE ELIGE A LOS GANADORES?</h4>
                          <p class="mb-3">Todos nuestros sorteos se realizan en coordinación con los sorteos de la <a target="_blank" href="http://www.lotenal.gob.mx/">Lotería Nacional</a> para la Asistencia Pública mexicana.</p>
                          <p class="mb-0">El participante ganador de Rifas Junior será el participante cuyo número de boleto coincida con las últimas cuatro cifras del primer premio ganador de alguno de los sorteos de la Lotería Nacional.</p>
                        </div>
                      </div>
                    </div>
                    <!-- /column -->
                    <div class="col-lg-6">
                      <div class="d-flex flex-row">
                        <div>
                          <span class="icon btn btn-sm btn-circle btn-primary disabled me-5"><i class="uil uil-comment-exclamation"></i></span>
                        </div>
                        <div>
                          <h4>¿QUÉ PROBABILIDADES TENGO DE GANAR?</h4>
                          <p class="mb-3">En Rifas Junior solamente emitimos un máximo de 3,333 boletos por cada sorteo.</p>
                        </div>
                      </div>
                    </div>
                    <!-- /column -->
                    <div class="col-lg-6">
                      <div class="d-flex flex-row">
                        <div>
                          <span class="icon btn btn-sm btn-circle btn-primary disabled me-5"><i class="uil uil-comment-exclamation"></i></span>
                        </div>
                        <div>
                          <h4>¿QUÉ SUCEDE CUANDO EL NÚMERO GANADOR ES UN BOLETO NO VENDIDO?</h4>
                          <p class="mb-3">Se elige un nuevo ganador realizando la misma dinámica en otra fecha cercana (se anunciará la nueva fecha).</p>
                          <p class="mb-3">Esto significa que, ¡Tendrías el doble de oportunidades de ganar con tu mismo boleto!</p>
                        </div>
                      </div>
                    </div>
                    <!-- /column -->
                    <div class="col-lg-6">
                      <div class="d-flex flex-row">
                        <div>
                          <span class="icon btn btn-sm btn-circle btn-primary disabled me-5"><i class="uil uil-comment-exclamation"></i></span>
                        </div>
                        <div>
                          <h4>¿DÓNDE SE PUBLICA A LOS GANADORES?</h4>
                          <p class="mb-3">Los números ganadores, así como la entrega de premios, se estarán publicando en ésta página y en nuestras redes sociales.</p>
                          <p class="mb-3">¡Síguenos en redes sociales para estar al tanto de los ganadores y próximos sorteos!</p>
                        </div>
                      </div>
                    </div>
                    <!-- /column -->
                  </div>
            <!--/.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->

    <section class="wrapper bg-light wrapper-border">
        <div class="container py-14 py-md-16">
            <div class="row gy-10 gy-sm-13 gx-lg-3 align-items-center">
                <div class="col-md-8 col-lg-6 position-relative">
                    <div class="shape bg-dot primary rellax w-17 h-21" data-rellax-speed="1"
                        style="top: -2rem; left: -1.9rem;"></div>
                    <div class="shape rounded bg-soft-primary rellax d-md-block" data-rellax-speed="0"
                        style="bottom: -1.8rem; right: -1.5rem; width: 85%; height: 90%; "></div>
                    <figure class="rounded"><img data-cue="flipInY" src="{{asset("img/corvette2.jpg")}}" alt="" /></figure>
                </div>
                <!--/column -->
                <div class="col-lg-5 col-xl-4 offset-lg-1 text-center">
                    <h2 class="h1 mb-3" id="nosotros">Nosotros</h2>
                    <p class="lead fs-lg mb-6">Rifas Junior</p>
                    <p class="lead fs-lg mb-6">¡Trae para ti los mejores sorteos de toda la república!</p>
                    <p class="lead fs-lg mb-6">Sorteos legales y avalados en base a resultados emitidos por Lotería Nacional Mexicana</p>
                </div>
                <!--/column -->
            </div>
            <!--/.row -->
        </div>
        <!-- /.container -->
    </section>

    <section class="wrapper bg-light wrapper-border">
        <div class="container py-14 py-md-16">
          <div class="row">
            <div class="col-lg-4">
              <h2 class="fs-15 text-uppercase text-primary mb-3" id="contacto">CONTÁCTANOS</h2>
              <h3 class="display-4 mb-9 pe-xl-15">Whatsapp: <br> (614) 351 6233</h3>
            </div>
            <!-- /column -->
            <div class="col-lg-8">
              <div class="row align-items-center counter-wrapper gy-6 text-center">
                <div class="col-md-3">
                  <img src="{{asset('img/facebookico.png')}}" class="svg-inject icon-svg icon-svg-lg text-primary mb-3" alt="" />
                  <p>Facebook</p>
                </div>
                <!--/column -->
                <div class="col-md-3">
                  <img src="{{asset('img/whatsappico.png')}}" class="svg-inject icon-svg icon-svg-lg text-primary mb-3" alt="" />
                  <p>Whatsapp</p>
                </div>
                <!--/column -->
                <div class="col-md-6">
                    <div class="fb-page"
                        data-href="https://www.facebook.com/facebook"
                        data-width="380"
                        data-hide-cover="false"
                        data-show-facepile="false">
                    </div>
                </div>
                <!--/column -->
              </div>
              <!--/.row -->
            </div>
            <!-- /column -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container -->
      </section>

      <section class="wrapper bg-light wrapper-border">
        <div class="container py-5">
          <div class="row">
            <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2 mx-auto text-center">
              <h2 class="fs-15 text-uppercase text-muted mb-3">
                  <a href="#!">Aviso de privacidad</a>
              </h2>
            </div>
          </div>
        </div>
        <!-- /.container -->
      </section>
  </div>
  <!-- /.content-wrapper -->
  <div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
      <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
  <script src="{{asset('js/plugins.js')}}"></script>
  <script src="{{asset('js/theme.js')}}"></script>
</body>

</html>
