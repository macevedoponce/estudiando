@extends('layouts.user_type.auth')

@section('template_title')
    Grado
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Grado') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('grados.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Granombre</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($grados as $grado)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $grado->graNombre }}</td>

                                            <td>
                                                <form action="{{ route('grados.destroy',$grado->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('grados.show',$grado->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('grados.edit',$grado->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                   <!-- <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>-->
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $grados->links() !!}
            </div>
        </div>
    </div>
@endsection
