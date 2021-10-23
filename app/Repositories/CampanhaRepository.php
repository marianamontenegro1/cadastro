<?php

namespace App\Repositories;

use App\Models\Campanha;
use Illuminate\Support\Facades\DB;

class CampanhaRepository
{
    protected $model = Campanha::class;

    public function listarTodos()
    {
        return $this->model::all();
    }

    public function listarComFiltro($dados)
    {
        $model = $this->model;

        if($dados['id'] ?? false){
            $model = $model::where('id', '=', $dados['id']);
        }

        if($dados['nome'] ?? false){
            $model = $model::where('nome', '=', $dados['nome']);
        }

        if($dados['flg_ativo'] ?? false){
            $model = $model::where('flg_ativo', '=', $dados['flg_ativo']);
        }

        $retorno = $model->get();

        return $retorno;
    }

    public function cadastrar(array $dados)
    {
        $campanha = new Campanha();

        $campanha->nome = $dados['nome'];
        if(isset($dados['flg_ativo'])) $campanha->flg_ativo = $dados['flg_ativo'];
        $campanha->save();

        return $campanha;
    }

    public function listarAtivoPorGrupo($idGrupo){
        $campanha = DB::table('campanhas')
            ->join('grupo_campanha', 'campanhas.id', '=', 'grupo_campanha.campanha_id')
            ->select('campanhas.*')
            ->where('campanhas.flg_ativo', '=', 'S')
            ->where('grupo_campanha.grupo_id', '=', $idGrupo)
            ->get();

        return $campanha;
    }
}
