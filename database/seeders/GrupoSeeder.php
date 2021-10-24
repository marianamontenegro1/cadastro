<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grupos')->insert(['nome' => 'Grupo 01']);
        DB::table('grupos')->insert(['nome' => 'Grupo 02']);
        DB::table('grupos')->insert(['nome' => 'Grupo 03']);
    }
}
