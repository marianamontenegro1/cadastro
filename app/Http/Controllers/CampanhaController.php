<?php

namespace App\Http\Controllers;

use App\Services\CampanhaService;
use Illuminate\Http\Request;

class CampanhaController extends Controller
{
    /**
     * @var CampanhaService
     */
    protected $campanhaService;

    public function __construct(CampanhaService $campanhaService)
    {
        $this->campanhaService = $campanhaService;
    }

    public function listar(Request $request)
    {
        return $this->campanhaService->listar($request->all());
    }
    public function cadastrar(Request $request)
    {
        return $this->campanhaService->cadastrar($request->all());
    }

    public function editar(Request $request, $id)
    {
        return $this->campanhaService->editar($request->all(), $id);
    }

    public function excluir($id)
    {
        return $this->campanhaService->excluir($id);
    }

}
