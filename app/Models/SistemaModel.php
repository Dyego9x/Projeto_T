<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SistemaModel extends Model
{

    protected $table = 'projeto_usuario_nota_importada';

    public function salvarDadosNota($data, $numero, $valor, $idUsuario, $nameFile){

        $resultado = DB::table($this->table)
                ->insert([
                    'usuarionotaimportada_data' => $data,
                    'usuarionotaimportada_numero' => $numero,
                    'usuarionotaimportada_valor' => $valor,   
                    'usuarionotaimportada_usuario_id' => $idUsuario, 
                    'usuarionotaimportada_arquivo' => $nameFile               
                ]);
        
        return ($resultado);
    }

    public function buscarDadosNota($dataInicial, $dataFinal, $idUsuario) {        
        $resultado = DB::table($this->table)
            ->where('usuarionotaimportada_usuario_id', $idUsuario)
            ->where('usuarionotaimportada_data','>=', $dataInicial)
            ->where('usuarionotaimportada_data','<=', $dataFinal)
            
            ->get();

        return ($resultado);
    }

    public function excluirNota($idNota, $idUsuario){
        $resultado = DB::table($this->table)
        ->where('usuarionotaimportada_usuario_id', $idUsuario)
        ->where('usuarionotaimportada_id', $idNota)
        ->delete();

        return ($resultado);
    }
}