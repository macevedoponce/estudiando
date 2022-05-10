<div class="box box-info padding-1">
    <div class="form-group">
        <strong>Dni:</strong>
        <input class="form-control" type="text" name="aluDni" id="aluDni" value="{{ $alumno->aluDni }}">
    </div>
    <div class="form-group">
        <strong>Nombres:</strong>
        <input class="form-control" type="text" name="aluNombres" id="aluNombres" value="{{ $alumno->aluNombres }}">
    </div>
    <div class="form-group">
        <strong>Apellido Paterno:</strong>
        <input class="form-control" type="text" name="aluApellidoPaterno" id="aluApellidoPaterno" value="{{ $alumno->aluApellidoPaterno }}">
    </div>
    <div class="form-group">
        <strong>Apellido Materno:</strong>
        <input class="form-control" type="text" name="aluApellidoMaterno" id="aluApellidoMaterno" value="{{ $alumno->aluApellidoMaterno }}">
    </div>
    <div class="form-group">
        <strong>Contraseña:</strong>
        <input class="form-control" type="password" name="aluPassword" id="aluPassword" value="{{ $alumno->aluPassword }}">
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
