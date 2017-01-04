<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('eggs', function (Blueprint $table) {
        $table->increments('id');
        $table->string('egg_id')->unique();
        $table->float('initial_length');
        $table->float('initial_width');
        $table->float('initial_weight');
        $table->timestamps();
      });

      Schema::create('egg_data', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('egg_data_id')->unsigned();
        $table->foreign('egg_data_id')->references('id')->on('eggs')->onDelete('cascade');
        $table->float('length');
        $table->float('width');
        $table->float('weight');
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
      Schema::drop('egg_data');
      Schema::drop('eggs');
    }
  }
