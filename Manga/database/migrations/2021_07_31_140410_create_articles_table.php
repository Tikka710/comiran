<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nickname', 20);
            $table->text('img_url1');
            $table->text('img_url2');
            $table->text('img_url3');
            $table->unsignedBigInteger('thema_id');
            $table->foreign('thema_id')->references('id')->on('thames');
            $table->unsignedBigInteger('manga_id');
            $table->foreign('manga_id')->references('id')->on('mangaes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
