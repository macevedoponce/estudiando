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
        <input class="form-control" type="text" name="aluDni" id="aluDni" 
        value="{{isset($alumno->aluDni)?$alumno->aluDni:old('aluDni') }}">
    </div>
    <div class="form-group">
        <strong>Nombres:</strong>
        <input class="form-control" type="text" name="aluNombres" id="aluNombres" 
        value="{{isset($alumno->aluNombres)?$alumno->aluNombres:old('aluNombres') }}">
    </div>
    <div class="form-group">
        <strong>Apellido Paterno:</strong>
        <input class="form-control" type="text" name="aluApellidoPaterno" id="aluApellidoPaterno" 
        value="{{isset($alumno->aluApellidoPaterno)?$alumno->aluApellidoPaterno:old('aluApellidoPaterno') }}">
    </div>
    <div class="form-group">
        <strong>Apellido Materno:</strong>
        <input class="form-control" type="text" name="aluApellidoMaterno" id="aluApellidoMaterno" 
        value="{{isset($alumno->aluApellidoMaterno)?$alumno->aluApellidoMaterno:old('aluApellidoMaterno') }}">
    </div>
    <div class="form-group">
        <strong>Contraseña:</strong>
        <input class="form-control" type="password" name="aluPassword" id="aluPassword" 
        value="{{isset($alumno->aluPassword)?$alumno->aluPassword:old('aluPassword') }}">
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
