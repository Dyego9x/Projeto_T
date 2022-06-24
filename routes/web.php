<?php

use App\Http\Controllers\LoginController;
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
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'] );
Route::get('/login/criar', [LoginController::class, 'create'] );
Route::get('/login/esqueceu-senha', [LoginController::class, 'esqueceuSenha'] );
Route::post('/login/salvar', [LoginController::class, 'cadastrar'] );
Route::post('/login/acessar', [LoginController::class, 'acessarPlataforma'] );
Route::get('/sistema/inicio', [LoginController::class, 'telaInicial'] );
