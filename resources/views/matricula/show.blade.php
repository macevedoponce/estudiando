@extends('layouts.user_type.auth')
@section('template_title')
    {{ $matricula->name ?? 'Show Matricula' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Matricula</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('matriculas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Aluid:</strong>
                            {{ $matricula->alumno->aluDni }}
                        </div>
                        <div class="form-group">
                            <strong>Graid:</strong>
                            {{ $matricula->grado->graNombre }}
                        </div>
                        <div class="form-group">
                            <strong>Secid:</strong>
                            {{ $matricula->seccion->secNombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
