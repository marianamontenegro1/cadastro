<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GrupoCampanhaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grupo_campanha')->insert(['grupo_id' => 1, 'campanha_id' => 1]);
        DB::table('grupo_campanha')->insert(['grupo_id' => 1, 'campanha_id' => 2]);
        DB::table('grupo_campanha')->insert(['grupo_id' => 2, 'campanha_id' => 3]);
        DB::table('grupo_campanha')->insert(['grupo_id' => 3, 'campanha_id' => 4]);
    }
}
