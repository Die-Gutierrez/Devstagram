<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route("publicaciones.index", Auth::user());
        }
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'clave' => 'required|min:6'
        ]);
        if (!Auth::attempt($request->only('correo', 'clave'), $request['recordarme'])) {
            return back()->withErrors([
                'mensaje' => 'Usuario y/o contraseña invalidos'
            ]);
        }

        return redirect()->route("home", Auth::user());
    }

}
