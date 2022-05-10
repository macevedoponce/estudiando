<div class="box box-info padding-1">
    <div class="form-group">
        <strong>Dni:</strong>
        <input class="form-control" type="text" name="docDni" id="docDni" value="{{ $docente->docDni }}">
    </div>
    <div class="form-group">
        <strong>Nombres:</strong>
        <input class="form-control" type="text" name="docNombres" id="docNombres" value="{{ $docente->docNombres }}">
    </div>
    <div class="form-group">
        <strong>Apellido Paterno:</strong>
        <input class="form-control" type="text" name="docApellidoPaterno" id="docApellidoPaterno" value="{{ $docente->docApellidoPaterno }}">
    </div>
    <div class="form-group">
        <strong>Apellido Materno:</strong>
        <input class="form-control" type="text" name="docApellidoMaterno" id="docApellidoMaterno" value="{{ $docente->docApellidoMaterno }}">
    </div>
    <div class="form-group">
        <strong>Contraseña:</strong>
        <input class="form-control" type="password" name="docPassword" id="docPassword" value="{{ $docente->docPassword }}">
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
