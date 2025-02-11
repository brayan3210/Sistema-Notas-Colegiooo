<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MatriculasEstudiantes;
use App\Models\Documento;
use App\Models\DocumentosEstudiante;
use App\Models\Sisben;
use App\Models\Grado;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use League\CommonMark\Node\Block\Document;

class registromatriculasController extends Controller
{
    public function Matricula()
    {
        return view('auth.Matricula'); // Asegúrate de tener una vista en resources/views/auth/Matricula.blade.php
    }
    public function datos()
    {
        $tiposDocumento = Documento::all();
        $sisben = Sisben::all();
        $grados = Grado::all();

        return view('Matricula.datos', compact('tiposDocumento', 'sisben', 'grados'));
    }

    public function RegistroMatricula(Request $request)
    {
        $request->validate([
            'nombres' => 'required',
            'primer_apellido' => 'required',
            'segundo_apellido' => 'required',
            'fecha_nacimiento' => 'required',
            'lugar_nacimiento' => 'required',
            'genero' => 'required',
            'id_documento' => 'required',
            'n_documento' => 'required',
            'rh' => 'required',
            'eps' => 'required',
            'id_sisben' => 'required',
            'estrato_social' => 'required',
            'discapacidad' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'barrio' => 'required',
            'municipio' => 'required',
            'departamento' => 'required',
            'id_grado' => 'required',
            'file' => 'required|mimes:pdf|max:2048', // Validación para archivos PDF

        ]);
        // Guardar el archivo si está presente
    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('documentos', $filename, 'public');          // Guardar en storage/app/public/documentos
       //  dd($filePath);
    } else {
        $filePath = null;  // Aca se maneja un valor predeterminado
    }
        $data = $request->all();
        $data['documento_adjunto'] = $filePath; // Asigna la ruta del archivo al campo correspondiente

//middelware
        MatriculasEstudiantes::create($data);
        $request->session()->put('registro_completado', true);


        return redirect()->back()->withInput()->with('Correcto', 'Datos del Aspirante Inscritos Correctamente.');
    }
    public function create(array $data)
    {
        MatriculasEstudiantes::create([
            'nombres' => $data['nombres'],
            'primer_apellido' => $data['primer_apellido'],
            'segundo_apellido' => $data['segundo_apellido'],
            'fecha_nacimiento' => $data['fecha_nacimiento'],
            'lugar_nacimiento' => $data['lugar_nacimiento'],
            'genero' => $data['genero'],
            'id_documento' => $data['id_documento'],
            'n_documento' => $data['n_documento'],
            'rh' => $data['rh'],
            'eps' => $data['eps'],
            'id_sisben' => $data['id_sisben'],
            'estrato_social' => $data['estrato_social'],
            'discapacidad' => $data['discapacidad'],
            'telefono' => $data['telefono'],
            'direccion' => $data['direccion'],
            'barrio' => $data['barrio'],
            'municipio' => $data['municipio'],
            'departamento' => $data['departamento'],
            'id_grado' => $data['id_grado'],
            'estado_matricula' =>'Sin pagar',
            'documento_adjunto' =>$data['documento_adjunto'], // Guardar la ruta del archivo en la base de datos

        ]);

        Documento::create([

            'id_documento' => $data['tipo_documento'],
        ]);
        Sisben::create([

            'id_sisben' => $data['sisben'],
        ]);
        Grado::create([

            'id_grado' => $data['grados'],
        ]);
    
    
    $admin = DB::table('matriculasestudiantes')->where('nombres', $data['nombres'])->first();

       // return redirect()->route('registro')->with('Correcto', 'Esutidante Matriculado correctamente.');
       return redirect()->route('DatosPadres')->with('Correcto', 'Datos del Aspirante Inscritos correctamente.');
    }


    public function show($id)
    {
        // Obtener la matrícula del estudiante
        $matricula = MatriculasEstudiantes::findOrFail($id);
    
        // Obtener los documentos asociados al estudiante
        $documentos = DocumentosEstudiante::where('id_estudiante', $id)->first();
    
        // Retornar la vista con los datos de la matrícula y los documentos
        return view('auth.show', compact('matricula', 'documentos'));
    }
    

}
