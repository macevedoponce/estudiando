@extends('layouts.app')
@section('content')
<div class="container">
@if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('mensaje')  }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
        
<a href="{{  url('docente/create') }}" class="btn btn-success">Registrar nuevo Docente</a><br><br>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>DNI</th>
            <th>NOMBRES</th>
            <th>APELLIDO PATERNO</th>
            <th>APELLIDO MATERNO</th>
            <th>CONTRASEÑA</th>
            <th>ACCIONES</th>
        </tr>
    </thead>

    <tbody>
        @foreach($docentes as $docente)
        <tr>
            <td>{{ $docente->id }}</td>
            <td>{{ $docente->Dni }}</td>
            <td>{{ $docente->Nombres }}</td>
            <td>{{ $docente->ApellidoPaterno }}</td>
            <td>{{ $docente->ApellidoMaterno }}</td>
            <td>{{ $docente->Password }}</td>
            <td>
                <!--Editar-->
                <a href="{{ url('/docente/'.$docente->id.'/edit') }}" class="btn btn-outline-warning">Editar</a>
                <!--Editar-->

              <!--borrar-->  
                <form action="{{ url('/docente/'.$docente->id) }}" method="POST" class="d-inline">
                    @csrf 
                    {{method_field('DELETE')}}
                    <input type="submit" onclick="return confirm('¿Quieres borrar?')" class="btn btn-outline-danger" value="Borrar">
                </form>
              <!--borrar-->  
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
{!! $docentes -> links() !!}
</div>
@endsection