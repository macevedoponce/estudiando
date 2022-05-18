@extends('layouts.user_type.auth')

@section('template_title')
    Create Dethorario
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
              <!-- mensaje -->
              <div class="card-header">
                <div class="float-right">
                    <a class="btn btn-primary" href="{{ route('dethorarios.index') }}"> Volver</a>
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
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Dethorario</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('dethorarios.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('dethorario.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
