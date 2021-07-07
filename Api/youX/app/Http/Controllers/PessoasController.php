<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PessoasController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function create(Request $request){
        //$results = app('db')->select("SELECT count(*) FROM pessoas");
        $nome = $request->input('nome');
        $taxpayer_id = base64_decode($request->input('taxpayer_id'));
        $taxpayer_id = md5($taxpayer_id);
        $uf = $request->input('uf');
        $birthdate = $request->input('birthdate');
        $heighth = $request->input('heighth');
        $weigth = $request->input('weigth');
        app('db')->insert('INSERT INTO pessoas
                            (nome,cpf,uf,data_nascimento,altura,peso)
                                values (?, ? , ?, ?, ?, ?)', ["{$nome}","{$taxpayer_id}","{$uf}","{$birthdate}",$heighth, $weigth]);
        return response()->json(['status'=>true,'message'=> "Cadastrado com sucesso", 'data'=> "ok"]);
    }

    //
}
