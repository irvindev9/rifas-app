@csrf
<div class="form-group p-1">
    <label for="prize">Premio</label>
    <input type="text" class="form-control" name="prize" value="{{ old('prize', $prize->prize) }}" required>
</div>
<div class="form-group p-1">
    <label for="date">Día de la rifa</label>
    <input type="date" class="form-control" name="date" value="{{ old('date', $prize->date_lottery_prize) }}" required>
</div>
<div class="form-group m-1 form-check ">
    <label class="form-check-label" for="prizeActive">
        <b>Contador activo</b>
    </label>
    @if ($prize->active == 1)
        <input type="checkbox" class="form-check-input" checked id="prizeActive" name="active">
    @else
        <input type="checkbox" class="form-check-input" id="prizeActive" name="active">
    @endif
</div>

<button class="btn btn-outline-success float-right mt-2">{{ $btnText }}</button>