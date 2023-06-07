
<div class="form-group {{ $errors->has('depto_id') ? 'has-error' : ''}}">
    <label for="depto_id" class="control-label">{{ 'Departamento Id' }}</label>
    <input class="form-control" name="depto_id" type="number" id="depto_id" value="{{ isset($persona->depto_id) ? $persona->depto_id : ''}}" >
    {!! $errors->first('depto_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nombre_completo') ? 'has-error' : ''}}">
    <label for="nombre_completo" class="control-label">{{ 'Nombre Completo' }}</label>
    <input class="form-control" name="nombre_completo" type="text" id="nombre_completo" value="{{ isset($persona->nombre_completo) ? $persona->nombre_completo : ''}}" >
    {!! $errors->first('nombre_completo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('direccion') ? 'has-error' : ''}}">
    <label for="direccion" class="control-label">{{ 'Direccion' }}</label>
    <input class="form-control" name="direccion" type="text" id="direccion" value="{{ isset($persona->direccion) ? $persona->direccion : ''}}" >
    {!! $errors->first('direccion', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary btn-crear" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
</div>
