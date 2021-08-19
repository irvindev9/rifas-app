@extends('layouts.lottery-app')

@section('content')

<section class="wrapper bg-light">
    <div class="container pt-10 pt-md-14 pb-0 text-center">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h1 class="display-6 mb-3">Genera tu Boleto</h1>
                <h2>Para {{ $lottery->name }}</h2>

                <h3>Introduce tu número de boleto y haz click en "Generar"</h3>

                <form method="POST" action="{{ route("generator.show", [$lottery->id]) }}">
                    @csrf
                    <input type="number" class="form-control" placeholder="Introduce un número de boleto" name="ticket">                   
                    <div class="d-grid gap-2 col-6 mx-auto my-4">
                        <button type="submit" class="btn btn-success rounded-pill">Generar</button>
                    </div>
                </form>       

                @includeWhen($showTicket, 'buy-ticket._ticket', ['ticketBuyed' => $ticketBuyed])

            </div>
        </div>
    </div>
</section>


@include('home.contact-us')

@include('home.notice-of-privacity')

@endsection
