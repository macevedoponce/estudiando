@extends('layouts.user_type.auth')

@section('template_title')
    Docente
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Docente') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('docentes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo Docente') }}
                                </a>
                              </div>
                              <div class="float-right">
                                <form action="{{route('docentes.index')}}" method="get">
                                  <div class="btn-group">
                                    <input class="form-control me-2 " name="busqueda" id="busqueda" type="search" placeholder="Buscar" aria-label="Search">
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
                                        
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dni</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Apellidos y Nombres</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contraseña</th>

                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($docentes as $docente)
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
                                                    <p class="mb-0 text-xs">{{ $docente->docDni }}</p>
                                                  </div>
                                                </div>
                                              </td>
                                              <td>
                                                <div class="d-flex px-2">
                                                  <div class="my-auto">
                                                    <p class="mb-0 text-xs text-uppercase">{{ $docente->docNombres }} {{ $docente->docApellidoPaterno }} {{ $docente->docApellidoMaterno }}</p>
                                                  </div>
                                                </div>
                                              </td>
                                              <td>
                                                <div class="d-flex px-2">
                                                  <div class="my-auto">
                                                      
                                                    <p type="password" class="mb-0 text-xs">{{ $docente->docPassword }}</p>
                                                  </div>
                                                </div>
                                              </td>

                                            <td>
                                                <form action="{{ route('docentes.destroy',$docente->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('docentes.show',$docente->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('docentes.edit',$docente->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('¿Quieres borrar?')"  class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $docentes->appends(['busqueda'=>$busqueda]) !!}
            </div>
        </div>
    </div>
@endsection

