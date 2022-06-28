<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\models\DadosUsuariosModel;

class SistemaController extends Controller
{
    private $dadosUsuariosModel;

    public function __construct(
        \stdClass $viewModel,
        DadosUsuariosModel $dadosUsuariosModel
    ){
        $this->dadosUsuariosModel = $dadosUsuariosModel;
    }    
        
    
    public function telaImportarNotas(){    
        
        return view('sistema.telaImportarNotas');

    }    

}
