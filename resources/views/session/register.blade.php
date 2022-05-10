@extends('layouts.user_type.guest')

@section('content')

  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient">CREAR CUENTA NUEVA</h3>
                </div>
                <div class="card-body">
                  <form role="form text-left" method="POST" action="/register">
                    @csrf
                    <div class="mb-3">
                      <input type="text" class="form-control" placeholder="Nombre Completo" name="name" id="name" aria-label="Name" aria-describedby="name" value="{{ old('name') }}">
                      @error('name')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <input type="email" class="form-control" placeholder="Correo" name="email" id="email" aria-label="Email" aria-describedby="email-addon" value="{{ old('email') }}">
                      @error('email')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <input type="password" class="form-control" placeholder="Contraseña" name="password" id="password" aria-label="Password" aria-describedby="password-addon">
                      @error('password')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                      @enderror
                    </div>
                    
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Registrarte</button>
                    </div>
                    <p class="text-sm mt-3 mb-0">¿Ya tienes una cuenta?<a href="login" class="text-dark font-weight-bolder"> Ingresar</a></p>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    ¿No tienes una cuenta?
                    <a href="register" class="text-info text-gradient font-weight-bold">Crear una cuenta nueva</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-color: #112E50"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

@endsection


