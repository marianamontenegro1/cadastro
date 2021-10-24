<?php

namespace App\Services;

use App\Repositories\GrupoRepository;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\MsgErroResource;
use App\Http\Resources\MsgSucessoResource;

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

    /**
     * @var GrupoCampanhaService
     */
    protected $grupoCampanhaService;

    public function __construct(GrupoRepository $repository,
                                CampanhaService $campanhaService,
                                GrupoCampanhaService $grupoCampanhaService
    )
    {
        $this->repository = $repository;
        $this->campanhaService = $campanhaService;
        $this->grupoCampanhaService = $grupoCampanhaService;
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
            ];

            $mensagens = [
                'required' => 'O :attribute é obrigatório.',
                'max' => 'O :attribute não pode conter mais de 50 caracteres.'
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
                'nome' => 'required|max:50'
            ];

            $mensagens = [
                'max' => 'O :attribute não pode conter mais de 50 caracteres.',
                'required' => 'O :attribute é obrigatório.'
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

    public function cadastrarCampanha($dados)
    {
        try{
            $regrasValidacao = [
                'grupo_id' => 'required|integer',
                'campanha_id' => 'required|integer',
            ];

            $mensagens = [
                'required' => 'O :attribute é obrigatório.',
                'integer' => 'O :attribute deve ser inteiro.'
            ];

            $validacao = Validator::make($dados, $regrasValidacao, $mensagens);

            if ($validacao->fails()) {
                return new MsgErroResource($validacao->messages());
            }

            $validaCampanhaAtiva = $this->campanhaService->listarAtivoPorGrupo($dados['grupo_id']);

            if($validaCampanhaAtiva->isEmpty()){
                $this->grupoCampanhaService->cadastrar($dados);
            }else{
                return new MsgErroResource('O grupo já possui uma campanha ativa');
            }

            return new MsgSucessoResource('Cadastrado com sucesso');

        }catch (\Exception $ex){
            return new MsgErroResource($ex->getMessage());
        }
    }
}
