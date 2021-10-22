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
}
