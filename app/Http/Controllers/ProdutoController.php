<?php

namespace App\Http\Controllers;

use App\Services\ProdutoService;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * @var ProdutoService
     */
    protected $produtoService;

    public function __construct(ProdutoService $produtoService)
    {
        $this->produtoService = $produtoService;
    }

    public function listar(Request $request)
    {
        return $this->produtoService->listar($request->all());
    }

    public function cadastrar(Request $request)
    {
        return $this->produtoService->cadastrar($request->all());
    }

    public function editar(Request $request, $id)
    {
        return $this->produtoService->editar($request->all(), $id);
    }
}
