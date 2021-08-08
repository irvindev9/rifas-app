@csrf
<div class="form-group p-1">
    <label for="prize">Premio</label>
    <input type="text" class="form-control" name="prize" value="{{ old('prize', $prize->prize) }}" required>
</div>
<div class="form-group p-1">
    <label for="date">Día de la rifa</label>
    <input type="date" class="form-control" name="date" value="{{ old('date', $prize->date_lottery_prize) }}" required>
</div>

<button class="btn btn-outline-success float-right mt-2">{{ $btnText }}</button>