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
            $table->foreign('idCategory')-> references('id')-> on('category');
            $table->timestamps();
            //mai kết nối mối quan hệ qua model và làm bảng role
            // $table->integer('idUser')-> unsigned();
            // $table->foreign('idUser')->references('id')-> on('users');

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
