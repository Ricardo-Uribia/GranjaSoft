<div class="form-group {{ $errors->has('nave_id') ? 'has-error' : ''}}">
    <label for="nave_id" class="control-label">{{ 'Nave Id' }}</label>
    <input class="form-control" name="nave_id" type="number" id="nave_id" value="{{ isset($nave->nave_id) ? $nave->nave_id : ''}}" >
    {!! $errors->first('nave_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('secciones') ? 'has-error' : ''}}">
    <label for="secciones" class="control-label">{{ 'Secciones' }}</label>
    <input class="form-control" name="secciones" type="number" id="secciones" value="{{ isset($nave->secciones) ? $nave->secciones : ''}}" required>
    {!! $errors->first('secciones', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
