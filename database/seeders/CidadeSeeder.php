<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cidades')->insert(['nome' => 'Cidade 01', 'grupo_id' => 1]);
        DB::table('cidades')->insert(['nome' => 'Cidade 02', 'grupo_id' => 3]);
        DB::table('cidades')->insert(['nome' => 'Cidade 03', 'grupo_id' => 1]);
        DB::table('cidades')->insert(['nome' => 'Cidade 04', 'grupo_id' => 2]);
        DB::table('cidades')->insert(['nome' => 'Cidade 05', 'grupo_id' => 3]);
        DB::table('cidades')->insert(['nome' => 'Cidade 06', 'grupo_id' => 1]);

    }
}
