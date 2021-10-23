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

    public function editar($dados, $id)
    {
        try{
            if(empty($dados)){
                return "Favor informar o campo a ser alterado.";
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
                return $validacao->messages();
            }

            return $this->repository->editar($dados, $id);

        }catch (\Exception $ex){
            return "Erro ao efetuar a atualização do Grupo. " . $ex->getMessage();
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
                return $validacao->messages();
            }

            $validaCampanhaAtiva = $this->campanhaService->listarAtivoPorGrupo($dados['grupo_id']);

            if($validaCampanhaAtiva->isEmpty()){
                $criarGrupoCampanha = $this->grupoCampanhaService->cadastrar($dados);
            }else{
                return 'O grupo já possui uma campanha ativa';
            }

            return 'Cadastrado com sucesso';

        }catch (\Exception $ex){
            return "Erro ao efetuar o cadastro de campanha de Grupo. " . $ex->getMessage();
        }
    }
}
