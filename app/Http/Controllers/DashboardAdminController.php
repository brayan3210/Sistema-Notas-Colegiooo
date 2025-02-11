<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\MatriculasEstudiantes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\PDF;
class DashboardAdminController extends Controller
{
    public function index()
    {
        $data = DB::table('administradores')->where('email', auth()->user()->email)->first();
        $datos = Administrador::all();
        return view('app.dashboard',['datos' => $datos]);
        
    }
    public function listadeadmin()
    {
        $data = DB::table('administradores')->where('email', auth()->user()->email)->first();
        $datos = Administrador::paginate(10);

        return view('app.administradores',['datos' => $datos]);
        
    }
    public function ListaMatriculados(Request $request)
    {
        $query = MatriculasEstudiantes::where('estado', 'Activo');

        if ($request->filled('n_documento')) {
            $query->where('n_documento', $request->n_documento);
        }

        if ($request->filled('id_grado')) {
            $query->where('id_grado', $request->id_grado);
        }

        $matriculados = $query->paginate(10);

        return view('app.Listamatriculados', ['matriculados' => $matriculados]);
    }

    public function showDetails($id)
    {
        $matricula = MatriculasEstudiantes::find($id);
        if ($matricula) {
            // Devuelve la información completa en formato JSON
            return response()->json([
                'nombres' => $matricula->nombres,
                'primer_apellido' => $matricula->primer_apellido,
                'segundo_apellido' => $matricula->segundo_apellido,
                'fecha_nacimiento' => $matricula->fecha_nacimiento,
                'lugar_nacimiento' => $matricula->lugar_nacimiento,
                'n_documento' => $matricula->n_documento,
                'id_grado' => $matricula->id_grado,
                'id_sisben' => $matricula->id_sisben,
                'estado_matricula' => $matricula->estado_matricula,
                'estado'=>$matricula->estado,
            ]);
        } else {
            return response()->json(['message' => 'Estudiante no encontrado'], 404);
        }
    }

    // Método para actualizar detalles del estudiante
    public function updateDetails(Request $request, $id)
    {
        $matricula = MatriculasEstudiantes::find($id);

        if ($matricula) {
            $matricula->update($request->only([
                'nombres', 'primer_apellido', 'segundo_apellido', 
                'fecha_nacimiento', 'lugar_nacimiento', 'n_documento', 
                'id_grado', 'id_sisben', 'estado_matricula', 'estado',
            ]));
            return response()->json(['message' => 'Actualización exitosa']);
        } else {
            return response()->json(['message' => 'Estudiante no encontrado'], 404);
        }
    }
   // Asegúrate de tener instalada la biblioteca DomPDF

   public function descargarReporte(Request $request)
   {
       $id_grado = $request->input('id_grado');
       $estado_matricula = $request->input('estado_matricula');
   
       $matriculados = MatriculasEstudiantes::where('estado_matricula', $estado_matricula)
           ->when($id_grado, function($query) use ($id_grado) {
               return $query->where('id_grado', $id_grado);
           })
           ->get(['nombres', 'primer_apellido', 'segundo_apellido', 'fecha_nacimiento', 'lugar_nacimiento', 'n_documento', 'id_grado', 'id_sisben', 'estado_matricula']); // Selecciona los campos necesarios
   
       $pdf = PDF::loadView('reportes.inscritos', [
           'matriculados' => $matriculados,
           'colegio' => 'Colegio Santo Angel',
           'direccion' => 'CRA 9 N° 7-37 BARRIO TRIANA FLANDES- TOLIMA',
           'logo' => asset('assets/Logocolegio.png'),
           'grado' => $id_grado  // Pasar el grado a la vista
       ]);
   
       return $pdf->download('Reporte_Inscritos.pdf');
   }
   






