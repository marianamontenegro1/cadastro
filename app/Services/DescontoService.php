<?php

namespace App\Services;

use App\Repositories\DescontoRepository;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\MsgErroResource;
use App\Http\Resources\MsgSucessoResource;

class DescontoService
{
    /**
     * @var DescontoRepository
     */
    protected $repository;

    public function __construct(DescontoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function listar($dados)
    {
        if(empty($dados)){
            return new MsgSucessoResource($this->repository->listarTodos());
        }else{
            return new MsgSucessoResource($this->repository->listarComFiltro($dados));
        }

    }

    public function cadastrar($dados)
    {
        try{
            $regrasValidacao = [
                'nome' => 'required|max:50',
                'valor' => 'required|integer',
            ];

            $mensagens = [
                'required' => 'O :attribute é obrigatório.',
                'max' => 'O :attribute não pode conter mais de 50 caracteres.',
                'integer' => 'O :attribute deve ser inteiro'
            ];

            $validacao = Validator::make($dados, $regrasValidacao, $mensagens);

            if ($validacao->fails()) {
                return new MsgErroResource($validacao->messages());
            }

            $retorno = $this->repository->cadastrar($dados);

            return new MsgSucessoResource($retorno);

        }catch(\Exception $ex){
            return new MsgErroResource($ex->getMessage());
        }

    }

    public function editar($dados, $id)
    {
        try{
            if(empty($dados)){
                return new MsgErroResource('Favor informar o campo a ser alterado.');
            }

            $regrasValidacao = [
                'nome' => 'nullable|max:50',
                'valor' => 'nullable|integer',
            ];

            $mensagens = [
                'max' => 'O :attribute não pode conter mais de 50 caracteres.',
                'integer' => 'O :attribute deve ser inteiro'
            ];

            $validacao = Validator::make($dados, $regrasValidacao, $mensagens);

            if ($validacao->fails()) {
                return new MsgErroResource($validacao->messages());
            }

            return new MsgSucessoResource($this->repository->editar($dados, $id));

        }catch (\Exception $ex){
            return new MsgErroResource($ex->getMessage());
        }
    }

    public function excluir($id)
    {
        try {
            $dados = ['id' => $id];
            $regrasValidacao = ['id' => 'required|integer'];
            $mensagens = [
                'required' => 'O :attribute é obrigatório.',
                'integer' => 'O :attribute deve ser inteiro'
            ];

            $validacao = Validator::make($dados, $regrasValidacao, $mensagens);
            if ($validacao->fails()) {
                return new MsgErroResource($validacao->messages());
            }

            return new MsgSucessoResource($this->repository->excluir($id));

        }catch (\Exception $ex){
            return new MsgErroResource($ex->getMessage());
        }
    }
}
