<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderdetails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('qty');
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('order_id');
            $table->integer('status');
            $table->timestamps();


            $table->foreign('book_id')
                    ->references('id')->on('books')
                    ->onDelete('cascade');

            $table->foreign('customer_id')
                    ->references('id')->on('customers')
                    ->onDelete('cascade');

            $table->foreign('order_id')
                    ->references('id')->on('orders')
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
        Schema::dropIfExists('orderdetails');
    }
}
