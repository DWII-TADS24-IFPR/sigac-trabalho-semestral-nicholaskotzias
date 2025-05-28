<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function showAdminLoginForm()
    {
        return view('auth.login-admin');
    }

    public function adminLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role === 'adm') {
                return redirect()->intended('/admin');
            }

            Auth::logout(); 
            return redirect()->route('login.admin')->withErrors([
                'email' => 'Você não tem permissão de administrador.',
            ]);
        }

        return back()->withErrors([
            'email' => 'Credenciais inválidas.',
        ]);
    }

    public function showAlunoLoginForm()
    {
        return view('auth.login-aluno');
    }

    public function alunoLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role === 'aluno') {
                return redirect()->intended('/aluno');
            }

            Auth::logout(); 
            return redirect()->route('login.aluno')->withErrors([
                'email' => 'Você não tem permissão para acessar como aluno.',
            ]);
        }

        return back()->withErrors([
            'email' => 'Credenciais inválidas.',
        ]);
    }
}
