<?php

namespace App\Http\Controllers;

use App\Services\DescontoService;
use Illuminate\Http\Request;

class DescontoController extends Controller
{
    /**
     * @var DescontoService
     */
    protected $descontoService;

    public function __construct(DescontoService $descontoService)
    {
        $this->descontoService = $descontoService;
    }

    public function listar(Request $request)
    {
        return $this->descontoService->listar($request->all());
    }
}
