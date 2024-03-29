<?php

namespace App\Repositories;

use App\Models\Cidade;

class CidadeRepository
{

    protected $model = Cidade::class;

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

        if($dados['grupo_id'] ?? false){
            $model = $model::where('grupo_id', '=', $dados['grupo_id']);
        }

        $retorno = $model->get();

        return $retorno;
    }

    public function cadastrar(array $dados)
    {
        $cidade = new Cidade();

        $cidade->grupo_id = $dados['grupo_id'];
        $cidade->nome = $dados['nome'];
        $cidade->save();

        return $cidade;
    }

    public function editar(array $dados, $id)
    {
        $cidade = Cidade::findOrFail($id);

        if(isset($dados['grupo_id'])) $cidade->grupo_id = $dados['grupo_id'];
        if(isset($dados['nome'])) $cidade->nome = $dados['nome'];
        $cidade->save();

        return $cidade;
    }

    public function excluir($id)
    {
        $cidade = Cidade::findOrFail($id);
        $cidade->delete();

        return 'Excluído com sucesso';
    }
}
