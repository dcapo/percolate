<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTastingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tastings', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tasted_at');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('brew_id')->unsigned()->index();
            $table->integer('overall_score');
            $table->integer('dry_fragrance');
            $table->integer('wet_aroma');
            $table->integer('brightness');
            $table->integer('flavor');
            $table->integer('body');
            $table->integer('finish');
            $table->integer('sweetness');
            $table->integer('clean_cup');
            $table->integer('complexity');
            $table->integer('uniformity');
            $table->timestamps();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->foreign('brew_id')
                  ->references('id')
                  ->on('brews')
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
        Schema::dropIfExists('tastings');
    }
}