   public function evidenciaPlanilla(Request $request)
   {
       $id_grado = $request->get('id_grado');
       $id_periodo = $request->get('id_periodo');
   
       // 1. Construimos el query con LEFT JOIN a materias y materias_dimensiones
       $query = DB::table('evidencia_planilla')
           ->leftJoin('materias', 'evidencia_planilla.id_materia', '=', 'materias.id_materia')
           ->leftJoin('materias_dimensiones', 'evidencia_planilla.id_materia_dim', '=', 'materias_dimensiones.id_materia_dim')
           ->join('administradores', 'evidencia_planilla.id_docente', '=', 'administradores.id_usuario')
           ->join('gradosacademicos', 'evidencia_planilla.id_grado', '=', 'gradosacademicos.id_grado')
           ->select(
               'evidencia_planilla.*',
               'administradores.name as docente_nombre',
               'gradosacademicos.grados as grado_nombre',
               // Usamos COALESCE: 
               DB::raw("COALESCE(materias.nombre_materia, materias_dimensiones.nombre_dimension) as nombre_final")
           );
   
       // 2. Filtrar por grado y período si se suministran
       if ($id_grado) {
           $query->where('evidencia_planilla.id_grado', $id_grado);
       }
   
       if ($id_periodo) {
           $query->where('evidencia_planilla.id_periodo', $id_periodo);
       }
   
       // 3. Obtener el resultado
       $evidencias = $query->get();
   
       // 4. Listas para el filtro en la vista
       $grados = DB::table('gradosacademicos')->get();
       $periodos = DB::table('periodos_academicos')->get();
   
       return view('app.evidencia_planilla_admin', compact('evidencias', 'grados', 'periodos'));
   }
   
public function changePassword(Request $request)
{
    $request->validate([
        'new_password'              => 'required|min:6|confirmed',
        // Se espera que el formulario tenga los campos: new_password y new_password_confirmation
    ], [
        'new_password.required'     => 'El campo nueva contraseña es obligatorio.',
        'new_password.min'          => 'La contraseña debe tener al menos 6 caracteres.',
        'new_password.confirmed'    => 'La confirmación de contraseña no coincide.'
    ]);

    $user = Auth::user();
    $user->password = Hash::make($request->new_password);
    $user->force_change_password = false; // Se desactiva el flag o indicador de cambio de contraseña cuando yo inicioy
    $user->save();

    return redirect()->route('dashboard')->with('success', 'Contraseña actualizada correctamente.');
}
 





    // ... Otros métodos existentes ...

    /**
     * Consulta certificados (tanto de historial_academico como de historial_academico_dimensiones)
     * filtrando por número de documento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function certificados(Request $request)
    {
        $documento = $request->input('n_documento'); // Número de documento a buscar
        $certificados = collect();
        $estudiante = null;

        if ($documento) {
            // Buscamos el estudiante por documento
            $estudiante = MatriculasEstudiantes::with('grado')
                ->where('n_documento', $documento)
                ->first();

            if ($estudiante) {
                // Consultamos los certificados de la tabla historial_academico (para grados 4–9)
                $histAcademico = DB::table('historial_academico')
                    ->where('id_estudiante', $estudiante->id_estudiante)
                    ->get();

                foreach ($histAcademico as $h) {
                    // Obtenemos el nombre del grado desde la tabla gradosacademicos
                    $gradoNombre = DB::table('gradosacademicos')
                        ->where('id_grado', $h->id_grado)
                        ->value('grados');
                    
                    $certificados->push([
                        'id_estudiante' => $h->id_estudiante,
                        'anio'          => $h->anio,
                        'tipo'          => 'academico',
                        'grado'         => $gradoNombre,
                    ]);
                }

                // Consultamos los certificados de la tabla historial_academico_dimensiones (para grados 1–3)
                $histDimensiones = DB::table('historial_academico_dimensiones')
                    ->where('id_estudiante', $estudiante->id_estudiante)
                    ->get();

                foreach ($histDimensiones as $h) {
                    $gradoNombre = DB::table('gradosacademicos')
                        ->where('id_grado', $h->id_grado)
                        ->value('grados');
                    
                    $certificados->push([
                        'id_estudiante' => $h->id_estudiante,
                        'anio'          => $h->anio,
                        'tipo'          => 'dimensiones',
                        'grado'         => $gradoNombre,
                    ]);
                }

                // Ordenamos los registros por año descendente
                $certificados = $certificados->sortByDesc('anio');
            }
        }

        return view('app.certificados', compact('certificados', 'documento', 'estudiante'));
    }





}