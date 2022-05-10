<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('horDia') }}
            {{ Form::text('horDia', $horario->horDia, ['class' => 'form-control' . ($errors->has('horDia') ? ' is-invalid' : ''), 'placeholder' => 'Hordia']) }}
            {!! $errors->first('horDia', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('horInicio') }}
            {{ Form::time('horInicio', $horario->horInicio, ['class' => 'form-control' . ($errors->has('horInicio') ? ' is-invalid' : ''), 'placeholder' => 'Horinicio']) }}
            {!! $errors->first('horInicio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('horFin') }}
            {{ Form::time('horFin', $horario->horFin, ['class' => 'form-control' . ($errors->has('horFin') ? ' is-invalid' : ''), 'placeholder' => 'Horfin']) }}
            {!! $errors->first('horFin', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>