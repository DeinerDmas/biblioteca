@extends('layouts.main')

@section('title', 'Detalles del Libro')

@section('content')
    <h1>Detalles del Libro</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $libro->name }}</h5>
            <p class="card-text"><strong>ID:</strong> {{ $libro->id }}</p>
            <p class="card-text"><strong>Cantidad:</strong> {{ $libro->cantidad }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('libros.index') }}" class="btn btn-secondary">Volver a la lista</a>
        </div>
    </div>
@endsection
