<?php

namespace App\Http\Controllers;

use App\Models\libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $libros = libro::all();
         return view('dashboard', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         // Retornar la vista con los libros
         return view('libro.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'cantidad' => 'required|integer',
        ]);

        // Crear el libro en la base de datos
        Libro::create([
            'name' => $validated['name'],
            'cantidad' => $validated['cantidad'],

        ]);

        

        // Redirigir de vuelta al dashboard con un mensaje de éxito
        return redirect()->route('dashboard')->with('success', 'Libro creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $libro = Libro::findOrFail($id);
        return view('libro.mostrar', compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $libro = Libro::findOrFail($id);
        
        return view('libro.editar', compact('libro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
{
        // Validar los datos
        $request->validate([
            'name' => 'required|string|max:255',
            'cantidad' => 'required|integer',
        ]);

        // Busca el libro por ID
        $libro = Libro::findOrFail($id);
        
        // Actualiza los campos
        $libro->name = $request->input('name');
        $libro->cantidad = $request->input('cantidad');
        
        // Guarda los cambios
        $libro->save();

        // Redirige con un mensaje de éxito
        return redirect()->route('dashboard')->with('success', 'Libro actualizado exitosamente.');
}

    }

    
    public function destroy($id)
    {
        $libro = Libro::findOrFail($id);
        $libro->delete();
        return redirect()->route('dashboard')->with('success', 'Libro eliminado exitosamente.');
    }

    
}
