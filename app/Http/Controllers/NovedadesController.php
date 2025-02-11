<?php

namespace App\Http\Controllers;

use App\Models\DocumentoPublicacionBlog;
use App\Models\FotoPublicacionblog;
use App\Models\Publicacionesblog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NovedadesController extends Controller
{
    //
    public function Novedades()
    {
        return view('auth.novedadescolegio'); // Asegúrate de tener una vista en resources/views/auth/register.blade.php
    }

    public function Publicacion()
    {
        return view('app.Crearpublicaciones'); // Asegúrate de tener una vista en resources/views/auth/register.blade.php
    }
    public function index()
{   
     $publicaciones = Publicacionesblog::all();
    //  $publicaciones = FotoPublicacionblog::all();

    // Obtén todas las publicaciones con las fotos asociadas
     $publicaciones = Publicacionesblog::with('fotos')->orderBy('created_at', 'desc')->paginate(9);
    
    return view('auth.novedadescolegio', compact('publicaciones'));
}
public function show($id) {
    $publicacion = Publicacionesblog::with('fotos' ,'documentos')->findOrFail($id);
    return view('auth.novedad_detalle', compact('publicacion'));
}
public function guardarPublicacion(Request $request)
{
    // Validar la solicitud
    $request->validate([
        'titulo_publicacion' => 'required',
        'descripcion' => 'required',
        'fotos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'pdfs.*' => 'nullable|mimes:pdf|max:5120'
    ]);

    // Crear la publicación
    $publicacion = Publicacionesblog::create([
        'titulo_publicacion' => $request->titulo_publicacion,
        'descripcion' => $request->descripcion,
    ]);

    if ($publicacion) {
        // Procesar y guardar imágenes
        if ($request->hasFile('fotos')) {
            foreach ($request->file('fotos') as $foto) {
                $rutaFoto = $foto->store('fotos_publicaciones', 'public');
                
                FotoPublicacionblog::create([
                    'id_publicacion' => $publicacion->id_publicacion,
                    'ruta_foto' => $rutaFoto,
                ]);
            }
        }

        // Procesar y guardar PDFs
        if ($request->hasFile('pdfs')) {
            foreach ($request->file('pdfs') as $pdf) {
                $rutaPdf = $pdf->store('documentos_publicaciones', 'public');
                
                DocumentoPublicacionBlog::create([
                    'id_publicacion' => $publicacion->id_publicacion,
                    'ruta_documento' => $rutaPdf,
                    'tipo_documento' => 'pdf'
                ]);
            }
        }
    }

    return redirect()->back()->with('success', 'Publicación Realizada Correctamente.');
}

public function create(array $data)
{
    $publicacion = Publicacionesblog::create([
        'titulo_publicacion' => $data['titulo_publicacion'],
        'descripcion' => $data['descripcion'],
    ]);

    return redirect()->route('Novedades')->with('Correcto', 'Publicación Realizada Correctamente');
}
}
