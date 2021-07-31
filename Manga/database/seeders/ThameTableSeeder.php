<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThameTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('thames')->truncate();

        DB::table('thames')->insert([
            'name' => 'とにかく謎が深まる',
            'created_at' => now(),
            'updated_at' => now(),
          ]);
    }
}
