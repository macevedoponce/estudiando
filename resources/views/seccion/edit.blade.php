@extends('layouts.user_type.auth')

@section('template_title')
    Update Seccion
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Seccion</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('seccions.update', $seccion->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('seccion.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
