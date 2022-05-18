<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            <strong>Alumno [DNI] </strong>

            <div class="form-group">
                <strong>Periodo:</strong>
                <input readonly class="form-control" type="text" name="matPeriodo" id="matPeriodo" 
                value="{{date('Y')}}">
            </div>

            <select name ="aluId" id="aluId" class="form-select" aria-label="Default select example" >
                <option value="">Selecciona un alumno</option>
                @if ($matricula->aluId)
                <option class="text-uppercase" selected value="{{$matricula->aluId}}">{{$matricula->alumno->aluDni}} {{$matricula->alumno->aluNombres}}</option>
                @endif
                @foreach ($alu as $alumno)
                <option class="text-uppercase" value="{{$alumno->id}}"> {{ $alumno->aluDni}} {{ $alumno->aluNombres}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <strong>Grado</strong>
            <select name ="graId" id="graId" class="form-select" aria-label="Default select example" >
                <option value="">Selecciona un grado</option>
                @if ($matricula->graId)
                <option selected class="text-uppercase" value="{{$matricula->graId}}"> {{$matricula->grado->graNombre}}</option>
                @endif
                @foreach ($gra as $grado)
                <option class="text-uppercase" 
                value="{{$grado->id}}"> {{ $grado->graNombre}} </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <strong>Sección</strong>
            <select name ="secId" id="secId" class="form-select" aria-label="Default select example" >
                <option value="">Selecciona una sección</option>
                @if ($matricula->secId)
                <option selected class="text-uppercase" value="{{$matricula->secId}}"> {{$matricula->seccion->secNombre}}</option>
                @endif
                @foreach ($sec as $seccion)
                <option class="text-uppercase" 
                value="{{$seccion->id}}"> {{ $seccion->secNombre}} </option>
                @endforeach
            </select>
        </div>
               

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
