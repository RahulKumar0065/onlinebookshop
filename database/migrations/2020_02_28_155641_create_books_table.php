<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('photo');
            $table->integer('price');
            $table->text('pdf');
            $table->text('description');

            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('author_id');
            $table->timestamps();




            $table->foreign('category_id')
                    ->references('id')->on('categories')
                    ->onDelete('cascade');

            $table->foreign('author_id')
                    ->references('id')->on('authors')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
