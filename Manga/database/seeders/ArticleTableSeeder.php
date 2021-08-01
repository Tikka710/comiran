<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->truncate();

        DB::table('articles')->insert([
            'nickname' => 'Tikka',
            'thame' => '深みのあるストーリー',
            'img_url1' => 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/1816/9784098501816.jpg?_ex=200x200',
            'img_url2' => 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/0357/9784845860357.jpg?_ex=200x200',
            'img_url3' => 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/0887/08874589.jpg?_ex=200x200',
            'manga_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
          ]);
    }
}
