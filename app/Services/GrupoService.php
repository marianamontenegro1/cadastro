<?php

namespace App\Services;

use App\Repositories\GrupoRepository;
use Illuminate\Support\Facades\Validator;

class GrupoService
{
    /**
     * @var GrupoRepository
     */
    protected $repository;

    /**
     * @var CampanhaService
     */
    protected $campanhaService;

    public function __construct(GrupoRepository $repository, CampanhaService $campanhaService)
    {
        $this->repository = $repository;
        $this->campanhaService = $campanhaService;
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
            ];

            $mensagens = [
                'required' => 'O :attribute é obrigatório.',
                'max' => 'O :attribute não pode conter mais de 50 caracteres.'
            ];

            $validacao = Validator::make($dados, $regrasValidacao, $mensagens);

            if ($validacao->fails()) {
                return $validacao->messages();
            }

            $retorno = $this->repository->cadastrar($dados);

            return $retorno;

        }catch(\Exception $ex){
            return "Erro ao efetuar o cadastro de Grupo. " . $ex->getMessage();
        }

    }
}
