@extends('layouts.user_type.auth')

@section('template_title')
    Curso
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-12">
                <div class="card">
                    <h6>Importar Cursos .csv</h6>
                <form action="{{ route('cursos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <input class="form-control" type="file" name="import_file">
                        <button type="submit" class="btn btn-primary  mb-0"><i class="fa fa-fw fa-trash"></i> Importar</button>
                    </div>
                </form>

            </div>
              </div>

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Curso') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('cursos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear nuevo curso') }}
                                </a>
                              </div>
                              <div class="d-md-flex justify-content-md-end">
                                <form action="{{route('cursos.index')}}" method="get">

                                  <div class="btn-group">
                                    <input type="text" name="busqueda" id="busqueda" class="form-control">
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
                                    <tr class="text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                        <th>No</th>
										<th>CURSO</th>
										<th>DOCENTE</th>
										<th>GRADO</th>
										<th>SECCION</th>

                                        <th>ACCIONES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cursos as $curso)
                                        <tr class="mb-0 text-xs text-uppercase text-center">
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $curso->curNombre }}</td>
											<td>
                                                {{ $curso->docente->docNombres}}
                                            </td>
											<td>{{ $curso->grado->graNombre }}</td>
											<td>{{ $curso->seccion->secNombre }}</td>

                                            <td>
                                                <form action="{{ route('cursos.destroy',$curso->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('cursos.show',$curso->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('cursos.edit',$curso->id) }}"><i class="fa fa-fw fa-edit"></i></a>
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
                {!! $cursos->appends(['busqueda'=>$busqueda]) !!}
            </div>
        </div>

    </div>
    
@endsection
