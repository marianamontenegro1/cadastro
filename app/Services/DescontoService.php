<?php

namespace App\Services;

use App\Repositories\DescontoRepository;

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
}
