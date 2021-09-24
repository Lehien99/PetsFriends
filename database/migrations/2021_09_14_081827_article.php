<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Article extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('article', function(Blueprint $table){
            $table->increments('id');
            $table->string('Title');
            $table->text('Summary');
            $table->longText('Content');
            $table->string('Image');
            $table->string('IsPublisher');
            $table->integer('Highlights');
            $table->integer('View')->nullable();
            $table->integer('idCategory')-> unsigned();
            $table->integer('idUser')-> unsigned();
            $table->foreign('idCategory')-> references('id')-> on('category');
            $table->foreign('idUser')->references('id')-> on('users');
            $table->timestamps();
            // $table->integer('idManager')-> unsigned();
            // $table->foreign('idManager')->references('id')-> on('manager');
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
        Schema::dropIfExists('article');
        
    }
}
