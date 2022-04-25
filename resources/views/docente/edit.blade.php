@extends('layouts.app')

@section('content')
<div class="container">

<br>
<form action="{{ url('/docente/'.$docente->id) }}" method="post">
    @csrf
    {{method_field('PATCH')}}
    @include('docente.form',['modo'=>'Editar'])
</form>
</div>
@endsection