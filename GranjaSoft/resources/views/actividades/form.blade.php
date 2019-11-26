<div class="form-group {{ $errors->has('empleado_id') ? 'has-error' : ''}}">
    <label for="empleado_id" class="control-label">{{ 'Empleado Id' }}</label>
    <input class="form-control" name="empleado_id" type="number" id="empleado_id" value="{{ isset($actividade->empleado_id) ? $actividade->empleado_id : ''}}" >
    {!! $errors->first('empleado_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('tipo_de_tarea') ? 'has-error' : ''}}">
    <label for="tipo_de_tarea" class="control-label">{{ 'Tipo De Tarea' }}</label>
    <select name="tipo_de_tarea" class="form-control" id="tipo_de_tarea" required>
    @foreach (json_decode('{"opcion1":"Limpieza","opcion2":"Cuidado","opcion3":"Alimentacion","opcion4":"Mantenimiento","opcion5":"Vacunacion"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($actividade->tipo_de_tarea) && $actividade->tipo_de_tarea == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('tipo_de_tarea', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('fecha_de_inicio') ? 'has-error' : ''}}">
    <label for="fecha_de_inicio" class="control-label">{{ 'Fecha De Inicio' }}</label>
    <input class="form-control" name="fecha_de_inicio" type="date" id="fecha_de_inicio" value="{{ isset($actividade->fecha_de_inicio) ? $actividade->fecha_de_inicio : ''}}" >
    {!! $errors->first('fecha_de_inicio', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('fecha_de_finalizacion') ? 'has-error' : ''}}">
    <label for="fecha_de_finalizacion" class="control-label">{{ 'Fecha De Finalizacion' }}</label>
    <input class="form-control" name="fecha_de_finalizacion" type="date" id="fecha_de_finalizacion" value="{{ isset($actividade->fecha_de_finalizacion) ? $actividade->fecha_de_finalizacion : ''}}" >
    {!! $errors->first('fecha_de_finalizacion', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
