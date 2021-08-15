@csrf
<div class="form-group p-1">
    <label for="ticket">No. Boleto</label>
    <input type="number" class="form-control" name="ticket" value="{{ old('ticket', $ticketBuyed->ticket) }}" required>
</div>
<div class="form-group p-1">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" name="name" value="{{ old('name', $ticketBuyed->name_client) }}" required>
</div>
<div class="form-group p-1">
    <label for="lastname">Apellido</label>
    <input type="text" class="form-control" name="lastname" value="{{ old('lastname', $ticketBuyed->lastname_client) }}" required>
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
    <label class="form-check-label" for="paid">Boleto Pagado</label>
    @if ($ticketBuyed->paid == 1)
        <input type="checkbox" class="form-check-input" checked id="ticketPaid" name="paid">
    @else
        <input type="checkbox" class="form-check-input" id="ticketPaid" name="paid">
    @endif
</div>

<button class="btn btn-outline-success float-right">{{ $btnText }}</button>