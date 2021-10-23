<?php

namespace App\Services;

use App\Repositories\DescontoRepository;
use Illuminate\Support\Facades\Validator;

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
                'valor' => 'required|integer',
            ];

            $mensagens = [
                'required' => 'O :attribute é obrigatório.',
                'max' => 'O :attribute não pode conter mais de 50 caracteres.',
                'integer' => 'O :attribute deve ser inteiro'
            ];

            $validacao = Validator::make($dados, $regrasValidacao, $mensagens);

            if ($validacao->fails()) {
                return $validacao->messages();
            }

            $retorno = $this->repository->cadastrar($dados);

            return $retorno;

        }catch(\Exception $ex){
            return "Erro ao efetuar o cadastro do Desconto. " . $ex->getMessage();
        }

    }

    public function editar($dados, $id)
    {
        try{
            if(empty($dados)){
                return "Favor informar o campo a ser alterado.";
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
                return $validacao->messages();
            }

            return $this->repository->editar($dados, $id);

        }catch (\Exception $ex){
            return "Erro ao efetuar a atualização do Desconto. " . $ex->getMessage();
        }
    }
}
