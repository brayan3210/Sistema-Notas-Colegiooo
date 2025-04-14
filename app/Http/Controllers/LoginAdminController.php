<?php

namespace App\Http\Controllers;
use App\Mail\PasswordResetMail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Administrador;

class LoginAdminController extends Controller
{
    //  
    public function index()
    {
        return view('auth.login'); // Asegúrate de tener una vista en resources/views/auth/login.blade.php
    }
    
    // public function login(Request $request)
    // {
    //    // dd($request);
    //     $request->validate([
    //         'email' => 'required',
    //         'password' => 'required'
    //     ]);
    //     $credentials = $request->only('email', 'password');
    //     if (Auth::attempt($credentials)) {
    //         return redirect()->intended('/dashboard');
    //     }
    //     return redirect()->back()->withInput()->with('error', 'Usuario o contraseña incorrecta');
    // }
    //borrar este y descomentariar el original para volver a al
    public function login(Request $request)
    {
        $credentials = $request->only('name', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            switch ($user->is_admin) {
                case 1: // Admin
                    return redirect()->route('dashboard');
                case 2: // Profesor
                    return redirect()->route('profesor.dashboard');
                case 0: // Usuario
                    return redirect()->route('dashboard');
                default:
                    Auth::logout();
                    return redirect('/login')->with('error', 'Rol no válido.');
            }
        }
        return redirect('/login')->with('error', 'Credenciales incorrectas.');
    }
      /**
     * Muestra la vista "Olvidé mi contraseña".
     */
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    /**
     * Procesa el formulario de "Olvidé mi contraseña": 
     * - Genera nueva contraseña aleatoria
     * - Actualiza en la BD
     * - Envía correo al usuario
     */
    public function forgotPassword(Request $request)
    {
        // Validar el campo 'name'
        $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'Debe ingresar su usuario (name) para recuperar la contraseña.'
        ]);

        // 1. Buscar el usuario en la tabla 'administradores'
        $user = Administrador::where('name', $request->name)->first();

        if (!$user) {
            // Redirigir con mensaje de error si no existe
            return back()->with('error_forgot', 'No se encontró un usuario con ese nombre.');
        }

        // 2. Generar una nueva contraseña aleatoria (8 caracteres)
        $newPassword = Str::random(8);

        // 3. Actualizar el password (encriptado con Hash)
        $user->password = Hash::make($newPassword);
        $user->force_change_password = 1; // Activamos el flag para forzar cambio
        $user->save();

        // 4. Enviar correo con la nueva contraseña
        try {
            /// ESTO ES CUANDO LO ENVIO SIN DISEÑO --- BOORAR LO DE MAIL TO METODO PARA QUE QUEDE NORMAL OTRA VEZ
            // Mail::raw(
            //     "Hola, $user->name.\n\n".
            //     "Tu nueva contraseña de acceso es: $newPassword\n\n".
            //     "Recuerda cambiarla después de iniciar sesión.\n".
            //     "Saludos,\nColegio Santo Ángel",
            //     function ($message) use ($user) {
            //         $message->to($user->email)
            //                 ->subject('Recuperación de contraseña - Colegio Santo Ángel');
            //     }
            // );
            Mail::to($user->email)->send(new PasswordResetMail($user, $newPassword));

        } catch (\Exception $e) {
            return back()->with('error_forgot', 'Hubo un problema enviando el correo: '.$e->getMessage());
        }

        // 5. Redirigir con mensaje de éxito
        return back()->with('success_forgot', 'Se envió un correo con tu nueva contraseña.');
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

}

