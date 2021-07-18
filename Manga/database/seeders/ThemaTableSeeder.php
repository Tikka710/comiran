<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThemaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('themas')->truncate();

        DB::table('themas')->insert([
            'name' => 'バトル',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
