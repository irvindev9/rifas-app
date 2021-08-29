@isset ($ticketBuyed)
    <table class="table table-striped">
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
                <th scope="row">{{ $ticketBuyed->ticket }}</th>
                <th>
                    @foreach ($ticketBuyed->otherTicketsBuyed as $item)
                        {{ $item->ticket }}
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
@else
    <strong class="text-danger">Boleto no comprado</strong>
@endif
