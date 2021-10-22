<?php

namespace App\Repositories;

use App\Models\Campanha;

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
}
