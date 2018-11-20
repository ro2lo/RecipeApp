<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNameListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nameList', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->integer('user_id')->unsigned();
            $table->integer('rights')->default(1);
            $table->integer('nbDay')->default(7);
            $table->date('date');
            $table->boolean('valide')->default(1);
            $table->integer('nbByDay')->default(2);
            $table->integer('type')->default(2);
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
        Schema::dropIfExists('nameList');
    }
}













