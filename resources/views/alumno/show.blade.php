@extends('layouts.user_type.auth')

@section('template_title')
    {{ $alumno->name ?? 'Show Alumno' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('alumnos.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Dni:</strong>
                            {{ $alumno->aluDni }}
                        </div>
                        <div class="form-group">
                            <strong>Nombres:</strong>
                            {{ $alumno->aluNombres }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido Paterno:</strong>
                            {{ $alumno->aluApellidoPaterno }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido Materno:</strong>
                            {{ $alumno->aluApellidoMaterno }}
                        </div>
                        <div class="form-group">
                            <strong>Contraseña:</strong>
                            {{ $alumno->aluPassword }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
