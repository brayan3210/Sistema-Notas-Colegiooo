<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DocumentosEstudiante;
use App\Models\EstudianteDocumento;
use Illuminate\Support\Facades\Storage;

class DocumentosEstudianteController extends Controller
{
    public function vistadocumentosestudiante()
    {
        return view('auth.Documentosestudiantes');
    }

    public function documentos()
    {
        $estudiante = EstudianteDocumento::all();
        return view('Documentosestudiantes.documentos', compact('estudiante'));
    }

    public function buscarEstudiante(Request $request)
    {
        $numeroDocumento = $request->input('buscar_documento');

        // Buscar el estudiante por número de documento
        $estudiante = EstudianteDocumento::where('n_documento', $numeroDocumento)->first();

        // Retornar el resultado de la búsqueda
        if ($estudiante) {
            return response()->json(['n_documento' => $estudiante->n_documento]);
        } else {
            return response()->json(['error' => 'Estudiante no encontrado'], 404);
        }
    }

    public function Registro(Request $request)
    {
        // Validación de los campos del formulario
        $request->validate([
            'buscar_documento' => 'required',
            'fotocopia_registro_civil' => 'nullable|file|mimes:pdf',
            'fotocopia_carnet_vacunas' => 'nullable|file|mimes:pdf',
            'fotocopia_carnet_covid' => 'nullable|file|mimes:pdf',
            'fotocopia_carnet_crecimiento' => 'nullable|file|mimes:pdf',
            'certificado_eps' => 'nullable|file|mimes:pdf',
            'certificado_medico_visual_auditivo' => 'nullable|file|mimes:pdf',
            'fotocopia_documento_padres_acudiente' => 'nullable|file|mimes:pdf',
            'fotocopia_observador_estudiante' => 'nullable|file|mimes:pdf',
            'boletin_anterior' => 'nullable|file|mimes:pdf',
            'paz_salvo_anterior' => 'nullable|file|mimes:pdf',
            'certificado_grado_quinto' => 'nullable|file|mimes:pdf',
            'retiro_simat' => 'nullable|file|mimes:pdf',
            'fotos_3x4' => 'nullable|file|mimes:jpeg,jpg,png',
        ]);

        // Buscar el estudiante por el número de documento ingresado
        $estudiante = EstudianteDocumento::where('n_documento', $request->buscar_documento)->first();

        // Verifica si se encontró el estudiante
        if (!$estudiante) {
            return redirect()->back()->withErrors(['buscar_documento' => 'Estudiante no encontrado']);
        }

        // Procesar y almacenar los documentos
        $documentos = [
            'fotocopia_registro_civil',
            'fotocopia_carnet_vacunas',
            'fotocopia_carnet_covid',
            'fotocopia_carnet_crecimiento',
            'certificado_eps',
            'certificado_medico_visual_auditivo',
            'fotocopia_documento_padres_acudiente',
            'fotocopia_observador_estudiante',
            'boletin_anterior',
            'paz_salvo_anterior',
            'certificado_grado_quinto',
            'retiro_simat',
            'fotos_3x4'
        ];

        $data = [];

        foreach ($documentos as $documento) {
            if ($request->hasFile($documento)) {
                $file = $request->file($documento);
                $filename = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('documentos_estudiantes', $filename, 'public');
                $data[$documento] = $filePath;
            } else {
                $data[$documento] = null;
            }
        }

        // Guardar los documentos asociados al estudiante
        DocumentosEstudiante::create([
            'id_estudiante' => $estudiante->id_estudiante,
            'fotocopia_registro_civil' => $data['fotocopia_registro_civil'],
            'fotocopia_carnet_vacunas' => $data['fotocopia_carnet_vacunas'],
            'fotocopia_carnet_covid' => $data['fotocopia_carnet_covid'],
            'fotocopia_carnet_crecimiento' => $data['fotocopia_carnet_crecimiento'],
            'certificado_eps' => $data['certificado_eps'],
            'certificado_medico_visual_auditivo' => $data['certificado_medico_visual_auditivo'],
            'fotocopia_documento_padres_acudiente' => $data['fotocopia_documento_padres_acudiente'],
            'fotocopia_observador_estudiante' => $data['fotocopia_observador_estudiante'],
            'boletin_anterior' => $data['boletin_anterior'],
            'paz_salvo_anterior' => $data['paz_salvo_anterior'],
            'certificado_grado_quinto' => $data['certificado_grado_quinto'],
            'retiro_simat' => $data['retiro_simat'],
            'fotos_3x4' => $data['fotos_3x4'],
        ]);

        return redirect()->back()->with('Correcto', 'Documentos guardados correctamente');
    } 
}
