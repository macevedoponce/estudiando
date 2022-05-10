@extends('layouts.user_type.auth')

@section('template_title')
    {{ $docente->name ?? 'Show Docente' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('docentes.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Dni:</strong>
                            {{ $docente->docDni }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $docente->docNombres }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido Paterno:</strong>
                            {{ $docente->docApellidoPaterno }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido Materno:</strong>
                            {{ $docente->docApellidoMaterno }}
                        </div>
                        <div class="form-group">
                            <strong>Contraseña:</strong>
                            {{ $docente->docPassword }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
