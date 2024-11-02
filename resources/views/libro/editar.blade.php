@extends('layouts.main')

@section('title', 'Editando un libro')

@section('content')
    <h1 class="professional-title">Editando el libro</h1>

  

    <!-- Formulario para crear un libro -->
    <form action="{{ route('libros.update',$libro->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nombre del libro</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $libro->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="number" id="cantidad" name="cantidad" class="form-control" value="{{ old('cantidad',$libro->cantidad) }}" required min="1">
        </div>

        <div class="d-flex justify-content-end mt-2">
            <button type="submit" class="btn btn-primary">
                Actualizar
            </button>
        </div>
    </form>
    <div class="d-flex mt-2">
        <a href="{{ route('dashboard') }}">
            <button class="btn btn-primary">
                Cancelar
            </button> 
        </a>
    </div>
@endsection
