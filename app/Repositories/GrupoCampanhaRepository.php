<?php

namespace App\Repositories;

use App\Models\GrupoCampanha;

class GrupoCampanhaRepository
{
    public function cadastrar(array $dados)
    {
        $grupoCampanha = new GrupoCampanha();

        $grupoCampanha->grupo_id = $dados['grupo_id'];
        $grupoCampanha->campanha_id = $dados['campanha_id'];
        $grupoCampanha->save();

        return $grupoCampanha;
    }
}
