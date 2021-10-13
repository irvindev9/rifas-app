@extends('layouts.lottery-app')

@section('content')

<section class="wrapper bg-light">
    <div class="container pt-10 pt-md-14 pb-0 text-center">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h1 class="display-6 mb-3">SORTEO #{{$lottery->lottery_number}}</h1>
                <h2 class="display-7 mb-3">{{$lottery->name}}</h2>
                @php
                    $month = [
                        '01' => 'ENERO',
                        '02' => 'FEBRERO',
                        '03' => 'MARZO',
                        '04' => 'ABRIL',
                        '05' => 'MAYO',
                        '06' => 'JUNIO',
                        '07' => 'JULIO',
                        '08' => 'AGOSTO',
                        '09' => 'SEPTIEMBRE',
                        '10' => 'OCTUBRE',
                        '11' => 'NOVIEMBRE',
                        '12' => 'DICIEMBRE'
                    ];

                    $day = explode('-', $lottery->lastday_lottery);

                    date_default_timezone_set('America/Tegucigalpa');
                @endphp
                <h3 class="display-7 mb-3">{{intval($day[2])}} DE {{$month[$day[1]]}} DE {{$day[0]}}</h3>
            </div>
        </div>
    </div>
</section>

<section class="wrapper bg-light">
    <div class="row mt-2">
        <hr class="my-2">
        <div class="col-12 col-md-8 col-lg-4 mx-auto">
            <figure>
                @isset ($lottery->image_lottery)
                    <img class="img-fluid lg-image" src="{{asset('img/prizes/').'/'.$lottery->image_lottery}}" alt="prize">
                @endif
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
                var twoDaysFromNow = (new Date().getTime() / 1000) + ({!! isset($prize) ? strtotime($prize->date_lottery_prize)  - time() : strtotime($lottery->lastday_lottery) - time() !!}) + 1;

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
                <h1 class="display-6 mb-3">COSTO DEL BOLETO ${{$lottery->price_ticket}}</h1>
                <h2 class="display-7 mb-3">EMISIÓN {{$lottery->quantity_tickets}} BOLETOS</h2>
                <a href="{{route("notice.lottery", $lottery->id)}}" class="display-8 mb-3">VER BASES DEL SORTEO</a>
            </div>
        </div>
    </div>
</section>

<section class="wrapper bg-light">
    <div class="container pt-2">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-6 mx-auto text-center">
                <hr class="my-2">
                <h3 class="display-8">Con su boleto liquidado participa por: </h3>
                <ul class="icon-list bullet-primary">
                    @foreach ($lottery->prizes as $prize)
                        @php
                            $day = explode('-', $prize->date_lottery_prize);
                        @endphp
                        <li><span><i class="uil uil-arrow-right"></i></span><span><b>{{$prize->prize}}</b> - {{intval($day[2])}} DE {{$month[$day[1]]}}</span></li>
                    @endforeach
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

        <ticket-component idLotto="@json($lottery->id)" numberTickets="@json($lottery->quantity_tickets)"></ticket-component>
    </div>
</section>

<section class="wrapper bg-light">
    <div class="container pt-2 pb-0 text-center">
        <hr class="my-2">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <a href="{{route('verificator', $lottery->id)}}" class="display-6 mb-3">CONSULTA DE BOLETOS COMPRADOS</a>
            </div>
        </div>
    </div>
</section>

@include('home.contact-us')

@include('home.notice-of-privacity')

@endsection
