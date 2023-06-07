
<div class="form-group {{ $errors->has('nomPais') ? 'has-error' : ''}}">
    <label for="nomPais" class="control-label">{{ 'Nombre pais' }}</label>
    <input class="form-control" name="nomPais" type="string" id="nomPais" value="{{ isset($pai->nomPais) ? $pai->nomPais : ''}}" >
    {!! $errors->first('nomPais', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-crear"  type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
</div>
