<?php

namespace App\Services;

use App\Repositories\CidadeRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CidadeService
{
    /**
     * @var CidadeRepository
     */
    protected $repository;

    public function __construct(CidadeRepository $repository)
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
                'id_grupos' => 'required|integer',
            ];

            $mensagens = [
                'required' => 'O :attribute é obrigatório.',
                'max' => 'O :attribute não pode conter mais de 50 caracteres.',
                'integer' => 'O :attribute deve ser inteiro'
            ];

            Log::debug('Dados', array('dados'=>$dados));
            $validacao = Validator::make($dados, $regrasValidacao, $mensagens);

            if ($validacao->fails()) {
                return $validacao->messages();
            }

            $this->repository->cadastrar($dados);

            return 'Cidade cadastrada com sucesso';

        }catch(\Exception $ex){
            return "Erro ao efetuar o cadastro de Cidade. " . $ex->getMessage();
        }

    }
}
