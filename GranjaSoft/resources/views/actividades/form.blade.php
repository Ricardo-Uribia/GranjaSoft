<div class="form-group {{ $errors->has('activida_id') ? 'has-error' : ''}}">
    <label for="activida_id" class="control-label">{{ 'Activida Id' }}</label>
    <input class="form-control" name="activida_id" type="number" id="activida_id" value="{{ isset($actividade->activida_id) ? $actividade->activida_id : ''}}" >
    {!! $errors->first('activida_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="control-label">{{ 'Nombre' }}</label>
    <input class="form-control" name="nombre" type="text" id="nombre" value="{{ isset($actividade->nombre) ? $actividade->nombre : ''}}" >
    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('empleado') ? 'has-error' : ''}}">
    <label for="empleado" class="control-label">{{ 'Empleado' }}</label>
    <input class="form-control" name="empleado" type="text" id="empleado" value="{{ isset($actividade->empleado) ? $actividade->empleado : ''}}" required>
    {!! $errors->first('empleado', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('actividad') ? 'has-error' : ''}}">
    <label for="actividad" class="control-label">{{ 'Actividad' }}</label>
    <input class="form-control" name="actividad" type="text" id="actividad" value="{{ isset($actividade->actividad) ? $actividade->actividad : ''}}" required>
    {!! $errors->first('actividad', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('dia') ? 'has-error' : ''}}">
    <label for="dia" class="control-label">{{ 'Dia' }}</label>
    <input class="form-control" name="dia" type="text" id="dia" value="{{ isset($actividade->dia) ? $actividade->dia : ''}}" >
    {!! $errors->first('dia', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('hora_inicio') ? 'has-error' : ''}}">
    <label for="hora_inicio" class="control-label">{{ 'Hora Inicio' }}</label>
    <input class="form-control" name="hora_inicio" type="text" id="hora_inicio" value="{{ isset($actividade->hora_inicio) ? $actividade->hora_inicio : ''}}" >
    {!! $errors->first('hora_inicio', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('hora_finaliza') ? 'has-error' : ''}}">
    <label for="hora_finaliza" class="control-label">{{ 'Hora Finaliza' }}</label>
    <input class="form-control" name="hora_finaliza" type="text" id="hora_finaliza" value="{{ isset($actividade->hora_finaliza) ? $actividade->hora_finaliza : ''}}" >
    {!! $errors->first('hora_finaliza', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
