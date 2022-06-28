<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\SistemaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login.index');
});

// GET

Route::get('/login', [LoginController::class, 'index'] );
Route::get('/login/criar', [LoginController::class, 'create'] );
Route::get('/login/esqueceu-senha', [LoginController::class, 'esqueceuSenha'] );
Route::get('/sistema/inicio', [LoginController::class, 'telaInicial'] );
Route::get('/sistema/importar-notas', [SistemaController::class, 'telaImportarNotas'] );


// Teste

Route::get('/emailTest', function (){

    return view ('mail.createEmail');

});

Route::get('/trocar-senha', function (){

    return view ('login.trocarSenha');

});

// POST

Route::post('/login/salvar', [LoginController::class, 'cadastrar'] );
Route::post('/login/acessar', [LoginController::class, 'acessarPlataforma'] );
Route::post('/login/trocarsenha', [LoginController::class, 'trocarSenha'] );

Route::post('/login/salvarNota', [LoginController::class, 'trocarSenha'] );