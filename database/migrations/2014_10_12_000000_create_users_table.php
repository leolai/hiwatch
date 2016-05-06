<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('nickname')->default('');
            $table->string('email')->default('');
            $table->string('avatar')->default('');
            $table->string('avatar_original')->default('');//原始尺寸的头像
            $table->float('pay_count')->default(0);
            $table->unsignedTinyInteger('gender')->default(0);
            $table->unsignedTinyInteger('platform')->default(0);
            $table->string('platform_id')->default('');
            $table->string('password', 60);
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
