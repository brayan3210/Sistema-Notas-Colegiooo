<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class SobrenosotrosController extends Controller
{
    //
    public function Sobrenosotros()
    {
        return view('auth.sobrenosotros'); // Asegúrate de tener una vista en resources/views/auth/login.blade.php
    }
    public function manualconvivencia(){
        return view('auth.manualconvivencia'); // Asegúrate de tener una vista en resources/views/auth/login.blade.php

    }
    public function Grados(){
        return view('auth.gradosofertados'); // Asegúrate de tener una vista en resources/views/auth/login.blade.php

    }
    public function Contactenos(){
        return view('auth.Contactenos'); // Asegúrate de tener una vista en resources/views/auth/login.blade.php

    }
    public function descargarManual()
{
    $filePath = 'Manual/manual_de_convivencia_santo_angel,_primera_parte[1].pdf'; // Ruta relativa dentro de storage/app/

    if (Storage::exists($filePath)) {
        // Obtener el contenido del archivo
        $fileContent = Storage::get($filePath);

        // Configurar el encabezado para forzar la descarga
        return response($fileContent, 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="manual_de_convivencia.pdf"');
    }

    abort(404, 'El archivo no se encuentra.');
}
    public function pei(){
        return view('auth.pei'); // Asegúrate de tener una vista en resources/views/auth/login.blade.php

    }
    public function descargarpei()
{
    $filePath = 'Manual/pei.pdf'; // Ruta relativa dentro de storage/app/

    if (Storage::exists($filePath)) {
        // Obtener el contenido del archivo
        $fileContent = Storage::get($filePath);

        // Configurar el encabezado para forzar la descarga
        return response($fileContent, 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="pei.pdf"');
    }

    abort(404, 'El archivo no se encuentra.');
}
}
