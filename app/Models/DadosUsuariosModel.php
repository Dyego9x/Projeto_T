<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DadosUsuariosModel extends Model
{
    protected $table = 'projeto_usuarios';


    public function consultarCadastro($email){                

        $CountUsuario = DB::table($this->table)
            ->where('usuario_email',$email)                    
            ->count('usuario_email');

        return $CountUsuario;

    }

    public function verificarLogin($email, $senha){
        $CountUsuario = DB::table($this->table)
            ->where('usuario_email',$email)
            ->where('usuario_senha',$senha)    
            ->count('usuario_email');

        return $CountUsuario;
    }

    public function cadastrar($nome, $email, $senha, $cpf){         
        $nomeUsuario = $nome;
        $emailUsuario = $email;
        $senhaUsuario = $senha;
        $cpfUsuario = $cpf;

        $verificarCadastro = $this->consultarCadastro($email);

        if($verificarCadastro == 0){
            DB::table($this->table)
                ->insert([
                    'usuario_nome' => $nomeUsuario,
                    'usuario_email' => $emailUsuario,
                    'usuario_senha' => $senhaUsuario,
                    'usuario_cpf' => $cpfUsuario,
                ]);

            return ('/login');
        }else{
            return ('/login/esqueceu-senha');
        }
        
    }



}

