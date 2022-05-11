@extends('layouts.user_type.auth')

@section('template_title')
    {{ $curso->name ?? 'Show Curso' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('cursos.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>Código:</strong>
                            {{ $curso->curCodigo }}
                        </div>
                        <div class="form-group">
                            <strong>Curso:</strong>
                            {{ $curso->curNombre }}
                        </div>
                        <div class="form-group">
                            <strong>Docente a cargo:</strong>
                            {{ $curso->docente->docNombres }}
                        </div>
                        <div class="form-group">
                            <strong>Grado:</strong>
                            {{ $curso->grado->graNombre }}
                        </div>
                        <div class="form-group">
                            <strong>Sección:</strong>
                            {{ $curso->seccion->secNombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
