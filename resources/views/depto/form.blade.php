
<div class="form-group {{ $errors->has('pais_id') ? 'has-error' : ''}}">
    <label for="pais_id" class="control-label">{{ 'Pais Id' }}</label>
    <input class="form-control" name="pais_id" type="number" id="pais_id" value="{{ isset($depto->pais_id) ? $depto->pais_id : ''}}" >
    {!! $errors->first('pais_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nomDepto') ? 'has-error' : ''}}">
    <label for="nomDepto" class="control-label">{{ 'Nombre Departamento' }}</label>
    <input class="form-control" rows="5" name="nomDepto" type="string" id="nomDepto"  value="{{ isset($depto->nomDepto) ? $depto->nomDepto : ''}}" >
    {!! $errors->first('nomDepto', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary btn-crear" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
</div>
