<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class XmlController extends Controller
{
    public function index()
    {
        return view('preferencias');
    }
    
    public function mostrar()
    {
        $xmlPath = storage_path('xml/libros.xml');

        if (!file_exists($xmlPath)) {
            return response()->json(['error' => 'Archivo XML no encontrado.'], 404);
        }

        $xml = simplexml_load_file($xmlPath);

        $libros = [];

        foreach ($xml->libro as $libro) {
            $libros[] = [
                'titulo' => (string) $libro->titulo,
                'autor' => (string) $libro->autor,
                'anio' => (int) $libro->anio,
            ];
        }

        // Convertimos a JSON para cumplir con el requisito
        $jsonLibros = json_encode($libros);

        // Enviamos el JSON decodificado a la vista
        return view('preferencias', ['libros' => json_decode($jsonLibros,true)]);
    }
}

