@extends('layouts.user_type.auth')

@section('template_title')
    Create Seccion
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Seccion</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('seccions.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('seccion.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
