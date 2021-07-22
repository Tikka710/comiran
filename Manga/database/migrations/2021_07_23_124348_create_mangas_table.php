<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMangasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mangas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title', 25);
            $table->text('img_url');
            $table->text('source_url');
            $table->unsignedBigInteger('thema_id');
            $table->foreign('thema_id')->references('id')->on('themas');
            $table->unsignedBigInteger('username_id');
            $table->foreign('username_id')->references('id')->on('username');
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
        Schema::dropIfExists('mangas');
    }
}
