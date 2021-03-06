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
        $table->string('email')->unique();
        $table->string('password')->default('password');
        $table->enum('role', ['regular', 'admin'])->default('regular');
        $table->rememberToken();
        $table->timestamps();
      });

      Schema::create('images', function (Blueprint $table) {
        $table->increments('id');
        $table->string('path');
        $table->integer('user_id')->unsigned();
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;
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
      Schema::drop('images');
      Schema::drop('users');
    }
  }
