<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Comment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('comment', function(Blueprint $table){
            $table->increments('id');
            $table->integer('idUser')-> unsigned();
            $table->foreign('idUser')-> references('id')-> on('user');
            $table->integer('idArticle')-> unsigned();
            $table->foreign('idArticle')-> references('id')-> on('article');
            $table->string('Content');
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
        //
        Schema::dropIfExists('comment');
    }
}
