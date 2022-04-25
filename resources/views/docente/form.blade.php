

<h1>{{ $modo }} Docentes</h1>
@if(count($errors)>0)

<div class="alert alert-danger" role="alert">
    <ul>
        @foreach($errors -> all() as $error)
       <li> {{  $error }} </li>
        @endforeach
    </ul>
</div>

    
@endif
<div class="form-group">
    <label for="Nombre">Dni</label>
    <input class="form-control" type="text" name="Dni" id="Dni" 
    value="{{ isset($docente->Dni)?$docente->Dni:old('Dni') }}">
    
</div>
<div class="form-group">
    <label for="Nombre">Nombres</label>
    <input class="form-control" type="text" name="Nombres" id="Nombres" 
    value="{{ isset($docente->Nombres)?$docente->Nombres:old('Nombres') }}">
    
</div>
<div class="form-group">
    <label for="Nombre">ApellidoPaterno</label>
    <input class="form-control" type="text" name="ApellidoPaterno" id="ApellidoPaterno" 
    value="{{ isset($docente->ApellidoPaterno)?$docente->ApellidoPaterno:old('ApellidoPaterno') }}">
    
</div>
<div class="form-group">
    <label for="Nombre">ApellidoMaterno</label>
    <input class="form-control" type="text" name="ApellidoMaterno" id="ApellidoMaterno" 
    value="{{ isset($docente->ApellidoMaterno)?$docente->ApellidoMaterno:old('ApellidoMaterno') }}">
    
</div>
<div class="form-group">
    <label for="Nombre">Password</label>
    <input class="form-control" type="password" name="Password" id="Password" 
    value="{{ isset($docente->Password)?$docente->Password:old('Password') }}">
    
</div>
    <input type="submit" value=" {{$modo}} Docente" class="btn btn-success">
    <a href="{{  url('docente/') }}" class="btn btn-primary">Regresar</a>



    