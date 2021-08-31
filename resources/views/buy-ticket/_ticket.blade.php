@isset ($ticketBuyed)
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="rounded-0 border buyed-ticket border-2">
                <div class="text-center mt-2" style="border-bottom: dashed">
                    <img src="{{asset("img/rifasjuniorlogo.png")}}" class="w-11" alt="logo">
                    <h5>Rifas Jr</h5>
                </div>

                <div class="px-4 py-2 text-left text-uppercas" style="border-bottom: dashed">
                    <div>
                        <strong class="d-inline">Boleto: </strong>
                        <p class="d-inline">{{ $ticketBuyed->ticket }}</p>
                    </div>
                    <div>
                        <strong class="d-inline">Boletos extras: </strong>
                        <p class="d-inline">
                            @foreach ($ticketBuyed->otherTicketsBuyed as $item)
                                {{ $item->ticket }}
                            @endforeach
                        </p>
                    </div>
                </div>

                <div class="p-4 text-uppercase text-left">
                    <div>
                        <strong class="d-inline">Rifa: </strong>
                        <p class="d-inline">{{ $lottery->name }}</p>
                    </div>
                    <div>
                        <strong class="d-inline">Nombre: </strong>
                        <p class="d-inline">{{ $ticketBuyed->name_client }}</p>
                    </div>
                    <div>
                        <strong class="d-inline">Apellido P: </strong>
                        <p class="d-inline">{{ $ticketBuyed->lastname_client }}</p>
                    </div>
                    <div>
                        <strong class="d-inline">Apellido M: </strong>
                        <p class="d-inline">{{ $ticketBuyed->lastname_M_client }}</p>
                    </div>
                    <div>
                        <strong class="d-inline">Estado: </strong>
                        <p class="d-inline">{{ $ticketBuyed->state }}</p>
                    </div>
                    <div>
                        <strong class="d-inline">Pagado: </strong>
                        <p class="d-inline">
                            @if($ticketBuyed->paid == 1)
                                <strong class="text-success">Sí</strong>
                            @else
                                <strong class="text-danger">No</strong>
                            @endif
                        </p>
                    </div>
                    <div>
                        <strong class="d-inline">Fecha compra: </strong>
                        <p class="d-inline">{{ $ticketBuyed->created_at->format('d-m-Y') }}</p>
                    </div>
                </div>
                @isset($lottery->image_lottery)
                    <div class="text-center mt-2" style="border-top: dashed">
                        <img src="{{asset("img/prizes/".$lottery->image_lottery)}}" class="w-50" alt="premio">
                    </div>
                @endisset
                <div class="text-center" style="border-top: dashed">
                    <p class="mt-2 text-uppercase">¡Tómale captura de pantalla!</p>
                </div>
            </div>
        </div>
    </div>
@else
    @isset ($ticketAvailable)
        <a href="{{ route("contest.lotto.ticket", [$lottery, $ticketAvailable]) }}" class="available-ticket">Boleto {{ $ticketAvailable }} disponible</a>
    @endif
@endif
