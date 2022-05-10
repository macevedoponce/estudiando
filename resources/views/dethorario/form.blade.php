<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('horId') }}
            {{ Form::select('horId',$horario, $dethorario->horId, ['class' => 'form-control' . ($errors->has('horId') ? ' is-invalid' : ''), 'placeholder' => 'Horid']) }}
            {!! $errors->first('horId', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('curId') }}
            {{ Form::select('curId', $curso,$dethorario->curId, ['class' => 'form-control' . ($errors->has('curId') ? ' is-invalid' : ''), 'placeholder' => 'Curid']) }}
            {!! $errors->first('curId', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>