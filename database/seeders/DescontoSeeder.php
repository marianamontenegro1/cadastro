<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DescontoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('descontos')->insert(['nome' => 'Desconto 10%', 'valor' => 10]);
        DB::table('descontos')->insert(['nome' => 'Desconto 20%', 'valor' => 20]);
        DB::table('descontos')->insert(['nome' => 'Desconto 30%', 'valor' => 30]);
    }
}
