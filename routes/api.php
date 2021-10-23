<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\CampanhaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('cidade')->group(function () {
    Route::get('/listar', [CidadeController::class, 'listar']);
    Route::Post('/cadastrar', [CidadeController::class, 'cadastrar']);
    Route::Put('/editar/{id}', [CidadeController::class, 'editar']);
    Route::Delete('/excluir/{id}', [CidadeController::class, 'excluir']);
});

Route::prefix('grupo')->group(function () {
    Route::get('/listar', [GrupoController::class, 'listar']);
    Route::Post('/cadastrar', [GrupoController::class, 'cadastrar']);
    Route::Post('/cadastrar-campanha', [GrupoController::class, 'cadastrarCampanha']);
    Route::Put('/editar/{id}', [GrupoController::class, 'editar']);
    Route::Delete('/excluir/{id}', [GrupoController::class, 'excluir']);
});

Route::prefix('campanha')->group(function () {
    Route::get('/listar', [CampanhaController::class, 'listar']);
    Route::Post('/cadastrar', [CampanhaController::class, 'cadastrar']);
    Route::Put('/editar/{id}', [CampanhaController::class, 'editar']);
    Route::Delete('/excluir/{id}', [CampanhaController::class, 'excluir']);
});
