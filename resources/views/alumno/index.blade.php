
@extends('layouts.user_type.auth')

@section('template_title')
    alumnos
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('alumno') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('alumnos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear nuevo alumno') }}
                                </a>
                              </div>
                              <div class="d-md-flex justify-content-md-end">
                                <form action="{{route('alumnos.index')}}" method="get">
                                  <div class="btn-group">
                                    <input type="search" name="busqueda" id="busqueda" placeholder ="Buscar"class="form-control">
                                    <input type="submit" value="buscar" class="btn btn-primary">
                                  </div>

                                </form>
                              </div>
                        </div>
                    </div>
                
                    <div class="card">
                      @if ($message = Session::get('success'))
                      <div class="alert alert-success">
                          <p>{{ $message }}</p>
                      </div>
                  @endif
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                        
										<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">DNI</th>
										<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">apellidos y nombres</th>
										<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">CONTRASEÑA</th>

                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ACCIONES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alumnos as $alumno)
                                        <tr>


                                            <td>
                                                <div class="d-flex px-2">
                                                  <div class="my-auto">
                                                    <h6 class="mb-0 text-xs">{{ ++$i }}</h6>
                                                  </div>
                                                </div>
                                              </td>

                                              <td>
                                                <div class="d-flex px-2">
                                                  <div class="my-auto">
                                                    <p class="mb-0 text-xs">{{ $alumno->aluDni }}</p>
                                                  </div>
                                                </div>
                                              </td>
                                              <td>
                                                <div class="d-flex px-2">
                                                  <div class="my-auto">
                                                    <p class="mb-0 text-xs text-uppercase">{{ $alumno->aluNombres }} {{ $alumno->aluApellidoPaterno }} {{ $alumno->aluApellidoMaterno }}</p>
                                                  </div>
                                                </div>
                                              </td>
                                              
                                              <td>
                                                <div class="d-flex px-2">
                                                  <div class="my-auto">
                                                    <p class="mb-0 text-xs">{{ $alumno->aluPassword }}</p>
                                                  </div>
                                                </div>
                                              </td>

                                            <td>
                                                <form action="{{ route('alumnos.destroy',$alumno->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('alumnos.show',$alumno->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('alumnos.edit',$alumno->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('¿Quieres borrar?')" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $alumnos->appends(['busqueda'=>$busqueda]) !!}
            </div>
        </div>
    </div>
@endsection




