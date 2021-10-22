<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CidadeService;

class CidadeController extends Controller
{
    /**
     * @var CidadeService
     */
    protected $cidadeService;

    public function __construct(CidadeService $cidadeService)
    {
        $this->cidadeService = $cidadeService;
    }

    public function listar(Request $request)
    {
        return $this->cidadeService->listar($request->all());
    }

    public function cadastrar(Request $request)
    {
        return $this->cidadeService->cadastrar($request->all());
    }

    public function editar(Request $request, $id)
    {
        return $this->cidadeService->editar($request->all(), $id);
    }

}
