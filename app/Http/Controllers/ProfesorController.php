<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\MatriculasEstudiantes;
use App\Models\Materias;
use App\Models\Notas;
use App\Models\PeriodosAcademicos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfesorController extends Controller
{
    /**
     * Mostrar panel del profesor con lista de estudiantes y materias
     */
    public function index()
    {
        $profesor = Auth::user();

        // Si el docente pertenece a grados 1, 2 o 3, redirigir a la vista de dimensiones
        if (in_array($profesor->id_grado, [1, 2, 3])) {
            return redirect()->route('profesor.dashboard.dimensiones');
        }

        // Para grados 4 a 9 (1ro a 6to)
        $estudiantes = MatriculasEstudiantes::where('id_grado', $profesor->id_grado)
            ->where('estado', 'Activo')
            ->get();

        // Obtener las materias del grado asignado, excluyendo la materia principal "Matemáticas"
        // (pero incluyendo sus submaterias)
        $materias = Materias::where('id_grado', $profesor->id_grado)
            ->where(function ($query) {
                $query->whereNull('id_materia_padre')
                      ->where('nombre_materia', '!=', 'Matemáticas')
                      ->orWhereNotNull('id_materia_padre');
            })
            ->get();

        // Obtener los periodos académicos
        $periodos = PeriodosAcademicos::all();

        return view('app.dashboardprofesor', compact('estudiantes', 'materias', 'periodos'));
    }

    /**
     * Agregar estudiante al grado del profesor.
     */
    public function agregarEstudiante(Request $request)
    {
        $profesor = Auth::user();

        $request->validate([
            'nombres'          => 'required|string|max:255',
            'primer_apellido'  => 'required|string|max:255',
            'segundo_apellido' => 'nullable|string|max:255',
            'n_documento'      => 'required|string|max:50|unique:matriculasestudiantes,n_documento',
            'id_grado'         => 'required|exists:gradosacademicos,id_grado',
            // Si necesitas validar lugar de nacimiento, descomenta:
            // 'lugar_nacimiento'=> 'required|string|max:255',
        ]);

        MatriculasEstudiantes::create([
            'nombres'           => $request->nombres,
            'primer_apellido'   => $request->primer_apellido,
            'segundo_apellido'  => $request->segundo_apellido,
            'n_documento'       => $request->n_documento,
            'id_grado'          => $request->id_grado,

            // Ajusta a tu necesidad
            'lugar_nacimiento'  => $request->lugar_nacimiento ?? null,

            // El estado de matrícula (ej. 'Pago')
            'estado_matricula'  => 'Pago',
            // El estado general (ej. 'Activo') para que aparezca en la lista del profesor
            'estado'            => 'Activo',
        ]);

        return back()->with('success', 'Estudiante agregado exitosamente.');
    }

    /**
     * Registro de notas por materia/periodo para múltiples estudiantes.
     */
    public function registrarNotas(Request $request)
    {
        $request->validate([
            'id_materia'      => 'required|exists:materias,id_materia',
            'id_periodo'      => 'required|exists:periodos_academicos,id_periodo',
            'notas'           => 'required|array',
        ]);

        // Guardar/actualizar las notas para cada estudiante
        foreach ($request->notas as $id_estudiante => $detalleNotas) {
            // La "nota" definitiva de este período (ya calculada en la vista)
            $notaDefinitiva = $detalleNotas['nota'];

            // Actualizar o crear el registro de notas para este estudiante/materia/período
            Notas::updateOrCreate(
                [
                    'id_estudiante' => $id_estudiante,
                    'id_materia'    => $request->id_materia,
                    'id_periodo'    => $request->id_periodo,
                ],
                [
                    'nota' => $notaDefinitiva,
                    // Si deseas guardar observaciones, hetero, auto, etc., agrega aquí
                    // 'observaciones' => '...'
                ]
            );
        }

        // // Validar la promoción de cada estudiante afectado
        // $estudiantesAfectados = array_keys($request->notas);
        // foreach ($estudiantesAfectados as $id_estudiante) {
        //     $this->validarPromocion($id_estudiante);
        // }

        return back()->with('success', 'Notas registradas exitosamente.')->with('open_section', 'registrar-notas');;
    }

    /**
     * Validar promoción de un estudiante (promover o mantener grado).
     */
    // private function validarPromocion($id_estudiante)
    // {
    //     $estudiante = MatriculasEstudiantes::find($id_estudiante);
    //     if (!$estudiante) {
    //         return; // No existe
    //     }

    //     // 1. Tomamos las materias principales (sin id_materia_padre)
    //     //    para luego ver si tienen submaterias (id_materia_padre = id_materia principal)
    //     $materiasPrincipales = Materias::where('id_grado', $estudiante->id_grado)
    //         ->whereNull('id_materia_padre')
    //         ->get();

    //     $reprobo = false;
    //     $todasCompletas = true;

    //     foreach ($materiasPrincipales as $materiaPrincipal) {
    //         // Revisamos si tiene submaterias
    //         $submaterias = Materias::where('id_materia_padre', $materiaPrincipal->id_materia)
    //                                ->where('id_grado', $estudiante->id_grado)
    //                                ->get();

    //         if ($submaterias->count() > 0) {
    //             // == Caso 1: Materia principal con submaterias ==
    //             // Para estar "completa", cada submateria debe tener 4 notas (periodo 1..4)
    //             // y calculamos la definitiva de la materia principal como el promedio
    //             // de las definitivas de cada submateria.
    //             $promedioPrincipal = 0;
    //             $contadorSubmaterias = 0;

    //             foreach ($submaterias as $sub) {
    //                 // Notas de la submateria para el estudiante
    //                 $notasSub = Notas::where('id_estudiante', $id_estudiante)
    //                                  ->where('id_materia', $sub->id_materia)
    //                                  ->pluck('nota');

    //                 // Si no tiene las 4 notas de esta submateria, no puede ser promovido aún
    //                 if ($notasSub->count() < 4) {
    //                     $todasCompletas = false;
    //                     break 2; // salir del foreach principal
    //                 }

    //                 // Definitiva de esta submateria (promedio 4 periodos)
    //                 $defSub = $notasSub->avg();
    //                 $promedioPrincipal += $defSub;
    //                 $contadorSubmaterias++;

    //                 // Verificar si reprobó esta submateria
    //                 if ($defSub < 3.0) {
    //                     $reprobo = true;
    //                 }
    //             }

    //             if ($contadorSubmaterias > 0) {
    //                 $promedioPrincipal = $promedioPrincipal / $contadorSubmaterias;
    //                 // Si el promedio de la "materia principal" también es < 3, reprobó
    //                 // (Opcional si deseas condicionar al promedio global de la principal).
    //                 if ($promedioPrincipal < 3.0) {
    //                     $reprobo = true;
    //                 }
    //             }
    //         } else {
    //             // == Caso 2: Materia principal sin submaterias ==
    //             $notas = Notas::where('id_estudiante', $id_estudiante)
    //                           ->where('id_materia', $materiaPrincipal->id_materia)
    //                           ->pluck('nota');

    //             // Requerimos que el estudiante tenga 4 notas en esa materia
    //             if ($notas->count() < 4) {
    //                 $todasCompletas = false;
    //                 break;
    //             }

    //             // Definitiva de la materia
    //             $definitiva = $notas->avg();
    //             if ($definitiva < 3.0) {
    //                 $reprobo = true;
    //             }
    //         }
    //     }

    //     // 2. Si todas las materias/submaterias tienen 4 notas y no reprobó
    //     if ($todasCompletas && !$reprobo) {
    //         // Registrar historial del grado cursado (con todas las definitivas)
    //         $this->registrarHistorialAcademico($estudiante);

    //         // Verificar si es el último grado (7)
    //         if ($estudiante->id_grado == 9) {
    //             // Se marca como Finalizado
    //             $estudiante->estado = 'Finalizado';
    //         } else {
    //             // Promover al siguiente grado
    //             $estudiante->id_grado = $this->obtenerSiguienteGrado($estudiante->id_grado);
    //         }
    //         $estudiante->save();
    //     }
    //     // Si reprobó o no tiene todas las notas (todasCompletas = false), no hacemos nada.
    // }

    /**
     * Devuelve el siguiente grado (si está en 7, se mantiene en 7).
     */
    private function obtenerSiguienteGrado($gradoActual)
    {
        // Ajustar a la lógica real de tus grados:
        // Por ejemplo, si tus grados van 1..7, 2..7, etc.
        if ($gradoActual < 9) {
            return $gradoActual + 1;
        }
        return 9; // Máximo
    }

    /**
     * Registrar en la tabla historial_academico las definitivas del estudiante
     * del grado que está finalizando.
     */
    private function registrarHistorialAcademico($estudiante)
    {
        // Para almacenar las definitivas por materia
        $definitivas = [];

        // Listar materias (principales y submaterias) del grado actual que está cursando
        $materiasPrincipales = Materias::where('id_grado', $estudiante->id_grado)->whereNull('id_materia_padre')->get();

        // Recorremos cada materia principal y calculamos su definitiva,
        // considerando si tiene submaterias.
        foreach ($materiasPrincipales as $materiaPrincipal) {
            $submaterias = Materias::where('id_materia_padre', $materiaPrincipal->id_materia)
                                   ->where('id_grado', $estudiante->id_grado)
                                   ->get();

            if ($submaterias->count() > 0) {
                // Calcular la definitiva de la materia principal a partir de las submaterias
                $definMateriaPrincipal = 0;
                $contadorSubs = 0;
                foreach ($submaterias as $sub) {
                    // Suma de 4 periodos
                    $notasSub = Notas::where('id_estudiante', $estudiante->id_estudiante)
                                     ->where('id_materia', $sub->id_materia)
                                     ->pluck('nota');

                    // Definitiva submateria
                    $promSub = $notasSub->avg() ?? 0;
                    $definitivas[$sub->nombre_materia] = round($promSub, 2);

                    $definMateriaPrincipal += $promSub;
                    $contadorSubs++;
                }
                if ($contadorSubs > 0) {
                    $definMateriaPrincipal = $definMateriaPrincipal / $contadorSubs;
                }

                // Guardar también la materia principal con el promedio de sus submaterias (opcional)
                $definitivas[$materiaPrincipal->nombre_materia] = round($definMateriaPrincipal, 2);

            } else {
                // Materia principal sin submaterias
                $notas = Notas::where('id_estudiante', $estudiante->id_estudiante)
                              ->where('id_materia', $materiaPrincipal->id_materia)
                              ->pluck('nota');
                $prom = $notas->avg() ?? 0;
                $definitivas[$materiaPrincipal->nombre_materia] = round($prom, 2);
            }
        }

        // Registrar en historial_academico
        DB::table('historial_academico')->insert([
            'id_estudiante' => $estudiante->id_estudiante,
            'id_grado'      => $estudiante->id_grado,  // Grado que acaba de finalizar
            'anio'          => now()->year,
            'definitivas'   => json_encode($definitivas),
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);
    }

    /**
     * Generar reporte PDF de notas de un estudiante en el grado actual.
     * (Lógica de ejemplo que ya tenías; se mantiene igual)
     */
    public function reportePDF($id_estudiante)
    {
        // 1. Recuperar al estudiante con su grado
        $estudiante = MatriculasEstudiantes::with(['grado'])->findOrFail($id_estudiante);
    
        // 2. Obtener todas las materias (principales y submaterias) del grado
        $materias = Materias::where('id_grado', $estudiante->id_grado)
            ->orderBy('id_materia_padre', 'asc')
            ->orderBy('nombre_materia', 'asc')
            ->get();
    
        // 3. Definir mapeo para IHS en materias principales
        $ihsMapping = [
            'Artística'                  => 1,
            'Música'                     => 1,
            'Ciencias Naturales'         => 3,
            'Ciencias Sociales'          => 3,
            'Ética y Valores'            => 1,
            'Educación Física'           => 2,
            'Educación Religiosa'        => 1,
            'Humanidades'                => 5,
            'Idioma Extranjero (Inglés)' => 2,
            'Matemáticas'                => 5,
            'Tecnología e Informática'   => 2,
        ];
    
        $definitivas = [];
        $observaciones_finales = '';
    
        // 4. Descripciones de ejemplo para cada materia (si existe)
        $descripciones_materias = [
            'Ciencias Naturales'   => 'Reconoce la importancia de los animales, plantas, agua y suelo.',
            'Ciencias Sociales'    => 'Identifica diferentes generalidades físicas, históricas, económicas y políticas socio culturales.',
            'Ética y Valores'      => 'Reconoce e identifica la importancia del respeto y la responsabilidad en su formación integral.',
            'Educación Física'     => 'Realiza desplazamientos en diferentes direcciones coordinando movimientos de brazos y piernas.',
            'Educación Religiosa'  => 'Reconoce el significado de la fe en Dios Padre como creador.',
            'Artística (Música)'            => 'Desarrolla la motricidad fina con dibujo, modelado y pintura y líneas.',
            'Humanidades'          => 'Identifica palabras y su acento realizando textos cortos, empleando técnicas de lectura y escritura.',
            'Idioma Extranjero (Inglés)' => 'Pronuncia de forma correcta comandos prácticos del salón de clase, números, letras y presentación.',
            'Matemáticas'          => 'Reconoce significados de números en diferentes contextos (comparación, localización y adición).',
            'Pensamiento Aleatorio Espacial' => 'Organiza representación de datos de acuerdo con la base de información.',
            'Tecnología e Informática' => 'Identifica artefactos tecnológicos de su entorno y sus características.',
        ];
    
        // Para agrupar las notas de las submaterias por materia padre
        $notasSubmaterias = [];
    
        // 5. Recorrer cada materia para calcular promedios y armar la estructura
        foreach ($materias as $materia) {
            $notas = [];
            $sumaNotas = 0;
            $validCount = 0;
    
            // Para cada período (1 a 4)
            for ($periodo = 1; $periodo <= 4; $periodo++) {
                $notaObj = Notas::where('id_estudiante', $id_estudiante)
                    ->where('id_materia', $materia->id_materia)
                    ->where('id_periodo', $periodo)
                    ->first();
    
                if ($notaObj) {
                    $valor = $notaObj->nota;
                    $notas[$periodo] = $valor;
                    $sumaNotas += $valor;
                    $validCount++;
    
                    if ($notaObj->observaciones) {
                        $observaciones_finales .= $notaObj->observaciones . "\n";
                    }
    
                    // Si es submateria, agrupar para luego promediar en la materia principal
                    if ($materia->id_materia_padre) {
                        $notasSubmaterias[$materia->id_materia_padre][$periodo][] = $valor;
                    }
                } else {
                    $notas[$periodo] = '';
                }
            }
    
            // Calcular definitiva según la cantidad de períodos válidos
            $definitiva = ($validCount > 0) ? $sumaNotas / $validCount : 0;
    
            // 6. Determinar IHS
            if (!$materia->id_materia_padre) {
                // Si es materia principal: si contiene "Artística" o "Música", asignar IHS = 1
                if (stripos($materia->nombre_materia, 'Artística') !== false || stripos($materia->nombre_materia, 'Música') !== false) {
                    $ihs = 1;
                } else {
                    $ihs = isset($ihsMapping[$materia->nombre_materia]) ? $ihsMapping[$materia->nombre_materia] : null;
                }
            } else {
                // Para submaterias: si la materia principal es "Matemáticas", asignar según el nombre
                $materiaPadre = Materias::find($materia->id_materia_padre);
                if ($materiaPadre && $materiaPadre->nombre_materia == 'Matemáticas') {
                    if (strcasecmp($materia->nombre_materia, 'Geometría') == 0) {
                        $ihs = 2;
                    } elseif (stripos($materia->nombre_materia, 'Pensamiento Aleatorio') !== false) {
                        $ihs = 1;
                    } else {
                        $ihs = 3;
                    }
                } else {
                    $ihs = isset($ihsMapping[$materia->nombre_materia]) ? $ihsMapping[$materia->nombre_materia] : null;
                }
            }
    
            // 7. Armar la estructura de datos para cada materia
            $materia_data = [
                'materia'       => $materia->nombre_materia,
                'descripcion'   => $descripciones_materias[$materia->nombre_materia] ?? '',
                'ihs'           => $ihs,
                'fallas'        => '', // Queda vacío (como en el código original)
                'notas'         => $notas,
                'definitiva'    => $definitiva,
                'desempeno'     => $this->calcularDesempeno($definitiva),
                'materia_padre' => $materia->id_materia_padre,
            ];
    
            // 8. Si es submateria, agruparla dentro de la materia principal
            if ($materia->id_materia_padre) {
                $padre_id = $materia->id_materia_padre;
                if (!isset($definitivas[$padre_id])) {
                    $materia_padre = Materias::find($padre_id);
                    $definitivas[$padre_id] = [
                        'materia'       => $materia_padre->nombre_materia,
                        'descripcion'   => $descripciones_materias[$materia_padre->nombre_materia] ?? '',
                        'ihs'           => isset($ihsMapping[$materia_padre->nombre_materia]) ? $ihsMapping[$materia_padre->nombre_materia] : null,
                        'fallas'        => '',
                        'notas'         => [1 => '', 2 => '', 3 => '', 4 => ''],
                        'definitiva'    => 0,
                        'desempeno'     => '',
                        'materia_padre' => null,
                        'submaterias'   => [],
                    ];
                }
                $definitivas[$padre_id]['submaterias'][] = $materia_data;
            } else {
                $materia_data['submaterias'] = [];
                $definitivas[$materia->id_materia] = $materia_data;
            }
        }
    
        // 9. Calcular promedios de las submaterias para cada materia principal (por ejemplo, Matemáticas)
        foreach ($notasSubmaterias as $padre_id => $notasPorPeriodo) {
            foreach ($notasPorPeriodo as $periodo => $arrNotas) {
                $prom = array_sum($arrNotas) / count($arrNotas);
                $definitivas[$padre_id]['notas'][$periodo] = $prom;
            }
            // Se promedia únicamente entre los períodos que tienen registros
            $periodosConNota = array_filter($definitivas[$padre_id]['notas'], function($nota) {
                return $nota !== '';
            });
            $countPeriodos = count($periodosConNota);
            $definitivas[$padre_id]['definitiva'] = ($countPeriodos > 0) ? array_sum($periodosConNota) / $countPeriodos : 0;
            $definitivas[$padre_id]['desempeno'] = $this->calcularDesempeno($definitivas[$padre_id]['definitiva']);
        }
    
        $anio = now()->year;
    
        // 10. Generar PDF con Dompdf usando la vista 'app.notasestudiante'
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('app.notasestudiante', compact('estudiante', 'definitivas', 'observaciones_finales', 'anio'));
    
        return $pdf->download('reporte_estudiante.pdf');
    }
    
    /**
     * Calcular el desempeño textual según la nota.
     */
    private function calcularDesempeno($nota)
    {
        if ($nota >= 1.0 && $nota <= 2.99) {
            return 'Bj - Bajo';
        } elseif ($nota >= 3.0 && $nota <= 3.99) {
            return 'Bs - Básico';
        } elseif ($nota >= 4.0 && $nota <= 4.59) {
            return 'A - Alto';
        } elseif ($nota >= 4.6 && $nota <= 5.0) {
            return 'S - Superior';
        }
        return '';
    }
    
    /**
     * Generar certificado anual a partir del historial_academico.
     */
    public function generarCertificado($id_estudiante, $anio)
    {
        $historial = DB::table('historial_academico')
            ->where('id_estudiante', $id_estudiante)
            ->where('anio', $anio)
            ->first();

        if (!$historial) {
            return back()->withErrors(['error' => 'No se encontró el historial para el año seleccionado.']);
        }

        $estudiante = MatriculasEstudiantes::findOrFail($id_estudiante);
        $grado = DB::table('gradosacademicos')->where('id_grado', $historial->id_grado)->select('grados')->first();
        $definitivas = json_decode($historial->definitivas, true);

        // Generar PDF
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('app.certificado', compact('estudiante', 'grado', 'anio', 'definitivas'));

        return $pdf->stream('certificado_' . $anio . '.pdf');
    }
    /**
 * Generar la Planilla de Notas en PDF con la lista de estudiantes del grado asignado.
 */
public function descargarPlanillaNotas()
{
    // Obtener el usuario profesor
    $profesor = Auth::user();

    // Listar los estudiantes activos del grado de este profesor
    $estudiantes = MatriculasEstudiantes::where('id_grado', $profesor->id_grado)
        ->where('estado', 'Activo')
        ->get();

    // Si quieres mostrar el nombre del grado en el PDF, recupéralo. Ejemplo:
    // (Asumiendo que la tabla 'gradosacademicos' tiene campo 'grados' o similar)
    $gradoData = DB::table('gradosacademicos')
        ->where('id_grado', $profesor->id_grado)
        ->select('grados')
        ->first();

    $gradoNombre = $gradoData ? $gradoData->grados : $profesor->id_grado;

    // Renderizar la vista 'app.planillapdf' con la lista de estudiantes
    $pdf = app('dompdf.wrapper');
    $pdf->loadView('app.planilla', [
        'estudiantes' => $estudiantes,
        'gradoNombre' => $gradoNombre
    ]);

    // Descargar el PDF con un nombre por defecto
    return $pdf->download('PlanillaNotas.pdf');
}




public function subirEvidencia(Request $request)
{
    // Validar que se seleccione un período y se envíen evidencias (como array)
    $request->validate([
        'id_periodo' => 'required|exists:periodos_academicos,id_periodo',
        'evidencias' => 'required|array'
    ]);

    $docente = Auth::user();
    $id_grado = $docente->id_grado;
    $id_periodo = $request->id_periodo;

    // Iterar sobre cada evidencia enviada
    foreach ($request->evidencias as $id_materia => $file) {
        if ($request->hasFile("evidencias.$id_materia")) {
            $uploadedFile = $request->file("evidencias.$id_materia");

            // Validar extensión permitida: pdf o imágenes
            $allowedExtensions = ['pdf', 'jpg', 'jpeg', 'png', 'gif'];
            if (!in_array(strtolower($uploadedFile->getClientOriginalExtension()), $allowedExtensions)) {
                continue; // O bien, retornar error o ignorar este archivo.
            }

            // Almacenar el archivo en el disco "public" (en la carpeta 'evidencias_planilla')
            $filePath = $uploadedFile->store('evidencias_planilla', 'public');
            $fileType = (strtolower($uploadedFile->getClientOriginalExtension()) === 'pdf') ? 'pdf' : 'image';

            // Insertar el registro en la tabla evidencia_planilla
            DB::table('evidencia_planilla')->insert([
                'id_docente'  => $docente->id_usuario,
                'id_grado'    => $id_grado,
                'id_periodo'  => $id_periodo,
                'id_materia'  => $id_materia,
                'file_path'   => $filePath,
                'file_type'   => $fileType,
                'created_at'  => now(),
                'updated_at'  => now()
            ]);
        }
    }

    return back()->with('success', 'Evidencias subidas correctamente.');
}
public function dashboardDimensiones()
{
    $profesor = Auth::user();

    // Verificar que el docente tenga asignado un grado de dimensiones (1, 2 o 3)
    if (!in_array($profesor->id_grado, [1, 2, 3])) {
        // Si no, redirigirlo a la vista normal
        return redirect()->route('profesor.dashboard');
    }

    // Obtener estudiantes activos del grado asignado
    $estudiantes = MatriculasEstudiantes::where('id_grado', $profesor->id_grado)
        ->where('estado', 'Activo')
        ->get();

    // Obtener las dimensiones definidas para el grado (desde la tabla materias_dimensiones)
    $dimensiones = DB::table('materias_dimensiones')
        ->where('id_grado', $profesor->id_grado)
        ->get();

    // Obtener los períodos académicos
    $periodos = PeriodosAcademicos::all();

    return view('app.dashboardprofesor_dimensiones', compact('estudiantes', 'dimensiones', 'periodos'));
}
/**
 * Registra los desempeños para grados 1,2,3 (dimensiones).
 * Se llama desde el formulario masivo de la vista "dashboardprofesor_dimensiones".
 */
public function registrarDimensiones(Request $request)
{
    $request->validate([
        'id_periodo' => 'required|exists:periodos_academicos,id_periodo',
        'evaluaciones' => 'required|array',
        // evaluaciones[estudiante_id][id_dim]['desempeno'] => 'Bajo'|'Básico'|'Alto'|'Superior'
        // evaluaciones[estudiante_id][id_dim]['fallas'] => N (int)
        // comportamiento[estudiante_id] => texto
    ]);

    $id_periodo = $request->id_periodo;

    // 1. Guardar/actualizar los desempeños de dimensiones y fallas
    foreach ($request->evaluaciones as $id_estudiante => $dimensiones) {
        foreach ($dimensiones as $id_dimension => $detalle) {

            // $detalle es un array como ['desempeno'=>'Bajo','fallas'=>'2'] (ejemplo)
            if (!isset($detalle['desempeno'])) {
                // Si no existe desempeño, saltamos
                continue;
            }

            $desempeno = $detalle['desempeno'];
            // Validamos que sea un valor aceptado
            if (!in_array($desempeno, ['Bajo','Básico','Alto','Superior'])) {
                continue;
            }

            // Fallas: si no existe, 0
            $fallas = isset($detalle['fallas']) ? (int) $detalle['fallas'] : 0;

            \DB::table('notas_dimensiones')->updateOrInsert(
                [
                    'id_estudiante'  => $id_estudiante,
                    'id_materia_dim' => $id_dimension,
                    'id_periodo'     => $id_periodo,
                ],
                [
                    'desempeno'      => $desempeno,
                    'fallas'         => $fallas,
                    'comportamiento' => null, // se deja en null para esas filas
                    'updated_at'     => now(),
                    'created_at'     => now(),
                ]
            );
        }
    }

    // 2. Guardar el comportamiento (solo texto, no afecta fallas)
    if ($request->has('comportamiento')) {
        foreach ($request->comportamiento as $id_estudiante => $texto) {
            if (trim($texto) === '') {
                continue; // No guardar vacíos
            }
            // Buscar el grado del estudiante para saber qué dimension_id 
            // corresponde a "COMPORTAMIENTO"
            $est = \App\Models\MatriculasEstudiantes::find($id_estudiante);
            if (!$est) {
                continue;
            }

            // Buscar la dimensión COMPORTAMIENTO para ese grado
            $idComportamiento = \DB::table('materias_dimensiones')
                ->where('id_grado', $est->id_grado)
                ->where('nombre_dimension','COMPORTAMIENTO')
                ->value('id_materia_dim');

            if ($idComportamiento) {
                \DB::table('notas_dimensiones')->updateOrInsert(
                    [
                        'id_estudiante'  => $id_estudiante,
                        'id_materia_dim' => $idComportamiento,
                        'id_periodo'     => $id_periodo,
                    ],
                    [
                        'desempeno'      => null,
                        'fallas'         => 0, // fallas = 0 para Comportamiento
                        'comportamiento' => $texto,
                        'updated_at'     => now(),
                        'created_at'     => now(),
                    ]
                );
            }
        }
    }

    // 3. Validar promoción para cada estudiante (mismo que antes) //LO DE LA PROMOCION DE LAS DIMENSIONES YA LO HACE EL COMANDO A LAS 11 Y 59 REACTIVAR ESTO Y LOS DEMAS METODOS DE ESTE CONTROLADOR PARA REACTIVARLO ESTE LO HACE DE GOLPE SIN VER BOLETIN
    // $estudiantesAfectados = array_keys($request->evaluaciones);
    // foreach ($estudiantesAfectados as $id_estudiante) {
    //     $est = \App\Models\MatriculasEstudiantes::find($id_estudiante);

    //     // Solo aplicamos la lógica si su grado está en [1,2,3]
    //     if ($est && in_array($est->id_grado, [1,2,3])) {
    //         $this->validarPromocionDimensiones($est->id_estudiante);
    //     }
    // }

    return back()->with('success', 'Evaluaciones registradas y promociones aplicadas (grados 1 a 3).')->with('open_section', 'registrar-notas');
    ;
}

/**
 * Valida la promoción del estudiante en grados 1,2,3 (dimensiones).
 * - Verifica que en cada dimensión existan 4 desempeños (uno por período).
 * - Verifica que ninguno sea "Bajo". Si pasa, promueve + guarda historial.
 */
// private function validarPromocionDimensiones($id_estudiante)
// {
//     $estudiante = \App\Models\MatriculasEstudiantes::find($id_estudiante);
//     if (!$estudiante) return;

//     // Listar las dimensiones que aplican al grado actual
//     $dimensiones = \DB::table('materias_dimensiones')
//         ->where('id_grado', $estudiante->id_grado)
//         ->get();

//     $todasCompletas = true;
//     $reprobo = false;

//     foreach ($dimensiones as $dim) {
//         // Recuperar los desempeños para esa dimensión
//         // Esperamos 4 desempeños = 4 períodos
//         $desempenos = \DB::table('notas_dimensiones')
//             ->where('id_estudiante', $id_estudiante)
//             ->where('id_materia_dim', $dim->id_materia_dim)
//             ->pluck('desempeno'); // "Bajo","Básico","Alto","Superior"

//         if ($desempenos->count() < 4) {
//             // No tiene los 4 períodos
//             $todasCompletas = false;
//             break;
//         }

//         // Si alguno de los desempeños es "Bajo", se considera reprobado
//         if ($desempenos->contains('Bajo')) {
//             $reprobo = true;
//         }
//     }

//     // Si completó las 4 evaluaciones en todas las dimensiones y no reprobó
//     if ($todasCompletas && !$reprobo) {
//         // Guardamos el historial para el grado que acaba
//         $this->registrarHistorialDimensiones($estudiante);

//         // Promocionar: 1->2, 2->3, 3->4 (Primero)
//         if ($estudiante->id_grado < 3) {
//             $estudiante->id_grado++;
//         } elseif ($estudiante->id_grado == 3) {
//             $estudiante->id_grado = 4;
//         }

//         $estudiante->save();
//     }
// }

/**
 * Guarda en la tabla 'historial_academico_dimensiones' los desempeños finales
 * del estudiante en el grado que está finalizando, para el año actual.
 */
// private function registrarHistorialDimensiones($estudiante)
// {
//     // Listar dimensiones de ese grado
//     $dimensiones = \DB::table('materias_dimensiones')
//         ->where('id_grado', $estudiante->id_grado)
//         ->get();

//     // Estructura para almacenar la info
//     $resumen = [];

//     foreach ($dimensiones as $dim) {
//         // Recoger los 4 desempeños (o la cantidad que manejes)
//         // y guardarlos en un array
//         $desempenos = \DB::table('notas_dimensiones')
//             ->where('id_estudiante', $estudiante->id_estudiante)
//             ->where('id_materia_dim', $dim->id_materia_dim)
//             ->orderBy('id_periodo', 'asc')
//             ->pluck('desempeno'); // Ej: ["Básico","Alto","Bajo","Alto"]

//         // Lo registramos con la clave = nombre de la dimensión
//         $resumen[$dim->nombre_dimension] = $desempenos;
//     }

//     // Insertar en la tabla 'historial_academico_dimensiones'
//     \DB::table('historial_academico_dimensiones')->insert([
//         'id_estudiante'     => $estudiante->id_estudiante,
//         'id_grado'          => $estudiante->id_grado, 
//         'anio'              => now()->year,
//         'dimensiones_json'  => json_encode($resumen),
//         'created_at'        => now(),
//         'updated_at'        => now(),
//     ]);
// }

/**
 * Subir evidencia (PDF o imagen) por cada dimensión, en grados 1..3.
 */

public function subirEvidenciaDimensiones(Request $request)
{
    $request->validate([
        'id_periodo'  => 'required|exists:periodos_academicos,id_periodo',
        'evidencias'  => 'required|array' 
        // expected: evidencias[id_materia_dim] => archivo
    ]);

    $docente = Auth::user();
    $id_grado = $docente->id_grado;
    $id_periodo = $request->id_periodo;

    // Iterar sobre cada archivo subido
    foreach ($request->evidencias as $id_dimension => $file) {
        if ($request->hasFile("evidencias.$id_dimension")) {
            $uploadedFile = $request->file("evidencias.$id_dimension");

            // Validar extensión
            $allowedExtensions = ['pdf', 'jpg', 'jpeg', 'png', 'gif'];
            $ext = strtolower($uploadedFile->getClientOriginalExtension());
            if (!in_array($ext, $allowedExtensions)) {
                continue; 
            }

            // Almacenar en disco 'public' -> 'evidencias_planilla'
            $filePath = $uploadedFile->store('evidencias_planilla', 'public');
            $fileType = ($ext === 'pdf') ? 'pdf' : 'image';

            // Insertar en tabla 'evidencia_planilla'
            \DB::table('evidencia_planilla')->insert([
                'id_docente'      => $docente->id_usuario,
                'id_grado'        => $id_grado,
                'id_periodo'      => $id_periodo,

                // Ponemos en null 'id_materia'
                'id_materia'      => null,
                // Usamos 'id_materia_dim' para la dimensión
                'id_materia_dim'  => $id_dimension,
                'file_path'       => $filePath,
                'file_type'       => $fileType,
                'created_at'      => now(),
                'updated_at'      => now()
            ]);
        }
    }

    return back()->with('success', 'Evidencias (Dimensiones) subidas correctamente.');
}
public function reporteDimensionesPDF($id_estudiante)
{
    $estudiante = \App\Models\MatriculasEstudiantes::with('grado')->findOrFail($id_estudiante);

    // Listar dimensiones (excepto COMPORTAMIENTO)
    $dimensiones = \DB::table('materias_dimensiones')
        ->where('id_grado', $estudiante->id_grado)
        ->where('nombre_dimension','!=','COMPORTAMIENTO')
        ->get();

    $dimData = [];
    foreach ($dimensiones as $dim) {
        // Estructuras para almacenar los 4 períodos
        $periodos = [
            'P1' => ['desempeno'=>'','fallas'=>0],
            'P2' => ['desempeno'=>'','fallas'=>0],
            'P3' => ['desempeno'=>'','fallas'=>0],
            'P4' => ['desempeno'=>'','fallas'=>0],
        ];

        // Vamos a trackear el registro "más reciente" (por updated_at)
        $mostRecentCapacidades = []; 
        $lastUpdated = null;

        // Recorremos los 4 periodos
        for ($p = 1; $p <= 4; $p++) {
            $row = \DB::table('notas_dimensiones')
                ->where('id_estudiante', $id_estudiante)
                ->where('id_materia_dim', $dim->id_materia_dim)
                ->where('id_periodo', $p)
                ->orderBy('updated_at','desc')
                ->first();

            if ($row) {
                // Asignar desempeño/fallas a periodos
                $periodos["P$p"]['desempeno'] = $row->desempeno ?? '';
                $periodos["P$p"]['fallas']    = $row->fallas ?? 0;

                // Ver si este row es el más reciente
                if (!$lastUpdated || $row->updated_at > $lastUpdated) {
                    $lastUpdated = $row->updated_at;

                    // Decodificar array de IDs
                    $capIDs = $row->capacidades ? json_decode($row->capacidades, true) : [];
                    if (!empty($capIDs)) {
                        // Buscar los textos en capacidadesdimensiones
                        $mostRecentCapacidades = \DB::table('capacidadesdimensiones')
                            ->whereIn('id_capacidad', $capIDs)
                            ->pluck('nombre_capacidad')
                            ->toArray();
                    } else {
                        $mostRecentCapacidades = [];
                    }
                }
            }
        }

        // Calcular desempeño final (simple) a partir de P1..P4
        $desempenoFinal = $this->calcularDesempenoFinal([
            $periodos['P1']['desempeno'],
            $periodos['P2']['desempeno'],
            $periodos['P3']['desempeno'],
            $periodos['P4']['desempeno'],
        ]);

        $dimData[] = [
            'nombre_dimension' => $dim->nombre_dimension,
            'periodos'         => $periodos,  // p.e.: ['P1'=>['desempeno'=>'','fallas'=>0],...]
            'final'            => $desempenoFinal,
            'capacidades'      => $mostRecentCapacidades, // array de strings
        ];
    }

    // Obtener comportamiento (si existe)
    $idDimComportamiento = \DB::table('materias_dimensiones')
        ->where('id_grado', $estudiante->id_grado)
        ->where('nombre_dimension','COMPORTAMIENTO')
        ->value('id_materia_dim');

    $comportamiento = null;
    if ($idDimComportamiento) {
        $comportamiento = \DB::table('notas_dimensiones')
            ->where('id_estudiante', $id_estudiante)
            ->where('id_materia_dim', $idDimComportamiento)
            ->orderBy('updated_at','desc')
            ->value('comportamiento');
    }

    $anio = now()->year;

    $pdf = app('dompdf.wrapper');
    $pdf->loadView('app.notasestudiante_dimensiones', [
        'estudiante'     => $estudiante,
        'dimData'        => $dimData,
        'comportamiento' => $comportamiento,
        'anio'           => $anio
    ]);

    return $pdf->download('reporte_dimensiones.pdf');
}

/**
 * Ejemplo para determinar desempeño final a partir de 
 * los desempeños de P1..P4.
 */
private function calcularDesempenoFinal($desempenos)
{
    $valores = array_filter($desempenos);
    if (in_array('Bajo', $valores)) {
        return 'Bajo';
    } elseif (in_array('Básico', $valores)) {
        return 'Básico';
    } elseif (in_array('Alto', $valores)) {
        return 'Alto';
    } elseif (in_array('Superior', $valores)) {
        return 'Superior';
    }
    return '';
}


public function showCapacidadesForm()
{
    $profesor = Auth::user();
    $periodos = \App\Models\PeriodosAcademicos::all();
    // Obtenemos las dimensiones del grado (1..3) del profesor
    $dimensiones = \DB::table('materias_dimensiones')
       ->where('id_grado', $profesor->id_grado)
       ->get();

    // Para cada dimensión, listamos sus capacidades
    $listaCapacidades = [];
    foreach ($dimensiones as $dim) {
        $capac = \DB::table('capacidadesdimensiones')
            ->where('id_materia_dim',$dim->id_materia_dim)
            ->get();
        $listaCapacidades[$dim->id_materia_dim] = $capac; 
    }

    // Estudiantes del grado
    $estudiantes = \App\Models\MatriculasEstudiantes::where('id_grado', $profesor->id_grado)
        ->where('estado','Activo')
        ->get();

    return view('app.capacidades_dimensiones', compact('periodos','dimensiones','listaCapacidades','estudiantes'));
}

/**
 * Recibir los datos y guardar en notas_dimensiones.capacidades (JSON)
 */
public function guardarCapacidades(Request $request)
{
    
    $request->validate([
        'id_periodo' => 'required|exists:periodos_academicos,id_periodo',
        'selecciones' => 'required|array',
        // selecciones[estudiante_id][id_dimension] = array de id_capacidad
    ]);

    $id_periodo = $request->id_periodo;

    foreach ($request->selecciones as $id_estudiante => $porDimension) {
        foreach ($porDimension as $id_dimension => $arrayCapacidades) {
            // $arrayCapacidades es un array de ID de capacidades. 
            // Lo convertimos a JSON
            $jsonCapacidades = json_encode($arrayCapacidades);

            // Buscamos la fila de notas_dimensiones 
            // y actualizamos/insertamos la columna 'capacidades'
            \DB::table('notas_dimensiones')->updateOrInsert(
                [
                    'id_estudiante'  => $id_estudiante,
                    'id_materia_dim' => $id_dimension,
                    'id_periodo'     => $id_periodo
                ],
                [
                    // mantenemos desempeño, fallas y comportamiento si existen (no los sobrescribimos)
                    // (Podríamos 'merge' pero aquí hacemos un simple partial update.)
                    'capacidades' => $jsonCapacidades,
                    'updated_at'  => now(),
                    'created_at'  => now(),
                ]
            );
        }
    }

    return back()->with('success','Capacidades registradas correctamente.');
}
public function guardarCapacidadesNuevas(Request $request)
{
    // Lo que esperamos:
    // capacidades_nuevas[id_materia_dim][id_estudiante] => "texto1\ntexto2..."
    // Pero como vas a mostrar 1 row por Estudiante, quizá quieras ignorar 'id_estudiante'.
    // O, si sólo hay 1 text-area por dimensión, sin estudiante, ajusta la estructura.

    // Valida que exista al menos un array:
    $request->validate([
       'nuevas' => 'required|array',
       // nuevas[id_dim] => "Texto...\nTexto..."
    ]);

    foreach ($request->nuevas as $idDimension => $textoCapacidades) {
        // Separar cada línea (capacidad)
        $lineas = preg_split("/\r\n|\r|\n/", trim($textoCapacidades));
        foreach ($lineas as $linea) {
            $linea = trim($linea);
            if ($linea !== '') {
                \DB::table('capacidadesdimensiones')->insert([
                   'id_materia_dim'   => $idDimension,
                   'nombre_capacidad' => $linea,
                   'created_at'       => now(),
                   'updated_at'       => now()
                ]);
            }
        }
    }

    return redirect()->route('profesor.capacidades.form')
                     ->with('success','Se han registrado las nuevas capacidades!');
}



public function generarCertificadoDimensiones($id_estudiante, $anio)
{
    // 1. Recuperar el historial de dimensiones para el estudiante y el año indicado
    $historial = \DB::table('historial_academico_dimensiones')
        ->where('id_estudiante', $id_estudiante)
        ->where('anio', $anio)
        ->first();

    if (!$historial) {
        return back()->withErrors(['error' => 'No se encontró el historial para el año seleccionado.']);
    }

    // 2. Recuperar el estudiante y el grado (para mostrar el nombre del grado)
    $estudiante = \App\Models\MatriculasEstudiantes::findOrFail($id_estudiante);
    $grado = \DB::table('gradosacademicos')
        ->where('id_grado', $historial->id_grado)
        ->select('grados')
        ->first();

    // 3. Decodificar el campo JSON con las evaluaciones por dimensión
    $dimensionesArray = json_decode($historial->dimensiones_json, true);
    // $dimensionesArray es un array del tipo:
    // [
    //     "DIMENSION ESPIRITUAL" => ["Básico", "Alto", "Alto", "Superior"],
    //     "DIMENSION CORPORAL"   => [...],
    //     ...
    // ]

    // 4. Calcular el desempeño final para cada dimensión
    $finales = [];
    foreach ($dimensionesArray as $dimension => $evaluaciones) {
        $finales[$dimension] = $this->calcularDesempenoFinl($evaluaciones);
    }

    // 5. Generar el PDF usando la vista 'app.certificado_dimensiones'
    $pdf = app('dompdf.wrapper');
    $pdf->loadView('app.certificado_dimensiones', [
        'estudiante' => $estudiante,
        'grado'      => $grado,
        'anio'       => $anio,
        'finales'    => $finales
    ]);

    // En este ejemplo se fuerza la descarga del PDF.
    return $pdf->download('certificado_dimensiones_' . $anio . '.pdf');
}

/**
 * Lógica para determinar el “desempeño final” de una dimensión a partir de los valores obtenidos en cada período.
 * Se recibe un array de evaluaciones (por ejemplo: ["Básico", "Alto", "Alto", "Superior"]).
 * La lógica de ejemplo es: si existe "Bajo" se retorna "Bajo"; si no, si existe "Básico" se retorna "Básico"; 
 * luego "Alto" y finalmente "Superior". Puedes ajustar esta función según las reglas que requieras.
 *
 * @param array $evaluaciones
 * @return string
 */
private function calcularDesempenoFinl(array $evaluaciones)
{
    // Filtramos los valores no vacíos.
    $valores = array_filter($evaluaciones);

    if (in_array('Bajo', $valores)) {
        return 'Bajo';
    } elseif (in_array('Básico', $valores)) {
        return 'Básico';
    } elseif (in_array('Alto', $valores)) {
        return 'Alto';
    } elseif (in_array('Superior', $valores)) {
        return 'Superior';
    }
    return 'Sin registro';
}

}

