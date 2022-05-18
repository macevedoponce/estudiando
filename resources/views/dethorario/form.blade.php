<div class="box box-info padding-1">
    <div class="box-body">
        
        
    <!--<div class="form-check">
        <strong>Hor ID</strong>
        <select name ="horId[]" id="horId[]" class="form-select" aria-label="Default select example" >
            <option selected>{{$dethorario->horId}}</option>
            @foreach ($hor as $horario)
            <option class="text-uppercase" 
            value="{{$horario->id}}"> {{ $horario->id}} {{$horario->horDia}} {{$horario->horInicio}} {{$horario->horFin}}</option>
            @endforeach
        </select>
    </div>-->
     
    <div class="form-check">
        <strong>CurID</strong>
        <select name ="curId" id="curId" class="form-select" aria-label="Default select example" >
            <option selected>{{$dethorario->curId}}</option>
            @foreach ($cur as $curso)
            <option class="text-uppercase" value="{{$curso->id}}">{{ $curso->curCodigo}} | {{$curso->curNombre}} {{$curso->grado->graNombre}} {{$curso->seccion->secNombre}}</option>
            @endforeach
        </select>
    </div>




    <!-- inicio de prueba -->
<div class="row">
    <div class="form-check col-md-4">
        <strong>Día:</strong>
        <input type="number" name="dia" id="dia">
    </div>
    <div class="form-check col-md-4">
        <strong>Hora Inicio</strong>
        <input type="time" name="hora_inicio" id="hora_inicio">
    </div>
    <div class="form-check col-md-4">
        <strong>Hora Fin</strong>
        <input type="time" name="hora_fin" id="hora_fin">
    </div>
</div>



    <!-- fin de prueba -->







<!--
    <div class="form-check">
        <strong>CurID</strong>
        <select name ="horId" id="horId" class="form-select" aria-label="Default select example" >
            <option selected>{{$dethorario->curId}}</option>
            @foreach ($hor as $horario)
            <option class="text-uppercase" value="{{$horario->id}}"> {{ $horario->horDia}} | {{$horario->horInicio}} {{$horario->horFin}}</option>
            @endforeach
        </select>
    </div>
-->
<br>
<!--
   <div class="row">
        <div class="form-check col-md-2">
            <strong>LUNES</strong>
                @foreach ($hor as $horario)
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name ="horario[]"  value="{{'Lunes:'}} {{$horario->horInicio}} {{$horario->horFin}}"
                    @if (in_array("{{'Lunes:'}} {{$horario->horInicio}} {{$horario->horFin}}", old('horario', [])))
                        checked
                    @endif
                    >
                    <label >{{$horario->horInicio}} {{$horario->horFin}}</label>
                </div>
                @endforeach
          </div>
          <div class="col-md-2">
            <strong>MARTES</strong>
                @foreach ($hor as $horario)
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name ="horario[]"  value="{{'Martes:'}} {{$horario->horInicio}} {{$horario->horFin}}">
                    <label >{{$horario->horInicio}} {{$horario->horFin}}</label>
                </div>
                @endforeach
          </div>
          <div class="col-md-2">
            <strong>MIERCOLES</strong>
                @foreach ($hor as $horario)
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name ="horario[]"  value="{{'Miercoles:'}} {{$horario->horInicio}} {{$horario->horFin}}">
                    <label >{{$horario->horInicio}} {{$horario->horFin}}</label>
                </div>
                @endforeach
          </div>
          <div class="col-md-2">
            <strong>JUEVES</strong>
                @foreach ($hor as $horario)
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name ="horario[]"  value="{{'Jueves:'}} {{$horario->horInicio}} {{$horario->horFin}}">
                    <label >{{$horario->horInicio}} {{$horario->horFin}}</label>
                </div>
                @endforeach
          </div>
          <div class="col-md-2">
            <strong>VIERNES</strong>
                @foreach ($hor as $horario)
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name ="horario[]" value="{{'Viernes:'}} {{$horario->horInicio}} {{$horario->horFin}}">
                    <label >{{$horario->horInicio}} {{$horario->horFin}}</label>
                </div>
                @endforeach
          </div>
    </div>
