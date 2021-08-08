@csrf
<div class="form-group p-1">
    <label for="name">Nombre de la rifa</label>
    <input type="text" class="form-control" name="name" value="{{ old('name', $lottery->name) }}" required>
</div>
<div class="form-group p-1">
    <label for="qtyTickets">Cantidad de boletos</label>
    <input type="number" class="form-control" name="qtyTickets" value="{{ old('qtyTickets', $lottery->quantity_tickets) }}" required>
</div>
<div class="form-group p-1">
    <label for="priceTicket">Precio del boleto</label>
    <input type="number" class="form-control" name="priceTicket" value="{{ old('priceTicket', $lottery->price_ticket) }}" required>
</div>
<div class="form-group p-1">
    <label for="date">Último día de la rifa</label>
    <input type="date" class="form-control" name="date" value="{{ old('date', $lottery->lastday_lottery) }}" required>
</div>
<div class="form-group m-1 form-check ">
    <label class="form-check-label" for="lotteryActive">Rifa activa</label>
    @if ($lottery->active == 1)
        <input type="checkbox" class="form-check-input" checked id="lotteryActive" name="active">
    @else
        <input type="checkbox" class="form-check-input" id="lotteryActive" name="active">
    @endif
</div>

<button class="btn btn-outline-success float-right">{{ $btnText }}</button>