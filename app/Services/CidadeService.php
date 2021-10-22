<?php

namespace App\Services;

use App\Repositories\CidadeRepository;

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
}