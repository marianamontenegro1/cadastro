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

    public function cadastrar(array $dados)
    {
        $grupo = new Grupo();

        $grupo->nome = $dados['nome'];
        $grupo->save();

        return $grupo;
    }

    public function editar(array $dados, $id)
    {
        $grupo = Grupo::findOrFail($id);

        $grupo->nome = $dados['nome'];
        $grupo->save();

        return $grupo;
    }
}
