@extends('layouts.user_type.auth')

@section('template_title')
    Create Grado
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Grado</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('grados.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('grado.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
