<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\SistemaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login.index');
});

// GET

//Tela de login
Route::get('/login', [LoginController::class, 'index'] );

//Tela de criação de conta
Route::get('/login/criar', [LoginController::class, 'create'] );

//Tela para recuperar a senha
Route::get('/login/esqueceu-senha', [LoginController::class, 'esqueceuSenha'] );

//Retorna a tela inicial do sistema
Route::get('/sistema/inicio', [LoginController::class, 'telaInicial'] );

//Direciona para a tela de importação de notas
Route::get('/sistema/importar-notas', [SistemaController::class, 'telaImportarNotas'] );

Route::get('/sistema/listar-notas', [SistemaController::class, 'telaListarNotas'] );

Route::get('/sistema/logout', [SistemaController::class, 'logout'] );


// Teste

Route::get('/emailTest', function (){

    return view ('mail.createEmail');

});

Route::get('/trocar-senha', function (){

    return view ('login.trocarSenha');

});

// POST

//Verifica se não existe um cadastro já feito e salva o novo
Route::post('/login/salvar', [LoginController::class, 'cadastrar'] );

// Retorna a tela inicial
Route::post('/login/acessar', [LoginController::class, 'acessarPlataforma'] );

//
Route::post('/login/trocarsenha', [LoginController::class, 'trocarSenha'] );

//Salva a nota no banco
Route::post('/login/salvarNota', [SistemaController::class, 'salvarDadosNota'] );

//Consulto os dados das notas
Route::post('/sistema/buscarNotas', [SistemaController::class, 'buscarDadosNota'] );

//Excluir notas
Route::post('/sistema/excluirNotas', [SistemaController::class, 'excluirDadosNota'] );

//Editar notas
Route::post('/sistema/editar-notas', [SistemaController::class, 'editarDadosNota'] );