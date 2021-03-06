<section class="wrapper bg-light wrapper-border">
    <div class="container">
        <h2 class="display-4 mb-5 text-center titles" id="contacto">CONTÁCTANOS</h2>
        <div class="row py-7 py-md-8">
            <div class="col-lg-4">
                <h3 class="display-4 mb-9 pe-xl-15">Whatsapp: <br> {{$whatsapp_number}}</h3>
            </div>
            <div class="col-lg-8">
                <div class="row align-items-center counter-wrapper gy-6 text-center">
                    <a href="{{$facebook}}" class="col-md-3">
                        <img src="{{asset('img/facebookico.png')}}" class="svg-inject icon-svg icon-svg-lg text-primary mb-3" alt="" />
                        <p>Facebook</p>
                    </a>
                    <a href="https://wa.me/{{$whatsapp}}" class="col-md-3">
                        <img src="{{asset('img/whatsappico.png')}}" class="svg-inject icon-svg icon-svg-lg text-primary mb-3" alt="" />
                        <p>Whatsapp</p>
                    </a>
                    <div class="col-md-6">
                        <div class="fb-page" data-href="{{$facebook}}" data-width="300" data-hide-cover="false"  data-show-facepile="false">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
