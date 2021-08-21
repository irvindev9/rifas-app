@csrf
<div class="form-group p-1">
    <label for="type">Tipo</label>
    <input
        type="text"
        class="form-control" name="type"
        value="{{ old('type', $setting->code) }}"
        {{ \Request::is('editarAjuste/*') ? "readonly" : "" }}
        required
    >
</div>
<div class="form-group p-1">
    <label for="content">Contenido</label>
    <textarea class="form-control textarea" name="content" cols="30" rows="10" required>{{ old('content', $setting->content) }}</textarea>
</div>

<button class="btn btn-outline-success float-right mt-2">{{ $btnText }}</button>
