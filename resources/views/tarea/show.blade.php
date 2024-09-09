@extends('layouts.app')

@section('template_title')
    {{ $tarea->name ?? __('Show') . " " . __('Tarea') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Tarea</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('tareas.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Descripcion:</strong>
                            {{ $tarea->descripcion }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Responsable:</strong>
                            {{ $tarea->responsable }}
                        </div>

                        <div class="form-group mb-2 mb20">
                            <strong>Imagen:</strong>
                            <img src="{{ $tarea->imageURL }}" class="img-thumbnail" alt="{{ $tarea->descripcion }}">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
