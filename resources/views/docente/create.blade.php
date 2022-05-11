@extends('layouts.user_type.auth')

@section('template_title')
    Create Docente
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
     
                        <!-- mensaje -->
                        <div class="card-header">
                            <div class="float-right">
                                <a class="btn btn-primary" href="{{ route('docentes.index') }}"> Volver</a>
                            </div>
                        </div>
                    @if (count($errors)>0)
                    <div class="alert alert-danger" role="alert">

                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>  
                    @endforeach
                    </ul>
                    </div>
                    @endif
                    <!-- fin mensaje -->
                        <div class="row">
                          <div class="col">
                            <div class="card-header">
                                <span class="card-title">Create Docente</span>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('docentes.store') }}"  role="form" enctype="multipart/form-data">
                                    @csrf
        
                                    @include('docente.form')
        
                                </form>
                            </div>
                          </div>
                          <div class="col-md-auto">
                            <div class="card-header">
                                <span class="card-title">Importar Docentes</span>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('docentes.store') }}"  role="form" enctype="multipart/form-data">
                                    @csrf
        
                                    <div class="box box-info padding-1">
                                        <div class="form-group">
                                            <h6>Seleccionar  archivo</h6>
                                            <div class="mb-3">
                                              <input class="form-control" type="file" accept="application/csv, .csv,.xlsx" name="import_file"><br>
                                              <button type="submit" class="btn btn-dark  mb-0"><i class="fa fa-fw fa-cloud-upload"></i> Importar</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                          </div>
                        </div>
            </div>
        </div>
    </section>
@endsection
