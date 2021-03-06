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

        $idUsuario = session()->get('usuario')['usuario_id'];
        $dataInicial = '0000-00-00';
        $dataFinal = '9999-99-99';

        $dados = $this->sistemaModel->buscarDadosNota($dataInicial, $dataFinal, $idUsuario);
        
        if(session()->get('usuario')['usuario_id']){            
            return view('sistema.telaListarNotas', compact('dados')); 
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
    
            // Faz o upload: tem que rodar na prompt php artisan storage:link para criar um local no computador
            $upload = $request->arquivoNota->storeAs(''.$idUsuario.'', $nameFile);
            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao
    
            // Verifica se NÃO deu certo o upload (Redireciona de volta)
            if ( !$upload )
                return redirect('/sistema/importar-notas')                    
                    ->with('error', 'Falha ao fazer upload');                    
            else{
                $salvarDados = $this->sistemaModel->salvarDadosNota($dataNota, $numeroNota, $valorNota, $idUsuario, $nameFile);
                
                if($salvarDados){
                    return redirect('/sistema/importar-notas')
                    ->with('mensagem', 'Nota importada com sucesso!');
                }else{
                    return redirect('/sistema/importar-notas')                    
                    ->with('error', 'Falha ao fazer upload');
                }
                
            }
    
        }
    }

    public function buscarDadosNota(Request $request){
        $dataInicial = $request->input('dataInicial');
        $dataFinal = $request->input('dataFinal');
        $idUsuario = session()->get('usuario')['usuario_id'];

        if(empty($dataInicial)){
            $dataInicial = '0000-00-00';
        }

        if(empty($dataFinal)){
            $dataFinal = '9999-99-99';
        }

        $dados = $this->sistemaModel->buscarDadosNota($dataInicial, $dataFinal, $idUsuario);

        return view('sistema.telaListarNotas', compact('dados'));

        // dd($dados);

    }

    public function excluirDadosNota(Request $request){
        $idNota = $request->input('idNota');
        $idUsuario = $request->input('idUsuario');
        // print($idNota);exit;

        $dadosRetorno = ['erro' => '','dados' => ''];        
        if(!empty($idNota) && !empty($idUsuario)){            
            $retorno = $this->sistemaModel->excluirNota($idNota, $idUsuario);
            // print($retorno);exit;
            if($retorno){
                $dadosRetorno['erro'] = 'N'; 
                $dadosRetorno['dados'] = 'sistema.telaListarNotas';                             
            }else{
                $dadosRetorno['erro'] = 'S'; 
                $dadosRetorno['dados'] = 'Não deletou do banco';               
            }
        }     
        else{
            $dadosRetorno['erro'] = 'S';  
            $dadosRetorno['dados'] = 'Dados vazios';               
        }   

        return json_encode($dadosRetorno);
    }

    public function editarDadosNota(Request $request){
        $idNota = $request->input('idNota');
        $idUsuario = session()->get('usuario')['usuario_id'];
        $valorNota = $request->input('valorNota');
        $dataNota = $request->input('dataNota');
        // print($idNota);exit;

        $dadosRetorno = ['erro' => '','dados' => ''];        
        if(!empty($idNota) && !empty($idUsuario)){            
            $retorno = $this->sistemaModel->editarNota($idNota, $idUsuario, $valorNota, $dataNota);
            // print($retorno);exit;
            if($retorno){
                $dadosRetorno['erro'] = 'N';
                $dadosRetorno['dados'] = 'sistema.telaListarNotas';                             
            }else{
                $dadosRetorno['erro'] = 'S';
                $dadosRetorno['dados'] = 'Não deletou do banco';               
            }
        }     
        else{
            $dadosRetorno['erro'] = 'S';  
            $dadosRetorno['dados'] = 'Dados vazios';               
        }   

        return json_encode($dadosRetorno);
    }

    public function downloadNota(Request $request){
        $idNota = $request->input('idNota');
        $idUsuario = session()->get('usuario')['usuario_id'];


        $dadosRetorno = ['erro' => '','dados' => ''];        
        if(!empty($idNota) && !empty($idUsuario)){            
            $nomeArquivo = $this->sistemaModel->nomeArquivo($idUsuario, $idNota);            
            if($nomeArquivo){
                $dadosRetorno['erro'] = 'N';
                $dadosRetorno['dados'] = 'Encontrado'; 
                // dd('../public/storage/'.$idUsuario.'/'.$nomeArquivo);

                // $dadosRetorno['dados'] = response()->download(storage_path('../public/storage/'.$idUsuario.'/'.$nomeArquivo)); 
                $dadosRetorno['dados'] = storage_path('../public/storage/'.$idUsuario.'/'.$nomeArquivo); 
                
            }else{
                $dadosRetorno['erro'] = 'S';
                $dadosRetorno['dados'] = 'Não encontrado';      
                       
            }
        }     
        else{
            $dadosRetorno['erro'] = 'S';  
            $dadosRetorno['dados'] = 'Dados vazios';    
                      
        } 
        return json_encode($dadosRetorno);
        
    }

}
