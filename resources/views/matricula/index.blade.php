@extends('layouts.user_type.auth')

@section('template_title')
    Matricula
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Matricula') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('matriculas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                              <div class="d-md-flex justify-content-md-end">
                                <form action="{{route('matriculas.index')}}" method="get">
                                  <div class="btn-group">
                                    <input class="form-control me-2 " name="busqueda" id="busqueda" type="search" placeholder="Buscar" aria-label="Search">
                                    <input type="submit" value="buscar" class="btn btn-primary">
                                  </div>

                                </form>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Periodo</th>
										<th>Dni</th>
										<th>Grado</th>
										<th>Seccion</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($matriculas as $matricula)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $matricula->matPeriodo }}</td>
											<td>{{ $matricula->alumno->aluDni }}</td>
											<td>{{ $matricula->grado->graNombre }}</td>
											<td>{{ $matricula->seccion->secNombre }}</td>
                                            
                                            <td>
                                                <form action="{{ route('matriculas.destroy',$matricula->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('matriculas.show',$matricula->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('matriculas.edit',$matricula->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $matriculas->appends(['busqueda'=>$busqueda]) !!}
            </div>
        </div>
    </div>
@endsection
