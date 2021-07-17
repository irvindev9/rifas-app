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
  <div class="content-wrapper">
    @include("partials.navbar")

    <section class="wrapper bg-light">
      <div class="container pt-8 pt-md-14">
        <div class="row gx-lg-0 gx-xl-8 gy-10 gy-md-13 gy-lg-0 mb-7 mb-md-10 mb-lg-16 align-items-center">
          <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-1 position-relative order-lg-2" data-cue="zoomIn">
            <div class="shape bg-dot primary rellax w-17 h-19" data-rellax-speed="1" style="top: -1.7rem; left: -1.5rem;"></div>
            <div class="shape rounded bg-soft-primary rellax d-md-block" data-rellax-speed="0" style="bottom: -1.8rem; right: -0.8rem; width: 85%; height: 90%;"></div>
            <figure class="rounded"><img src="{{asset("img/corvette.jpg")}}" srcset="img/photos/about7@2x.jpg 2x" alt="" /></figure>
          </div>
          <!--/column -->
          <div class="col-lg-5 mt-lg-n10 text-center text-lg-start" data-cues="slideInDown" data-group="page-title" data-delay="600">
            <h1 class="display-1 mb-5">Rifas Junior te ofrece la posibilidad de ganar un</h1>
            <p class="lead fs-25 lh-sm mb-7 px-md-10 px-lg-0">CORVETTE STINGRAY 2021</p>
            <div class="d-flex justify-content-center justify-content-lg-start" data-cues="slideInDown" data-group="page-title-buttons" data-delay="900">
              <span><a href="#" class="btn btn-lg btn-primary rounded-pill me-2">Comprar boletos</a></span>
              <span><a href="#" class="btn btn-lg btn-outline-primary rounded-pill">Más información</a></span>
            </div>
          </div>
          <!--/column -->
        </div>
        <!-- /.row -->
        <section class="wrapper bg-light wrapper-border">
            <div class="container py-14 py-md-16">
                <h2 class="display-4 mb-5 text-center">PREGUNTAS FRECUENTES</h2>
                    <div class="row gx-md-8 gx-xl-12 gy-10">
                        <div class="col-lg-6">
                          <div class="d-flex flex-row">
                            <div>
                              <span class="icon btn btn-sm btn-circle btn-primary disabled me-5"><i class="uil uil-comment-exclamation"></i></span>
                            </div>
                            <div>
                              <h4>¿CÓMO SE ELIGE A LOS GANADORES?</h4>
                              <p class="mb-3">Todos nuestros sorteos se realizan en coordinación con los sorteos de la Lotería Nacional para la Asistencia Pública mexicana.</p>
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
        <!-- /div -->
        <div class="row">
          <div class="col-md-10 col-lg-8 col-xl-7 col-xxl-6 mx-auto text-center">
            <h2 class="fs-15 text-uppercase text-muted mb-3">What We Do?</h2>
            <h3 class="display-4 mb-10">The service we offer is specifically designed to meet your needs.</h3>
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
        <div class="row gx-md-8 gy-8 text-center mb-14 mb-md-17">
          <div class="col-md-6 col-lg-3">
            <div class="icon btn btn-circle btn-lg btn-primary disabled mb-5"> <i class="uil uil-phone-volume"></i> </div>
            <h4>24/7 Support</h4>
            <p class="mb-3">Etiam porta sem malesuada magna mollis euismod. Donec ullamcorper nulla non metus auctor fringilla.</p>
            <a href="#" class="more hover">Learn More</a>
          </div>
          <!--/column -->
          <div class="col-md-6 col-lg-3">
            <div class="icon btn btn-circle btn-lg btn-primary disabled mb-5"> <i class="uil uil-shield-exclamation"></i> </div>
            <h4>Secure Payments</h4>
            <p class="mb-3">Etiam porta sem malesuada magna mollis euismod. Donec ullamcorper nulla non metus auctor fringilla.</p>
            <a href="#" class="more hover">Learn More</a>
          </div>
          <!--/column -->
          <div class="col-md-6 col-lg-3">
            <div class="icon btn btn-circle btn-lg btn-primary disabled mb-5"> <i class="uil uil-laptop-cloud"></i> </div>
            <h4>Daily Updates</h4>
            <p class="mb-3">Etiam porta sem malesuada magna mollis euismod. Donec ullamcorper nulla non metus auctor fringilla.</p>
            <a href="#" class="more hover">Learn More</a>
          </div>
          <!--/column -->
          <div class="col-md-6 col-lg-3">
            <div class="icon btn btn-circle btn-lg btn-primary disabled mb-5"> <i class="uil uil-chart-line"></i> </div>
            <h4>Market Research</h4>
            <p class="mb-3">Etiam porta sem malesuada magna mollis euismod. Donec ullamcorper nulla non metus auctor fringilla.</p>
            <a href="#" class="more hover">Learn More</a>
          </div>
          <!--/column -->
        </div>
        <!--/.row -->
        <div class="row gy-10 gy-sm-13 gx-lg-3 align-items-center mb-14 mb-md-17 mb-lg-19">
          <div class="col-md-8 col-lg-6 position-relative">
            <div class="shape bg-line red rounded-circle rellax w-18 h-18" data-rellax-speed="1" style="top: -2.2rem; left: -2.4rem;"></div>
            <div class="shape rounded bg-soft-primary rellax d-md-block" data-rellax-speed="0" style="bottom: -1.8rem; right: -1.5rem; width: 85%; height: 90%; "></div>
            <figure class="rounded"><img src="img/photos/about9.jpg" srcset="img/photos/about9@2x.jpg 2x" alt="" /></figure>
          </div>
          <!--/column -->
          <div class="col-lg-5 col-xl-4 offset-lg-1">
            <h2 class="display-4 mb-3">How It Works?</h2>
            <p class="lead fs-lg mb-6">So here are three working steps why our valued customers choose us.</p>
            <div class="d-flex flex-row mb-6">
              <div>
                <span class="icon btn btn-circle btn-primary disabled me-5"><span class="number fs-18">1</span></span>
              </div>
              <div>
                <h4 class="mb-1">Collect Ideas</h4>
                <p class="mb-0">Nulla vitae elit libero pharetra augue dapibus. Praesent commodo cursus.</p>
              </div>
            </div>
            <div class="d-flex flex-row mb-6">
              <div>
                <span class="icon btn btn-circle btn-primary disabled me-5"><span class="number fs-18">2</span></span>
              </div>
              <div>
                <h4 class="mb-1">Data Analysis</h4>
                <p class="mb-0">Vivamus sagittis lacus vel augue laoreet. Etiam porta sem malesuada magna.</p>
              </div>
            </div>
            <div class="d-flex flex-row">
              <div>
                <span class="icon btn btn-circle btn-primary disabled me-5"><span class="number fs-18">3</span></span>
              </div>
              <div>
                <h4 class="mb-1">Finalize Product</h4>
                <p class="mb-0">Cras mattis consectetur purus sit amet. Aenean lacinia bibendum nulla sed.</p>
              </div>
            </div>
          </div>
          <!--/column -->
        </div>
        <!--/.row -->
        <div class="row">
          <div class="col-lg-9 col-xl-8 col-xxl-7 mx-auto text-center">
            <h2 class="fs-15 text-uppercase text-muted mb-3">Latest Projects</h2>
            <h3 class="display-4 mb-10">Check out some of our awesome projects with creative ideas and great design.</h3>
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
      <div class="container-fluid px-md-6">
        <div class="carousel owl-carousel blog grid-view mb-16 mb-md-19" data-margin="30" data-nav="true" data-dots="true" data-autoplay="false" data-autoplay-timeout="5000" data-responsive='{"0":{"items": "1"}, "768":{"items": "2"}, "1500":{"items": "3"}}'>
          <div class="item">
            <figure class="rounded"><img src="img/photos/pp10.jpg" alt="" /><a class="item-link" href="single-project.html"><i class="uil uil-link"></i></a></figure>
          </div>
          <!-- /.item -->
          <div class="item">
            <figure class="rounded"><img src="img/photos/pp11.jpg" alt="" /><a class="item-link" href="single-project2.html"><i class="uil uil-link"></i></a></figure>
          </div>
          <!-- /.item -->
          <div class="item">
            <figure class="rounded"><img src="img/photos/pp12.jpg" alt="" /><a class="item-link" href="single-project3.html"><i class="uil uil-link"></i></a></figure>
          </div>
          <!-- /.item -->
          <div class="item">
            <figure class="rounded"><img src="img/photos/pp13.jpg" alt="" /><a class="item-link" href="single-project.html"><i class="uil uil-link"></i></a></figure>
          </div>
          <!-- /.item -->
          <div class="item">
            <figure class="rounded"><img src="img/photos/pp14.jpg" alt="" /><a class="item-link" href="single-project2.html"><i class="uil uil-link"></i></a></figure>
          </div>
          <!-- /.item -->
          <div class="item">
            <figure class="rounded"><img src="img/photos/pp15.jpg" alt="" /><a class="item-link" href="single-project3.html"><i class="uil uil-link"></i></a></figure>
          </div>
          <!-- /.item -->
          <div class="item">
            <figure class="rounded"><img src="img/photos/pp16.jpg" alt="" /><a class="item-link" href="single-project.html"><i class="uil uil-link"></i></a></figure>
          </div>
          <!-- /.item -->
        </div>
        <!-- /.owl-carousel -->
      </div>
      <!-- /.container-fluid -->
      <div class="container">
        <div class="row gy-10 gy-sm-13 gx-lg-3 align-items-center mb-14 mb-md-17 mb-lg-19">
          <div class="col-md-8 col-lg-6 position-relative light-gallery-wrapper">
            <a href="https://vimeo.com/374265101" class="btn btn-circle btn-primary btn-play ripple mx-auto mb-5 lightbox position-absolute" style="top:50%; left: 50%; transform: translate(-50%,-50%); z-index:3;"><i class="icn-caret-right"></i></a>
            <div class="shape rounded bg-soft-primary rellax d-md-block" data-rellax-speed="0" style="bottom: -1.8rem; right: -1.5rem; width: 85%; height: 90%; "></div>
            <figure class="rounded"><img src="img/photos/about12.jpg" srcset="img/photos/about12@2x.jpg 2x" alt=""></figure>
          </div>
          <!--/column -->
          <div class="col-lg-5 offset-lg-1">
            <h2 class="fs-15 text-uppercase text-muted mb-3">Who Are We?</h2>
            <h3 class="display-4 mb-6">Company that believes in the power of creative strategy.</h3>
            <p class="mb-6">Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>
            <div class="row gy-3 gx-xl-8">
              <div class="col-xl-6">
                <ul class="icon-list bullet-bg bullet-soft-primary mb-0">
                  <li><span><i class="uil uil-check"></i></span><span>Aenean eu leo quam ornare curabitur blandit tempus.</span></li>
                  <li class="mt-3"><span><i class="uil uil-check"></i></span><span>Nullam quis risus eget urna mollis ornare donec elit.</span></li>
                </ul>
              </div>
              <!--/column -->
              <div class="col-xl-6">
                <ul class="icon-list bullet-bg bullet-soft-primary mb-0">
                  <li><span><i class="uil uil-check"></i></span><span>Etiam porta sem malesuada magna mollis euismod.</span></li>
                  <li class="mt-3"><span><i class="uil uil-check"></i></span><span>Fermentum massa vivamus faucibus amet euismod.</span></li>
                </ul>
              </div>
              <!--/column -->
            </div>
            <!--/.row -->
          </div>
          <!--/column -->
        </div>
        <!--/.row -->
        <div class="row gx-lg-8 gx-xl-12 gy-10 mb-16 mb-md-17 mb-xl-20 align-items-center">
          <div class="col-lg-4">
            <h2 class="fs-15 text-uppercase text-muted mb-3">Meet the Team</h2>
            <h3 class="display-5 mb-5">Save your time and money by choosing our professional team.</h3>
            <p>Donec id elit non mi porta gravida at eget metus. Morbi leo risus, porta ac consectetur ac, vestibulum at eros tempus porttitor.</p>
            <a href="#" class="btn btn-primary rounded-pill mt-3">See All Members</a>
          </div>
          <!--/column -->
          <div class="col-lg-8">
            <div class="carousel owl-carousel text-center" data-margin="30" data-dots="true" data-autoplay="false" data-autoplay-timeout="5000" data-responsive='{"0":{"items": "1"}, "768":{"items": "2"}, "992":{"items": "2"}, "1200":{"items": "3"}}'>
              <div class="item">
                <img class="rounded-circle w-20 mx-auto mb-4" src="img/avatars/t1.jpg" srcset="img/avatars/t1@2x.jpg 2x" alt="" />
                <h4 class="mb-1">Cory Zamora</h4>
                <div class="meta mb-2">Marketing Specialist</div>
                <p class="mb-2">Etiam porta sem magna malesuada mollis.</p>
                <nav class="nav social justify-content-center text-center mb-0">
                  <a href="#"><i class="uil uil-twitter"></i></a>
                  <a href="#"><i class="uil uil-slack"></i></a>
                  <a href="#"><i class="uil uil-linkedin"></i></a>
                </nav>
                <!-- /.social -->
              </div>
              <!-- /.item -->
              <div class="item">
                <img class="rounded-circle w-20 mx-auto mb-4" src="img/avatars/t2.jpg" srcset="img/avatars/t2@2x.jpg 2x" alt="" />
                <h4 class="mb-1">Coriss Ambady</h4>
                <div class="meta mb-2">Financial Analyst</div>
                <p class="mb-2">Aenean eu leo quam. Pellentesque ornare lacinia.</p>
                <nav class="nav social justify-content-center text-center mb-0">
                  <a href="#"><i class="uil uil-youtube"></i></a>
                  <a href="#"><i class="uil uil-facebook-f"></i></a>
                  <a href="#"><i class="uil uil-dribbble"></i></a>
                </nav>
                <!-- /.social -->
              </div>
              <!-- /.item -->
              <div class="item">
                <img class="rounded-circle w-20 mx-auto mb-4" src="img/avatars/t3.jpg" srcset="img/avatars/t3@2x.jpg 2x" alt="" />
                <h4 class="mb-1">Nikolas Brooten</h4>
                <div class="meta mb-2">Sales Manager</div>
                <p class="mb-2">Donec ornare elit quam porta gravida at eget.</p>
                <nav class="nav social justify-content-center text-center mb-0">
                  <a href="#"><i class="uil uil-linkedin"></i></a>
                  <a href="#"><i class="uil uil-tumblr-square"></i></a>
                  <a href="#"><i class="uil uil-facebook-f"></i></a>
                </nav>
                <!-- /.social -->
              </div>
              <!-- /.item -->
              <div class="item">
                <img class="rounded-circle w-20 mx-auto mb-4" src="img/avatars/t4.jpg" srcset="img/avatars/t4@2x.jpg 2x" alt="" />
                <h4 class="mb-1">Jackie Sanders</h4>
                <div class="meta mb-2">Investment Planner</div>
                <p class="mb-2">Nullam risus eget urna mollis ornare vel eu leo.</p>
                <nav class="nav social justify-content-center text-center mb-0">
                  <a href="#"><i class="uil uil-twitter"></i></a>
                  <a href="#"><i class="uil uil-facebook-f"></i></a>
                  <a href="#"><i class="uil uil-dribbble"></i></a>
                </nav>
                <!-- /.social -->
              </div>
              <!-- /.item -->
              <div class="item">
                <img class="rounded-circle w-20 mx-auto mb-4" src="img/avatars/t5.jpg" srcset="img/avatars/t5@2x.jpg 2x" alt="" />
                <h4 class="mb-1">Tina Geller</h4>
                <div class="meta mb-2">Assistant Buyer</div>
                <p class="mb-2">Vivamus sagittis lacus vel augue laoreet rutrum.</p>
                <nav class="nav social justify-content-center text-center mb-0">
                  <a href="#"><i class="uil uil-facebook-f"></i></a>
                  <a href="#"><i class="uil uil-slack"></i></a>
                  <a href="#"><i class="uil uil-dribbble"></i></a>
                </nav>
                <!-- /.social -->
              </div>
              <!-- /.item -->
            </div>
            <!-- /.owl-carousel -->
          </div>
          <!--/column -->
        </div>
        <!--/.row -->
        <div class="card bg-soft-blue">
          <div class="card-body p-md-10 py-xxl-16 position-relative">
            <div class="position-absolute d-none d-lg-block" style="bottom:0; left:10%; width: 28%; z-index:2">
              <figure><img src="img/photos/co2.png" srcset="img/photos/co2@2x.png 2x" alt=""></figure>
            </div>
            <div class="row gx-md-0 gx-xl-12 text-center">
              <div class="col-lg-7 offset-lg-5 col-xl-6">
                <span class="ratings five mb-3"></span>
                <blockquote class="border-0 fs-lg mb-0">
                  <p>“Fusce dapibus tellus ac cursus commodo, tortor mauris condimentum nibh ut fermentum massa, justo sit amet vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed”</p>
                  <div class="blockquote-details justify-content-center text-center">
                    <div class="info p-0">
                      <h5 class="mb-1">Coriss Ambady</h5>
                      <div class="meta mb-0">Financial Analyst</div>
                    </div>
                  </div>
                </blockquote>
              </div>
              <!-- /column -->
            </div>
            <!-- /.row -->
          </div>
          <!--/.card-body -->
        </div>
        <!--/.card -->
      </div>
      <!--/.container -->
    </section>
    <!-- /section -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="bg-light">
    <div class="container py-13 py-md-15">
      <div class="row gy-6 gy-lg-0">
        <div class="col-md-4 col-lg-3">
          <div class="widget">
            <img class="mb-4" src="img/logo-dark.png" srcset="img/logo-dark@2x.png 2x" alt="" />
            <p class="mb-4">© 2021 Sandbox. <br class="d-none d-lg-block" />All rights reserved.</p>
            <nav class="nav social">
              <a href="#"><i class="uil uil-twitter"></i></a>
              <a href="#"><i class="uil uil-facebook-f"></i></a>
              <a href="#"><i class="uil uil-dribbble"></i></a>
              <a href="#"><i class="uil uil-instagram"></i></a>
              <a href="#"><i class="uil uil-youtube"></i></a>
            </nav>
            <!-- /.social -->
          </div>
          <!-- /.widget -->
        </div>
        <!-- /column -->
        <div class="col-md-4 col-lg-3">
          <div class="widget">
            <h4 class="widget-title mb-3">Get in Touch</h4>
            <address class="pe-xl-15 pe-xxl-17">Moonshine St. 14/05 Light City, London, United Kingdom</address>
            <a href="mailto:#" class="link-body">info@email.com</a><br /> +00 (123) 456 78 90
          </div>
          <!-- /.widget -->
        </div>
        <!-- /column -->
        <div class="col-md-4 col-lg-3">
          <div class="widget">
            <h4 class="widget-title mb-3">Learn More</h4>
            <ul class="list-unstyled text-reset mb-0">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Our Story</a></li>
              <li><a href="#">Projects</a></li>
              <li><a href="#">Terms of Use</a></li>
              <li><a href="#">Privacy Policy</a></li>
            </ul>
          </div>
          <!-- /.widget -->
        </div>
        <!-- /column -->
        <div class="col-md-12 col-lg-3">
          <div class="widget">
            <h4 class="widget-title mb-3">Our Newsletter</h4>
            <p class="mb-5">Subscribe to our newsletter to get our news & deals delivered to you.</p>
            <div class="newsletter-wrapper">
              <!-- Begin Mailchimp Signup Form -->
              <div id="mc_embed_signup2">
                <form action="https://elemisfreebies.us20.list-manage.com/subscribe/post?u=aa4947f70a475ce162057838d&amp;id=b49ef47a9a" method="post" id="mc-embedded-subscribe-form2" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                  <div id="mc_embed_signup_scroll2">
                    <div class="mc-field-group input-group form-label-group">
                      <input type="email" value="" name="EMAIL" class="required email form-control" placeholder="Email Address" id="mce-EMAIL2">
                      <label for="mce-EMAIL2">Email Address</label>
                      <input type="submit" value="Join" name="subscribe" id="mc-embedded-subscribe2" class="btn btn-primary">
                    </div>
                    <div id="mce-responses2" class="clear">
                      <div class="response" id="mce-error-response2" style="display:none"></div>
                      <div class="response" id="mce-success-response2" style="display:none"></div>
                    </div> <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_ddc180777a163e0f9f66ee014_4b1bcfa0bc" tabindex="-1" value=""></div>
                    <div class="clear"></div>
                  </div>
                </form>
              </div>
              <!--End mc_embed_signup-->
            </div>
            <!-- /.newsletter-wrapper -->
          </div>
          <!-- /.widget -->
        </div>
        <!-- /column -->
      </div>
      <!--/.row -->
    </div>
    <!-- /.container -->
  </footer>
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
