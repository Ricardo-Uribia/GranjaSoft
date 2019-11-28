<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="control-label">{{ 'Nombre' }}</label>
    <input class="form-control" name="nombre" type="text" id="nombre" value="{{ isset($empleado->nombre) ? $empleado->nombre : ''}}" required>
    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('edad') ? 'has-error' : ''}}">
    <label for="edad" class="control-label">{{ 'Edad' }}</label>
    <input class="form-control" name="edad" type="number" id="edad" value="{{ isset($empleado->edad) ? $empleado->edad : ''}}" >
    {!! $errors->first('edad', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('puesto') ? 'has-error' : ''}}">
    <label for="puesto" class="control-label">{{ 'Puesto' }}</label>
    <input class="form-control" name="puesto" type="text" id="puesto" value="{{ isset($empleado->puesto) ? $empleado->puesto : ''}}" required>
    {!! $errors->first('puesto', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('granja_id') ? 'has-error' : ''}}">
    <label for="granja_id" class="control-label">{{ 'Granja Id' }}</label>
    <input class="form-control" name="granja_id" type="number" id="granja_id" value="{{ isset($empleado->granja_id) ? $empleado->granja_id : ''}}" >
    {!! $errors->first('granja_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
