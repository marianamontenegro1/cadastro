<?php

namespace App\Repositories;

use App\Models\Desconto;

class DescontoRepository
{
    protected $model = Desconto::class;

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

        $retorno = $model->get();

        return $retorno;
    }

    public function cadastrar(array $dados)
    {
        $desconto = new Desconto();

        $desconto->nome = $dados['nome'];
        $desconto->valor = $dados['valor'];
        $desconto->save();

        return $desconto;
    }
}
