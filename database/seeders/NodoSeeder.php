<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class NodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nodo')->insert([
            'id' => 1,
            'parent' => 1,
            'title' => 'one',
        ]);

        DB::table('nodo')->insert([
            'id' => 2,
            'parent' => 2,
            'title' => 'two',
        ]);

        DB::table('nodo')->insert([
            'id' => 3,
            'parent' => 3,
            'title' => 'tree',
            'parent_id' => 2
        ]);
    }
}
