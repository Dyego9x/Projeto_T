<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SistemaModel extends Model
{

    protected $table = 'projeto_usuario_nota_importada';

    public function salvarDadosNota($data, $numero, $valor, $idUsuario, $nameFile){

        DB::table($this->table)
                ->insert([
                    'usuarionotaimportada_data' => $data,
                    'usuarionotaimportada_numero' => $numero,
                    'usuarionotaimportada_valor' => $valor,   
                    'usuarionotaimportada_usuario_id' => $idUsuario, 
                    'usuarionotaimportada_arquivo' => $nameFile               
                ]);
        
        return ('/sistema/importar-notas');
    }

}