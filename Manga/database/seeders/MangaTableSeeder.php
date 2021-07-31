<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MangaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mangaes')->truncate();

        DB::table('mangaes')->insert([
            'title' => '葬送のフリーレン',
            'img_url' => 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/1816/9784098501816.jpg?_ex=200x200',
            'source_url' => 'https://books.rakuten.co.jp/rb/16432794/',
            'created_at' => now(),
            'updated_at' => now(),
          ]);
    }
}
