@extends('layouts.user_type.auth')

@section('template_title')
    Update Grado
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Grado</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('grados.update', $grado->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('grado.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
