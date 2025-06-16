<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Constructor para aplicar middlewares de autorización
     */
    public function __construct()
    {
        // Aplicar middleware de autenticación a todas las rutas
        $this->middleware('auth');

        // Asignar autorizaciones específicas por método
        $this->middleware('can:libros.view')->only(['index', 'show']);
        $this->middleware('can:libros.create')->only(['create', 'store']);
        $this->middleware('can:libros.edit')->only(['edit', 'update']);
        $this->middleware('can:libros.delete')->only('destroy');
    }

    /**
     * Mostrar listado de libros
     */
    public function index()
    {
        $libros = Libro::all();
        return view('frontend.libros.index', compact('libros'));
    }

    /**
     * Mostrar formulario de creación
     */
    public function create()
    {
        return view('frontend.libros.create');
    }

    /**
     * Almacenar nuevo libro
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'anio' => 'required|digits:4|integer|min:1000|max:' . date('Y'),
            'estado' => 'required|in:disponible,prestado',
        ]);

        Libro::create($validated);

        return redirect()->route('libros.index')
            ->with('success', 'Libro creado con éxito');
    }

    /**
     * Mostrar detalles de un libro
     */
    public function show(Libro $libro)
    {
        return view('frontend.libros.show', compact('libro'));
    }

    /**
     * Mostrar formulario de edición
     */
    public function edit(Libro $libro)
    {
        return view('frontend.libros.edit', compact('libro'));
    }

    /**
     * Actualizar libro existente
     */
    public function update(Request $request, Libro $libro)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'anio' => 'required|digits:4|integer|min:1000|max:' . date('Y'),
            'estado' => 'required|in:disponible,prestado',
        ]);

        $libro->update($validated);

        return redirect()->route('libros.index')
            ->with('success', 'Libro actualizado con éxito');
    }

    /**
     * Eliminar libro
     */
    public function destroy(Libro $libro)
    {
        $libro->delete();
        return redirect()->route('libros.index')
            ->with('success', 'Libro eliminado');
    }
}
