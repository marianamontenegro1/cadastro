<?php

namespace App\Http\Controllers;

use App\Services\GrupoService;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    /**
     * @var GrupoService
     */
    protected $grupoService;

    public function __construct(GrupoService $grupoService)
    {
       $this->grupoService = $grupoService;
    }

    public function listar(Request $request)
    {
        return $this->grupoService->listar($request->all());
    }

    public function cadastrar(Request $request)
    {
        return $this->grupoService->cadastrar($request->all());
    }
}
