@extends('layouts.lottery-app')

@section('content')

<section class="wrapper bg-light">
    <div class="container pt-10 pt-md-14 pb-0 text-center">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h1 class="display-6 mb-3">SORTEO #2</h1>
                <h2 class="display-7 mb-3">NISSAN SENTRA SR 2021</h2>
                <h3 class="display-7 mb-3">17 DE SEPTIEMBRE 2021</h3>
            </div>
        </div>
    </div>
</section>

<section class="wrapper bg-light">
    <div class="row mt-2">
        <hr class="my-2">
        <div class="col-12 col-md-8 col-lg-4 mx-auto">
            <figure>
                <img class="img-fluid lg-image" src="{{asset('img/corvette.jpg')}}" alt="prize">
            </figure>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12 col-md-8 col-lg-4 mx-auto text-center">
            <i class="uil uil-angle-down"></i> Lista de boletos abajo <i class="uil uil-angle-down"></i>
        </div>
        <hr class="my-2">
    </div>
    <div class="row mt-2">
        <div class="col-12 col-md-8 col-lg-6 mx-auto">
            <h2 class="align-center">SÓLO FALTAN</h2>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12 col-md-8 col-lg-6 mx-auto">
            <div id="flipdown" class="flipdown mx-auto"></div>
            <script>
                document.addEventListener('DOMContentLoaded', () => {

                // Unix timestamp (in seconds) to count down to
                var twoDaysFromNow = (new Date().getTime() / 1000) + (86400 * 2) + 1;

                // Set up FlipDown
                var flipdown = new FlipDown(twoDaysFromNow)

                // Start the countdown
                .start()

                // Do something when the countdown ends
                .ifEnded(() => {
                    console.log('The countdown has ended!');
                });

                // Toggle theme
                var interval = setInterval(() => {
                let body = document.body;
                body.classList.toggle('light-theme');
                body.querySelector('#flipdown').classList.toggle('flipdown__theme-dark');
                body.querySelector('#flipdown').classList.toggle('flipdown__theme-dark');
                }, 5000);

                // Show version number
                var ver = document.getElementById('ver');
                ver.innerHTML = flipdown.version;
                });

            </script>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12 col-md-8 col-lg-6 mx-auto">
            <h2 class="align-center">PARA EL SIGUIENTE SORTEO</h2>
        </div>
    </div>
</section>

<section class="wrapper bg-light">
    <div class="container pt-2 pb-0 text-center">
        <hr class="my-2">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h1 class="display-6 mb-3">COSTO DEL BOLETO $250</h1>
                <h2 class="display-7 mb-3">EMISIÓN 3,333 BOLETOS</h2>
            </div>
        </div>
    </div>
</section>

<section class="wrapper bg-light">
    <div class="container pt-2">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-6 mx-auto text-center">
                <hr class="my-2">
                <ul class="icon-list bullet-primary">
                    <li><span><i class="uil uil-arrow-right"></i></span><span><b>NISSAN SENTRA SR 2021</b> - 17 SEPTIEMBRE</span></li>
                    <li><span><i class="uil uil-arrow-right"></i></span><span><b>$10,000 MXN</b> - 7 SEPTIEMBRE</span></li>
                    <li><span><i class="uil uil-arrow-right"></i></span><span><b>$5,000 MXN EN BOLETOS</b> - 31 AGOSTO</span></li>
                    <li><span><i class="uil uil-arrow-right"></i></span><span><b>$5,000 MXN</b> - 24 AGOSTO</span></li>
                    <li><span><i class="uil uil-arrow-right"></i></span><span><b>$5,000 MXN</b> - 17 AGOSTO</span></li>
                    <li><span><i class="uil uil-arrow-right"></i></span><span><b>$5,000 MXN EN BOLETOS</b> - 10 AGOSTO</span></li>
                    <li><span><i class="uil uil-arrow-right"></i></span><span><b>$5,000 MXN</b> - 27 JULIO</span></li>
                    <li><span><i class="uil uil-arrow-right"></i></span><span><b>$5,000 MXN</b> - 20 JULIO</span></li>
                </ul>
                <hr class="my-2">
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-8 col-lg-6 mx-auto text-center">
                <h2 class="display-7">
                    HAZ CLICK ABAJO EN TU NÚMERO DE LA SUERTE
                </h2>
            </div>
            <hr class="my-2">
        </div>

        <ticket-component></ticket-component>
    </div>
</section>

@include('home.contact-us')

@include('home.notice-of-privacity')

@endsection
