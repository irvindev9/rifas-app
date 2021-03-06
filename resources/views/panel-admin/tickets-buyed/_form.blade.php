@csrf
<div class="form-group p-1">
    <label for="ticket">No. Boleto</label>
    <input type="number" class="form-control" name="ticket" value="{{ old('ticket', $ticketBuyed->ticket) }}" readonly required>
</div>
<div class="form-group p-1">
    <label for="otherTickets">Boletos extras</label>
    <div class="form-control" name="otherTickets" id="otherTickets">
        @foreach ($ticketBuyed->otherTicketsBuyed as $otherTicketsBuyed)
            <a href="{{route("ticketsBuyed.edit_extra",[$otherTicketsBuyed->id])}}">{{ $otherTicketsBuyed->ticket }}</a> &nbsp;
        @endforeach
    </div>
</div>
<div class="form-group p-1">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" name="name" value="{{ old('name', $ticketBuyed->name_client) }}" required>
</div>
<div class="form-group p-1">
    <label for="lastname">Apellido P</label>
    <input type="text" class="form-control" name="lastname" value="{{ old('lastname', $ticketBuyed->lastname_client) }}" required>
</div>
<div class="form-group p-1">
    <label for="lastnameM">Apellido M</label>
    <input type="text" class="form-control" name="lastnameM" value="{{ old('lastname', $ticketBuyed->lastname_M_client) }}" required>
</div>
<div class="form-group p-1">
    <label for="whats">Número de Whats</label>
    <input type="text" class="form-control" name="whats" value="{{ old('whats', $ticketBuyed->whats_number) }}" required>
</div>
<div class="form-group p-1">
    <label for="state">Estado</label>
    <input type="text" class="form-control" name="state" value="{{ old('state', $ticketBuyed->state) }}" required>
</div>
<div class="form-group m-1 form-check ">
    <label class="form-check-label" for="ticketPaid">Boleto Pagado</label>
    @if ($ticketBuyed->paid == 1)
        <input type="checkbox" class="form-check-input" checked id="ticketPaid" name="paid">
    @else
        <input type="checkbox" class="form-check-input" id="ticketPaid" name="paid">
    @endif
</div>
<div class="form-group p-1">
    <label for="date_buyed">Fecha y hora del pago</label>
    <input type="datetime-local" class="form-control" name="date_buyed" value="{{ old('date_buyed', ($ticketBuyed->date_buyed ? date('Y-m-d\TH:i', strtotime($ticketBuyed->date_buyed)) : '')) }}" required>
</div>

<button class="btn btn-outline-success float-right">{{ $btnText }}</button>