-->
   
    {{-- <div class="row">
        <div class="form-group col-md-2">
            <label for="horario">Lunes</label>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Lunes: 7:30 - 8:10" value="Lunes: 7:30 - 8:10">
                    <label for="Lunes: 7:30 - 8:10">7:30 - 8:10</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Lunes: 8:10 - 8:50" value="Lunes: 8:10 - 8:50">
                    <label for="Lunes: 8:10 - 8:50">8:10 - 8:50</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Lunes: 8:50 - 9:30" value="Lunes: 8:50 - 9:30">
                    <label for="Lunes: 8:50 - 9:30">8:50 - 9:30</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Lunes: 9:30 - 10:10" value="Lunes: 9:30 - 10:10">
                    <label for="Lunes: 9:30 - 10:10">9:30 - 10:10</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Lunes: 10:10 - 10:50" value="Lunes: 10:10 - 10:50">
                    <label for="Lunes: 10:10 - 10:50">10:10 - 10:50</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Lunes: 10:50 - 11:30" value="Lunes: 10:50 - 11:30">
                    <label for="Lunes: 10:50 - 11:30">10:50 - 11:30</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Lunes: 11:30 - 12:10" value="Lunes: 11:30 - 12:10">
                    <label for="Lunes: 11:30 - 12:10">11:30 - 12:10</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Lunes: 12:10 - 12:50" value="Lunes: 12:10 - 12:50">
                    <label for="Lunes: 12:10 - 12:50">12:10 - 12:50</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Lunes: 12:50 - 1:30" value="Lunes: 12:50 - 1:30">
                    <label for="Lunes: 12:50 - 1:30">12:50 - 1:30</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Lunes: 1:30 - 2:10" value="Lunes: 1:30 - 2:10">
                    <label for="Lunes: 1:30 - 2:10">1:30 - 2:10</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Lunes: 2:10 - 2:50" value="Lunes: 2:10 - 2:50">
                    <label for="Lunes: 2:10 - 2:50">2:10 - 2:50</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name ="horario[]" id="Lunes: 2:50 - 3:10" value="Lunes: 2:50 - 3:10">
                    <label for="Lunes: 2:50 - 3:10">2:50 - 3:10</label>
                </div>
          </div>
          <!-- Martes -->
          <div class="form-group col-md-2">
            <label for="horario">Martes</label>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Martes: 7:30 - 8:10" value="Martes: 7:30 - 8:10">
                    <label for="Martes: 7:30 - 8:10">7:30 - 8:10</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Martes: 8:10 - 8:50" value="Martes: 8:10 - 8:50">
                    <label for="Martes: 8:10 - 8:50">8:10 - 8:50</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Martes: 8:50 - 9:30" value="Martes: 8:50 - 9:30">
                    <label for="Martes: 8:50 - 9:30">8:50 - 9:30</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Martes: 9:30 - 10:10" value="Martes: 9:30 - 10:10">
                    <label for="Martes: 9:30 - 10:10">9:30 - 10:10</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Martes: 10:10 - 10:50" value="Martes: 10:10 - 10:50">
                    <label for="Martes: 10:10 - 10:50">10:10 - 10:50</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Martes: 10:50 - 11:30" value="Martes: 10:50 - 11:30">
                    <label for="Martes: 10:50 - 11:30">10:50 - 11:30</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Martes: 11:30 - 12:10" value="Martes: 11:30 - 12:10">
                    <label for="Martes: 11:30 - 12:10">11:30 - 12:10</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Martes: 12:10 - 12:50" value="Martes: 12:10 - 12:50">
                    <label for="Martes: 12:10 - 12:50">12:10 - 12:50</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Martes: 12:50 - 1:30" value="Martes: 12:50 - 1:30">
                    <label for="Martes: 12:50 - 1:30">12:50 - 1:30</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Martes: 1:30 - 2:10" value="Martes: 1:30 - 2:10">
                    <label for="Martes: 1:30 - 2:10">1:30 - 2:10</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Martes: 2:10 - 2:50" value="Martes: 2:10 - 2:50">
                    <label for="Martes: 2:10 - 2:50">2:10 - 2:50</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name ="horario[]" id="Martes: 2:50 - 3:10" value="Martes: 2:50 - 3:10">
                    <label for="Martes: 2:50 - 3:10">2:50 - 3:10</label>
                </div>
          </div>
          <!--Miercoles -->
          <div class="form-group col-md-2">
            <label for="horario">Miercoles</label>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Miercoles: 7:30 - 8:10" value="Miercoles: 7:30 - 8:10">
                    <label for="Miercoles: 7:30 - 8:10">7:30 - 8:10</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Miercoles: 8:10 - 8:50" value="Miercoles: 8:10 - 8:50">
                    <label for="Miercoles: 8:10 - 8:50">8:10 - 8:50</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Miercoles: 8:50 - 9:30" value="Miercoles: 8:50 - 9:30">
                    <label for="Miercoles: 8:50 - 9:30">8:50 - 9:30</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Miercoles: 9:30 - 10:10" value="Miercoles: 9:30 - 10:10">
                    <label for="Miercoles: 9:30 - 10:10">9:30 - 10:10</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Miercoles: 10:10 - 10:50" value="Miercoles: 10:10 - 10:50">
                    <label for="Miercoles: 10:10 - 10:50">10:10 - 10:50</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Miercoles: 10:50 - 11:30" value="Miercoles: 10:50 - 11:30">
                    <label for="Miercoles: 10:50 - 11:30">10:50 - 11:30</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Miercoles: 11:30 - 12:10" value="Miercoles: 11:30 - 12:10">
                    <label for="Miercoles: 11:30 - 12:10">11:30 - 12:10</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Miercoles: 12:10 - 12:50" value="Miercoles: 12:10 - 12:50">
                    <label for="Miercoles: 12:10 - 12:50">12:10 - 12:50</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Miercoles: 12:50 - 1:30" value="Miercoles: 12:50 - 1:30">
                    <label for="Miercoles: 12:50 - 1:30">12:50 - 1:30</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Miercoles: 1:30 - 2:10" value="Miercoles: 1:30 - 2:10">
                    <label for="Miercoles: 1:30 - 2:10">1:30 - 2:10</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Miercoles: 2:10 - 2:50" value="Miercoles: 2:10 - 2:50">
                    <label for="Miercoles: 2:10 - 2:50">2:10 - 2:50</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name ="horario[]" id="Miercoles: 2:50 - 3:10" value="Miercoles: 2:50 - 3:10">
                    <label for="Miercoles: 2:50 - 3:10">2:50 - 3:10</label>
                </div>
          </div>
          <!--Jueves-->
          <div class="form-group col-md-2">
            <label for="horario">Jueves</label>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Jueves: 7:30 - 8:10" value="Jueves: 7:30 - 8:10">
                    <label for="Jueves: 7:30 - 8:10">7:30 - 8:10</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Jueves: 8:10 - 8:50" value="Jueves: 8:10 - 8:50">
                    <label for="Jueves: 8:10 - 8:50">8:10 - 8:50</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Jueves: 8:50 - 9:30" value="Jueves: 8:50 - 9:30">
                    <label for="Jueves: 8:50 - 9:30">8:50 - 9:30</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Jueves: 9:30 - 10:10" value="Jueves: 9:30 - 10:10">
                    <label for="Jueves: 9:30 - 10:10">9:30 - 10:10</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Jueves: 10:10 - 10:50" value="Jueves: 10:10 - 10:50">
                    <label for="Jueves: 10:10 - 10:50">10:10 - 10:50</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Jueves: 10:50 - 11:30" value="Jueves: 10:50 - 11:30">
                    <label for="Jueves: 10:50 - 11:30">10:50 - 11:30</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Jueves: 11:30 - 12:10" value="Jueves: 11:30 - 12:10">
                    <label for="Jueves: 11:30 - 12:10">11:30 - 12:10</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Jueves: 12:10 - 12:50" value="Jueves: 12:10 - 12:50">
                    <label for="Jueves: 12:10 - 12:50">12:10 - 12:50</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Jueves: 12:50 - 1:30" value="Jueves: 12:50 - 1:30">
                    <label for="Jueves: 12:50 - 1:30">12:50 - 1:30</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Jueves: 1:30 - 2:10" value="Jueves: 1:30 - 2:10">
                    <label for="Jueves: 1:30 - 2:10">1:30 - 2:10</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Jueves: 2:10 - 2:50" value="Jueves: 2:10 - 2:50">
                    <label for="Jueves: 2:10 - 2:50">2:10 - 2:50</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name ="horario[]" id="Jueves: 2:50 - 3:10" value="Jueves: 2:50 - 3:10">
                    <label for="Jueves: 2:50 - 3:10">2:50 - 3:10</label>
                </div>
          </div>
          <!--Viernes -->
          <div class="form-group col-md-2">
            <label for="horario">Viernes</label>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Viernes: 7:30 - 8:10" value="Viernes: 7:30 - 8:10">
                    <label for="Viernes: 7:30 - 8:10">7:30 - 8:10</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Viernes: 8:10 - 8:50" value="Viernes: 8:10 - 8:50">
                    <label for="Viernes: 8:10 - 8:50">8:10 - 8:50</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Viernes: 8:50 - 9:30" value="Viernes: 8:50 - 9:30">
                    <label for="Viernes: 8:50 - 9:30">8:50 - 9:30</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Viernes: 9:30 - 10:10" value="Viernes: 9:30 - 10:10">
                    <label for="Viernes: 9:30 - 10:10">9:30 - 10:10</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Viernes: 10:10 - 10:50" value="Viernes: 10:10 - 10:50">
                    <label for="Viernes: 10:10 - 10:50">10:10 - 10:50</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Viernes: 10:50 - 11:30" value="Viernes: 10:50 - 11:30">
                    <label for="Viernes: 10:50 - 11:30">10:50 - 11:30</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Viernes: 11:30 - 12:10" value="Viernes: 11:30 - 12:10">
                    <label for="Viernes: 11:30 - 12:10">11:30 - 12:10</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Viernes: 12:10 - 12:50" value="Viernes: 12:10 - 12:50">
                    <label for="Viernes: 12:10 - 12:50">12:10 - 12:50</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Viernes: 12:50 - 1:30" value="Viernes: 12:50 - 1:30">
                    <label for="Viernes: 12:50 - 1:30">12:50 - 1:30</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Viernes: 1:30 - 2:10" value="Viernes: 1:30 - 2:10">
                    <label for="Viernes: 1:30 - 2:10">1:30 - 2:10</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario[]" id="Viernes: 2:10 - 2:50" value="Viernes: 2:10 - 2:50">
                    <label for="Viernes: 2:10 - 2:50">2:10 - 2:50</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name ="horario[]" id="Viernes: 2:50 - 3:10" value="Viernes: 2:50 - 3:10">
                    <label for="Viernes: 2:50 - 3:10">2:50 - 3:10</label>
                </div>
          </div>
          <!--Fin viernes -->
    </div> --}}


    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
