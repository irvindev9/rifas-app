@csrf
<div class="form-group p-1">
    <label for="ticket">No. Boleto Extra</label>
    <input type="number" class="form-control" name="ticket" value="{{ old('ticket', $OtherTicketBuyed->ticket) }}" required>
</div>
<button class="btn btn-outline-success float-right" type="submit">Guardar</button>
<button data-id="{{$OtherTicketBuyed->id}}" class="btn-delete btn btn-outline-danger float-right mx-1" type="button">Eliminar</button>
