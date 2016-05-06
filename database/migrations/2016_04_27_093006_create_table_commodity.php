<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCommodity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commodity', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('sub_name')->dafult('');
            $table->unsignedInteger('special_attr')->default(0);
            $table->unsignedInteger('inventory')->default(0);
            $table->float('price')->default(0);
            $table->float('promotion_price')->default(0);
            $table->string('images')->default('');
            $table->text('descriptions')->default('');
            $table->unsignedInteger('view_count')->default(0);
            $table->float('rate')->default(0);
            $table->string('similar')->default('');
            $table->integer('sort')->default(0);
            $table->tinyInteger('status')->defult(0);//状态
            $table->float('weight')->default(0);
            $table->float('length')->default(0);
            $table->float('width')->default(0);
            $table->float('height')->default(0);
            $table->text('keywords')->default('');
            $table->text('meta_desc')->default('');
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
        Schema::drop('commodity');
    }
}
