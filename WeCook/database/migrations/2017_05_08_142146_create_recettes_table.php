<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecettesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recettes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->mediumText('description')->nullable();
            $table->mediumText('toknow')->nullable();
            $table->integer('timeCuisson');
            $table->integer('time');
            $table->text('iframe');
            $table->text('picture');
            $table->integer('vid');
            $table->integer('nbPers');
            $table->boolean('visible')->default(0);
            $table->integer('cateRecette_id')->unsigned();
            $table->integer('country_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned();
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
        Schema::dropIfExists('recettes');
    }
}
