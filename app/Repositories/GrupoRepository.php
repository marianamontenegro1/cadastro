<?php

namespace App\Repositories;

use App\Models\Grupo;

class GrupoRepository
{
    protected $model = Grupo::class;

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

        $retorno = $model->get();

        return $retorno;
    }
}
