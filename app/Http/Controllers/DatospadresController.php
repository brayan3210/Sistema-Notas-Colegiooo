<?php

namespace App\Http\Controllers;

use App\Models\Estudiantepadre;
use Illuminate\Http\Request;
use App\Models\Padresdatos;
use Illuminate\Support\Facades\DB;

class DatospadresController extends Controller
{
    public function Padres()
    {
        return view('auth.Datospadres'); // Asegúrate de tener una vista en resources/views/auth/Matricula.blade.php
    }

    public function datos()
    {
        $estudiante = Estudiantepadre::all();
        return view('Datospadres.datos', compact('estudiante'));
    }

    public function Registrodatos(Request $request)
    {
        // Primero, valida los campos del formulario
        $request->validate([
            'nombres' => 'required',
            'numero_docu' => 'required',
            'municipio_expe' => 'required',
            'edad' => 'required',
            'parentesco' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'ocupacion' => 'required',
            'buscar_documento' => 'required', // Aquí pedimos el número de documento para la búsqueda
        ]);

        // Buscar el estudiante por el número de documento ingresado
        $estudiante = Estudiantepadre::where('n_documento', $request->buscar_documento)->first();

        // Verifica si se encontró el estudiante
        if (!$estudiante) {
            return redirect()->back()->withErrors(['buscar_documento' => 'Estudiante no encontrado']);
        }

        // Guardar los datos de los padres junto con el id del estudiante encontrado
        Padresdatos::create([
            'nombres' => $request->nombres,
            'numero_docu' => $request->numero_docu,
            'municipio_expe' => $request->municipio_expe,
            'edad' => $request->edad,
            'parentesco' => $request->parentesco,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'ocupacion' => $request->ocupacion,
            'id_estudiante' => $estudiante->id_estudiante, // Aquí asociamos el estudiante encontrado
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('Correcto', 'Estudiante Matriculado y datos de los padres registrados correctamente');
    }

    public function buscarEstudiante(Request $request)
    {
        $numeroDocumento = $request->input('buscar_documento');

        // Buscar el estudiante por número de documento
        $estudiante = Estudiantepadre::where('n_documento', $numeroDocumento)->first();

        // Retornar el resultado de la búsqueda
        if ($estudiante) {
            return response()->json(['n_documento' => $estudiante->n_documento]);
        } else {
            return response()->json(['error' => 'Estudiante no encontrado'], 404);
        }
    }
}
