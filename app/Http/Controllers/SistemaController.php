<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\models\DadosUsuariosModel;
use App\models\SistemaModel;

class SistemaController extends Controller
{
    private $dadosUsuariosModel;

    private $SistemaModel;

    public function __construct(
        \stdClass $viewModel,
        DadosUsuariosModel $dadosUsuariosModel,
        SistemaModel $sistemaModel
    ){
        $this->dadosUsuariosModel = $dadosUsuariosModel;
        $this->sistemaModel = $sistemaModel;
    }    
        
    
    public function telaImportarNotas(){    

        if(session()->get('usuario')['usuario_id']){
            return view('sistema.telaImportarNotas');
        } else{
            session()->flush();
            // dd(session()->all());
            return view('login.index');
        }         

    } 
    
    public function telaListarNotas(){    
        
        if(session()->get('usuario')['usuario_id']){
            return view('sistema.telaListarNotas'); 
        } else{
            session()->flush();
            // dd(session()->all());
            return view('login.index');
        }         

    } 

    public function logout() {
        session()->flush();

        return redirect('/login');
    }

    public function salvarDadosNota( Request $request ){
        // Define o valor default para a variável que contém o nome da imagem 
        $nameFile = null;

        $dataNota = $request->input('dataArquivo');
        $numeroNota = $request->input('numeroNota');
        $valorNota = $request->input('valorNota');
        
        $idUsuario = session()->get('usuario')['usuario_id'];
        
        // dd(session()->all());
    
        // Verifica se informou o arquivo e se é válido
        if ($request->hasFile('arquivoNota') && $request->file('arquivoNota')->isValid()) {
            
            // Define um aleatório para o arquivo
            $name = uniqid(date('HisYmd'));
    
            // Pega a extensão do arquivo
            $extension = $request->arquivoNota->extension();
    
            // Define o nome
            $nameFile = "{$name}.{$extension}";
    
            // Faz o upload:
            $upload = $request->arquivoNota->storeAs(''.$idUsuario.'', $nameFile);
            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao
    
            // Verifica se NÃO deu certo o upload (Redireciona de volta)
            if ( !$upload )
                return redirect('/sistema/importar-notas')                    
                    ->with('error', 'Falha ao fazer upload');                    
            else{
                $salvarDados = $this->sistemaModel->salvarDadosNota($dataNota, $numeroNota, $valorNota, $idUsuario, $nameFile);
                return redirect($salvarDados)
                ->with('mensagem', 'Nota importada com sucesso!');
            }
    
        }
    }

}
