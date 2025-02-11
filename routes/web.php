<?php

// routes/web.php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\RegistroAdminController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\registromatriculasController;
use App\Http\Controllers\SobrenosotrosController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\NovedadesController;
use App\Http\Controllers\DatospadresController;
use App\Http\Controllers\DocumentosEstudianteController;
use App\Http\Controllers\PensionController;
use App\Http\Controllers\ProfesorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


Route::get('/', function () {
    return view('welcome');
});//

Route::get('/', [HomeController::class, 'home']);

Route::get('Manual-Convivencia', [SobrenosotrosController::class, 'manualconvivencia']);
Route::post('Manual-Convivencia', [SobrenosotrosController::class, 'manualconvivencia'])->name('Manual-Convivencia');

Route::get('PEI', [SobrenosotrosController::class, 'pei']);
Route::post('PEI', [SobrenosotrosController::class, 'pei'])->name('PEI');
Route::get('/descargar-pei', action: [SobrenosotrosController::class, 'descargarpei'])->name('descargar-pei');

//adminregistro
//Route::get('registro', [RegistroAdminController::class, 'registro']);
//Route::post('registro', [RegistroAdminController::class, 'registroAdmin'])->name('registro');


//ruta de matricula. la comentare porque no la necesitan y despues usare la logica 
// Route::get('Matricula', [registromatriculasController::class, 'Matricula']);
// Route::post('Matricula', [registromatriculasController::class, 'RegistroMatricula'])->name('Matricula');



//parametro
// Route::get('/Matricula/{id}', [registromatriculasController::class, 'show'])->name('auth.show');

// // Ruta para mostrar detalles de un estudiante
// Route::get('/Matriculaestudiantes/{id}', [DashboardAdminController::class, 'showDetails'])->name('matriculas.showDetails');

// // Ruta para actualizar detalles del estudiante
// Route::post('/ActualizarMatricula/{id}', [DashboardAdminController::class, 'updateDetails'])->name('matriculas.updateDetails');
// Route::get('/descargar-reporte', [DashboardAdminController::class, 'descargarReporte'])->name('descargar_reporte');


Route::get('/documentos', [DocumentosEstudianteController::class, 'vistadocumentosestudiante']);
Route::post('/documentos', [DocumentosEstudianteController::class, 'Registro'])->name('documentos');
Route::post('/buscar-estudiante', [DocumentosEstudianteController::class, 'buscarEstudiante'])->name('buscarEstudiante');


/// REVISAR  MAS TARDE EL ERROR DEL MIDDEWAEW DE OBJETO NO SE PUEDE LLAMAR ARRIBA ESTAN SIN PROTEGER 
// Route::middleware(['ProtegerVistasubirdocumentos'])->group(function () {
    
//    Route::get('/documentos', [DocumentosEstudianteController::class, 'vistadocumentosestudiante']);

// Route::post('/documentos', [DocumentosEstudianteController::class, 'store'])->name('documentos.store');
// Route::get('/buscar-estudiante', [DocumentosEstudianteController::class, 'buscarEstudiante']);
//    });


// Mostrar el formulario "Olvidé mi contraseña"
Route::get('/forgot-password', [LoginAdminController::class, 'showForgotPasswordForm'])
    ->name('forgot.password.form');

// Procesar el formulario y enviar nueva contraseña
Route::post('/forgot-password', [LoginAdminController::class, 'forgotPassword'])
    ->name('forgot.password');




Route::middleware(['ProtegerDatospadres'])->group(function () {
    
Route::get('DatosPadres', [DatospadresController::class, 'Padres']);
Route::post('DatosPadres', [DatospadresController::class, 'Registrodatos'])->name('Padres');
//buscar estudiantes en formulario
Route::post('/buscar-estudiante', [DatospadresController::class, 'buscarEstudiante'])->name('buscarEstudiante');

});





// esta no hace falta Route::get('login', [LoginController2::class, 'index'])->name('login');
//Route::post('login', [LoginAdminController::class, 'login'])->name('login');
Route::middleware(['acceso-rango'])->group(function () {
    Route::get('/login', [LoginAdminController::class, 'index']);
    Route::post('/login', [LoginAdminController::class, 'login'])->name('login');
     // Ruta para procesar el cambio de contraseña
    //  Route::post('/admin/cambiocontraseña', [LoginAdminController::class, 'changePassword'])
    //  ->name('admin.change.password');
});


