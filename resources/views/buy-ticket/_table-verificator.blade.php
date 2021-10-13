@isset ($ticketBuyed)
<div class="table-responsive">
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">No. Boleto</th>
                <th scope="col">Boletos extra</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido P</th>
                <th scope="col">Apellido M</th>
                <th scope="col">Estado</th>
                <th scope="col">Pagado</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">{!! $lottery->quantity_tickets == 10000 ? str_pad($ticketBuyed->ticket, 5, "0", STR_PAD_LEFT) : str_pad($ticketBuyed->ticket, 4, "0", STR_PAD_LEFT) !!}</th>
                <th>
                    @foreach ($ticketBuyed->otherTicketsBuyed as $item)
                        {!!  $lottery->quantity_tickets == 10000 ? str_pad($item->ticket, 5, "0", STR_PAD_LEFT) : str_pad($item->ticket, 4, "0", STR_PAD_LEFT) !!}
                    @endforeach
                </th>
                <td>{{ $ticketBuyed->name_client }}</td>
                <td>{{ $ticketBuyed->lastname_client }}</td>
                <td>{{ $ticketBuyed->lastname_M_client }}</td>
                <td>{{ $ticketBuyed->state }}</td>
                <td>
                    @if($ticketBuyed->paid == 1)
                        <strong class="text-success">Sí</strong>
                    @else
                        <strong class="text-danger">No</strong>
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
</div>
@elseif($ticketAvailable <= $lottery->quantity_tickets && $ticketAvailable > 0)
    @isset ($ticketAvailable)
        <a href="{{ route("contest.lotto.ticket", [$lottery, $ticketAvailable]) }}" class="available-ticket">Boleto {{ $ticketAvailable }} disponible</a>
    @endif
@else 
    <label class="available-ticket">Boleto NO disponible, intenta con otro</label>
@endif
