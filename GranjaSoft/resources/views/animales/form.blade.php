<div class="form-group {{ $errors->has('raza') ? 'has-error' : ''}}">
    <label for="raza" class="control-label">{{ 'Raza' }}</label>
    <input class="form-control" name="raza" type="text" id="raza" value="{{ isset($animale->raza) ? $animale->raza : ''}}" required>
    {!! $errors->first('raza', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('tipo') ? 'has-error' : ''}}">
    <label for="tipo" class="control-label">{{ 'Tipo' }}</label>
    <input class="form-control" name="tipo" type="text" id="tipo" value="{{ isset($animale->tipo) ? $animale->tipo : ''}}" required>
    {!! $errors->first('tipo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('animal_id') ? 'has-error' : ''}}">
    <label for="animal_id" class="control-label">{{ 'Animal Id' }}</label>
    <input class="form-control" name="animal_id" type="number" id="animal_id" value="{{ isset($animale->animal_id) ? $animale->animal_id : ''}}" >
    {!! $errors->first('animal_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