Route::get('/Sobrenosotros', [SobrenosotrosController::class,'Sobrenosotros']);
Route::post('/Sobrenosotros', [SobrenosotrosController::class, 'Sobrenosotros'])->name('Sobrenosotros');
Route::get('/Grados-Ofertados', [SobrenosotrosController::class,'Grados']);
Route::post('/Grados-Ofertados', [SobrenosotrosController::class, 'Grados'])->name('Grados-Ofertados');
Route::get('/Contactenos', [SobrenosotrosController::class,'Contactenos']);
Route::post('/Contactenos', [SobrenosotrosController::class, 'Contactenos'])->name('Contactenos');

Route::get('/descargar-manual', [SobrenosotrosController::class, 'descargarManual'])->name('descargar-manual');


Route::get('/Novedades', [NovedadesController::class,'Novedades']);
Route::post('/Novedades', [NovedadesController::class, 'guardarPublicacion'])->name('novedadescolegio');
Route::get('/Novedades', [NovedadesController::class, 'index'])->name('novedades.index');
// web.php
Route::get('/novedades/{id}', [NovedadesController::class, 'show'])->name('novedades.show');


Route::get('/logout', [LogoutController::class, 'logout']);






Route::middleware(['AccesoAdmin'])->group(function () {
    Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('dashboard');
    Route::post('/dashboard', [DashboardAdminController::class, 'index']);

// En web.php
//para 
Route::get('/admin/evidencia-planilla', [DashboardAdminController::class, 'evidenciaPlanilla'])
->name('admin.evidencia-planilla');
Route::get('/administradores', [DashboardAdminController::class, 'listadeadmin'])->name('admin.lista');
Route::get('/inscritos', [DashboardAdminController::class, 'ListaMatriculados'])->name('inscritos.lista');
Route::get('/Matricula/{id}', [registromatriculasController::class, 'show'])->name('auth.show');

Route::post('cambiocontraseña', [DashboardAdminController::class, 'changePassword'])
->name('change.password');
//ruta de pensiones comentariada porque no se necesito, si se quiere listar los pagos de pensiones esta es la ruta y controlador
//usar despues si se necesita para ahorrar codigo
Route::get('/pensiones', [PensionController::class, 'index'])->name('pensiones.index');
Route::get('/listapensiones', [PensionController::class, 'ListaPensiones'])->name('pensiones.lista');

// Route::post('/pensiones/buscar', [PensionController::class, 'buscarEstudiante'])->name('pensiones.buscar');
// Route::post('/pensiones/registrar', [PensionController::class, 'registrarPension'])->name('pensiones.registrar');


// Ruta para mostrar detalles de un estudiante
Route::get('/Matriculaestudiantes/{id}', [DashboardAdminController::class, 'showDetails'])->name('matriculas.showDetails');

// Ruta para actualizar detalles del estudiante
Route::post('/ActualizarMatricula/{id}', [DashboardAdminController::class, 'updateDetails'])->name('matriculas.updateDetails');
Route::get('/descargar-reporte', [DashboardAdminController::class, 'descargarReporte'])->name('descargar_reporte');

    
    // Route::get('/admin.cambiocontraseña', [RegistroAdminController::class, 'vistaadmincontraseña']);
    // Route::post('/admin.cambiocontraseña', [RegistroAdminController::class, 'cambiocontraseña'])->name('admin.cambiocontraseña');
    Route::get('/CrearPublicacion', [NovedadesController::class,'Publicacion']);
    Route::post('CrearPublicacion',[NovedadesController::class,'guardarPublicacion'])->name('CrearPublicacion');
    
    Route::get('registro', [RegistroAdminController::class, 'registro']);
Route::post('registro', [RegistroAdminController::class, 'registroAdmin'])->name('registro');
Route::get('EditarPersonal/{id}', [RegistroAdminController::class, 'EditPersonal'])->name('EditarAdmin');
Route::post('ActualizarPersonal/{id}', [RegistroAdminController::class, 'UpdatePersonal'])->name('ActualizarPersonal');
Route::delete('EliminarPersonal/{id}', [RegistroAdminController::class, 'DeletePersonal'])->name('EliminarPersonal');


// Ruta para la consulta de certificados en el área de administrador
    Route::get('/admin/certificados', [DashboardAdminController::class, 'certificados'])->name('admin.certificados');
 
    // Ruta para generar el certificado basado en dimensiones DESDE EL ADMIN CON BOTON JARDIN A TRANSICION
 Route::get('/profesor-admin/certificado-dimensiones/{id_estudiante}/{anio}', 
 [\App\Http\Controllers\ProfesorController::class, 'generarCertificadoDimensiones'])
 ->name('adminprofesor1al3.certificado-dimensiones');
 //GRADO PRIMERO A SEXTO POR BOTON EN EL ADMIN CERTIFICADOS
 Route::get('/profesor-descarga-admin/certificado/{id_estudiante}/{anio}', [ProfesorController::class, 'generarCertificado'])->name('profesordescarga.certificado');





});
Route::middleware(['AccesoUsuario'])->group(function () {
    Route::get('/usuario', [UsuarioController::class, 'index']);

});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
// Rutas para Profesores

