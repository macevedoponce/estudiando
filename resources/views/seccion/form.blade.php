<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('secNombre') }}
            {{ Form::text('secNombre', $seccion->secNombre, ['class' => 'form-control' . ($errors->has('secNombre') ? ' is-invalid' : ''), 'placeholder' => 'Secnombre']) }}
            {!! $errors->first('secNombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>