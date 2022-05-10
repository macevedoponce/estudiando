<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('aluId') }}
            {{ Form::select('aluId', $alumno,$matricula->aluId, ['class' => 'form-control' . ($errors->has('aluId') ? ' is-invalid' : ''), 'placeholder' => 'Aluid']) }}
            {!! $errors->first('aluId', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('graId') }}
            {{ Form::select('graId', $grado,$matricula->graId, ['class' => 'form-control' . ($errors->has('graId') ? ' is-invalid' : ''), 'placeholder' => 'Graid']) }}
            {!! $errors->first('graId', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('secId') }}
            {{ Form::select('secId', $seccion,$matricula->secId, ['class' => 'form-control' . ($errors->has('secId') ? ' is-invalid' : ''), 'placeholder' => 'Secid']) }}
            {!! $errors->first('secId', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>