<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampanhaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('campanhas')->insert(['nome' => 'Campanha 01', 'flg_ativo' => 'N']);
        DB::table('campanhas')->insert(['nome' => 'Campanha 02', 'flg_ativo' => 'S']);
        DB::table('campanhas')->insert(['nome' => 'Campanha 03', 'flg_ativo' => 'S']);
        DB::table('campanhas')->insert(['nome' => 'Campanha 04', 'flg_ativo' => 'N']);
        DB::table('campanhas')->insert(['nome' => 'Campanha 05', 'flg_ativo' => 'S']);
        DB::table('campanhas')->insert(['nome' => 'Campanha 06', 'flg_ativo' => 'S']);
    }
}
