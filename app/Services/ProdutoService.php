<?php

namespace App\Services;

use App\Repositories\ProdutoRepository;
use Illuminate\Support\Facades\Validator;

class ProdutoService
{
    /**
     * @var ProdutoRepository
     */
    protected $repository;

    public function __construct(ProdutoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function listar($dados)
    {
        if(empty($dados)){
            return $this->repository->listarTodos();
        }else{
            return $this->repository->listarComFiltro($dados);
        }

    }

    public function cadastrar($dados)
    {
        try{
            $regrasValidacao = [
                'nome' => 'required|max:50',
                'valor' => 'required|numeric',
                'campanha_id' => 'nullable|integer',
                'desconto_id' => 'nullable|integer',
            ];

            $mensagens = [
                'required' => 'O :attribute é obrigatório.',
                'max' => 'O :attribute não pode conter mais de 50 caracteres.',
                'numeric' => 'O :attribute deve ser numérico.',
                'integer' => 'O :attribute deve ser inteiro'
            ];

            $validacao = Validator::make($dados, $regrasValidacao, $mensagens);

            if ($validacao->fails()) {
                return $validacao->messages();
            }

            $retorno = $this->repository->cadastrar($dados);

            return $retorno;

        }catch(\Exception $ex){
            return "Erro ao efetuar o cadastro de Produto. " . $ex->getMessage();
        }

    }
}
