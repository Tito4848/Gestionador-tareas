<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="descripcion" class="form-label">{{ __('Descripcion') }}</label>
            <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{ old('descripcion', $tarea?->descripcion) }}" id="descripcion" placeholder="Descripcion">
            {!! $errors->first('descripcion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="responsable" class="form-label">{{ __('Responsable') }}</label>
            <input type="text" name="responsable" class="form-control @error('responsable') is-invalid @enderror" value="{{ old('responsable', $tarea?->responsable) }}" id="responsable" placeholder="Responsable">
            {!! $errors->first('responsable', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="imageURL" class="input-group-text">{{ __('Imagen (opcional)') }}</label>
            <input type="file" name="imageURL" class="form-control @error('imageURL') is-invalid @enderror" value="{{ old('imageURL', $tarea?->imageURL) }}" id="imageURL">
            {!! $errors->first('imageURL', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
        <a href="{{ route('tareas.index') }}"><button type="button" class="btn btn-danger" >{{ __('Cancelar') }}</button></a>
    </div>
</div>