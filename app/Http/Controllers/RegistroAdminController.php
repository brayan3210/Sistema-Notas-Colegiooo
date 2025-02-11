<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Verificacion_code; // Importa el modelo
use App\Models\Administrador;
use App\Models\Grado;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistroAdminController extends Controller
{
    public function registro()
    {
        $grados = Grado::all();
        return view('app.registro', compact('grados')); // Asegúrate de tener una vista en resources/views/auth/register.blade.php
    }

    public function registroAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:administradores,email', // Validar correo único
            'password' => 'required',
            'is_admin' => 'required|in:1,2',
            'id_grado' => 'nullable|exists:gradosacademicos,id_grado',
        ]);
    
        if ($request->is_admin == '2') {
            $request->validate([
                'id_grado' => 'required|exists:gradosacademicos,id_grado', // Grado obligatorio para profesores
            ]);
        } else {
            $request->merge(['id_grado' => null]);
        }
    
        Administrador::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->is_admin,
            'id_grado' => $request->id_grado,
        ]);
    
        return redirect()->back()->with('Correcto', 'Ahora puede iniciar sesión con las credenciales creadas anteriormente.');
    }
    
    public function create(array $data)
    {
        Administrador::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'is_admin' => $data['is_admin'],
            'id_grado' => $data['id_grado'], ]);
    
    
    $admin = DB::table('administradores')->where('email', $data['email'])->first();

        return redirect()->route('registro')->with('Correcto', 'Ahora puede iniciar sesion con las credenciales creadas anteriormente.');
    }
    public function vistaadmincontraseña(){
        return view('app.admincontraseña');

    }
   // En RegistroAdminController.php
// public function cambiocontraseña(Request $request)
// {
//     $request->validate([
//         'current_password' => 'required',
//         'new_password' => 'required|min:6|confirmed',
//     ]);

//     // Obtener usuario usando el guard 'web'
//     $admin = Auth::guard('web')->user();

//     if (!$admin) {
//         return redirect()->back()->with('error', 'Usuario no autenticado.');
//     }

//     // Verificar contraseña actual
//     if (Hash::check($request->current_password, $admin->password)) {
//         $admin->password = Hash::make($request->new_password);
//         $admin->save();
//         return back()->with('correcto', '¡Contraseña actualizada!');
//     }

//     return back()->with('error', 'Contraseña actual incorrecta.');
// }
    public function EditPersonal($id)
    {
        $admin = Administrador::findOrFail($id);
        return view('app.editaradmin', compact('admin'));
    }
    public function UpdatePersonal(Request $request, $id)
{
    // Corregir la validación del campo is_admin
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'is_admin' => 'required|string|max:255|in:1,2,0', // Corregir aquí
    ]);

    $admin = Administrador::findOrFail($id);

    $admin->update([
        'name' => $request->name,
        'email' => $request->email,
        'is_admin' => $request->is_admin,
    ]);

    return redirect()->route('dashboard')->with('success', 'Actualización exitosa.');
}
public function DeletePersonal($id)
{
    $admin = Administrador::findOrFail($id);

    $admin->delete();

    return redirect()->route('dashboard')->with('success', 'Eliminación exitosa.');
}

}
