@csrf
<div class="form-group p-1">
    <label for="name">Nombre de la rifa</label>
    <input type="text" class="form-control" name="name" value="{{ old('name', $lottery->name) }}" required>
</div>
<div class="form-group p-1">
    <label for="qtyTickets">Cantidad de boletos</label>

    <select class="form-select" aria-label="Default select example" name="qtyTickets">
        <option {{($lottery->quantity_tickets == 100) ? 'selected' : '' }} value="100">100</option>
        <option {{($lottery->quantity_tickets == 500) ? 'selected' : '' }} value="500">500</option>
        <option {{($lottery->quantity_tickets == 1000) ? 'selected' : '' }} value="1000">1000</option>
        <option {{($lottery->quantity_tickets == 2000) ? 'selected' : '' }} value="2000">2000</option>
        <option {{($lottery->quantity_tickets == 2500) ? 'selected' : '' }} value="2500">2500</option>
        <option {{($lottery->quantity_tickets == 3333) ? 'selected' : '' }} value="3333">3333</option>
        <option {{($lottery->quantity_tickets == 5000) ? 'selected' : '' }} value="5000">5000</option>
        <option {{($lottery->quantity_tickets == 10000) ? 'selected' : '' }} value="10000">10000</option>
    </select>
</div>
<div class="form-group p-1">
    <label for="priceTicket">Precio del boleto</label>
    <input type="number" class="form-control" name="priceTicket" value="{{ old('priceTicket', $lottery->price_ticket) }}" required>
</div>
<div class="form-group p-1">
    <label for="date">Último día de la rifa</label>
    <input type="datetime-local" class="form-control" name="date" value="{{ old('date', date('Y-m-d\TH:i', strtotime($lottery->lastday_lottery))) }}" required>
</div>
<div class="form-group p-1">
    <label for="image">Imágen de la rifa</label>
    <input type="file" class="form-control" name="image" value="{{ old('image', $lottery->image_lottery) }}" accept="image/*">
</div>
<div class="form-group p-1">
    <label for="info">Bases del sorteo</label>
    <textarea class="form-control textarea" name="info" cols="30" rows="10" required>{{ old('info', $lottery->info) }}</textarea>
</div>
<div class="form-group p-1">
    <label for="awardImage">Imágen de entrega del premio</label>
    <input type="file" class="form-control" name="awardImage" value="{{ old('awardImage', $lottery->award_img) }}" accept="image/*">
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
