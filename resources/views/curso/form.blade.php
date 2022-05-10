<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            <strong>Nombre:</strong>
            <input class="form-control" type="text" name="curNombre" id="curNombre" value="{{$curso->curNombre}}">
        </div>
        <div class="form-group">
            <strong>Docente a cargo:</strong>
            <select name ="docId" id="docId" class="form-select" aria-label="Default select example" >
                <option selected>{{$curso->docId}}</option>
                @foreach ($doc as $docente)
                <option class="text-uppercase" value="{{$docente->id}}"> {{$docente->id}} {{$docente->docNombres}} {{$docente->docApellidoPaterno}} {{$docente->docApellidoMaterno}}</option>
                @endforeach
              </select>
        </div>

        <div class="form-group">
            <strong>Grado:</strong>
            <select name ="graId" id="graId" class="form-select" aria-label="Default select example" >
                <option value="" selected>{{$curso->graId}}</option>
                @foreach ($gra as $grado)
                <option value="{{$grado->id}}">{{$grado->id}} {{$grado->graNombre}}</option>
                @endforeach
              </select>
        </div>

        <div class="form-group">
            <strong>Seccion:</strong>
            <select name ="secId" id="secId" class="form-select" aria-label="Default select example" >
                <option selected>{{$curso->secId}}</option>
                @foreach ($sec as $seccion)
                <option value="{{$seccion->id}}">{{$seccion->id}} {{$seccion->secNombre}}</option>
                @endforeach
              </select>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>

