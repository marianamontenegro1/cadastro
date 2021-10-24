<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert(['nome' => 'Produto 01', 'valor' => 10.69]);
        DB::table('produtos')->insert(['nome' => 'Produto 02', 'valor' => 20.99]);
        DB::table('produtos')->insert(['nome' => 'Produto 03', 'valor' => 1.90]);
        DB::table('produtos')->insert(['nome' => 'Produto 04', 'valor' => 80]);
        DB::table('produtos')->insert(['nome' => 'Produto 05', 'valor' => 120.65]);
        DB::table('produtos')->insert(['nome' => 'Produto 06', 'valor' => 56.99]);
    }
}
