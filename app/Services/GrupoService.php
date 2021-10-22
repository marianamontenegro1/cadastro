<?php

namespace App\Services;

use App\Repositories\GrupoRepository;

class GrupoService
{
    /**
     * @var GrupoRepository
     */
    protected $repository;

    public function __construct(GrupoRepository $repository)
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
