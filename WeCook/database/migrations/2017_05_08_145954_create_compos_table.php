<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('entrée_id');
            $table->integer('plat_id');
            $table->integer('dessert_id');
            $table->integer('boisson_id');
            $table->integer('user_id')->unsigned();
            $table->integer('cateCompo_id')->unsigned();
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
        Schema::dropIfExists('compos');
    }
}
