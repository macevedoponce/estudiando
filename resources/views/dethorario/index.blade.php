@extends('layouts.app')

@section('template_title')
    Dethorario
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Dethorario') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('dethorarios.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
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
                                        
										<th>Horid</th>
                                        <th>Horid</th>
                                        <th>Horid</th>
										<th>Curid</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dethorarios as $dethorario)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $dethorario->horario->horDia }}</td>
                                            <td>{{ $dethorario->horario->horInicio }}</td>
                                            <td>{{ $dethorario->horario->horFin }}</td>
											<td>{{ $dethorario->curId}}</td>

                                            <td>
                                                <form action="{{ route('dethorarios.destroy',$dethorario->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('dethorarios.show',$dethorario->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('dethorarios.edit',$dethorario->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $dethorarios->links() !!}
            </div>
        </div>
    </div>
@endsection
