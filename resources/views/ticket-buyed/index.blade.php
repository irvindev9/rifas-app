@extends('layouts.lottery-app')

@section('content')

<section class="wrapper bg-light">
    <div class="container pt-10 pt-md-14 pb-0 text-center">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h1 class="display-6 mb-3">BOLETO 0001</h1>
                <h2 class="display-7 mb-3">INCLUYE:</h2>
                <h3 class="display-7 mb-3">3334, 6667</h3>
            </div>
        </div>
        <hr class="my-3">
    </div>
</section>

<section class="wrapper bg-light">
    <div class="container pt-3 text-center">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2 class="display-7 mb-3">LLENA TUS DATOS Y DA CLICK EN APARTAR</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-label-group mb-4">
                  <input id="textInputExample" type="text" class="form-control" placeholder="NÚMERO WHATSAPP (10 dígitos)">
                  <label for="textInputExample">NÚMERO WHATSAPP (10 dígitos)</label>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-select-wrapper">
                  <select class="form-select" aria-label="Default select example">
                    <option selected="">Estado</option>
                    <option>Estados Unidos</option>
                    <option>Aguascalientes</option>
                    <option>Baja California</option>
                    <option>Baja California Sur</option>
                    <option>Campeche</option>
                    <option>Ciudad de México</option>
                    <option>Coahuila</option>
                    <option>Colima</option>
                    <option>Chiapas</option>
                    <option>Chihuahua</option>
                    <option>Durango</option>
                    <option>Estado de México</option>
                    <option>Guanajuato</option>
                    <option>Guerrero</option>
                    <option>Hidalgo</option>
                    <option>Jalisco</option>
                    <option>Michoacán</option>
                    <option>Morelos</option>
                    <option>Nayarit</option>
                    <option>Nuevo León</option>
                    <option>Oaxaca</option>
                    <option>Puebla</option>
                    <option>Querétaro</option>
                    <option>Quintana Roo</option>
                    <option>San Luis Potosí</option>
                    <option>Sinaloa</option>
                    <option>Sonora</option>
                    <option>Tabasco</option>
                    <option>Tamaulipas</option>
                    <option>Tlaxcala</option>
                    <option>Veracruz</option>
                    <option>Yucatán</option>
                    <option>Zacatecas</option>
                  </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-label-group mb-4">
                  <input id="textInputExample" type="text" class="form-control" placeholder="Nombre(s)">
                  <label for="textInputExample">Nombre(s)</label>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-label-group mb-4">
                  <input id="textInputExample" type="text" class="form-control" placeholder="Apellidos">
                  <label for="textInputExample">Apellidos</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mx-auto text-center text-blue">
                Al enviar confirmo que he leído y acepto las BASES DEL SORTEO
            </div>
            <div class="col-12 mx-auto text-center text-green">
                ¡Al finalizar serás redirigido a whatsapp para enviar la información de tu boleto!
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 mx-auto text-center">
                <a href="#" class="btn btn-blue rounded-pill mb-2 me-1">ESCOGER MÁS BOLETOS</a>
                <a href="#" class="btn btn-green rounded-pill mb-2 me-1">FINALIZAR Y APARTAR</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mx-auto text-center text-red">
                El boleto queda apartado por 72 hrs.
            </div>
        </div>
        <hr class="my-3">
    </div>
</section>

@include('home.contact-us')

@include('home.notice-of-privacity')

@endsection
