<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('text');
            $table->integer('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->onDelete('cascade')->on('users');
            $table->integer('book_id')->nullable()->unsigned();
            $table->foreign('book_id')->references('id')->onDelete('cascade')->on('books');            
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
        Schema::dropIfExists('comments');
    }
}
