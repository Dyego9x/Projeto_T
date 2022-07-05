<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\models\DadosUsuariosModel;
// use App\Controllers\EmailController;

class LoginController extends Controller
{
    private $dadosUsuariosModel;



    public function __construct(
        \stdClass $viewModel,
        DadosUsuariosModel $dadosUsuariosModel,
        EmailController $emailController
    ){
        $this->dadosUsuariosModel = $dadosUsuariosModel;
        $this->emailController = $emailController;
    }



    protected $table = 'projeto_usuarios';
        
    
    public function index(){

        // return redirect('https://github.com');    
        // Deletando todas as sessões:
        //session()->flush();
        // dd(session()->all());
        return view('login.index');

    }
    public function create(){             
        
        return view('login.create');

    }

    public function esqueceuSenha(){             
        
        return view('login.esqueceuSenha');

    }

    public function telaInicial(){

        // return redirect('https://github.com');  
        
        if(session()->get('usuario')['usuario_id']){
            return view('sistema.telaInicialPlataforma');   
        } else{
            session()->flush();
            // dd(session()->all());
            return view('login.index');
        }      
        

    }

    public function cadastrar( Request $request){         
        $nomeUsuario = $request->input('nome');
        $emailUsuario = $request->input('email');
        $senhaUsuario = $request->input('senha');
        $cpfUsuario = $request->input('cpf');

        $cadastrar = $this->dadosUsuariosModel->cadastrar($nomeUsuario, $emailUsuario, $senhaUsuario, $cpfUsuario);        

        return redirect($cadastrar);
    }

    public function acessarPlataforma (Request $request){

        $emailUsuario = $request->input('emaillogin');
        $senhaUsuario = $request->input('senhalogin');

        // dd(session()->all());

        //Retorna o ID do usuário que irá logar
        $verificarLogin = $this->dadosUsuariosModel->verificarLogin($emailUsuario, $senhaUsuario);

        //Valida se encontrou algum usuário, caso tenha encontrado na função anterior irá entrar no if abaixo
        if(!empty($verificarLogin)){
            $request->session()->put('usuario',[
                'usuario_id'=> $verificarLogin,
                'usuario_email'=> $emailUsuario,

            ]);

            return redirect('/sistema/inicio');
        }
    }

    public function esqueceuSenhaEmail(Request $request){        

        $emailUsuario = $request->input('exampleInputEmail');
        $cpfUsuario = $request->input('cpfRecuperar');

        $verificarEmail = $this->dadosUsuariosModel->verificarCadastroEmail($emailUsuario, $cpfUsuario);

        

        if($verificarEmail == '1'){
            

            $pegarsenha = $this->dadosUsuariosModel->pegarSenha($emailUsuario, $cpfUsuario);
            // dd($cpfUsuario);
            $enviar = $this->emailController->configurarEmail($emailUsuario, $pegarsenha);
        }

        if($enviar){
            return redirect('/login/esqueceu-senha');
        }else{
            return redirect('/login');
        }

    }

}
