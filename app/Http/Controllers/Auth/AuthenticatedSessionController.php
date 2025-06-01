<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('loginChoice');
    }

    public function showAdminLoginForm()
    {
        return view('auth.login-admin');
    }

    public function adminLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role === 'adm') {
                return redirect()->route('admin.home');
            } else {
                Auth::logout();
                return redirect()->route('login.admin')->withErrors([
                    'email' => 'Usuário não é um administrador.',
                ]);
            }
        }

        return back()->withErrors([
            'email' => 'As credenciais informadas estão incorretas.',
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

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
