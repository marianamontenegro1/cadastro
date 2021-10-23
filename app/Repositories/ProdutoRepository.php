<?php

namespace App\Repositories;

use App\Models\Produto;

class ProdutoRepository
{
    protected $model = Produto::class;

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

        if($dados['valor'] ?? false){
            $model = $model::where('valor', '=', $dados['valor']);
        }

        if($dados['campanha_id'] ?? false){
            $model = $model::where('campanha_id', '=', $dados['campanha_id']);
        }

        if($dados['desconto_id'] ?? false){
            $model = $model::where('desconto_id', '=', $dados['desconto_id']);
        }

        $retorno = $model->get();

        return $retorno;
    }

    public function cadastrar(array $dados)
    {
        $produto = new Produto();

        $produto->nome = $dados['nome'];
        $produto->valor = $dados['valor'];
        if(isset($dados['campanha_id'])) $produto->campanha_id = $dados['campanha_id'];
        if(isset($dados['desconto_id'])) $produto->desconto_id = $dados['desconto_id'];
        $produto->save();

        return $produto;
    }
}
