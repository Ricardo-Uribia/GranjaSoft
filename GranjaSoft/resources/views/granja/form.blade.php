<div class="form-group {{ $errors->has('granja_id') ? 'has-error' : ''}}">
    <label for="granja_id" class="control-label">{{ 'Granja Id' }}</label>
    <input class="form-control" name="granja_id" type="text" id="granja_id" value="{{ isset($granja->granja_id) ? $granja->granja_id : ''}}" >
    {!! $errors->first('granja_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="control-label">{{ 'Nombre' }}</label>
    <input class="form-control" name="nombre" type="text" id="nombre" value="{{ isset($granja->nombre) ? $granja->nombre : ''}}" required>
    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
