@if (count($errors)>0)
<div class="alert alert-danger" role="alert">

<ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>  
  @endforeach
</ul>
</div>
@endif

<div class="box box-info padding-1">
    <div class="form-group">
        <strong>Dni:</strong>
        <input class="form-control" type="text" name="docDni" id="docDni" 
        value="{{isset($docente->docDni)?$docente->docDni:old('docDni') }}">
    </div>
    <div class="form-group">
        <strong>Nombres:</strong>
        <input class="form-control" type="text" name="docNombres" id="docNombres" 
        value="{{ isset($docente->docNombres)?$docente->docNombres:old('docNombres') }}">
    </div>
    <div class="form-group">
        <strong>Apellido Paterno:</strong>
        <input class="form-control" type="text" name="docApellidoPaterno" id="docApellidoPaterno" 
        value="{{ isset($docente->docApellidoPaterno)?$docente->docApellidoPaterno:old('docApellidoPaterno') }}">
    </div>
    <div class="form-group">
        <strong>Apellido Materno:</strong>
        <input class="form-control" type="text" name="docApellidoMaterno" id="docApellidoMaterno" 
        value="{{ isset($docente->docApellidoMaterno)?$docente->docApellidoMaterno:old('docApellidoMaterno') }}">
    </div>
    <div class="form-group">
        <strong>Contraseña:</strong>
        <input class="form-control" type="password" name="docPassword" id="docPassword" 
        value="{{ isset($docente->docPassword)?$docente->docPassword:old('docPassword') }}">
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
