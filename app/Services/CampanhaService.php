<?php

namespace App\Services;

use App\Repositories\CampanhaRepository;

class CampanhaService
{
    /**
     * @var CampanhaRepository
     */
    protected $repository;

    public function __construct(CampanhaRepository $repository)
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