Route::middleware(['auth', 'AccesoProfesor'])->group(function () {
    Route::get('/profesor', [ProfesorController::class, 'index'])->name('profesor.dashboard');
    Route::post('/profesor/registrar-notas', [ProfesorController::class, 'registrarNotas'])->name('profesor.registrar-notas');
    Route::get('/profesor/reporte/{id_estudiante}', [ProfesorController::class, 'reportePDF'])->name('profesor.reporte-pdf');
    Route::post('/profesor/agregar-estudiante', [ProfesorController::class, 'agregarEstudiante'])->name('profesor.agregar-estudiante');
    Route::get('/profesor/certificado/{id_estudiante}/{anio}', [ProfesorController::class, 'generarCertificado'])->name('profesor.certificado');
    // Route::get('/profesor/recalcular-promociones', [ProfesorController::class, 'recalcularPromociones'])
    // ->name('profesor.recalcular-promociones');
      // **Nueva ruta** para descargar la Planilla de Notas:
      Route::get('/profesor/planilla-notas', [ProfesorController::class, 'descargarPlanillaNotas'])
      ->name('profesor.planilla-notas');
      Route::post('/admin/cambiocontraseña', [LoginAdminController::class, 'changePassword'])
->name('admin.change.password');

 // Nueva ruta para subir evidencia
 Route::get('/profesor/subir-evidencia', function() {
    // Obtener periodos y materias para la vista:
    $profesor = Auth::user();
    $periodos = \App\Models\PeriodosAcademicos::all();
    // Reutilizamos la misma lógica que en index para obtener materias del grado asignado,
    // excluyendo "Matemáticas" principal:
    $materias = \App\Models\Materias::where('id_grado', $profesor->id_grado)
       ->where(function ($query) {
           $query->whereNull('id_materia_padre')
                 ->where('nombre_materia', '!=', 'Matemáticas')
                 ->orWhereNotNull('id_materia_padre');
       })->get();

    return view('app.evidencia_planilla_docente', compact('periodos', 'materias'));
})->name('profesor.subir-evidencia.form');

Route::post('/profesor/subir-evidencia', [ProfesorController::class, 'subirEvidencia'])->name('profesor.subir-evidencia');
  // NUEVAS RUTAS para docentes de grados 1-3 (flujo de dimensiones)
  Route::get('/profesor/dimensiones', [ProfesorController::class, 'dashboardDimensiones'])->name('profesor.dashboard.dimensiones');
  Route::post('/profesor/registrar-dimensiones', [ProfesorController::class, 'registrarDimensiones'])->name('profesor.registrar-dimensiones');

// Rutas para subir evidencia en grados 1..3 (dimensiones)
Route::get('/profesor/subir-evidencia-dimensiones', function() {
    $profesor = Auth::user();
    $periodos = \App\Models\PeriodosAcademicos::all();

    // Obtenemos las "dimensiones" del grado asignado al profesor
    $dimensiones = \DB::table('materias_dimensiones')
       ->where('id_grado', $profesor->id_grado)
       ->get();

    return view('app.evidencia_planilla_docente_dimensiones', compact('periodos', 'dimensiones'));
})->name('profesor.subir-evidencia-dimensiones.form');

Route::post('/profesor/subir-evidencia-dimensiones', [ProfesorController::class, 'subirEvidenciaDimensiones'])
     ->name('profesor.subir-evidencia-dimensiones');

     Route::get('/profesor/reporte-dimensiones/{id_estudiante}', 
     [ProfesorController::class, 'reporteDimensionesPDF'])
     ->name('profesor.reporte-dimensiones-pdf');
 

     Route::get('/profesor/capacidades', [ProfesorController::class, 'showCapacidadesForm'])->name('profesor.capacidades.form');
     Route::post('/profesor/capacidades', [ProfesorController::class, 'guardarCapacidades'])->name('profesor.capacidades.guardar');
     
     Route::post('/profesor/capacidades-nuevas', [ProfesorController::class, 'guardarCapacidadesNuevas'])
     ->name('profesor.capacidades.nuevas');
 
//solo para ver en url en la sesion docente
 // Ruta para generar el certificado basado en dimensiones
 Route::get('/profesor/certificado-dimensiones/{id_estudiante}/{anio}', 
 [\App\Http\Controllers\ProfesorController::class, 'generarCertificadoDimensiones'])
 ->name('profesor.certificado-dimensiones');




});
