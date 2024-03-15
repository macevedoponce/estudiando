@extends('layouts.user_type.auth')

@section('content')

  <div class="row">
    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Docentes</p>
                <h5 class="font-weight-bolder mb-0">
                  <!-- +3,462-->
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md">
                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Estudiantes</p>
                <h5 class="font-weight-bolder mb-0">
                 <!-- +3,462-->
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md">
                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Cursos</p>
                <h5 class="font-weight-bolder mb-0">
                  <!-- +3,462-->
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md">
                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>





<!-- tarjetas de ayuda Estudiando -->

  <div class="row">

    <div class="col-md-4 mb-4">
      <div class="card card-pricing">
        <div class="card-header bg-gradient-dark text-center pt-4 pb-5 position-relative">
          <div class="z-index-1 position-relative">
            <h5 class="text-white">Añadir Docentes</h5>
          </div>
        </div>
        <div class="position-relative mt-n5" style="height: 50px;">
          <div class="position-absolute w-100">
              <svg class="waves waves-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
                <defs>
                  <path id="card-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
                </defs>
                <g class="moving-waves">
                  <use xlink:href="#card-wave" x="48" y="-1" fill="rgba(255,255,255,0.30"></use>
                  <use xlink:href="#card-wave" x="48" y="3" fill="rgba(255,255,255,0.35)"></use>
                  <use xlink:href="#card-wave" x="48" y="5" fill="rgba(255,255,255,0.25)"></use>
                  <use xlink:href="#card-wave" x="48" y="8" fill="rgba(255,255,255,0.20)"></use>
                  <use xlink:href="#card-wave" x="48" y="13" fill="rgba(255,255,255,0.15)"></use>
                  <use xlink:href="#card-wave" x="48" y="16" fill="rgba(255,255,255,0.99)"></use>
                </g>
              </svg>
            </div>
        </div>
        <div class="card-body text-center">
          <img src="https://www.formatemultiverse.com/wp-content/uploads/2020/04/clases-online.png" width="300px" height="200px" alt="">
          <a href="{{url('/docentes')}}" class="btn bg-gradient-dark w-100 mt-4 mb-0">
            Vamos
          </a>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card card-pricing">
        <div class="card-header bg-gradient-dark text-center pt-4 pb-5 position-relative">
          <div class="z-index-1 position-relative">
            <h5 class="text-white">Añadir Alumno</h5>
          </div>
        </div>
        <div class="position-relative mt-n5" style="height: 50px;">
          <div class="position-absolute w-100">
              <svg class="waves waves-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
                <defs>
                  <path id="card-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
                </defs>
                <g class="moving-waves">
                  <use xlink:href="#card-wave" x="48" y="-1" fill="rgba(255,255,255,0.30"></use>
                  <use xlink:href="#card-wave" x="48" y="3" fill="rgba(255,255,255,0.35)"></use>
                  <use xlink:href="#card-wave" x="48" y="5" fill="rgba(255,255,255,0.25)"></use>
                  <use xlink:href="#card-wave" x="48" y="8" fill="rgba(255,255,255,0.20)"></use>
                  <use xlink:href="#card-wave" x="48" y="13" fill="rgba(255,255,255,0.15)"></use>
                  <use xlink:href="#card-wave" x="48" y="16" fill="rgba(255,255,255,0.99)"></use>
                </g>
              </svg>
            </div>
        </div>
        <div class="card-body text-center">
          <img src="https://img.freepik.com/vector-premium/estudiantes-obtienen-educacion-linea-ilustracion-vectorial-concepto-graduacion-universitaria-caracter-personas-pequenas-planas-diploma-universitario-obtener-conocimientos-aprendiendo-internet-estudiante-feliz-bata_109722-3688.jpg" width="300px" height="200px" alt="">
          <a href="{{url('/alumnos')}}" class="btn bg-gradient-dark w-100 mt-4 mb-0">
            Vamos
          </a>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card card-pricing">
        <div class="card-header bg-gradient-dark text-center pt-4 pb-5 position-relative">
          <div class="z-index-1 position-relative">
            <h5 class="text-white">Añadir Curso</h5>
          </div>
        </div>
        <div class="position-relative mt-n5" style="height: 50px;">
          <div class="position-absolute w-100">
              <svg class="waves waves-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
                <defs>
                  <path id="card-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
                </defs>
                <g class="moving-waves">
                  <use xlink:href="#card-wave" x="48" y="-1" fill="rgba(255,255,255,0.30"></use>
                  <use xlink:href="#card-wave" x="48" y="3" fill="rgba(255,255,255,0.35)"></use>
                  <use xlink:href="#card-wave" x="48" y="5" fill="rgba(255,255,255,0.25)"></use>
                  <use xlink:href="#card-wave" x="48" y="8" fill="rgba(255,255,255,0.20)"></use>
                  <use xlink:href="#card-wave" x="48" y="13" fill="rgba(255,255,255,0.15)"></use>
                  <use xlink:href="#card-wave" x="48" y="16" fill="rgba(255,255,255,0.99)"></use>
                </g>
              </svg>
            </div>
        </div>
        <div class="card-body text-center">
          <img src="https://unipython.com/wp-content/uploads/2019/09/unipython-curso-programacion-983x777.jpg" width="300px" height="200px" alt="">
          <a href="{{url('/cursos')}}" class="btn bg-gradient-dark w-100 mt-4 mb-0">
            Vamos
          </a>
        </div>
      </div>
    </div>

  </div>








@endsection


