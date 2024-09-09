@extends('layouts.app')

@section('template_title')
    Tarea
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Tarea') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('tareas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Tarea') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Descripcion</th>
										<th>Responsable</th>
                                        <th>Imagen</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tareas as $tarea)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $tarea->descripcion }}</td>
											<td>{{ $tarea->responsable }}</td>
                                            @if(($tarea?->imageURL))
                                            <td><img src="{{ $tarea->imageURL }}" class="img-thumbnail" height="100px" width="100px" alt="{{ $tarea->descripcion }}"></td>
                                            @else
                                            <td>Sin imagen</td>
                                            @endif

                                            <td>
                                                <form action="{{ route('tareas.destroy',$tarea->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('tareas.show',$tarea->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('tareas.edit',$tarea->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $tareas->links() !!}
            </div>
        </div>
    </div>
@endsection
