@extends('layouts.user_type.auth')

@section('template_title')
    {{ $seccion->name ?? 'Show Seccion' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Seccion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('seccions.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Secnombre:</strong>
                            {{ $seccion->secNombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
