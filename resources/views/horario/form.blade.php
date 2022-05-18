

<div class="box box-info padding-1">
    <!--<div class="form-group">
        <strong>Dia:</strong>
        <input class="form-control" type="text" name="horDia" id="horDia" 
        value="{{isset($horario->horDia)?$horario->horDia:old('horDia') }}">
    </div>-->
    <div class="form-group">
        <strong>Hora Inicio:</strong>
        <input class="form-control" type="time" name="horInicio" id="horInicio" 
        value="{{ isset($horario->horInicio)?$horario->horInicio:old('horInicio') }}">
    </div>
    <div class="form-group">
        <strong>Hora Fin:</strong>
        <input class="form-control" type="time" name="horFin" id="horFin" 
        value="{{ isset($horario->horFin)?$horario->horFin:old('horFin') }}">
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>