<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  
use App\Models\MatriculasEstudiantes;
use App\Models\Pension;

class PensionController extends Controller
{
    public function index()
    {
        $pensiones = Pension::with('estudiante')->get();
        return view('app.pensiones', compact('pensiones'));
    }

    
    public function ListaPensiones(Request $request)
    {
        //HAGO UNA UNIION DE LAS TABLAS PARA QUE ME MUESTRE EL N_DOCUMENTO CORRESPONDIENTE AL ID DE LA TABLA MATRICULASESTUDIANTES
        $query = Pension::query();
        
        // Realizar la unión con la tabla matriculasestudiantes
        $query->join('matriculasestudiantes', 'pensiones.id_estudiante', '=', 'matriculasestudiantes.id_estudiante')
              ->select('pensiones.*', 'matriculasestudiantes.nombres', 'matriculasestudiantes.primer_apellido', 'matriculasestudiantes.n_documento');
        
        // Filtrar por número de documento si se ha proporcionado
        if ($request->filled('n_documento')) {
            $query->where('matriculasestudiantes.n_documento', $request->n_documento);
        }
       // Filtrar por mes y año si se ha proporcionado la fecha
    if ($request->filled('fecha')) {
        $fecha = $request->fecha;
        $year = date('Y', strtotime($fecha));
        $month = date('m', strtotime($fecha));

        $query->whereYear('pensiones.created_at', $year)
              ->whereMonth('pensiones.created_at', $month);
    }
        
        $pensiones = $query->get();
    
        return view('app.pensiones', ['pensiones' => $pensiones]);
    }
    

    public function buscarEstudiante(Request $request)
    {
        //BUSCA A LOS ESTUFIANTES DENTRO DEL MODAL PARA VERIFICAR SI EXSITEN Y REALIZAR EL REGISRTRO DE LA PENSION MENSUALES
        // Validar el request
        $request->validate([
            'n_documento' => 'required|string'
        ]);

        $estudiante = MatriculasEstudiantes::where('n_documento', $request->n_documento)->first();

        if ($estudiante) {
            return response()->json([
                'success' => true,
                'estudiante' => [
                    'nombres' => $estudiante->nombres,
                    'primer_apellido' => $estudiante->primer_apellido,
                    'id_grado' => $estudiante->id_grado,
                    'n_documento' => $estudiante->n_documento,
                    'id_estudiante' => $estudiante->id_estudiante,
                ]
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Estudiante no encontrado'
        ], 404);
    }

    public function registrarPension(Request $request)
    {
        // Validar el request
        $request->validate([
            'id_estudiante' => 'required|exists:matriculasestudiantes,id_estudiante',
            'estado_pago' => 'required|string|max:255',
        ]);

        try {
            $pension = Pension::create([
                'id_estudiante' => $request->id_estudiante,
                'estado_pago' => $request->estado_pago,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Pensión registrada exitosamente',
                'pension' => $pension
            ]);
        } catch (\Exception $e) {
            \Log::error('Error al registrar pensión: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Error al registrar la pensión: ' . $e->getMessage()
            ], 500);
        }
    }
}