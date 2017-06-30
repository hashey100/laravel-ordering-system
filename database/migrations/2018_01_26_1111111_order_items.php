<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('orders_items', function (Blueprint $table) {
          $table->increments('id');
          $table->timestamps();
          $table->integer('order_id')->unsigned();
          $table->string('title');
          $table->integer('qty');
          $table->integer('price');
          $table->foreign('order_id')->references('id')->on('orders');
      });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('orders_items');
    }
}
