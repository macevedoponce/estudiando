<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('graNombre') }}
            {{ Form::text('graNombre', $grado->graNombre, ['class' => 'form-control' . ($errors->has('graNombre') ? ' is-invalid' : ''), 'placeholder' => 'Granombre']) }}
            {!! $errors->first('graNombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>