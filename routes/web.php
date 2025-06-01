<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{
    ProfileController,
    AdminController,
    NivelController,
    CursoController,
    TurmaController,
    CategoriaController,
    DocumentoController,
    AlunoController,
    ComprovanteController,
    DeclaracaoController,
    EixoController
};
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthenticatedSessionController::class, 'create']);

Route::get('/login/admin', [AuthenticatedSessionController::class, 'showAdminLoginForm'])->name('login.admin');
Route::post('/login/admin', [AuthenticatedSessionController::class, 'adminLogin']);

Route::get('/login/aluno', [AuthenticatedSessionController::class, 'showAlunoLoginForm'])->name('login.aluno');
Route::post('/login/aluno', [AuthenticatedSessionController::class, 'alunoLogin']);

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/redirect', function () {
    $user = Auth::user();

    if (!$user) {
        return redirect('/login');
    }

    return $user->role === 'adm'
        ? redirect()->route('admin.home')
        : redirect()->route('aluno.home');
});

Route::get('/dashboard', function () {
    return redirect('/redirect');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');
});

Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin');
    })->name('home');
    Route::get('/documentos', [AdminController::class, 'documentos'])->name('documentos');
    Route::post('/documentos/{id}/aprovar', [AdminController::class, 'aprovarDocumento'])->name('documentos.aprovar');
    Route::post('/documentos/{id}/rejeitar', [AdminController::class, 'rejeitarDocumento'])->name('documentos.rejeitar');
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::resource('niveis', NivelController::class);
    Route::resource('cursos', CursoController::class);
    Route::resource('turmas', TurmaController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('alunos', AlunoController::class);
    Route::resource('comprovantes', ComprovanteController::class);
    Route::resource('eixos', EixoController::class);
});

Route::middleware(['auth', 'isAluno'])->prefix('aluno')->name('aluno.')->group(function () {
    Route::get('/', function () {
        return view('aluno');
    })->name('home');

    Route::get('/documentos/create', [DocumentoController::class, 'create'])->name('documentos.create');
    Route::post('/documentos', [DocumentoController::class, 'store'])->name('documentos.store');

    Route::post('/alunos', [AlunoController::class, 'store'])->name('alunos.store');
});

Route::get('/alunos/create', [AlunoController::class, 'create'])->name('alunos.create');

require __DIR__.'/auth.php';
