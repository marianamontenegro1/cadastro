<?php

namespace App\Services;

use App\Repositories\GrupoCampanhaRepository;

class GrupoCampanhaService
{
    /**
     * @var GrupoCampanhaRepository
     */
    protected $repository;

    public function __construct(GrupoCampanhaRepository $repository)
    {
        $this->repository = $repository;
    }

    public function cadastrar($dados)
    {
        try{
            return $this->repository->cadastrar($dados);
        }catch (\Exception $ex){
            throw new \Exception($ex->getMessage());
        }
    }

    public function excluir($id)
    {
        try{
            return $this->repository->excluir($id);
        }catch (\Exception $ex){
            throw new \Exception($ex->getMessage());
        }
    }
}
