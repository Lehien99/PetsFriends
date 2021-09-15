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
            $table->string('Content');
            $table->integer('idUser')-> unsigned();
            $table->integer('idArticle')-> unsigned();
            $table->foreign('idUser')-> references('id')-> on('users');
            $table->foreign('idArticle')-> references('id')-> on('article');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('comment');
        
    }
}
