<div class="form-group {{ $errors->has('empleado_id') ? 'has-error' : ''}}">
    <label for="empleado_id" class="control-label">{{ 'Empleado Id' }}</label>
    <input class="form-control" name="empleado_id" type="number" id="empleado_id" value="{{ isset($empleado->empleado_id) ? $empleado->empleado_id : ''}}" >
    {!! $errors->first('empleado_id', '<p class="help-block">:message</p>') !!}
</div>
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
<div class="form-group {{ $errors->has('actividades') ? 'has-error' : ''}}">
    <label for="actividades" class="control-label">{{ 'Actividades' }}</label>
    <input class="form-control" name="actividades" type="text" id="actividades" value="{{ isset($empleado->actividades) ? $empleado->actividades : ''}}" >
    {!! $errors->first('actividades', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
