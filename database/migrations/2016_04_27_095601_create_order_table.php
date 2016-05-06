<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->string('products');//json
            $table->float('order_amount')->default(0);
            $table->unsignedInteger('user_id');
            $table->unsignedTinyInteger('status')->default(0);
            $table->string('promotion_info');//json
            $table->string('country');
            $table->string('province');
            $table->string('city');
            $table->string('address');
            $table->string('contact');
            $table->string('remark');
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
        Schema::drop('order');
    }
}
