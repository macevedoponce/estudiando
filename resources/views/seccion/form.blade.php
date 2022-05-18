<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            <strong>Nombre:</strong>
            <input class="form-control" type="text" name="secNombre" id="secNombre" 
        value="{{isset($seccion->secNombre)?$seccion->secNombre:old('secNombre') }}">
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>